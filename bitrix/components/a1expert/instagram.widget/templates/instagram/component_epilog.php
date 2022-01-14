<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addString("<script>let arA1expertOptions{$arResult['CONTAINER']} = {'CONFIG': ({'USE_ACTIVE': '" . $arResult['USE_ACTIVE'] . "', 'CONTAINER': 'instagram-app-{$arResult['hash']}'})}</script>");