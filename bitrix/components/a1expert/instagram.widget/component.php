<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (Loader::includeModule('a1expert.instagram') && Option::get('a1expert.instagram', 'USE_ACTIVE') === 'Y') {
    if (!isset($arParams['CACHE_TIME'])) {
        $arParams['CACHE_TIME'] = 86400;
    }

    $arResult['TOKEN'] = $arParams['TOKEN'] === Option::get('a1expert.instagram', 'API_TOKEN') ? $arParams['TOKEN'] : Option::get('a1expert.instagram', 'API_TOKEN', '2286806447.81132aa.96e3cb3e4c5449da90aa40219f50eeff');
    $arResult['TITLE'] = $arParams['TITLE'] ?? Option::get('a1expert.instagram', 'MAIN_TITLE', Loc::getMessage('INSTAGRAM_TITLE'));
    $arResult['ITEMS_COUNT'] = ($arParams['ITEMS_COUNT'] && intval($arParams['ITEMS_COUNT']) > 0) ? intval($arParams['ITEMS_COUNT']) : Option::get('a1expert.instagram', 'MAIN_COUNT_POSTS', '12');
    $arResult['LAYOUT'] = $arParams['LAYOUT'] ?? 'slider';
    $arResult['POST_TEMPLATE'] = $arParams['POST_TEMPLATE'] ?? 'classic';
    $arResult['COLUMNS'] = $arParams['COLUMNS'] ?? 4;
    $arResult['ROWS'] = $arParams['ROWS'] ?? 2;
    $arResult['MARGIN_POSTS'] = $arParams['MARGIN_POSTS'] ?? 0;
    $arResult['WIDTH'] = $arParams['WIDTH'] ?? 'auto';
    $arResult['ELEMENTS_DISPLAY'] = $arParams['ELEMENTS_DISPLAY'] ?? ['user', 'date', 'like_count', 'comments_count', 'share', 'text'];
    $arResult['ELEMENTS_POPUP'] = $arParams['ELEMENTS_POPUP'] ?? ['user', 'location', 'follow_button', 'instagram_link', 'like_count', 'share', 'text', 'date'];
    $arResult['WIDTH'] = $arParams['WIDTH'] ?? 'auto';
    $arResult['ACTION_CLICK_IMG'] = $arParams['ACTION_CLICK_IMG'] ?? 'popup';
    $arResult['USE_ACTIVE'] = Option::get('a1expert.instagram', 'USE_ACTIVE', 'Y');
    $arResult['USE_JQUERY'] = Option::get('a1expert.instagram', 'USE_JQUERY', 'Y');
    $arResult['ACTION_CLICK_IMG'] = $arParams['ACTION_CLICK_IMG'];
    $arResult['CONTAINER'] = bin2hex(random_bytes(20));

    if ($arResult['POST_TEMPLATE'] == 'classic') {
        $mobile = [
            ['breakpoint' => '1024', 'slidesToShow' => 4, 'rows' => 2, 'margin' => 0],
            ['breakpoint' => '768', 'slidesToShow' => 3, 'rows' => 2, 'margin' => 0],
            ['breakpoint' => '375', 'slidesToShow' => 2, 'rows' => 2, 'margin' => 0]
        ];
    } else {
        $mobile = [
            ['breakpoint' => '1024', 'slidesToShow' => 4, 'rows' => 0, 'margin' => 0],
            ['breakpoint' => '768', 'slidesToShow' => 3, 'rows' => 0, 'margin' => 0],
            ['breakpoint' => '375', 'slidesToShow' => 3, 'rows' => 0, 'margin' => 0]
        ];
    }

    $arResult['MOBILE'] = $mobile;
    $config = A1expert::GetFrontParametrsValues(SITE_ID);
    $mobileOptions = A1expert::GetFrontParametrValue('MOBILE_OPTIONS');
    $array = [];
    if ($mobileOptions) {
        for ($i = 0; $i < $mobileOptions; ++$i) {
            $array[] = [
                'breakpoint' => $config['MOBILE_OPTIONS_array_MOBILE_WIDTH_' . $i],
                'slidesToShow' => $config['MOBILE_OPTIONS_array_MOBILE_COLUMN_' . $i],
                'rows' => $config['MOBILE_OPTIONS_array_MOBILE_ROWS_' . $i],
                'margin' => $config['MOBILE_OPTIONS_array_MOBILE_MARGIN_IMG_' . $i]
            ];
        }
        $arResult['MOBILE'] = $array;
    }

    $arResult['hash'] = \A1expert::generateHash();

    if (!is_object($GLOBALS['USER'])) {
        $GLOBALS['USER'] = new CUser();
    }

    $arResult['IS_AJAX'] = 'Y';

    if ($this->startResultCache($arParams['CACHE_TIME'], [($arParams['CACHE_GROUPS'] === 'N' ? false : $GLOBALS['USER']->GetGroups()), $arResult])) {
        if ($arResult['IS_AJAX'] === 'Y') {
            $obInstagram = new A1expertInstagram($arResult['TOKEN'], $arParams['ITEMS_COUNT']);

            $arData = $obInstagram->getInstagramPosts();
            //$arUser = $obInstagram->getInstagramUser();

            if ($arData) {
                if ($arData['error']['message']) {
                    $arResult['ERROR'] = $arData['error']['message'];
                } elseif ($arData['data']) {
                    $arResult['ITEMS'] = array_slice($arData['data'], 0, $arParams['ITEMS_COUNT']);
                    $arResult['USER']['username'] = $arData['data'][0]['username'];
                }
            }

            if ($arResult['ERROR']) {
                $this->AbortResultCache();
                ?>
                <br>
                <div class="alert alert-danger">
                    <strong>Error: </strong><?= $arResult['ERROR'] ?>
                </div>
                <?
            }
        }

        $this->includeComponentTemplate();
    }
} else {
    return;
}