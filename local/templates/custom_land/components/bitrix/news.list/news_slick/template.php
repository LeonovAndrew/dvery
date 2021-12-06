<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="news">
    <div class="cont">
    	<div class="block1__head">Новости фабрики</div>
        <div class="news__cont news__slide">
        	<? foreach($arResult['ITEMS'] as $arItem) :?>
	            <div class="news__item-help">
	                <div class="news__item">
	                    <div class="news__img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
	                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__title">
	                        <?=$arItem['NAME']?>
	                    </a>
	                    <div class="news__text">
	                        <?=$arItem['PREVIEW_TEXT']?>
	                    </div>
	                    <div class="news__bottom">
	                        <div class="news__date">
	                            <?=FormatDate('d F Y г.', strtotime($arItem['DATE_CREATE']))?>
	                        </div>
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
	                    </div>
	                </div>
	            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>