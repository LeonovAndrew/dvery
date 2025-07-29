<?php

namespace Local\Lib\Internals;

use Bitrix\Main;
use DevBx\Core\Assert;
use Local\Lib\Api;
use Local\Lib\DB\UserGeoTable;

class UserGeo
{
    const SESSION_KEY = 'DEV_BX_USER_GEO';

    public static function addUserGeoStat(array $data)
    {
        global $USER;

        $statId = Main\Context::getCurrent()->getRequest()->getCookie('DEVBX_USER_GEO_ID');

        if (!empty($statId))
        {
            if (!UserGeoTable::getList([
                'filter' => [
                    '=USER_STAT_ID' => $statId
                ],
                'limit' => 1,
            ])->fetch())
            {
                $statId = false;
            }
        }

        if (empty($statId))
        {
            while (true)
            {
                $statId = md5(uniqid());

                if (!UserGeoTable::getList([
                    'filter' => [
                        '=USER_STAT_ID' => $statId
                    ],
                    'limit' => 1,
                ])->fetch())
                {
                    break;
                }
            }
        }

        $arFields = array(
            'USER_STAT_ID' => $statId,
            'ACCURACY' => $data['ACCURACY'],
            'LATITUDE' => $data['POSITION'][0],
            'LONGITUDE' => $data['POSITION'][1],
            'ADDRESS' => $data['ADDRESS'],
        );

        if (is_object($USER) && $USER->IsAuthorized())
        {
            $arFields['USER_ID'] = $USER->GetID();
        }

        $dbResult = UserGeoTable::add($arFields);

        if (!$dbResult->isSuccess())
            return $dbResult;

        //$session = Main\Application::getInstance()->getKernelSession();
        $session = &$_SESSION;

        $session[static::SESSION_KEY] = $arFields;

        $cookie = new Main\Web\Cookie('DEVBX_USER_GEO_ID', $statId);

        Main\Context::getCurrent()->getResponse()->addCookie($cookie);

        $result = new Main\Result();

        return $result;
    }

    public static function getUserData()
    {
        global $USER;

        //$session = Main\Application::getInstance()->getKernelSession();
        $session = &$_SESSION;

        if (isset($session[static::SESSION_KEY]))
        {
            return $session[static::SESSION_KEY];
        }

        $statId = Main\Context::getCurrent()->getRequest()->getCookie('DEVBX_USER_GEO_ID');

        $arFilter = array();

        if (!empty($statId))
        {
            $arFilter['=USER_STAT_ID'] = $statId;
        } else {
            if (!is_object($USER) || !$USER->IsAuthorized())
                return false;

            $arFilter['=USER_ID'] = $USER->GetID();
        }

        $arGeo = UserGeoTable::getList([
            'filter' => $arFilter,
            'order' => ['INSERT_DATE'=>'DESC'],
        ])->fetch();

        return $arGeo;
    }

    public static function OnEndBufferContent(&$content)
    {
        if (Main\Config\Option::get('local.lib', 'user_geo', 'N') != 'Y')
            return;

        $request = \Bitrix\Main\Context::getCurrent()->getRequest();

        if ($request->isPost())
            return;

        $response = \Bitrix\Main\Context::getCurrent()->getResponse();

        /*
        if ($response->getHeaders()->getContentType() == 'application/json')
            return;
        */

        //$session = Main\Application::getInstance()->getKernelSession();
        $session = &$_SESSION;

        if (isset($session[static::SESSION_KEY]))
            return;

        $content .= <<<JS
<script>
    BX.ready(function() {

    function waitYmaps()
    {
        if (typeof ymaps === 'undefined')
            {
                setTimeout(waitYmaps, 1000);
                return;
            }
        
        ymaps.ready(function() {
            
ymaps.ready(function() {
	ymaps.geolocation.get().then(function(result) {
        
        BX.ajax({
            url: '/ajax/action.php',
            method: 'POST',
            data: {
                sessid: BX.bitrix_sessid(),
                method: 'geo',
                accuracy: result.geoObjects.accuracy,
                position: result.geoObjects.position,
                address: result.geoObjects.get(0).getAddressLine(),  
                userAgent: navigator.userAgent                
            }        
        });
	})
});

        });
    };
    
    waitYmaps();
    });
</script>
JS;

    }

    public static function userGeo(Api $context, Main\Type\ParameterDictionary $params)
    {
        $result = new Main\Result();

        $accuracy = Assert::expectTrimStringNotNull($params['accuracy'], 'accuracy');
        $position = Assert::expectNotEmptyArray($params['position'], 'position');
        $address = Assert::expectTrimStringNotNull($params['address'], 'address');

        static::addUserGeoStat(array(
            'ACCURACY' => $accuracy,
            'POSITION' => $position,
            'ADDRESS' => $address,
        ));

        return $result;
    }

    public static function registerApi(Api $api)
    {
        $api->registerApi('geo', array(__CLASS__, 'userGeo'));
    }

}