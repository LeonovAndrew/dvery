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

?>
<div class="catalog__item-help">
	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="catalog__item">
		<div class="catalog__img" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>);background-size: contain;background-repeat: no-repeat;"></div>
		<div class="catalog__title">
			<?=$item['NAME']?></div>
		<div class="catalog__text">
		<?=$item['PREVIEW_TEXT']?></div>
	</a>
</div>