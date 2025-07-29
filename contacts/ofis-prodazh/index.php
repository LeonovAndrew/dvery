<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// $APPLICATION->SetPageProperty("FOOTER-FORM", "signup");
$APPLICATION->SetTitle("Флагманский салон");
?><style>
	.footer-form{padding-top:0;}
	.news{display:none;}
	.contacts-list__block{padding:0; background:none; }
	.map iframe{width:100%; }
	.contacts-list__block{min-height:inherit; margin-bottom:20px;}
	.sheme img{ width:100%; }
	.how-go{display:block; justify-content:space-between; }
	.how-go>div{ width:100%; }
	/* .footer-form__cont{display:none;} */
	h2{ margin-bottom:20px;}
	.page__head-cont-bottom,.contacts-list__block{ margin-bottom:40px;}
	.tour iframe{width:100%; height:400px; }
	.map, .sheme{ margin-bottom:40px; }
	@media (max-width:600px){
		.how-go>div{ width:100%; }
	}
</style>
<div class="contacts-list__block">
	<div class="contacts-list__block-text">
		 Москва, Рублёвское шоссе, 14к1 (м. Кунцевская)<br>
	</div>
	<div class="contacts-list__block-time">
		 Время работы: с 9 до 19 (пн-пт)<br>
		 с 10 до 18 (сб) <br>
		 выходной (вс)<br>
	</div>
 <a href="tel:+74992836062" class="contacts-list__block-call"> +7 (499) 283 60-62&nbsp;</a>
	<!-- <a href="#" class="contacts-list__block-link">
                        Виртуальный тур салона
                    </a> -->
</div>
<div class="how-go">
	<div class="map">
		<h2>На карте</h2>
		 <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aabb0f0e5294f7e12ef2e3addcd03bddb9ddf6e716ee1620abb5a09c3f99a427c&amp;source=constructor" width="1191" height="400" frameborder="0"></iframe>
	</div>
	<div class="sheme">
		<h2>Схема проезда</h2>
 <img src="/contacts/sheme/Рублевское шоссе схема.png">
	</div>
</div>
<div class="tour">
	<h2>3D-тур по салону</h2>
	 <iframe src="https://foto-g.org/3d/doors/7rubleb/7rubleb.html"></iframe>
</div>
<div class="tour" style="margin-top:40px;">
	<h2>Акции салона</h2>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"sale",
	Array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "news",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"",1=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "arrows",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(0=>"",1=>"BLOCKS",2=>"TAGS",3=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PANEL" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "27",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(0=>"DATE_CREATE",1=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"BLOCKS",1=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "6",
		"NUM_DAYS" => "180",
		"NUM_NEWS" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/sales/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"","section"=>"","detail"=>"#ELEMENT_CODE#/",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SLIDER_PROPERTY" => "PICS_NEWS",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"TEMPLATE_THEME" => "site",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"YANDEX" => "N"
	)
);?> <?php $APPLICATION->SetTitle("Флагманский салон"); ?>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>