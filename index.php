<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Фабрика межкомнатных дверей PROVANCE – полностью Российское производство премиальных дверей из натуральных материалов и по современным технологиям. Хорошее соотношение цены и качества!");
$APPLICATION->SetPageProperty("keywords", "Межкомнатные двери фабрика производитель производство дверей заказать купить каталог");
$APPLICATION->SetPageProperty("title", "Межкомнатные двери от производителя");
$APPLICATION->SetTitle("Производство межкомнатных дверей от компании PROVANCE");

global $MAIN_BANNERS;

global $MAIN_FILTER_SECTIONS;
global $MAIN_FILTER_MATERIALS;
global $MAIN_FILTER_COLORS;
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_banners",
	Array(
		"AJAX_MODE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "main_banners",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
        "PROPERTY_CODE" => array('MOBILE'),
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "6",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",

	)
);?>

<?php if($mob){ ?>
<div class="sect-list-wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>
                    Двери, которые приятно открывать</h2>

				<?
					global $sectionsFilter;
					$sectionsFilter['UF_DOP'] = 'да';
				?>

				<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main_new",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"CUSTOM_SECTION_SORT" => ["SORT"=>'asc','ID'=>'desc'],
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTION_NAME" => "Y",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("",""),
		"SECTION_ID" => "",
		"SECTION_URL" => "/catalog/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array("UF_META_DESCRIPTION",""),
		"SHOW_PARENT_NAME" => "N",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"]
	),
false
);?>
			</div>
		</div>
	</div>
</div>
<?php } ?>


