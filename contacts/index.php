<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Контакты фабрики Прованс телефон адрес");
$APPLICATION->SetPageProperty("description", "Контактная информация фабрики Прованс - адреса представительств.");
$APPLICATION->SetPageProperty("title", "Контакты фабрики по производству дверей Прованс");
$APPLICATION->SetTitle("Контакты фабрики Прованс");

global $CONTACTS;
?><div class="map">
	 <?=html_entity_decode($CONTACTS['PREVIEW_TEXT'])?>
</div>
<div class="contact-amo-form">
	<h3 style="margin-bottom:20px;">Записаться в салон</h3>
	 <script>!function(a,m,o,c,r,m){a[o+c]=a[o+c]||{setMeta:function(p){this.params=(this.params||[]).concat([p])}},a[o+r]=a[o+r]||function(f){a[o+r].f=(a[o+r].f||[]).concat([f])},a[o+r]({id:"836197",hash:"c3ae14ff913acf206270997a9cc7234b",locale:"ru"})}(window,0,"amo_forms_","params","load");</script> <script id="amoforms_script_836197" async="async" charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js?1635324879"></script>
</div>
 <style>
	.contact span,.contact a{color:#fff;}
	.contact .fa{color:#fff; font-size:24px;}

	.contact.bl span,.contact.bl a{color:#000;}
	.contact.bl .fa{color:#000; font-size:24px;}
.contacts-block__side{ width:425px; }

.contacts-block__main {
    justify-content: start;
}
	</style>
<div class="contacts-block">
	<div class="contacts-block__side">
		<div class="contacts-block__block">
			<div class="contacts-block__block-head">
				 Контактный телефон
			</div>
 <a href="tel:<?=str_replace(array('-','(',')'), '', $CONTACTS['PROPERTIES']['PHONE']['VALUE'])?>" class="contacts-block__call"> <?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?> </a>
		</div>
		<div class="contacts-block__block">
			<div class="contacts-block__block-head">
			</div>
			<div class="contact bl">
				 Производство: <a href="mailto:production@dveri-provance.ru" class="footer__mail">production@dveri-provance.ru</a><br>
				 Консультация или заказ: <a href="https://t.me/provance_dveri"><i class="fa fa-telegram"></i></a> <a href="https://wa.me/79671098956"><i class="fa fa-whatsapp"></i></a>
				<div style="margin: 10px 0;">
				</div>
			</div>
		</div>
		<div class="contacts-block__block">
			<div class="contacts-block__block-head">
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"contacts_socv",
	Array(
		"AJAX_MODE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "contacts_socv",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "4",
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
		</div>
	</div>
	<div class="contacts-block__main">
		<div class="contacts-block__main-title">
			 Юридические реквизиты
		</div>
		<div class="contacts-block__text">
			<!-- ИП Радыгин Александр Владимирович <br>
			 ИНН 431001270330 <br>
			 ОГРН 318435000051828 <br>
 <br>
			 ИП Гарифуллина Елена Олеговна <br>
			 ИНН 027813079108 <br>
			 ОГРНИП 322028000203174 <br>
 <br>
			 ИП Гарифуллина Екатерина Олеговна <br>
			 ИНН 027813079676 <br>
			 ОГРН 319508100171229 <br> -->
			 <?=$CONTACTS['DETAIL_TEXT']?>
		</div>
		 <!--    <a href="tel:<?=$CONTACTS['PROPERTIES']['SERVICE_PHONE']['VALUE']?>" class="contacts-block__call">
            <?=$CONTACTS['PROPERTIES']['SERVICE_PHONE']['VALUE']?>
        </a>


        <div class="contacts-block__links">
            <a href="/about/service/" class="contacts-block__links-item">
                О службе сервиса
            </a>
        </div> -->
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
		"SECTION_FIELDS" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_TITLE" => "N",
		"TOP_DEPTH" => "1"
	)
);?>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>