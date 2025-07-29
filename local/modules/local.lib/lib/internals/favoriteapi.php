<?php
namespace Local\Lib\Internals;

use Bitrix\Main;
use Local\Lib\Api;
use Local\Lib\DB\FavoriteTable;
use DevBx\Core\Assert;

class FavoriteApi {

    public static function getFavoriteList(Api $context, Main\Type\ParameterDictionary $params)
    {
        Main\Loader::includeModule('iblock');

        $arItems = array();

        $arId = FavoriteTable::getUserFavoriteArray();

        if (!empty($arId))
        {
            $iterator = \CIBlockElement::GetList([],['=ID'=>$arId],false,false,array('ID','NAME'));
            while ($ar = $iterator->Fetch())
            {
                $arItems[$ar['ID']] = $ar;
            }
        }

        return ['items' => $arItems, 'success' => true];
    }

    public static function addFavorite(Api $context, Main\Type\ParameterDictionary $params)
    {
        global $USER;

        if (!$USER->IsAuthorized())
        {
            return ['error' => 'Требуется авторизация','need_auth'=>true];
        }

        FavoriteTable::saveProductId(Assert::expectIntegerPositive($params['id'], 'id'));

        return ['success' => true];
    }

    public static function removeFavorite(Api $context, Main\Type\ParameterDictionary $params)
    {
        global $USER;

        if (!$USER->IsAuthorized())
        {
            return ['error' => 'Требуется авторизация','need_auth'=>true];
        }

        $id = Assert::expectIntegerPositive($params['id'], 'id');

        FavoriteTable::removeProductId($id);

        return ['success' => true, 'id' => $id];
    }

    public static function toggleFavorite(Api $context, Main\Type\ParameterDictionary $params)
    {
        global $USER;

        if (!$USER->IsAuthorized())
        {
            return ['error' => 'Требуется авторизация','need_auth'=>true];
        }

        $productId = Assert::expectIntegerPositive($params['id'], 'id');

        if (in_array($productId, FavoriteTable::getUserFavoriteArray())) {
            FavoriteTable::removeProductId($productId);
        } else {
            FavoriteTable::saveProductId($productId);
        }

        return ['success' => true];
    }

    public static function registerApi(Api $api)
    {
        $api->registerApi('getFavoriteList', array(__CLASS__, 'getFavoriteList'));
        $api->registerApi('addFavorite', array(__CLASS__, 'addFavorite'));
        $api->registerApi('removeFavorite', array(__CLASS__, 'removeFavorite'));
        $api->registerApi('toggleFavorite', array(__CLASS__, 'toggleFavorite'));
    }

}
