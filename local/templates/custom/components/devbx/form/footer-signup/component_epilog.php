<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arEpilogInfo */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var string $epilogFile */
/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponent $this */
/** @var CBitrixComponent $component */
/** @var string $componentPath */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var mixed $templateData */

\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/fancybox.css');
\Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/fancybox.js');