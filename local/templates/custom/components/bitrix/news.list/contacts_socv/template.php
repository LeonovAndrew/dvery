<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="contacts-block__list">
	<? foreach($arResult['ITEMS'] as $item) :?>
	    <a href="<?=$item['CODE']?>" class="social-item" title="<?=$item['NAME']?>">
	    	<?=$item['DETAIL_TEXT']?>
	    </a>
    <? endforeach; ?>
</div>