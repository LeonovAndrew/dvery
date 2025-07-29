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
<div class="product">



	<div class="stikers">
		<?if($item['PROPERTIES']['NEW']['VALUE'] == 'Да')
		{?>
			<div class="stiker">
				<span>Новинка</span>
			</div>
		<?}?>
	</div>
	
	<div class="thumb">
		<a href="<?=$item['DETAIL_PAGE_URL']?>" class="img">
			<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
		</a>
	</div>
	
	<div class="name">
		<a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$productTitle;?></a>
	</div>
	
	<div class="desc"><?=$item['PREVIEW_TEXT']?></div>
	
	<div class="price oldprice" <?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
		<?=$price['PRINT_RATIO_BASE_PRICE']?>
	</div>
	<div class="price">от <?=$price['PRINT_RATIO_PRICE'];?></div>
</div>