<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Фабрика межкомнатных дверей PROVANC – полностью Российское производство премиальных дверей из натуральных материалов и по современным технологиям. Наша продукция представлена в сети фирменных салонах в Москве и по всей России. Более 1000 серийных моделей и двери под заказ.");
$APPLICATION->SetPageProperty("keywords", "Межкомнатные двери, производство дверей, двери на заказ");
$APPLICATION->SetPageProperty("title", "Межкомнатные двери Прованс. Изготовление дверей высокого качества, по европейским технологиям ");
$APPLICATION->SetTitle("Межкомнатные двери Прованс");

global $MAIN_BANNERS;

global $MAIN_FILTER_SECTIONS;
global $MAIN_FILTER_MATERIALS;
global $MAIN_FILTER_COLORS;
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_banners", 
	array(
		"COMPONENT_TEMPLATE" => "main_banners",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "6",
		"NEWS_COUNT" => "6",
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
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "",
		),
	),
	false
);?>
<?if($USER->IsAdmin()){
	?>
	<div class="banner_button">
		<a href="" class="banner_button__one">Скачать каталог</a>
		<a href="" class="banner_button__one">Вызвать замерщика</a>
		<a href="" class="banner_button__one">Записаться в салон</a>
		<a href="" class="banner_button__one">Обратный звонок</a>
	</div>
	<?
}?>
<div class="block1">
	<div class="cont">
		<div class="block1__cont">
			<div class="block1__head">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/main_title.php"
					)
				);?>
			</div>
			<div class="block1__text">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/main_text.php"
					)
				);?>
			</div>
			<?
				global $sectionsFilter;
				$sectionsFilter['UF_DOP'] = 'да';
			?>


			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"main_new",
				[
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"CACHE_TIME" => "360000",
					"CACHE_TYPE" => "A",
					"COUNT_ELEMENTS" => "N",
					"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
					"FILTER_NAME" => "sectionsFilter",
					"HIDE_SECTION_NAME" => "Y",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"SECTION_CODE" => "",
					"SECTION_FIELDS" => array("",""),
					"SECTION_ID" => "",
					"SECTION_URL" => "/catalog/#SECTION_CODE#/",
					"SECTION_USER_FIELDS" => array("",""),
					"SHOW_PARENT_NAME" => "N",
					"TOP_DEPTH" => "1",
					"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
					"CUSTOM_SECTION_SORT" => ["SORT" => 'asc', 'ID' => 'desc']
				],
				false,
				[
					'HIDE_ICONS' => 'Y'
				]
			);?>
		</div>
	</div>
</div>
	<?
					$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"shop-index", 
	array(
		"IBLOCK_TYPE" => "shop",
		"IBLOCK_ID" => "22",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"ELEMENT_SORT_FIELD" => "shows",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "sort",
		"ELEMENT_SORT_ORDER2" => "asc",
		"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
		"PROPERTY_CODE_MOBILE" => array(
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PAGE_ELEMENT_COUNT" => "16",
		"FILTER_IDS" => array(
			0 => $elementId,
		),
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"PRICE_VAT_INCLUDE" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
		"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"LABEL_PROP" => array(
		),
		"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
		"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
		"ADD_PICT_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
		"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
		"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"HIDE_SECTION_DESCRIPTION" => "Y",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $elementId,
		"SHOW_FROM_SECTION" => "Y",
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
		"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
		"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
		"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
		"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
		"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
		"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
		"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
		"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
		"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
		"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
		"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"SHOW_CLOSE_POPUP" => "N",
		"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"COMPARE_NAME" => $arParams["COMPARE_NAME"],
		"USE_COMPARE_LIST" => "Y",
		"BACKGROUND_IMAGE" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => "shop-index",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"SHOW_ALL_WO_SECTION" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"BROWSER_TITLE" => "-",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:22:80\",\"DATA\":{\"logic\":\"Equal\",\"value\":303}}]}"
	),
	$component
);
					?>
