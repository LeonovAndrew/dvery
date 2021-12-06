<?
$arAvailableSort['DEFAULT'] = array('умолчанию', 'SORT', 'ASC');
$arAvailableSort['NAME'] = array('названию', 'NAME', 'ASC');
$arAvailableSort['PRICE'] = array('цене', 'CATALOG_PRICE_1', 'ASC');

$defaultKey = 'DEFAULT';

if(isset($_REQUEST['sort'])) $_SESSION['SORT'] = strip_tags($_REQUEST['sort']);
else if(!isset($_SESSION['SORT'])) $_SESSION['SORT'] = $defaultKey;

if(isset($_REQUEST['order'])) $_SESSION['SORT_BY'] = strip_tags($_REQUEST['order']);
else if(!isset($_SESSION['SORT_BY'])) $_SESSION['SORT_BY'] = $arAvailableSort[$defaultKey][2];

if(!isset($arAvailableSort[$_SESSION['SORT']])) $_SESSION['SORT'] = $defaultKey;

$sortBy = isset($_SESSION['SORT_BY']) ? $_SESSION['SORT_BY'] : $arAvailableSort[$_SESSION['SORT']][2];
$_SESSION['SORT_BY'] = $sortBy;

$newSortBy = $sortBy == 'ASC' ? 'DESC' : 'ASC';
?>


<div class="sort">
	<div class="name">Сортировка:</div>

	<div class="select_text">
		<select class="sort_select">
			<?foreach ($arAvailableSort as $key => $arSort)
			{?>
				<option <?=($_SESSION['SORT'] == $key ? 'selected' : '')?> data-sort="<?=$key?>" data-order="<?=$arSort[2]?>"><?=$arSort[0]?></option>
			<?}?>
		</select>
	</div>
</div>