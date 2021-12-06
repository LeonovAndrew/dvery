<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
?>

<? foreach($arResult['SECTIONS'] as $arSection) :?>
	<div class="contacts-list__item">
	    <div class="contacts-list__head">
	        <?=$arSection['NAME']?>
	    </div>
	    <?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"salons", 
			array(
				"COMPONENT_TEMPLATE" => "salons",
				"IBLOCK_TYPE" => "content",
				"IBLOCK_ID" => "10",
				"PARENT_SECTION" => $arSection['ID'],
				"NEWS_COUNT" => "5",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ID",
				"SORT_ORDER2" => "DESC",
				"AJAX_MODE" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N"
			),
			false
		);?>
	</div>
<? endforeach; ?>