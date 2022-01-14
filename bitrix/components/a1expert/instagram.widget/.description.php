<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
    'NAME' => Loc::getMessage('COMPONENT_NAME'),
    'DESCRIPTION' => Loc::getMessage('COMPONENT_DESC'),
    'CACHE_PATH' => 'Y',
    'ICON' => '',
    'SORT' => 1,
    'PATH' => [
        'ID' => 'a1expert.widget',
        'NAME' => Loc::getMessage('COMPONENT_PATH_NAME')
    ],
    'COMPLEX' => 'N'
];