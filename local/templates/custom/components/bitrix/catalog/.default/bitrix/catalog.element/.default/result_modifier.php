<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$materials = [];

foreach ($arResult['OFFERS'] as $offer) {
    if (!empty($offer['PROPERTIES']['MATERIAL']['VALUE'])) {
        $materials[$offer['PROPERTIES']['MATERIAL']['VALUE']] = $offer['PROPERTIES']['MATERIAL']['VALUE'];

        $arResult['COMPLECT'][$offer['ID']] = $offer['PROPERTIES']['COMPLECT']['VALUE'];
    }
}

if (!empty($materials)) {
    $rsMaterials = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 15, 'ACTIVE' => 'Y', 'ID' => array_keys($materials)], false, false, ['ID', 'NAME', 'DETAIL_PICTURE', 'IBLOCK_SECTION_ID']);

    while ($arMaterial = $rsMaterials->fetch()) {
        $arResult['MATERIALS'][$arMaterial['IBLOCK_SECTION_ID']]['CHILDS'][$arMaterial['ID']] = [
            'NAME' => $arMaterial['NAME'],
            'PICTURE' => CFile::GetPath($arMaterial['DETAIL_PICTURE']),
            'ID' => $arMaterial['ID'],
        ];
    }

    if (!empty($arResult['MATERIALS'])) {
        $rsMaterialSections = CIBlockSection::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 15, 'ACTIVE' => 'Y', 'ID' => array_keys($arResult['MATERIALS'])]);
        while ($arMaterialSection = $rsMaterialSections->fetch()) {
            $arResult['MATERIALS'][$arMaterialSection['ID']]['NAME'] = $arMaterialSection['NAME'];
        }
    }

    $rsDesign = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 17, 'ACTIVE' => 'Y', 'SECTION_CODE' => $arResult['CODE'], 'PROPERTY_MATERIAL' => array_keys($materials)], false, false, ['ID', 'NAME', 'DETAIL_PICTURE', 'PROPERTY_DESIGN', 'PROPERTY_MATERIAL']);

    $design = [];
    while ($arDesign = $rsDesign->fetch()) {
        $arResult['DESIGN_PHOTOS'][$arDesign['PROPERTY_MATERIAL_VALUE']][$arDesign['PROPERTY_DESIGN_VALUE']] = [
            'NAME' => $arDesign['NAME'],
            'PICTURE' => CFile::GetPath($arDesign['DETAIL_PICTURE']),
            'ID' => $arDesign['ID'],
            'MATERIAL' => $arDesign['PROPERTY_MATERIAL_VALUE'],
            'DESIGN' => $arDesign['PROPERTY_DESIGN_VALUE'],
        ];

        $design[$arDesign['PROPERTY_DESIGN_VALUE']] = $arDesign['PROPERTY_DESIGN_VALUE'];
    }

    if (!empty($design)) {
        $rsDesign = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], ['IBLOCK_ID' => 16, 'ACTIVE' => 'Y', 'ID' => $design], false, false, ['ID', 'NAME', 'DETAIL_PICTURE']);

        while ($arDesign = $rsDesign->fetch()) {
            $arResult['DESIGN'][] = [
                'NAME' => $arDesign['NAME'],
                'PICTURE' => CFile::GetPath($arDesign['DETAIL_PICTURE']),
                'ID' => $arDesign['ID'],
            ];
        }
    }

    unset($design, $materials);
}

if (!empty($arResult['MATERIALS']) && !empty($arResult['DESIGN'])) {
    $arResult['ACTUAL_MATERIAL'] = current(current($arResult['MATERIALS'])['CHILDS'])['ID'];
    $arResult['ACTUAL_DESIGN'] = current($arResult['DESIGN'])['ID'];
    $arResult['CURRENT_DESIGN'] = $arResult['DESIGN_PHOTOS'][$arResult['ACTUAL_MATERIAL']][$arResult['ACTUAL_DESIGN']];

    foreach ($arResult['OFFERS'] as &$offer) {
        if ($offer['PROPERTIES']['MATERIAL']['VALUE'] == $arResult['ACTUAL_MATERIAL']) {
            $offer['ACTUAL'] = true;

            if (!isset($arResult['CURRENT_OFFER'])) {
                $arResult['CURRENT_OFFER'] = $offer;

                if (!empty($arResult['MATERIALS'])) {
                    foreach ($arResult['MATERIALS'] as $materialSection) {
                        if (!empty($materialSection['NAME'])) {
                            $arResult['CURRENT_OFFER']['COVER'] = $materialSection['NAME'];
                            break;
                        }
                    }
                }
            }
        }

        $price = current($offer['ITEM_PRICES'])['PRICE'];
        $price_parts = round(current($offer['ITEM_PRICES'])['PRICE'] / 6);
        $old_price_coef = $arResult['PROPERTIES']['OLD_PRICE_COEF']['VALUE'] ?: 20;
        $old_price = $price + (($price / 100) * $old_price_coef);

        $arResult["JSON_OFFERS"][$offer['PROPERTIES']['MATERIAL']['VALUE']][$offer['PROPERTIES']['MODEL']['VALUE']] = [
            'PICTURE' => $offer['DETAIL_PICTURE']['SRC'],
            'PRICE' => current($offer['ITEM_PRICES'])['PRICE'],
            'PRICE_OLD' => (int)$old_price,
            'PRICE_PARTS' => $price_parts,
            'TEXT' => $offer['DETAIL_TEXT'],
            'ID' => $offer['ID'],
            'COVER' => $offer['PROPERTIES']['COVER']['VALUE'],
            'COMPLECT' => '',
        ];
    }
}

if (empty($arResult['OFFERS'])) {
    $arResult['CURRENT_OFFER'] = $arResult;
}