<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->RestartBuffer();

CModule::IncludeModule('iblock');

$section = intval($_POST['section']);
$material = intval($_POST['material']);
$color = intval($_POST['color']);

if ($section > 0 && $material > 0 && $color > 0) {
	$filter = CIBlockElement::SubQuery('PROPERTY_CML2_LINK', [
		'IBLOCK_ID' => IBLOCK_CATALOG_OFFERS_ID,
		'PROPERTY_MATERIAL' => $color,
		'ACTIVE' => 'Y'
	]);

	$cnt = \CIBlockElement::GetList(
		[], 
		[
			'IBLOCK_ID' => IBLOCK_CATALOG_ID, 
			'ACTIVE' => 'Y',
			'IBLOCK_SECTION_ID' => $section,
			'ID' => $filter
		], 
		[], 
		false, 
		['ID']
	);

	$url = '#';

	if ($cnt > 0) {
		$sectionInfo = CIBlockSection::GetByID($section)->fetch();
		$url = '/catalog/' . $sectionInfo['CODE'] . '/?material=' . $color;
	}

	echo json_encode(['count' => $cnt, 'url' => $url]);
} else {
	echo json_encode(['count' => 0, 'url' => '#']);
}