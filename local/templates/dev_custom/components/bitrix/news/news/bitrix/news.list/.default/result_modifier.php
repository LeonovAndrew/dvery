<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$rsElements = CIBlockElement::GetList([], ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'], false, false, []);

while($arElement = $rsElements->GetNextElement()) {
	$properties = $arElement->getProperties();

	foreach($properties['TAGS']['VALUE'] as $key => $tag) {
		$arResult['TAGS'][$properties['TAGS']['VALUE_ENUM_ID'][$key]] = $tag;
	}
}