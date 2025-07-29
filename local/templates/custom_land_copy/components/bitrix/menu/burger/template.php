<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if (empty($arResult)) return; ?>

<div class="menu__list">
	<? foreach ($arResult as $arItem): ?>
		<a href="<?=$arItem["LINK"]?>" class="menu__list-item"><?=$arItem["TEXT"]?></a>
	<? endforeach; ?>
</div>

<div class="menu__stripe"></div>