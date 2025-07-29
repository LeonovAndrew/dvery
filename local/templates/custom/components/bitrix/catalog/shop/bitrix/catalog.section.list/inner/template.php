<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true);

if (empty($arResult['SECTIONS'])) return;
?>
<?
$arr_exclude_filter_page = array('/mezhkomnatnye-dveri/so-steklom/', '/mezhkomnatnye-dveri/chernye/', '/mezhkomnatnye-dveri/serye/', '/mezhkomnatnye-dveri/svetlye/');
?>
<!-- tttt5555cc -->
<div class="catalog__block">
	<div class="catalog__body">
		<? foreach ($arResult['SECTIONS'] as $arSection) :?>
			<?if(!in_array($arSection['SECTION_PAGE_URL'], $arr_exclude_filter_page)):?>
		    <div class="catalog__item-help">
		        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="catalog__item">
		            <?if(is_array($arSection['PICTURE']['SRC'])){?><div class="catalog__img" data-src="<?=$arSection['PICTURE']['SRC']?>"></div><?}?>
		            <div class="catalog__title">
		                <?=$arSection['NAME']?>
		            </div>
		            <div class="catalog__text">
		                <?=$arSection['PREVIEW_TEXT']?>
		            </div>
		        </a>
		    </div>
			<?endif;?>
		<? endforeach; ?>
	</div>
</div>