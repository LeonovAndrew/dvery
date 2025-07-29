<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

foreach ($arResult['ITEMS'] as &$arItem)
{
    $materials = [];

    foreach($arItem['OFFERS'] as $offer) {
        if (!empty($offer['PROPERTIES']['MATERIAL']['VALUE'])) {
            $materials[$offer['PROPERTIES']['MATERIAL']['VALUE']] = $offer['PROPERTIES']['MATERIAL']['VALUE'];
        }
    }

    if (!empty($materials)) {
        $rsMaterials = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 15, 'ACTIVE' => 'Y', 'ID' => array_keys($materials)], false, false, ['ID', 'NAME', 'DETAIL_PICTURE', 'IBLOCK_SECTION_ID']);

        while($arMaterial = $rsMaterials->fetch()) {
            $arItem['MATERIALS'][$arMaterial['IBLOCK_SECTION_ID']]['CHILDS'][$arMaterial['ID']] = [
                'NAME' => $arMaterial['NAME'],
                'PICTURE' => CFile::GetPath($arMaterial['DETAIL_PICTURE']),
                'ID' => $arMaterial['ID']
            ];
        }

        if (!empty($arItem['MATERIALS'])) {
            $rsMaterialSections = CIBlockSection::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 15, 'ACTIVE' => 'Y', 'ID' => array_keys($arItem['MATERIALS'])]);
            while($arMaterialSection = $rsMaterialSections->fetch()) {
                $arItem['MATERIALS'][$arMaterialSection['ID']]['NAME'] = $arMaterialSection['NAME'];
            }
        }

        $rsDesign = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 17, 'ACTIVE' => 'Y', 'SECTION_CODE' => $arItem['CODE'], 'PROPERTY_MATERIAL' => array_keys($materials)], false, false, ['ID', 'NAME', 'DETAIL_PICTURE', 'PROPERTY_DESIGN', 'PROPERTY_MATERIAL']);

        $design = [];
        while($arDesign = $rsDesign->fetch()) {
            $arItem['DESIGN_PHOTOS'][$arDesign['PROPERTY_MATERIAL_VALUE']][$arDesign['PROPERTY_DESIGN_VALUE']] = [
                'NAME' => $arDesign['NAME'],
                'PICTURE' => CFile::GetPath($arDesign['DETAIL_PICTURE']),
                'ID' => $arDesign['ID'],
                'MATERIAL' => $arDesign['PROPERTY_MATERIAL_VALUE'],
                'DESIGN' => $arDesign['PROPERTY_DESIGN_VALUE']
            ];

            $design[$arDesign['PROPERTY_DESIGN_VALUE']] = $arDesign['PROPERTY_DESIGN_VALUE'];
        }

        if (!empty($design)) {
            $rsDesign = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 16, 'ACTIVE' => 'Y', 'ID' => $design], false, false, ['ID', 'NAME', 'DETAIL_PICTURE']);

            while($arDesign = $rsDesign->fetch()) {
                $arItem['DESIGN'][] = [
                    'NAME' => $arDesign['NAME'],
                    'PICTURE' => CFile::GetPath($arDesign['DETAIL_PICTURE']),
                    'ID' => $arDesign['ID'],
                ];
            }
        }

        unset($design, $materials);
    }


    $arItem['ACTUAL_MATERIAL'] = current(current($arItem['MATERIALS'])['CHILDS'])['ID'];
    $arItem['ACTUAL_DESIGN'] = current($arItem['DESIGN'])['ID'];
    $arItem['CURRENT_DESIGN'] = $arItem['DESIGN_PHOTOS'][$arItem['ACTUAL_MATERIAL']][$arItem['ACTUAL_DESIGN']];

    if (!empty($arItem['OFFERS']))
    {
        $arItem['CURRENT_OFFER'] = reset($arItem['OFFERS']);

        $arPrices = [];

        foreach ($arItem['OFFERS'] as $arOffer)
        {
            if (!empty($arOffer['MIN_PRICE']))
            {
                $arPrices[] = $arOffer['MIN_PRICE']['DISCOUNT_VALUE'];
            }
        }

        if (!empty($arPrices))
        {
            $arItem['OFFER_MIN_PRICE'] = min($arPrices);
        }
    }
}