<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: none">
	<defs>
		<symbol viewBox="0 0 40 29" id="ic-folder">
			<path d="M2.34958 29H37.6509C38.6784 29 39.5591 28.1386 39.5591 27.1337V9.76241C39.5591 8.03964 38.3114 6.53221 36.6968 6.10152C36.2564 6.02974 35.5225 5.95795 35.5225 5.95795H14.7527L13.0647 1.79459L12.3308 0.0718143H2.34958C1.3221 3.2112e-05 0.441406 0.861418 0.441406 1.86637V27.1337C0.441406 28.1386 1.3221 29 2.34958 29ZM0.881755 24.8367H39.1187V26.2005H0.881755V24.8367Z"/>
		</symbol>

		<symbol viewBox="0 0 32 32" id="ic-sale">
			<path d="M31.0257 0.37296C30.8109 0.149184 30.4529 0 30.1665 0L16.5633 0.149184C16.2769 0.149184 15.9189 0.298368 15.7041 0.522144L1.02693 15.8881C0.812138 16.1119 0.668945 16.4103 0.668945 16.7832C0.668945 17.1562 0.812138 17.4545 1.02693 17.6783L14.4154 31.627C14.6302 31.8508 14.9882 32 15.2746 32C15.6325 32 15.9189 31.8508 16.1337 31.627L30.8109 16.3357C31.0257 16.1119 31.1689 15.8135 31.1689 15.4406L31.3121 1.34266C31.3837 0.969697 31.2405 0.596737 31.0257 0.37296ZM16.8497 30.2844L2.31566 15.1422L3.10321 14.3217L17.6372 29.4639L16.8497 30.2844ZM17.9952 29.0909L3.46119 13.9487L3.81917 13.5758L18.3532 28.7179L17.9952 29.0909ZM27.3027 6.93706C26.5867 7.68298 25.4412 7.68298 24.7252 6.93706C24.0093 6.19114 24.0093 4.99767 24.7252 4.25175C25.4412 3.50583 26.5867 3.50583 27.3027 4.25175C28.0187 4.99767 28.0187 6.19114 27.3027 6.93706Z"/>
		</symbol>

		<symbol viewBox="0 0 32 36" id="ic-chat">
			<path d="M8.85528 16.8682C5.91118 16.8682 3.46973 19.3509 3.46973 22.3448C3.46973 25.3388 5.91118 27.8215 8.85528 27.8215C11.8712 27.8215 14.2408 25.3388 14.2408 22.3448C14.2408 19.3509 11.8712 16.8682 8.85528 16.8682Z"/>
			<path d="M17.041 33.5173C17.041 30.6695 14.7432 28.3328 11.9427 28.3328H5.76727C2.96678 28.3328 0.668945 30.6695 0.668945 33.5173V36.0001H17.041V33.5173Z"/>
			<path d="M9.50078 30.6693L10.0752 29.501H7.63379L8.28006 30.6693H8.20825L7.63379 34.8316H10.147L9.50078 30.6693Z" fill="#7F949F"/>
			<path d="M22.642 0H2.67955C1.53063 0 0.668945 0.803246 0.668945 1.75254V11.3185C0.668945 12.3408 1.53063 13.144 2.67955 13.144H10.722L10.4348 16.1379L13.3789 13.144H22.642C23.7191 13.144 24.6526 12.3408 24.6526 11.3915V1.75254C24.6526 0.803246 23.7191 0 22.642 0ZM12.8044 9.4929H4.25932V8.47059H12.8762V9.4929H12.8044ZM21.0622 5.91481V6.93712H4.25932V5.91481H21.0622ZM21.0622 4.38134H4.25932V3.43205H21.0622V4.38134Z"/>
			<path d="M24.3654 20.6653C22.2112 20.8114 20.4878 22.5639 20.3442 24.7546C20.2005 27.3104 22.2112 29.428 24.6526 29.428C24.7244 29.428 24.7962 29.428 24.868 29.428H30.0382C30.11 29.428 30.11 29.355 30.0382 29.355C29.3919 29.0629 28.9611 28.3327 28.9611 27.5294V25.1927V25.1197C28.9611 22.5639 26.8786 20.5193 24.3654 20.6653Z"/>
			<path d="M31.1872 34.0285C31.1872 31.7648 29.392 29.8662 27.0941 29.8662H22.0676C19.8416 29.8662 17.9746 31.6918 17.9746 34.0285V36.0001H31.1154V34.0285H31.1872Z"/>
		</symbol>

		<symbol viewBox="0 0 29 32" id="ic-call">
			<path d="M7.99318 21.6125C14.5717 29.5268 22.8853 33.7667 26.7891 31.3641H26.8614C27.006 31.2934 27.0783 31.2228 27.2228 31.1521C27.2951 31.0815 27.3674 31.0108 27.4397 30.9401C27.512 30.8695 27.6566 30.7988 27.7289 30.7281C27.8012 30.6575 27.8735 30.5868 27.9458 30.5161C30.1868 27.0536 23.0299 21.1885 21.5118 22.3898L21.0057 22.7431L20.7166 22.9551L20.3551 23.2378C19.7768 23.6618 19.1261 23.7324 18.7647 23.3084L17.9695 22.3191C17.3188 20.9765 15.9453 18.9273 14.0657 16.7367C12.2584 14.5461 10.4511 12.7795 9.22214 11.8609L8.42693 10.8716C8.13776 10.5183 8.28235 9.81165 8.86068 9.38766L8.93298 9.317L9.14985 9.10501L9.5836 8.75169L10.0174 8.39837L10.0896 8.32771C11.2463 6.06646 6.54734 -0.575935 4.01712 0.0600392L3.58337 0.342694L3.43879 0.484022L2.93274 0.908005H2.86045L2.64357 1.12L2.4267 1.26132L2.06524 1.61464C-1.11561 4.86518 1.41461 13.6275 7.99318 21.6125Z"/>
		</symbol>
	</defs>
</svg>

