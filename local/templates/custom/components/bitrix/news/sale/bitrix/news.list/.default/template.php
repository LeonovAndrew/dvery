<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) return;
?>

<? if (isset($arResult['TAGS']) && !empty($arResult['TAGS'])) :?>
    <div class="news-links">
        <div class="cont">
            <div class="news-links__cont">
                <? foreach($arResult['TAGS'] as $id => $tag) :?>
                    <a href="<?=in_array($id, $arParams['TAGS']) ? '/news/' : '?tags='.$id?>" class="js-news-filter news-links__item <?=in_array($id, $arParams['TAGS']) ? 'news-links__item-active' : ''?>">
                        # <?=$tag?>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    </div>
<? endif; ?>

<div class="news">
    <div class="cont">
        <div class="news__cont">
        	<? foreach($arResult['ITEMS'] as $arItem) :?>
	            <div class="news__item-help">
	                <div class="news__item">
	                    <div class="sale__img" data-src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"></div>
	                    <?if(!empty($arItem['DETAIL_TEXT']))
	                    {?>
	                    	<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__title">
	                        	<?=$arItem['NAME']?>
	                    	</a>
	                    <?}else{?>
	                    	<span class="news__title"><?=$arItem['NAME']?></span>
	                    <?}?>
	                    <div class="news__text">
	                        <?=$arItem['PREVIEW_TEXT']?>
	                    </div>
	                    <div class="news__bottom">
	                        <div class="news__date">
	                            <?//=FormatDate('d F Y г.', strtotime($arItem['DATE_CREATE']))?>
	                        </div>
	                        <?if(!empty($arItem['DETAIL_TEXT']))
	                    	{?>
		                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__link">
		                            <div class="news__link-text">
		                                Читать далее
		                            </div>
		                            <div class="news__link-img">
		                                <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                    <path d="M15.1338 5.00015L11.0594 0.925781M15.1338 5.00015L11.0594 9.07451M15.1338 5.00015H0.000432611" stroke="white" stroke-width="1.3432"/>
		                                </svg>
		                            </div>
		                        </a>
							<?}?>
	                    </div>
	                </div>
	            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

<?=$arResult["NAV_STRING"]?>