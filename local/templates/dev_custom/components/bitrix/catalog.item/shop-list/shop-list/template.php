<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
$img = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], array('height' => 374, 'width' => 500 ), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 70);
$item['PREVIEW_PICTURE']['SRC'] = $img['src'];
?>
<div class="catalog__item-help">
	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="catalog__item">
		<div class="catalog__img__slider" style="background-size: contain;background-repeat: no-repeat;background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>')"></div>
		<?/*<div class="catalog__img__slider" data-src="<?=$item['PREVIEW_PICTURE']['SRC']?>" style="background-size: contain;background-repeat: no-repeat;"></div>*/?>
		<div class="catalog__title ">
			<?=$item['NAME']?></div>
		<div class="catalog__text">
		<?=$item['PREVIEW_TEXT']?></div>
		<div class="catalog__title">от&nbsp;<?echo $item['MIN_PRICE']['PRINT_DISCOUNT_VALUE'];?></div>
	</a>
</div>