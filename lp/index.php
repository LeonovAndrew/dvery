<?php
define('BX_PULL_SKIP_INIT', true);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Нестандартные двери");
$APPLICATION->IncludeComponent(
	'bitrix:landing.pub',
	'',
	array(
		'HTTP_HOST' => $_SERVER['HTTP_HOST']
	),
	null,
	array(
		'HIDE_ICONS' => 'Y'
	)
);
CJSCore::Init(array("jquery"));

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/metrika.js");
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
