<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталоги и информация");
define('DEALER_IBLOCK_ID', 25);
CModule::IncludeModule('iblock');



$arFilter = array('IBLOCK_ID' => DEALER_IBLOCK_ID, 'ACTIVE' => 'Y');

$arSubFilter = array();
if($USER->IsAdmin())
{
	$arSubFilter = array('LOGIC' => 'OR');
	$arGroups = CUser::GetUserGroup(CUser::GetID());
	foreach ($arGroups as $gID)
	{
		$arSubFilter[] = array('UF_USER' => $gID);
	}
}
$arFilter[ 'DEPTH_LEVEL'] = 1;
$rsCategory = CIBlockSection::GetList(array('SORT' => 'ASC'), array_merge($arFilter, $arSubFilter), false, array('*', 'UF_*'));
while ($arCategory = $rsCategory -> GetNext())
{
	debug($arCategory);
}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>