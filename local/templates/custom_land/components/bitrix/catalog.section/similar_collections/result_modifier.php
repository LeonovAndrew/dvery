<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 

foreach($arResult['ITEMS'] as $key => $item) {
	if ($item['ID'] == $arParams['CURRENT_ITEM']) {
		unset($arResult['ITEMS'][$key]);
		break;
	}
}