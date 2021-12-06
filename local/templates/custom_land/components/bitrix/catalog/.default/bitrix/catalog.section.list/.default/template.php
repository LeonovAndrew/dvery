<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
?>
<div class="catalog">
    <div class="cont">
    	<? foreach($arResult['SECTIONS'] as $arSection) :?>
	        <?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section", 
				"collections", 
				array(
					"COMPONENT_TEMPLATE" => "collections",
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"SECTION_ID" => $arSection["ID"],
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
					"ADD_SECTIONS_CHAIN" => "N",
					"SECTION_NAME" => $arSection["NAME"],
					"SECTION_CODE" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "arrFilter",
					"INCLUDE_SUBSECTIONS" => "Y",
					"SHOW_ALL_WO_SECTION" => "N",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"PAGE_ELEMENT_COUNT" => "18",
					"LINE_ELEMENT_COUNT" => "3",
					"OFFERS_LIMIT" => "1",
					"BACKGROUND_IMAGE" => "-",
					"SECTION_URL" => "",
					"DETAIL_URL" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SEF_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"CACHE_GROUPS" => "Y",
					"BROWSER_TITLE" => "-",
					"META_KEYWORDS" => "-",
					"META_DESCRIPTION" => "-",
					"SET_LAST_MODIFIED" => "N",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"CACHE_FILTER" => "N",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"BASKET_URL" => "/personal/basket.php",
					"USE_PRODUCT_QUANTITY" => "N",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"DISPLAY_COMPARE" => "N",
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => "Товары",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"MESSAGE_404" => "",
					"COMPATIBLE_MODE" => "Y",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N"
				),
				false
			);?>
        <? endforeach; ?>
    </div>  
</div>



<div class="catalog-info">
    <div class="cont">
        <div class="catalog-info__cont">
            <div class="catalog-info__head">
                <?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/catalog_title.php"
					)
			    );?>
            </div>
            <div class="catalog-info__body">
                <?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/catalog_text.php"
					)
			    );?>
            </div>
            <?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "",
					"EDIT_TEMPLATE" => "",
					"PATH" => "/include/catalog_link.php"
				)
		    );?>
        </div>
    </div> 
</div>