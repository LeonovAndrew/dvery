<?php
define('BX_PULL_SKIP_INIT', true);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Нестандартные двери");

?>
<?$APPLICATION->IncludeComponent(
	'bitrix:landing.pub',
	'',
	array(
		"SITE_ID" => 's1',
		"LID" => 38,
		'HTTP_HOST' => $_SERVER['HTTP_HOST'],
		"PATH" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"SITE_TYPE" => "STORE",
		"NOT_CHECK_DOMAIN" => "Y",
		"SHOW_EDIT_PANEL" => "N",
		"DRAFT_MODE" => "N",
		"PAGE_URL_SITES" => "",
		"PAGE_URL_SITE_SHOW" => "",
		"PAGE_URL_LANDING_VIEW" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	null,
	array(
		'HIDE_ICONS' => 'N'
	)
);?>
<?

CJSCore::Init(array("jquery"));

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/metrika.js");


require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
