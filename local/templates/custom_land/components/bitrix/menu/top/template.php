<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if (empty($arResult)) return; ?>

<div class="header__list">
	<? foreach ($arResult as $arItem): ?>
		<a href="<?=$arItem["LINK"]?>" class="header__list-item text-type-1"><?=$arItem["TEXT"]?></a>
	<? endforeach; ?>
</div>