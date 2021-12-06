<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="adventages__body">
	<? foreach($arResult['ITEMS'] as $item) :?>
        <div class="adventages__list-item">
            <div class="adventages__item">
                <div class="adventages__img" style="background-image: url(<?=$item['DETAIL_PICTURE']['SRC']?>);">
                    <div class="adventages__bg">

                    </div>
                </div>
                <div class="adventages__text">
                    <?=$item['NAME']?>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>