<? if (isset($MAIN_BANNERS[0])) :?>
	<div class="banner-type-1" style="background-image: url(<?=CFile::GetPath($MAIN_BANNERS[0]['DETAIL_PICTURE'])?>);">
	<?/*<div class="banner-type-1" data-src="<?=CFile::GetPath($MAIN_BANNERS[0]['DETAIL_PICTURE'])?>">*/?>
		<div class="banner__bg">
			<div class="banner__title">
				<?=$MAIN_BANNERS[0]['NAME']?>
			</div>
			<div class="banner__text">
				<?=$MAIN_BANNERS[0]['DETAIL_TEXT']?>
			</div>
			<a href="<?=$MAIN_BANNERS[0]['CODE']?>" class="banner__link">
				Подробнее
			</a>
		</div>
	</div>
<? endif; ?>

<?
	global $sectionsFilterDop;
	$sectionsFilterDop['!UF_DOP'] = 'да';
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main_dop",
	[
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilterDop",
		"HIDE_SECTION_NAME" => "Y",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("",""),
		"SECTION_ID" => "",
		"SECTION_URL" => "/catalog/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "N",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
		"CUSTOM_SECTION_SORT" => ["SORT" => 'asc', 'ID' => 'desc']
	],
	false,
	[
		'HIDE_ICONS' => 'Y'
	]
);?>

<? if (isset($MAIN_BANNERS[1])) :?>
	<div class="banner-type-1" style="background-image: url(<?=CFile::GetPath($MAIN_BANNERS[1]['DETAIL_PICTURE'])?>);">
	<?/*<div class="banner-type-1" data-src="<?=CFile::GetPath($MAIN_BANNERS[1]['DETAIL_PICTURE'])?>">*/?>
		<div class="banner__bg">
			<div class="banner__title">
				<?=$MAIN_BANNERS[1]['NAME']?>
			</div>
			<div class="banner__text">
				<?=$MAIN_BANNERS[1]['DETAIL_TEXT']?>
			</div>
			<a href="<?=$MAIN_BANNERS[1]['CODE']?>" class="banner__link">
				Подробнее
			</a>
		</div>
	</div>
<? endif; ?>

<div class="sorting">
	<div class="cont">
		<div class="sorting__cont">
			<div class="sorting__head">
				Поиск по параметрам
			</div>
			<div class="sorting__text">
				Фабрика дверей Provance предлагает не только широкую гамму моделей по стилям, но и богатый выбор по материалам отделки
			</div>
			<div class="sorting__body">
				<div class="sorting__list">
					<div class="sorting__block">
						<div class="sorting__name">
							Стиль двери
						</div>
						<div class="sorting-select select-block">
							<div class="sorting-select-head select-head">
								<div class="sorting-select-side select-side">
									<div class="sorting-select-head-value text-type-1 select-value">
										Не выбрано
									</div>
								</div>
							</div>
							<div class="sorting-select-body select-body">
								<? foreach($MAIN_FILTER_SECTIONS as $key => $section) :?>
									<div class="sorting-select-option select-option">
										<input id="section<?=$key?>" name="section" type="radio" class="sorting-select-option-input js-filter-section js-filter-input" value="<?=$section['ID']?>">
										<label for="section<?=$key?>" class="sorting-select-option-text text-type-1"><?=$section['NAME']?></label>
									</div>
								<? endforeach; ?>
							</div>
						</div>
					</div>
					<div class="sorting__block">
						<div class="sorting__name">
							Материал двери
						</div>
						<div class="sorting-select select-block">
							<div class="sorting-select-head select-head">
								<div class="sorting-select-side select-side">
									<div class="sorting-select-head-value text-type-1 select-value">
										Не выбрано
									</div>
								</div>
							</div>
							<div class="sorting-select-body select-body">
								<? foreach($MAIN_FILTER_MATERIALS as $key => $material) :?>
									<div class="sorting-select-option select-option">
										<input id="material<?=$key?>" name="material" type="radio" class="sorting-select-option-input js-filter-material js-filter-input" value="<?=$material['ID']?>">
										<label for="material<?=$key?>" class="sorting-select-option-text text-type-1"><?=$material['NAME']?></label>
									</div>
								<? endforeach; ?>
							</div>
						</div>
					</div>
					<div class="sorting__block">
						<div class="sorting__name">
							Цвет двери
						</div>
						<div class="sorting-select select-block select-color">
							<div class="sorting-select-head select-head">
								<div class="sorting-select-side select-side">
									<div class="sorting-select-head-value sorting-select-head-value-img text-type-1 select-value">
										<div class="sort-img">
											
										</div>
										<span>Не выбрано</span>
									</div>
								</div>
							</div>
							<div class="sorting-select-body select-body">
								<?
								
								foreach($MAIN_FILTER_COLORS as $key => $color) :
								?>
									<div class="sorting-select-option sorting-select-option-img select-option js-filter-color-parent" data-material="<?=$color['IBLOCK_SECTION_ID']?>">
										<input id="colors<?=$key?>" name="color" type="radio" class="sorting-select-option-input js-filter-input js-filter-color" value="<?=$color['ID']?>">
										<label for="colors<?=$key?>" class="sorting-select-option-text text-type-1">
											<span class="sort-img">
												<img class="sort-img__item" src="<?=CFile::GetPath($color['DETAIL_PICTURE'])?>" alt="img<?=$key?>">
											</span>
											<span><?=$color['NAME']?></span>
										</label>
									</div>
								<? endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<a href="#" class="sorting__btn js-filter-button" style="display: none;">
					Показать доступные модели (<span class="js-filter-count">0</span>)
				</a>
			</div>
		</div>
	</div>
