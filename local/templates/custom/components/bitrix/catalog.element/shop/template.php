<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$price = $arResult['ITEM_PRICES'][$arResult['ITEM_PRICE_SELECTED']];

$arPhotos = array();
$arPhotos[] = $arResult['DETAIL_PICTURE'];
foreach ($arResult['PROPERTIES']['MORE_PHOTOS']['VALUE'] as $photoId) {
	$arPhotos[] = CFile::GetFileArray($photoId);
}
?>

<section class="product_info" itemscope itemtype="https://schema.org/Offer">
	<div class="cont">
		<div class="images">
			<div class="thumbs">
				<? foreach ($arPhotos as $key => $arPhoto) {
				?>
					<div class="item">
						<div class="img active" data-slide-index="<?= $key ?>">
							<img src="<?= $arPhoto['SRC'] ?>" alt="<?= $arPhoto['DESCRIPTION'] ?>" itemprop="image">
						</div>
					</div>
				<? } ?>
			</div>

			<div class="slider_img">
				<? foreach ($arPhotos as $arPhoto) { ?>
					<div class="slide">
						<a href="<?= $arPhoto['SRC'] ?>" rel="images" class="img fancy_img">
							<img src="<?= $arPhoto['SRC'] ?>" alt="<?= $arPhoto['DESCRIPTION'] ?>" itemprop="image">
						</a>
					</div>
				<? } ?>
			</div>
		</div>


		<div class="data_info" itemscope itemtype="https://schema.org/Offer">
			<div class="stikers">
				<? if ($arResult['PROPERTIES']['NEW']['VALUE']) { ?>
					<div class="stiker">
						<span>Новинка</span>
					</div>
				<? } ?>
			</div>
			<? if ($arResult['PROPERTIES']['AVAILABLE']['VALUE']) : ?>
				<div class="order-block">
					<div>
						<h2 class="name_product" itemprop="price">от <?= $price['PRINT_RATIO_PRICE'] ?> <?php if ($arResult["CATEGORY_PATH"] == 'Скрытые двери') { ?> <span class="stock">В наличии</span> <?php } else { ?> <span class="stock">Под заказ</span>
							<?php } ?></h2>

					</div>

					<!-- <div class="card__order" data-action="addBasket" data-id="<?= $arResult['ID'] ?>" data-title-in-basket="В корзине">Заказать</div> -->
					<div class="card__order" data-popup-selector="order">Получить расчет</div>
					<!-- <div class="card__order by_one_cl" data-popup-selector="by_one_cl">Купить в 1 клик</div> -->

					<div class="by_one_cl" data-popup-selector="by_one_cl">

<a href="https://wa.me/79671098956?text=Здравствуйте! Пришлите, пожалуйста, полный каталог дверей<?//= CFile::GetPath($arResult['PROPERTIES']['CATALOG']['VALUE']) ?>" target="_blank" class="card__download">
                            Получить каталог на WhatsApp<i class="fa fa-whatsapp" style="font-size:24px;margin-left:4px;position: relative;top: 4px;"></i>
                        </a>
</div>

					<? //$product_id_11 = CIBlockFindTools::GetElementID(false, $arResult['CODE'], false, false, false);
					?>
					<?/*<div class="card__order" >Заказать</div>
				<script> 
				(function($) {
					$(document).ready(function() {
						console.log('idddd '+<?echo $product_id_11?>);
						$('.card__order').click(function()
						{
							var ajax = $.ajax({
							type: 'POST',
							url: location.pathname + '?action=ADD2BASKET&id='+<?echo $product_id_11?>,
							data: {
								ajax_basket: 'Y',
								quantity: '1'
							}
						});
						
						ajax.done(function(data) {
							if (data.STATUS == 'OK') {
								console.log('product added to bascet 1111');
							}
						});
				
						});
				
					});

				})(jQuery);
				</script>*/ ?>
				</div>
			<? else : ?>
				<div class="order-block">
					<div>
						<h2 class="name_product" itemprop="availability">Нет в наличие</h2>
					</div>
				</div>
			<? endif ?>
			<div class="product-share">
				<div class="ya-share2" data-curtain data-services="messenger,vkontakte,odnoklassniki,telegram,whatsapp"></div>
			</div>
			<div class="code">Артикул: <?= $arResult['PROPERTIES']['ARTICLE']['VALUE'] ?></div>

			<? if (!empty($arResult['DETAIL_TEXT'])) { ?>
				<div class="info">
					<div class="title" itemprop="name">Общие описание</div>

					<div class="desc" itemprop="description"><?= $arResult['DETAIL_TEXT'] ?></div>
				</div>
			<? } ?>

			<div class="accordion">
				<div class="item">
					<div class="open_btn" itemprop="category">Состав и уход</div>

					<div class="data text_block">
						<? if (!empty($arResult['PROPERTIES']['COMPOS']['VALUE']['TEXT'])) { ?>
							<?= htmlspecialcharBack($arResult['PROPERTIES']['COMPOS']['VALUE']['TEXT']); ?>
						<? } else {
							$APPLICATION->IncludeFile('/include/detail_compos.php');
						} ?>
					</div>
				</div>

				<div class="item">
					<div class="open_btn" itemprop="category">Доставка и оплата</div>

					<div class="data text_block">

						<? if (!empty($arResult['PROPERTIES']['DELIVERY']['VALUE']['TEXT'])) { ?>
							<?= htmlspecialcharBack($arResult['PROPERTIES']['DELIVERY']['VALUE']['TEXT']); ?>
						<? } else {
							$APPLICATION->IncludeFile('/include/detail_delivery.php');
						} ?>

					</div>
				</div>

				<div class="item">
					<div class="open_btn" itemprop="category">Гарантия и возврат</div>

					<div class="data text_block">

						<? if (!empty($arResult['PROPERTIES']['GUARANTEE']['VALUE']['TEXT'])) { ?>
							<?= htmlspecialcharBack($arResult['PROPERTIES']['GUARANTEE']['VALUE']['TEXT']); ?>
						<? } else {
							$APPLICATION->IncludeFile('/include/detail_guarantee.php');
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>