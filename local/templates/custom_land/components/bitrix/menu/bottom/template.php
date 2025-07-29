<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if (empty($arResult)) return; ?>

<div class="footer__list">
	<? foreach ($arResult as $arItem): ?>
		<div class="footer__list-item">
			<a href="<?=$arItem["LINK"]?>" class="footer__list-link"><?=$arItem["TEXT"]?></a>
		</div>
	<? endforeach; ?>
</div>