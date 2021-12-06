<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$ID = isset($_REQUEST['ID']) ? intval($_REQUEST['ID']) : 0;
$arResult = array();
if($ID > 0)
{
	$arFavorite = json_decode($_COOKIE['favorites'], true);
	$arResult['CNT'] = count($arFavorite);
	$arFavorite[$ID] = $ID;
	$stat = setcookie('favorites', json_encode($arFavorite), time()+60*60*24*30, '/');
	if($stat)
	{
		$arResult['CNT'] = count($arFavorite);
		$arResult['STATUS'] = true;
	}
}
else 
{
	$arResult['STATUS'] = false;
}
echo json_encode($arResult);
?>