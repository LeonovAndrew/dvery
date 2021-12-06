<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

define('APP_CLASS_FOLDER', '/local/php_interface/lib/');


define('IBLOCK_CONTACS_ID', '5');
define('IBLOCK_MAIN_BANNERS_ID', '19');
define('IBLOCK_CATALOG_ID', '2');
define('IBLOCK_CATALOG_OFFERS_ID', '3');
define('IBLOCK_MATERIAL_ID', '15');

global $APPLICATION;

CModule::IncludeModule('iblock');

$rsContact = \CIBlockElement::GetList(
	[], 
	[
		'IBLOCK_ID' => IBLOCK_CONTACS_ID, 
		'ACTIVE' => 'Y'
	], 
	false, 
	false, 
	[]
);

if ($contact = $rsContact->GetNextElement()) {
	global $CONTACTS;

	$fields = $contact->getFields();
	$fields['PROPERTIES'] = $contact->getProperties();

	$CONTACTS = $fields;

	unset($fields);
}

if ($APPLICATION->GetCurDir() == '/') {
	$rsBanners = \CIBlockElement::GetList(
		[
			'SORT' => 'asc',
			'ID' => 'desc'
		], 
		[
			'IBLOCK_ID' => IBLOCK_MAIN_BANNERS_ID, 
			'ACTIVE' => 'Y'
		], 
		false, 
		false, 
		[]
	);

	global $MAIN_BANNERS;

	while ($banner = $rsBanners->GetNextElement()) {
		$fields = $banner->getFields();
		$MAIN_BANNERS[] = $fields;
		unset($fields);
	}

	$rsSections = \CIBlockSection::GetList(
		[
			'SORT' => 'asc',
			'ID' => 'desc'
		], 
		[
			'IBLOCK_ID' => IBLOCK_CATALOG_ID, 
			'ACTIVE' => 'Y',
			'UF_DOP' => 'да'
		], 
		false
	);

	global $MAIN_FILTER_SECTIONS;

	while ($section = $rsSections->GetNextElement()) {
		$fields = $section->getFields();
		$MAIN_FILTER_SECTIONS[] = $fields;
		unset($fields);
	}

	$rsMaterials = \CIBlockSection::GetList(
		[
			'SORT' => 'asc',
			'ID' => 'desc'
		], 
		[
			'IBLOCK_ID' => IBLOCK_MATERIAL_ID, 
			'ACTIVE' => 'Y'
		], 
		false
	);

	global $MAIN_FILTER_MATERIALS;

	while ($material = $rsMaterials->GetNextElement()) {
		$fields = $material->getFields();
		$MAIN_FILTER_MATERIALS[] = $fields;
		unset($fields);
	}

	$rsColors = \CIBlockElement::GetList(
		[
			'SORT' => 'asc',
			'ID' => 'desc'
		], 
		[
			'IBLOCK_ID' => IBLOCK_MATERIAL_ID, 
			'ACTIVE' => 'Y'
		], 
		false, 
		false, 
		[]
	);

	global $MAIN_FILTER_COLORS;

	while ($color = $rsColors->GetNextElement()) {
		
		$fields = $color->getFields();
		$MAIN_FILTER_COLORS[] = $fields;
		unset($fields);
	}
}