<?php

namespace Local\Lib\Internals;

use Bitrix\Main;
use Local\Lib\Api;
use Local\Lib\DB\FavoriteTable;
use DevBx\Core\Assert;

class DaDataApi
{
    public static function suggest($query, $count = 20)
    {
        $cache = new \CPHPCache();

        if ($cache->InitCache(60*60, 'dadata_'.md5(serialize(func_get_args())), "/local.lib"))
        {
            return $cache->GetVars();
        } else {
            $http = new \Bitrix\Main\Web\HttpClient();

            $token = Main\Config\Option::get('local.lib', 'DADATA_TOKEN');

            $http->setHeaders(array(
                'content-type' => 'application/json',
                'accept' => 'application/json',
                'Authorization' => 'Token '.$token,
            ));

            $arQuery = array(
                'count' => $count,
                'from_bound' => array(
                    'value' => 'city',
                ),
                'to_bound' => array(
                    'value' => 'house',
                ),
                'locations' => array(
                    array(
                        'country' => 'Россия'
                    ),
                ),
                'query' => $query
            );

            $postData = \Bitrix\Main\Web\Json::encode($arQuery);

            $rawResponse = $http->post('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', $postData);

            $response = json_decode($rawResponse, true);

            if (!is_array($response))
                return ['error'=>'Invalid response'];

            if (!isset($response['suggestions']))
            {
                if (isset($response['message']))
                    return ['error'=>$response['message']];

                return ['error'=>'Unknown error'];
            }

            if ($cache->StartDataCache())
            {
                $cache->EndDataCache($response);
            }

            return $response;
        }
    }

    public static function registerApi(Api $api)
    {
        $api->registerApi('suggest', array(__CLASS__, 'suggest'));
    }
}