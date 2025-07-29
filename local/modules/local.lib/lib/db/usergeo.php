<?php

namespace Local\Lib\DB;

use Bitrix\Main\Entity;
use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\EntityError;
use Bitrix\Main\ORM\Event;
use Bitrix\Main\Result;

Loc::loadMessages(__FILE__);

class UserGeoTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'b_devbx_user_geo';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array('primary' => true, 'autocomplete' => true)),
            new Entity\DatetimeField('INSERT_DATE', array('title' => Loc::getMessage('DEVBX_DB_USER_GEO_INSERT_DATE'), 'required'=>true, 'default_value' => function () {
                return new \Bitrix\Main\Type\DateTime();
            })),
            new Entity\StringField('USER_STAT_ID', array("title" => Loc::getMessage("DEVBX_DB_USER_GEO_USER_STAT_ID"), "required" => true)),
            new Entity\IntegerField('USER_ID', array("title" => Loc::getMessage("DEVBX_DB_USER_GEO_USER_ID"), "nullable" => true)),
            new Entity\FloatField('ACCURACY', array("title" => Loc::getMessage("DEVBX_DB_USER_GEO_ACCURACY"))),
            new Entity\FloatField('LATITUDE', array("title" => Loc::getMessage("DEVBX_DB_USER_GEO_LATITUDE"))),
            new Entity\FloatField('LONGITUDE', array("title" => Loc::getMessage("DEVBX_DB_USER_GEO_LONGITUDE"))),
            new Entity\StringField('ADDRESS', array("title" => Loc::getMessage("DEVBX_DB_USER_GEO_ADDRESS"))),
        );
    }
}
