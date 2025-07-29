<?php

namespace Local\Lib;

use Bitrix\Main\SystemException;
use Bitrix\Main\Text\StringHelper;

/**
 *@method static bool isEnabledFavorite()
 *@method static bool getCatalogIblockId()
 */

class Config {

    const FEATURE_FAVORITE = 'FAVORITE';
    const CATALOG_IBLOCK_ID = 'CATALOGIBLOCKID';

    protected static $arConfig = array(
        self::FEATURE_FAVORITE => true,
        self::CATALOG_IBLOCK_ID => 2,

    );

    public static function isEnabled($feature)
    {
        return static::$arConfig[StringHelper::strtoupper($feature)] === true;
    }

    public static function getValue($feature)
    {
        return static::$arConfig[StringHelper::strtoupper($feature)];
    }

    public static function __callStatic(string $name, array $arguments)
    {
        if (mb_substr($name,0 ,9) == 'isEnabled')
        {
            return static::isEnabled(substr(strtolower($name), 9));
        }

        if (mb_substr($name,0 ,3) == 'get')
        {
            return static::getValue(substr(strtolower($name), 3));
        }


        throw new SystemException(sprintf(
            'Unknown method `%s` for object `%s`', $name, get_called_class()
        ));
    }

}