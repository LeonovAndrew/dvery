<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) return;
?>

<style>
a.footer-form__btn.act-do {
    width: 100%;
    padding: 15px 0;
    text-align: center;
    font-style: normal;
}
	</style>

<? if (isset($arResult['TAGS']) && !empty($arResult['TAGS'])) :?>
    <div class="sale-links">
        <div class="cont">
            <div class="sale-links__cont">
                <? foreach($arResult['TAGS'] as $id => $tag) :?>
                    <a href="<?=in_array($id, $arParams['TAGS']) ? '/sales/' : '?tags='.$id?>" class="js-news-filter sale-links__item <?=in_array($id, $arParams['TAGS']) ? 'sale-links__item-active' : ''?>">
                        # <?=$tag?>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    </div>
<? endif; ?>

<div class="sale"> 
    <div class="cont">
        <div class="sale__cont">
        	<? foreach($arResult['ITEMS'] as $arItem) :?>
	            <div class="sale__item-help">
	                <div class="sale__item">
	                    <div class="sale__img" style="background-image:url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
	                    <?if(!empty($arItem['DETAIL_TEXT']))
	                    {?>
	                    	<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="sale__title">
	                        	<?=$arItem['NAME']?>  
	                    	</a>
	                    <?}else{?>
	                    	<span class="sale__title"><?=$arItem['NAME']?> </span>
	                    <?}?>

<?php 
$text = mb_substr(strip_tags($arItem['PREVIEW_TEXT']), 0, 100);
$text = mb_substr($text, 0, mb_strrpos($text,' '));

?>
						<div  class="sale__text_crop" style="line-height:24px;"> <?=$text?>  
                            
                            <a style="font-weight:bold;" onClick="$(this).parents('.sale__item').find('.sale__text').show(); $(this).parents('.sale__text_crop').hide();">Читать далее...</a>
                            
                            
                        
                        </div>

						<div  class="sale__text" style="display:none;">
	                        <?=$arItem['PREVIEW_TEXT']?> 
                            
                            <a class="hide-act" style="font-weight:bold;" onClick="$(this).parents('.sale__item').find('.sale__text').hide(); $(this).parent().parent().find('.sale__text_crop').show();">Скрыть</a>
	                    </div>
	                    <div class="sale__bottom">
	                        <div class="sale__date">
	                            <?//=FormatDate('d F Y г.', strtotime($arItem['DATE_CREATE']))?>
	                        </div>
	                        <?if(!empty($arItem['DETAIL_TEXT']))
	                    	{?>
		                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="sale__link">
		                            <div class="sale__link-text">
		                                Читать далее
		                            </div>
		                            <div class="sale__link-img">
		                                <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                    <path d="M15.1338 5.00015L11.0594 0.925781M15.1338 5.00015L11.0594 9.07451M15.1338 5.00015H0.000432611" stroke="white" stroke-width="1.3432"/>
		                                </svg>
		                            </div>
		                        </a>
							<?}?>

							<a onClick="ym(64922065, 'reachGoal', 'sale-btn'); return true;" data-fancybox="" data-src="#foot-form" class="footer-form__btn act-do">Участвовать</a>
	                    </div>
	                </div>
	            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<?=$arResult["NAV_STRING"]?>