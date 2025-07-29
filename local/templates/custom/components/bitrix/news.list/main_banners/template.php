<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="main-slider">
	<? foreach($arResult['ITEMS'] as $item) :?>
	    <div class="main-slider__item" <?/*data-item="<?=$item['DETAIL_PICTURE']['SRC']?>"*/?>  style="background-image:url(<?=$item['DETAIL_PICTURE']['SRC']?>)">
			<?/*<div class="main-slider__item-preloader-wrapper">
				<div class="main-slider__item-preloader"></div>
			</div>
			*/?>
	        <div class="main-slider__item-bg">
	            <div class="cont">
	                <div class="main-slider__cont">
	                    <div class="main-slider__title">
	                        <?=$item['NAME']?>
	                    </div>
	                    <div class="main-slider__text">
	                        <?=$item['DETAIL_TEXT']?>
	                    </div>
	                    <a href="<?=$item['CODE']?>" class="main-slider__link">
	                        Подробнее
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
    <? endforeach; ?>
</div>