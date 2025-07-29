<?php

namespace Local\Lib;

use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;

class Utils {

    public static function showImage($arFile)
    {
        ob_start();
        ?>
        <img src="<?=$arFile['SRC']?>">
        <?php
        return trim(ob_get_clean());
    }

    public static function getFilterSection($iblockId, array $sectionCode)
    {
        if (empty($sectionCode))
            return [];

        $result = [];

        $iterator = \DevBx\Core\IBlockSection::GetList(
            ['LEFT_MARGIN'=>'ASC'],
            ['IBLOCK_ID'=>$iblockId,'=CODE'=>$sectionCode,'ACTIVE'=>'Y','GLOBAL_ACTIVE'=>'Y'],
            false,
            ['ID','CODE','LEFT_MARGIN','RIGHT_MARGIN']
        );

        while ($ar = $iterator->Fetch())
        {
            $result[$ar['ID']] = $ar;
        }

        foreach ($result as $id=> $section)
        {
            $iterator = \DevBx\Core\IBlockSection::GetList(
                [],
                [
                    'IBLOCK_ID' => $iblockId,
                    '>LEFT_MARGIN' => $section['LEFT_MARGIN']+1,
                    '<RIGHT_MARGIN' => $section['RIGHT_MARGIN'],
                ],
                false,
                array('ID','LEFT_MARGIN','RIGHT_MARGIN')
            );

            while ($ar = $iterator->Fetch())
            {
                unset($result[$ar['ID']]);
            }
        }

        return $result;
    }

    public static function getMenuSections($iblockId, $sectionId, $depthLevel = 1, $menuLevel = 1)
    {
        Loader::includeModule('devbx.core');

        $arFilter = array(
            "IBLOCK_ID"=>$iblockId,
            "GLOBAL_ACTIVE"=>"Y",
            "IBLOCK_ACTIVE"=>"Y",
            "<="."DEPTH_LEVEL" => $depthLevel,
        );

        if ($sectionId>0)
        {
            $arSection = \DevBx\Core\IBlockSection::GetList(
                [],
                ['IBLOCK_ID'=>$iblockId,'ID'=>$sectionId],
                false,
                ['ID','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL']
            )->Fetch();

            if (!$arSection)
                return [];

            $arFilter['>LEFT_MARGIN'] = $arSection['LEFT_MARGIN']+1;
            $arFilter['<RIGHT_MARGIN'] = $arSection['RIGHT_MARGIN'];

            $startDepth = $arSection['DEPTH_LEVEL']+1;
        } else {
            $startDepth = 1;
        }

        $arOrder = array(
            "left_margin"=>"asc",
        );

        $rsSections = \DevBx\Core\IblockSection::GetList($arOrder, $arFilter, false, array(
            "ID",
            "DEPTH_LEVEL",
            "NAME",
            "SECTION_PAGE_URL",
        ));

        $arSections = [];

        while($arSection = $rsSections->GetNext())
        {
            $arSections[] = array(
                "ID" => $arSection["ID"],
                "DEPTH_LEVEL" => $arSection["DEPTH_LEVEL"],
                "~NAME" => $arSection["~NAME"],
                "~SECTION_PAGE_URL" => $arSection["~SECTION_PAGE_URL"],
            );
        }

        $aMenuLinksNew = array();
        $menuIndex = 0;
        $previousDepthLevel = 1;
        foreach($arSections as $arSection)
        {
            if ($menuIndex > 0)
                $aMenuLinksNew[$menuIndex - 1][3]["IS_PARENT"] = $arSection["DEPTH_LEVEL"] > $previousDepthLevel;
            $previousDepthLevel = $arSection["DEPTH_LEVEL"];

            $aMenuLinksNew[$menuIndex++] = array(
                htmlspecialcharsbx($arSection["~NAME"]),
                $arSection["~SECTION_PAGE_URL"],
                array(urldecode($arSection["~SECTION_PAGE_URL"])),
                array(
                    "FROM_IBLOCK" => true,
                    "IS_PARENT" => false,
                    "DEPTH_LEVEL" => $arSection["DEPTH_LEVEL"]-$startDepth+$menuLevel,
                ),
            );
        }

        return $aMenuLinksNew;
    }

    public static function getElementCssStyle($ID)
    {
        $result = array();

        $btnFavoriteClass = false;
        $btnAddBasketClass = false;

        $secIterator = \CIBlockElement::GetElementGroups($ID, true, array('ID','IBLOCK_ID'));

        while ($arSection = $secIterator->GetNext())
        {
            if (!$btnFavoriteClass)
                $btnFavoriteClass = \DevBx\Core\Iblock::getSectionValueRecursive($arSection['IBLOCK_ID'], $arSection['ID'], 'UF_BTN_FAVORITE_CSS_CLASS');

            if (!$btnAddBasketClass)
                $btnAddBasketClass = \DevBx\Core\Iblock::getSectionValueRecursive($arSection['IBLOCK_ID'], $arSection['ID'], 'UF_BTN_ADD_BASKET_CSS_CLASS');
        }


        $result['BTN_FAVORITE_CLASS'] = $btnFavoriteClass ?: 'likebutton';
        $result['BTN_ADD_BASKET_CLASS'] = $btnAddBasketClass ?: 'cartbutton';

        return $result;
    }

    public static function applyItemResult(&$arItem)
    {
        $arItem['PRICE'] = $arItem['ITEM_PRICES'][$arItem["ITEM_PRICE_SELECTED"]];

        if (is_array($arItem['OFFERS']) && !empty($arItem['OFFERS']))
        {
            $offerSelected = false;

            foreach ($arItem['OFFERS'] as $idx=>&$arOffer)
            {
                $arOffer['SELECTED'] = $arItem['OFFER_ID_SELECTED'] == $idx;
                $offerSelected |= $arOffer['SELECTED'];
                $arOffer['PRICE'] = $arOffer['ITEM_PRICES'][$arOffer["ITEM_PRICE_SELECTED"]];
            }
            unset($arOffer);

            if (!$offerSelected)
            {
                $arItem['OFFERS'][0]['SELECTED'] = true;
            }
        }

        $tableName = $arItem['PROPERTIES']['LABEL']['USER_TYPE_SETTINGS']['TABLE_NAME'];

        $arLabels = [];

        foreach ($arItem['PROPERTIES']['LABEL']['VALUE'] as $value)
        {
            $value = \DevBx\Core\HighloadHelper::getByXmlId($tableName, $value);
            if ($value)
            {
                $value['UF_FILE'] = \CFile::GetFileArray($value['UF_FILE']);
                if (is_array($value['UF_FILE']))
                {
                    $value['CSS_CLASS'] = 'menublock__label_'.$value['UF_XML_ID'];
                }

                $arLabels[] = $value;
            }
        }

        $arItem['PRICE'] = $arItem['ITEM_PRICES'][$arItem["ITEM_PRICE_SELECTED"]];

        $arItem = array_merge($arItem, static::getElementCssStyle($arItem['ID']));

        $arItem['LABELS'] = $arLabels;
    }

    public static function &getBuyItem(&$arItem)
    {
        if (is_array($arItem['OFFERS']) && !empty($arItem['OFFERS']))
        {
            foreach ($arItem['OFFERS'] as &$arOffer)
            {
                if ($arOffer['SELECTED'])
                    return $arOffer;
            }

            throw new SystemException('Offer not selected');
        }

        return $arItem;
    }

}