<section class="action-block">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<!-- <a href="/upload/content/catalog_new.pdf" class="action-item"> -->
				<a href="https://wa.me/79671098956?text=Здравствуйте! Пришлите, пожалуйста, полный каталог дверей." target="_blank" class="action-item">
					<div class="action-item__content">
						<div class="action-item__icon">
							<svg width="40" height="29">
								<use href="#ic-folder" fill="#fff"  />
							</svg>
						</div>
						<div class="action-item__text">Скачать каталог</div>
					</div>
				</a>
			</div>

			<div class="col-md-6 col-lg-3">
			<!-- <a href="#" class="action-item" data-popup-selector="promokod"> -->
				<a href="https://wa.me/79671098956?text=Здравствуйте! Пришлите, пожалуйста, промокод на скидку 2%" target="_blank" class="action-item">
					<div class="action-item__content">
						<div class="action-item__icon">
							<svg width="32" height="32">
								<use href="#ic-sale" fill="#fff"  />
							</svg>
						</div>
						<div class="action-item__text">Получить промокод</div>
					</div>
				</a>
			</div>

			<div class="col-md-6 col-lg-3">
				<a href="#" class="action-item" data-popup-form-selector="8">
					<div class="action-item__content">
						<div class="action-item__icon">
							<svg width="32" height="36">
								<use href="#ic-chat" fill="#fff"  />
							</svg>
						</div>
						<div class="action-item__text">Записаться в салон</div>
					</div>
				</a>
			</div>

			<div class="col-md-6 col-lg-3">
				<a href="#" class="action-item" data-popup-form-selector="9">
					<div class="action-item__content">
						<div class="action-item__icon">
							<svg width="29" height="32">
								<use href="#ic-call" fill="#fff"  />
							</svg>
						</div>
						<div class="action-item__text">Вызвать замерщика</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>


	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"series",
		Array(
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BACKGROUND_IMAGE" => "",
			"BASKET_URL" => $arParams["BASKET_URL"],
			"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_TYPE" => "A",
			"COMPARE_NAME" => $arParams["COMPARE_NAME"],
			"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
			"COMPATIBLE_MODE" => "Y",
			"COMPONENT_TEMPLATE" => "shop-index",
			"CONVERT_CURRENCY" => "N",
			"CURRENCY_ID" => $arParams["CURRENCY_ID"],
			"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:22:80\",\"DATA\":{\"logic\":\"Equal\",\"value\":303}}]}",
			"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_COMPARE" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "shows",
			"ELEMENT_SORT_FIELD2" => "sort",
			"ELEMENT_SORT_ORDER" => "desc",
			"ELEMENT_SORT_ORDER2" => "asc",
			"ENLARGE_PRODUCT" => "STRICT",
			"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
			"FILTER_IDS" => array(0=>$elementId,),
			"FILTER_NAME" => "arrFilter",
			"HIDE_NOT_AVAILABLE" => "N",
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",
			"HIDE_SECTION_DESCRIPTION" => "Y",
			"IBLOCK_ID" => "2",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LABEL_PROP" => array(),
			"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
			"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "3",
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
			"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
			"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
			"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
			"MESS_BTN_LAZY_LOAD" => "Показать ещё",
			"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
			"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
			"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
			"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
			"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
			"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
			"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
			"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
			"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "16",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(0=>"BASE",),
			"PRICE_VAT_INCLUDE" => "N",
			"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
			"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
			"PRODUCT_SUBSCRIPTION" => "N",
			"PROPERTY_CODE" => [
                'IMAGE'
            ],
			"PROPERTY_CODE_MOBILE" => array(),
			"RCM_PROD_ID" => $elementId,
			"RCM_TYPE" => "personal",
			"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
			"SECTION_CODE" => "",
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_FROM_SECTION" => "Y",
			"SHOW_MAX_QUANTITY" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"SHOW_SLIDER" => "N",
			"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
			"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
			"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
			"USE_COMPARE_LIST" => "Y",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N"
		),
		false
	);?>

	<?/*$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"shop-index",
		Array(
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BACKGROUND_IMAGE" => "",
			"BASKET_URL" => $arParams["BASKET_URL"],
			"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_TYPE" => "A",
			"COMPARE_NAME" => $arParams["COMPARE_NAME"],
			"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
			"COMPATIBLE_MODE" => "Y",
			"COMPONENT_TEMPLATE" => "shop-index",
			"CONVERT_CURRENCY" => "N",
			"CURRENCY_ID" => $arParams["CURRENCY_ID"],
			"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:22:80\",\"DATA\":{\"logic\":\"Equal\",\"value\":303}}]}",
			"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_COMPARE" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "shows",
			"ELEMENT_SORT_FIELD2" => "sort",
			"ELEMENT_SORT_ORDER" => "desc",
			"ELEMENT_SORT_ORDER2" => "asc",
			"ENLARGE_PRODUCT" => "STRICT",
			"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
			"FILTER_IDS" => array(0=>$elementId,),
			"FILTER_NAME" => "arrFilter",
			"HIDE_NOT_AVAILABLE" => "N",
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",
			"HIDE_SECTION_DESCRIPTION" => "Y",
			"IBLOCK_ID" => "22",
			"IBLOCK_TYPE" => "shop",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LABEL_PROP" => array(),
			"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
			"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "3",
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
			"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
			"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
			"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
			"MESS_BTN_LAZY_LOAD" => "Показать ещё",
			"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
			"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
			"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
			"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
			"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
			"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
			"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
			"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
			"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "16",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(0=>"BASE",),
			"PRICE_VAT_INCLUDE" => "N",
			"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
			"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
			"PRODUCT_SUBSCRIPTION" => "N",
			"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
			"PROPERTY_CODE_MOBILE" => array(),
			"RCM_PROD_ID" => $elementId,
			"RCM_TYPE" => "personal",
			"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
			"SECTION_CODE" => "",
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_FROM_SECTION" => "Y",
			"SHOW_MAX_QUANTITY" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"SHOW_SLIDER" => "N",
			"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
			"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
			"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
			"USE_COMPARE_LIST" => "Y",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N"
		),
		false
	);*/?>


