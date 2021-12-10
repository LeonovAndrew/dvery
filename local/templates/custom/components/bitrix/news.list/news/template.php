<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="read">
    <div class="cont">
        <div class="read__cont">
            <div class="read__head">
                Читайте также:
            </div>
            <div class="news__cont">
            	<? foreach($arResult['ITEMS'] as $item) :
            		$date = empty($item['ACTIVE_FROM']) ? $item['DATE_CREATE'] : $item['ACTIVE_FROM'];?>
	                <div class="news__item-help">
	                    <div class="news__item">
	                        <div class="news__img" data-src="<?=$item['PREVIEW_PICTURE']['SRC']?>">

	                        </div>
	                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news__title">
	                            <?=$item['NAME']?>
	                        </a>
	                        <div class="news__text">
	                            <?=$item['PREVIEW_TEXT']?>
	                        </div>
	                        <div class="news__bottom">
	                            <div class="news__date">
	                                <?=FormatDate('d F Y г.', strtotime($date))?>
	                            </div>
	                            <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news__link">
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
</div>