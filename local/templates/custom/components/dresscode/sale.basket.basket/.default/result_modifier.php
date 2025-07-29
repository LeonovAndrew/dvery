<?php
if(count($arResult["ITEMS"])){
    foreach ($arResult["ITEMS"] as $sku){
        $item = CCatalogSku::GetProductInfo($sku['PRODUCT_ID']);
        if($item['ID']){
            $itemsIDs[$sku['PRODUCT_ID']] = $item['ID'];
        } else {
            $itemsIDs[$sku['PRODUCT_ID']] = $sku['PRODUCT_ID'];
        }
    }

    $updatedItems = CIBlockElement::GetList([],['ID'=>$itemsIDs, 'IBLOCK_ID'=>IBLOCK_ID_CATALOG], false,false, ['ID','DETAIL_PAGE_URL','NAME','PROPERTY_'.CONST_PROIZVODITEL,'PROPERTY_'.CONST_ARTIKUL]);
    while($arUpdatedItem = $updatedItems->GetNext(false,false)){
        foreach ($arResult["ITEMS"] as &$sku) {
            if($itemsIDs[$sku['PRODUCT_ID']] == $arUpdatedItem['ID']){
                $sku["BRAND"] = $arUpdatedItem["PROPERTY_".CONST_PROIZVODITEL."_VALUE"];
                $sku["NAME"] = $arUpdatedItem["NAME"];
                $sku["DETAIL_PAGE_URL"] = $arUpdatedItem["DETAIL_PAGE_URL"];
                $sku["ARTICLE"] = $arUpdatedItem["PROPERTY_".CONST_ARTIKUL."_VALUE"];
            }
        }
    }

}