<?php if(!$mob){ ?>
    <div class="sect-list-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Двери, которые приятно открывать</h2>

					<?
					global $sectionsFilter;
					$sectionsFilter['UF_DOP'] = 'да';
					?>


					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list",
						"main_new",
						Array(
							"ADD_SECTIONS_CHAIN" => "N",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "N",
							"CACHE_TIME" => "360000",
							"CACHE_TYPE" => "A",
							"COUNT_ELEMENTS" => "N",
							"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
							"CUSTOM_SECTION_SORT" => ["SORT"=>'asc','ID'=>'desc'],
							"FILTER_NAME" => "sectionsFilter",
							"HIDE_SECTION_NAME" => "Y",
							"IBLOCK_ID" => "2",
							"IBLOCK_TYPE" => "catalog",
							"SECTION_CODE" => "",
							"SECTION_FIELDS" => array("",""),
							"SECTION_ID" => "",
							"SECTION_URL" => "/catalog/#SECTION_CODE#/",
							"SECTION_USER_FIELDS" => array("UF_META_DESCRIPTION",""),
							"SHOW_PARENT_NAME" => "N",
							"TOP_DEPTH" => "1",
							"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"]
						),
						false,
						Array(
							'HIDE_ICONS' => 'Y'
						)
					);?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<section class="advat d-none d-md-block">
	<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Собственное производство</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-building.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text">Двери без наценки и контроль качества продукции</div>
				</div>
			</div>
			
			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Более 50-ти салонов продаж</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-shop.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text">Более 50 фирменных магазинов в&nbsp;Москве</div>
				</div>
			</div>

			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">20 лет<br>на рынке</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-briefcase.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text"> Мы продали более 500&nbsp;000 дверей </div>
				</div>
			</div>

			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Сильная<br>команда</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-people.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text">Опытные  специалисты с многолетним опытом работы</div>
				</div>
			</div>

			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Заботливый клиентский сервис</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-chat.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text">Теплое обслуживание клиента от звонка до монтажа</div>
				</div>
			</div>

			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Свой клуб Архитекторов</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-person.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text">Мы создали тематический клуб архитекторов</div>
				</div>
			</div>

			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Выдержанные сроки производства</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-clock.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text">Мы предвосхищаем ожидания клиентов по срокам</div>
				</div>
			</div>

			<div class="col-3">
				<div class="advat-item">
					<div class="advat-item__main">
						<div class="advat-item__title">Индивидуальный подход</div>
						<div class="advat-item__icon">
							<img src="/upload/main/icon-hurt.svg" alt="">
						</div>
					</div>

					<div class="advat-item__text"> Создаем персональные шедевры интерьеров</div>
				</div>
			</div>
			
		</div>
	</div>
</section>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"utp",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "utp",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "30",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"ICON",2=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>



