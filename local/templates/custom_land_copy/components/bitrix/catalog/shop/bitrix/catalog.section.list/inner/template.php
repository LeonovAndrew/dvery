<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true);

if (empty($arResult['SECTIONS'])) return;
?>
<div class="catalog__block">
	<div class="catalog__body">
		<? foreach ($arResult['SECTIONS'] as $arSection) :?>
		    <div class="catalog__item-help">
		        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="catalog__item">
		            <?if(is_array($arSection['PICTURE']['SRC'])){?><div class="catalog__img" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);"></div><?}?>
		            <div class="catalog__title">
		                <?=$arSection['NAME']?>
		            </div>
		            <div class="catalog__text">
		                <?=$arSection['PREVIEW_TEXT']?>
		            </div>
		        </a>
		    </div>
		<? endforeach; ?>
	</div>
</div>