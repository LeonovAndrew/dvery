<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дизайнерам");
?><div>
	 Наше предложение удовлетворяет всем основным интерьерным стилям от классики до модерна. Мы работаем с современными материалами, и по современным технологиям
</div>
 <br>
 Среди нашего ассортимента вы подберете лучшее решение для своего проекта.<br>
 <br>
 Мы ценим ваше время и комфорт, поэтому предлагаем вам:
<p>
</p>
<ul style="width: 1110px;">
	<li>Полный пакет актуальных информационных материалов (каталоги, <a href="https://disk.yandex.ru/d/UgfHqk0vJUDeTw">3D модели</a>, образцы цвета и покрытий);</li>
	<li>Возможность изготовления продукции по индивидуальному заказу;</li>
	<li>Удобное расположение фирменных салонов, где вы можете встретиться с заказчиком в комфортной обстановке;</li>
	<li>Экспертная помощь и обучение по продукту;</li>
	<li>Конкурсы, презентации и специальные предложения.</li>
</ul>
<br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"one_column",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "one_column",
		"EDIT_URL" => "result_edit.php",
		"IGNORE_CUSTOM_TEMPLATE" => "Y",
		"LIST_URL" => "result_list.php",
		"SEF_FOLDER" => "/for-designers/",
		"SEF_MODE" => "Y",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "6"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>