<style>
	.char img{display:block; max-width:800px; margin:20px auto; }

	@media (max-width:500px){ .char img{ width:100%; max-width:100%;  } }
</style>

<?php /*
<div class="char">
	<div class="container">
		<div class="sorting__head"> Характеристики полотна </div>
		<img  src="upload/door-char2.webp"  alt="Характеристики полотна"/>
	</div>
</div> */ ?>

<?/*?>
<div class="sorting">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="sorting__cont">
					<div class="sorting__head">
						Подобрать двери по параметрам
					</div>
					<div class="sorting__text">
						Фабрика дверей Provance предлагает не только широкую гамму моделей по стилям, но и богатый выбор по материалам отделки<br>
						Пожалуйста, заполните все 3 поля ниже:
					</div>
					<div class="sorting__body">
						<div class="sorting__list">
							<div class="sorting__block">
								<div class="sorting__name">
									Стиль
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
												<label for="section<span id=" title="Код PHP: &lt;?=$key?&gt;" class="bxhtmled-surrogate"><?=$key?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>" class="sorting-select-option-text text-type-1"&gt;<?=$section['NAME']?></label>
											</div>
										<? endforeach; ?>
									</div>
								</div>
							</div>
							<div class="sorting__block">
								<div class="sorting__name">
									Материал
								</div>
								<div class="sorting-select select-block">
									<div class="sorting-select-head select-head">
										<div class="sorting-select-side select-side">
											<div class="sorting-select-head-value text-type-1 select-value">
												Выбрать
											</div>
										</div>
									</div>
									<div class="sorting-select-body select-body">
										<? foreach($MAIN_FILTER_MATERIALS as $key => $material) :?>
											<div class="sorting-select-option select-option">
												<input id="material<?=$key?>" name="material" type="radio" class="sorting-select-option-input js-filter-material js-filter-input" value="<?=$material['ID']?>">
												<label for="material<span id=" title="Код PHP: &lt;?=$key?&gt;" class="bxhtmled-surrogate"><?=$key?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>" class="sorting-select-option-text text-type-1"&gt;<?=$material['NAME']?></label>
											</div>
										<? endforeach; ?>
									</div>
								</div>
							</div>
							<div class="sorting__block">
								<div class="sorting__name">
									Цвет
								</div>
								<div class="sorting-select select-block select-color">
									<div class="sorting-select-head select-head">
										<div class="sorting-select-side select-side">
											<div class="sorting-select-head-value sorting-select-head-value-img text-type-1 select-value">
												<div class="sort-img">

												</div>
												Выбрать
											</div>
										</div>
									</div>
									<div class="sorting-select-body select-body">
										<?

										foreach($MAIN_FILTER_COLORS as $key => $color) :
										?>
											<div class="sorting-select-option sorting-select-option-img select-option js-filter-color-parent" data-material="<span id=" title="Код PHP: &lt;?=$color['IBLOCK_SECTION_ID']?&gt;"><?=$color['IBLOCK_SECTION_ID']?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>"&gt;
												<input id="colors<?=$key?>" name="color" type="radio" class="sorting-select-option-input js-filter-input js-filter-color" value="<?=$color['ID']?>">
												<label for="colors<span id=" title="Код PHP: &lt;?=$key?&gt;" class="bxhtmled-surrogate"><?=$key?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>" class="sorting-select-option-text text-type-1"&gt;
													<span class="sort-img">
														<img alt="img<?=$key?>" src="<?=CFile::GetPath($color['DETAIL_PICTURE'])?>" class="sort-img__item">
													</span>
													<?=$color['NAME']?>
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
	</div>
</div>
<?*/?>


<?
	global $sectionsFilterDop;
	$sectionsFilterDop['!UF_DOP'] = 'да';
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main_dop",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"CUSTOM_SECTION_SORT" => ["SORT"=>'asc','ID'=>'desc'],
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
		"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"]
	),
false,
Array(
	'HIDE_ICONS' => 'Y'
)
);?>


