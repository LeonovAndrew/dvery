<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) return;
?>

<div class="certificate same">
    <div class="cont">
        <div class="certificate__cont">
            <div class="certificate__head">
                Похожие коллекции
            </div>
            <div class="same__body-help">
                <div class="same__next">
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.6426 4.9198L10.8942 1.17139M14.6426 4.9198L10.8942 8.66822M14.6426 4.9198H0.71989" stroke="white" stroke-width="1.3432"/>
                    </svg>
                </div>
                <div class="same__prev">
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.35742 4.9198L5.10584 1.17139M1.35742 4.9198L5.10584 8.66822M1.35742 4.9198H15.2801" stroke="black" stroke-width="1.3432"/>
                    </svg>
                </div>
                <div class="same__body">
                    <? foreach ($arResult['ITEMS'] as $item) :?>
					    <div class="catalog__item-help">
					        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="catalog__item">
					            <div class="catalog__img" data-src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></div>
					            <div class="catalog__title">
					                <?=$item['NAME']?>
					            </div>
					            <div class="catalog__text">
					                <?=$item['PREVIEW_TEXT']?>
					            </div>
					        </a>
					    </div>
					<? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>