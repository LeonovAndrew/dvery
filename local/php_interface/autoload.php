<?php

use Bitrix\Main\Loader;

//Автозагрузка наших классов
Loader::registerAutoLoadClasses(null, [
    'lib\UserType\CUserTypeUserGroupId' => APP_CLASS_FOLDER . 'UserType/CUserTypeUserGroupId.php',
//    'lib\UserType\CUserTypeColor' => APP_CLASS_FOLDER . 'UserType/CUserTypeColor.php'
]);