<? if (isset($MAIN_BANNERS[1])) :?>
<!--<img src="<?/*=CFile::GetPath($MAIN_BANNERS[1]['DETAIL_PICTURE'])*/?>">-->
	<div class="banner-type-1" data-src="<?=CFile::GetPath($MAIN_BANNERS[1]['DETAIL_PICTURE'])?>">
		<div class="banner__bg" style="background: url(<?=CFile::GetPath($MAIN_BANNERS[1]['DETAIL_PICTURE'])?>) no-repeat;background-position: bottom">
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


<div class="video">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Видео с производства</h2>
			
				<div class="video__content">
<iframe width="480" height="270" src="https://dzen.ru/embed/vcgk-rX-GuVo?from_block=partner&from=zen&mute=0&autoplay=0&tv=0" allow="autoplay; fullscreen; accelerometer; gyroscope; picture-in-picture; encrypted-media" data-testid="embed-iframe" frameborder="0" scrolling="no" allowfullscreen></iframe>
					<!--iframe width="100%" height="100%" src="https://www.youtube.com/embed/ifMT8cdt4PM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->
				</div>
			</div>
		</div>
	</div>
</div>  

<? if (isset($MAIN_BANNERS[2])) :?>
	<div class="banner-type-1">
<img src="<?=CFile::GetPath($MAIN_BANNERS[2]['DETAIL_PICTURE'])?>">
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

<?php /*
<div class="container">
<!-- Установите этот код в нужное место на сайте -- контейнер. Желательно, чтобы контейнер был адаптирующимся под размеры экрана, тогда и виджет будет показываться оптимально на разных устройствах.  -->
<div class="repometr-widget-container" style="height: 100%; width: 100%; position: relative; overflow: hidden;">
    <link rel="stylesheet" type="text/css" href="https://repometr.com/static/styles/reviews-widget-frame.css">

    <!--  Если контейнер меньше минимальных размеров виджета, будет показываться лого.  -->
    <div class="repometr-widget-logo"></div>

    <iframe id="repometr_widget_1683" frameborder="0" src="https://repometr.com/widgets/1683/" width="100%" style="display: block; width: 100% !important; min-height: 350px; visibility: hidden;"></iframe>

    <!-- Скрипт, отвечающий за передачу размеров контейнера в виджет. Виджет подстраивается под размеры контейнера. -->
    <script>
        const repometrReviewsWidgetId = '1683';
    </script>

    
    <script type="text/javascript" src="https://repometr.com/jsi18n/"></script>

    <script src="https://repometr.com/static/scripts/reviews-widget-frame.js"></script>
</div>

</div>

*/ ?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news_slick",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "news_slick",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"BLOCKS",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT`",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
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
<div class="repometr-widget-container" style="height: 100%; width: 100%; position: relative; overflow: hidden;">
	<link rel="stylesheet" type="text/css" href="https://repometr.com/static/styles/reviews-widget-frame.css">
	<div class="repometr-widget-logo"></div>

	<iframe id="repometr_widget_1683" src="https://repometr.com/widgets/1683/" style="display: block; width: 100% !important; min-height: 350px; visibility: hidden;"></iframe>
	<script>
		const repometrReviewsWidgetId = '1683';
	</script>
	<script src="https://repometr.com/jsi18n/"></script>
	<script src="https://en.repometr.com/jsi18n/"></script>
	<script src="https://alfatest.repometr.com/jsi18n/"></script>
	<!-- <script src="/jsi18n/"></script> -->
	<script src="https://repometr.com/static/scripts/reviews-widget-frame.js"></script>
</div>*/?>

<?/*
<div class="video">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Видеоотзывы</h2>
			
				<div class="video__content">
					
<iframe width="100%" height="100%" src="https://dzen.ru/embed/vcgk-rX-GuVo?from_block=partner&from=zen&mute=0&autoplay=0&tv=0" allow="autoplay; fullscreen; accelerometer; gyroscope; picture-in-picture; encrypted-media" data-testid="embed-iframe" frameborder="0" scrolling="no" allowfullscreen></iframe>


				</div>
			</div>
		</div>
	</div>
</div>*/?>

