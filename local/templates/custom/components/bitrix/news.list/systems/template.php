<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="systems">
    <div class="cont">
        <div class="systems__head">
            Доступные системы в данной комплектации
        </div>
        <div class="systems__body">
            <? foreach($arResult['ITEMS'] as $item) :?>
                <div class="systems__item-help">
                    <div class="systems__item">
                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="systems__img">
                            <img class="systems__item_img" data-src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                        </a>
                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="systems__title">
                            <?=$item['NAME']?>
                        </a>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>