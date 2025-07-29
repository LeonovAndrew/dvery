<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Партнеры");
?>
<style>

	.partner-logo .wrap{ text-align:center;}
	.partner-logo .elem{
		height:100px;
		display:inline-block;
		margin:20px;
		vertical-align:top;
	}

	.partner-logo .elem img{
		height:100%;
	}

	@media (max-width:700px){
		.partner-logo .elem{
    width: 100%;
    margin: 20px 0;
    height: auto;
		}

	.partner-logo .elem img{
    width: 50%;
    height: auto;
	}

	}
</style>

<div class="partner-logo">
	<p><b>Приглашаем к сотрудничеству.</b>
Компания "Прованс" максимально выгодные  условия для успешного сотрудничества. Мы заинтересованы в развитии Дилерской сети и открыты для обсуждения взаимовыгодных условия, как для наших постоянных клиентов, так и для компаний, которые только рассматривают нас, как своего основного поставщика.
<br><br>
	<b>Основными приоритетами в нашей работе были и остаются:</b>
<br>
безупречное качество выпускаемой продукции<br>
индивидуальный подход к каждому клиенту нашей компании<br>
высококвалифицированный персонал.<br><br>
	Мы настроены на эффективную и долгосрочную работу с Вами, основанную на понимании общих интересов и специфики Вашей деятельности.</p>

<div class="wrap">
	<div class="elem">
		<img src="https://www.kronakoblenz.com/static/images/kk.svg" />
	</div> <!-- elem -->

	<div class="elem">
		<img src="https://zamki-ruchki.ru/wa-data/public/shop/img/AGB_logo.jpg" />
	</div> <!-- elem -->

	<div class="elem">
		<img src="https://morelli.ru/storage/images/logo.svg" />
	</div> <!-- elem -->

	<div class="elem">
		<img src="https://archie-centre.ru/thumb/2/61i2Rb40Vy8YxgHWsOTVWQ/180r/d/bez_ramki_archi_na_gl.png" />
	</div> <!-- elem -->

	<div class="elem">
		<img src="https://kovcheg-market.ru/upload/iblock/753/r0vihhp1fpb81sunftyz9qfm9kxxp7cy.jpg" />
	</div> <!-- elem -->

	<div class="elem">
		<img src="https://st.storeland.ru/11/2768/906/eclisse-logo.jpg" />
	</div> <!-- elem -->
	</div>
</div>


<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "one_column", Array(
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"EDIT_URL" => "result_edit.php",	// Страница редактирования результата
		"IGNORE_CUSTOM_TEMPLATE" => "Y",	// Игнорировать свой шаблон
		"LIST_URL" => "result_list.php",	// Страница со списком результатов
		"SEF_FOLDER" => "/partnery/",	// Каталог ЧПУ (относительно корня сайта)
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
		"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
		"WEB_FORM_ID" => "10",	// ID веб-формы
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

<script>
); 
$( document ).ready(function() {
   $('.coop-form__head').html('Партнерам'
});
</script>