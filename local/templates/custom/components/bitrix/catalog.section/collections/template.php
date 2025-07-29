<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true);

//if (empty($arResult['ITEMS'])) return;
?>

<div class="catalog__block">
    <div class="catalog__head">
        <a class="catalog__block__title" href="<?=$arParams['SECTION_PAGE_URL']?>"><?=$arParams['SECTION_NAME']?></a>
    </div>
	<div class="catalog__body">
		<? foreach ($arResult['ITEMS'] as $item) :?>
		    <div class="catalog__item-help">
		        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="catalog__item">
		            <?/*<div class="catalog__img" data-src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></div>*/?>
		            <div class="catalog__img" style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)"></div>
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