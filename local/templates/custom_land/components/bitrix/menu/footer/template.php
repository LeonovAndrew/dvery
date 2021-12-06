<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult)) return; ?>

<? foreach ($arResult as $arItem): ?>
	<div class="footer__block">
	    <a href="<?=$arItem['LINK']?>" class="footer__block-head">
	        <?=$arItem["TEXT"]?>
	    </a>
	    <? if (!empty($arItem['ADDITIONAL_LINKS'])) :?>
		    <div class="footer__block-body">
		    	<? foreach ($arItem['ADDITIONAL_LINKS'] as $child): ?>
		    		<? if ($child["CODE"] == '/') continue; ?>
		        	<a href="<?=$arItem['LINK']?><?=$child["CODE"]?>/" class="footer__block-item"><?=$child['NAME']?></a>
		        <? endforeach; ?>
		    </div>
	    <? endif; ?>
	</div>
<? endforeach; ?>