</div>

<? if (isset($MAIN_BANNERS[2])) :?>
	<div class="banner-type-1" style="background-image: url(<?=CFile::GetPath($MAIN_BANNERS[1]['DETAIL_PICTURE'])?>);">
	<?/*<div class="banner-type-1" data-src="<?=CFile::GetPath($MAIN_BANNERS[2]['DETAIL_PICTURE'])?>">*/?>
		<div class="banner__bg">
			<div class="banner__title">
				<?=$MAIN_BANNERS[2]['NAME']?>
			</div>
			<div class="banner__text">
				<?=$MAIN_BANNERS[2]['DETAIL_TEXT']?>
			</div>
			<a href="<?=$MAIN_BANNERS[2]['CODE']?>" class="banner__link">
				Подробнее
			</a>
		</div>
	</div>
<? endif; ?>

<?/*
<div class="adventages">
	<div class="adventages__head">
		<div class="cont">
			<div class="adventages__cont">
				Преимущества работы с нами
			</div>
		</div>
	</div>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"advantages", 
	array(
		"COMPONENT_TEMPLATE" => "advantages",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "9",
		"NEWS_COUNT" => "10",
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
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "",
		),
	),
	false
);?>
</div>
*/?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news_slick", 
	array(
		"COMPONENT_TEMPLATE" => "news_slick",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT`",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BLOCKS",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"certificates",
	Array(
		"AJAX_MODE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "certificates",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "10",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC"
	)
);?>
<?/*
<div style="height:40px"></div>
	<div class="news">
		<div class="cont">
			<?$APPLICATION->IncludeComponent(
	"a1expert:instagram.widget", 
	"instagram", 
	array(
		"ACTION_CLICK_IMG" => "insta",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"COLUMNS" => "4",
		"COMPONENT_TEMPLATE" => "instagram",
		"ELEMENTS_DISPLAY" => array(
			0 => "user",
			1 => "date",
			2 => "share",
			3 => "text",
		),
		"ITEMS_COUNT" => "12",
		"LAYOUT" => "slider",
		"MARGIN_POSTS" => "10",
		"POST_TEMPLATE" => "classic",
		"ROWS" => "1",
		"TITLE" => "Мы в Instagram",
		"TOKEN" => "IGQVJWLUExLXpHbEd5LTloeGdSaHdOZAjVfenF6alFXLTNKUU9JWmdJRDFFZAmloYlhSRDJTeWxVd29XejJ4X0hUZAlFaM3daU3NBZATdJem5xOEFvX2dEQ1VfV2lvZA1I4LURGQWttVlVHVWY4V3Ita0JhcQZDZD",
		"WIDTH" => "auto"
	),
	false
);?>
		</div>
	</div>*/?>

<?if($USER->IsAdmin())
{?>
	
	<div class="index-video">
		<div class="cont">
			<div class="index-video__cont">
				<div class="index-video__item">
					<div class="index-video__video">
						<div class="thumb-wrap">
						
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/index_video.php"
							)
						);?>
						</div>
					</div>
					<div class="index-video__text">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/index_video_text.php"
							)
						);?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>