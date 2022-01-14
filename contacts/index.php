<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");

global $CONTACTS;
?>
<div class="contact-amo-form">
    <script>!function(a,m,o,c,r,m){a[o+c]=a[o+c]||{setMeta:function(p){this.params=(this.params||[]).concat([p])}},a[o+r]=a[o+r]||function(f){a[o+r].f=(a[o+r].f||[]).concat([f])},a[o+r]({id:"836197",hash:"c3ae14ff913acf206270997a9cc7234b",locale:"ru"})}(window,0,"amo_forms_","params","load");</script>
    <script id="amoforms_script_836197" async="async" charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js?1635324879"></script>
</div>


<div class="contacts-block">
    <div class="contacts-block__side">
        <div class="contacts-block__block">
            <div class="contacts-block__block-head">
                Контактный телефон
            </div>
            <a href="tel:<?=str_replace(array('-','(',')'), '', $CONTACTS['PROPERTIES']['PHONE']['VALUE'])?>" class="contacts-block__call">
                <?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?>
            </a>
        </div>
        <div class="contacts-block__block">
            <div class="contacts-block__block-head">

            </div>
            <a href="mailto:<?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?>" class="contacts-block__email">
                <?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?>
            </a>
        </div>
        <div class="contacts-block__block">
            <div class="contacts-block__block-head">

            </div>
            <?$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"contacts_socv", 
				array(
					"COMPONENT_TEMPLATE" => "contacts_socv",
					"IBLOCK_TYPE" => "content",
					"IBLOCK_ID" => "4",
					"NEWS_COUNT" => "4",
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
				),
				false
			);?>
        </div>
    </div>
    <div class="contacts-block__main">
        <div class="contacts-block__main-title">
            Юридические реквизиты
        </div>
        <div class="contacts-block__text">
            <?=$CONTACTS['DETAIL_TEXT']?>
        </div>
        <a href="tel:<?=$CONTACTS['PROPERTIES']['SERVICE_PHONE']['VALUE']?>" class="contacts-block__call">
            <?=$CONTACTS['PROPERTIES']['SERVICE_PHONE']['VALUE']?>
        </a>
        <div class="contacts-block__links">
            <a href="/about/service/" class="contacts-block__links-item">
                О службе сервиса
            </a>
        </div>
    </div>
</div>

<div class="contacts-list">
	<?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "salons",
        Array(
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "IBLOCK_ID" => 10,
            "IBLOCK_TYPE" => "content",
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array("", ""),
            "TOP_DEPTH" => "1",
            "SET_TITLE" => "N",
			"SET_BROWSER_TITLE" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_META_DESCRIPTION" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
        )
    );?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>