<div class="review-stars">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="review-stars__top">
					<h2>Звезды с нами</h2>
					<div class="btn-arr-wrap js-r-stars-slider-arr"></div>
				</div>

				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"review-stars",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "29",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("RATING",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
			</div>
		</div>
	</div>

</div> 

<div class="seo_text container">
		<div class="row">
			<div class="col-12">

				<h1><?$APPLICATION->ShowTitle(false);?></h1>
				
				
				<p>Межкомнатные двери имеют особую значимость в устройстве интерьера жилого помещения. Они обеспечивают конфиденциальность ваших комнат, но еще влияют на общую стилистику, красоту и атмосферу.</p> 
				
				<h2>Какие межкомнатные двери можно купить</h2>
				
				
				<p>Выбор межкомнатных дверей это обычно ключевой момент при создании уютной и функциональной обстановки. Существуют необходимые аспекты выбора межкомнатных дверей, которые помогут вам сделать правильное решение. 
				
				В нашем интернет-магазине межкомнатных дверей можно купить двери по доступным ценам от производителя.</p>
				
				<h3>Из чего состоят межкомнатные двери</h3>
				
				<p>Возможно самым важным аспектом при покупке межкомнатной двери будет выбор материалов из которых производится дверь.
				
				Вот некоторые из наиболее популярных вариантов:
				
				</p><h3>Двери из дерева</h3>
				
				Древесина придает теплостойкость и натуральный стиль интерьеру. Межкомнатные двери в наличии в различных породах и оттенках, это позволяет подобрать товар под любой стиль.
				
				<h3>Двери в эмали</h3>
				
				Эмаль - это вид покрытия, которое придает поверхности блеск и защиту. Эмаль используется для покрытия металлических, деревянных или других материалов. 
				
				В контексте межкомнатных дверей это означает, что дверь имеет гладкую матовую или глянцевую поверхность, защищенную лаком.
				
				Двери в эмали используются в разных типах помещений - в жилых и коммерческих. Это покрытие может быть выбрано не только из-за соображений эстетических, но и как защита от воздействия различных факторов, таких как влага, коррозия или повреждения.
				
				
				
				
				
				
				<h3>Выбор стиля и дизайна дверей</h3>
				
				<p>При выборе дизайна необходимо соответствие общего стиля и дизайна всего помещения. 
				
				Рассмотрим важные аспекты при выборе стиля:
				
				
				</p><h4>Современные по стилю двери</h4>
				
				Простые линии, минималистичный дизайн и использование современных материалов.
				
				
				<h4>Классические по стилю двери</h4>
				
				 Резьба, декоративные элементы и традиционные отделочные материалы.
				
				
				<h4>Эко-стиль</h4>
				
				Двери из натуральных составляющих, такие как древесные материалы.
				
				
				<h4>Стиль Модерн</h4> 
				
				Гладкая поверхность, элементы из стекла и металла и минимум декора.
				
				
				<h4>Неоклассика</h4>
				
				Межкомнатные двери в стиле неоклассика обычно характеризуются элегантным и утонченным дизайном, вдохновленным архитектурными элементами и искусством периода неоклассицизма, который пришел в моду в конце 18-го и начале 19-го веков.
				
				<h3>Размер и конфигурация</h3>
				
				Учтите размеры и конфигурацию помещения, в котором будет установлена дверь. Межкомнатные двери могут быть одностворчатыми, двустворчатыми, раздвижными и даже складными. Важно, чтобы дверь сочеталась с архитектурными особенностями вашего дома и обеспечивала удобство использования.
				
				<h3>Фурнитура</h3>
				
				<p>Выбор фурнитуры тоже значимый аспект. Фурнитура может быть выполнена в интересных стилях. Уделяйте внимание фурнитуре, так как это влияет на прочность и устойчивость двери.

				
				Процесс подбора межкомнатных дверей - это важное составляющее, которое влияет на облик и уют вашего помещения. 
				
				Когда выбираете межкомнатные двери - учитывайте состав материала, качество, образ и стиль, а также фурнитуру.
				
				При необходимости дополнительной консультации, не стесняйтесь обращаться к экспертам нашего интернет-магазина - Provance, мы посоветуем сделать оптимальный выбор при подборе межкомнатных дверей.</p>
		</div>
	</div>

</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>