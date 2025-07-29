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

if (!empty($arResult['CURRENCIES']))
{
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
foreach ($arResult['PROPERTIES']['MORE_PHOTOS']['VALUE'] as $photoId)
{
	$arPhotos[] = CFile::GetFileArray($photoId);
}
?>
<section class="product_info">
	<div class="cont">
		<div class="images">
            <div class="thumbs">
            	<?foreach ($arPhotos as $key => $arPhoto)
            	{
            		?>
	                <div class="item">
	                    <div class="img active" data-slide-index="<?=$key?>">
							<img src="<?=$arPhoto['SRC']?>" alt="">
						</div>
	                </div>
				<?}?>
            </div>

			<div class="slider_img">
				<?foreach ($arPhotos as $arPhoto)
            	{?>
	                <div class="slide">
						<a href="<?=$arPhoto['SRC']?>" rel="images" class="img fancy_img">
							<img src="<?=$arPhoto['SRC']?>" alt="">
						</a>
					</div>
				<?}?>
            </div>
        </div>

		<div class="data_info">
			<div class="stikers">
				<?if($arResult['PROPERTIES']['NEW']['VALUE'])
				{?>
					<div class="stiker">
						<span>Новинка</span>
					</div>
				<?}?>
			</div>
			<div class="order-block">
				<div><h1 class="name_product">от <?=$price['PRINT_RATIO_PRICE']?></h1></div>
				<div class="card__order" data-popup-selector="order">Заказать</div>
			</div>

			<div class="code">Артикул: <?=$arResult['PROPERTIES']['ARTICLE']['VALUE']?></div>
			<?if(!empty($arResult['DETAIL_TEXT']))
			{?>
				<div class="info">
					<div class="title">Общие описание</div>
	
					<div class="desc"><?=$arResult['DETAIL_TEXT']?></div>
				</div>
			<?}?>

			<div class="accordion">
				<div class="item">
					<div class="open_btn">Состав и уход</div>

					<div class="data text_block">
						<?if(!empty($arResult['PROPERTIES']['COMPOS']['VALUE']['TEXT']))
						{?>
							<?=htmlspecialcharBack($arResult['PROPERTIES']['COMPOS']['VALUE']['TEXT']);?>
						<?}else{
							$APPLICATION->IncludeFile('/include/detail_compos.php');
						}?>
					</div>
				</div>

				<div class="item">
					<div class="open_btn">Доставка и оплата</div>

					<div class="data text_block">
						
						<?if(!empty($arResult['PROPERTIES']['DELIVERY']['VALUE']['TEXT']))
						{?>
							<?=htmlspecialcharBack($arResult['PROPERTIES']['DELIVERY']['VALUE']['TEXT']);?>
						<?}else{
							$APPLICATION->IncludeFile('/include/detail_delivery.php');
						}?>
					
					</div>
				</div>

				<div class="item">
					<div class="open_btn">Гарантия и возврат</div>

					<div class="data text_block">
					
						<?if(!empty($arResult['PROPERTIES']['GUARANTEE']['VALUE']['TEXT']))
						{?>
							<?=htmlspecialcharBack($arResult['PROPERTIES']['GUARANTEE']['VALUE']['TEXT']);?>
						<?}else{
							$APPLICATION->IncludeFile('/include/detail_guarantee.php');
						}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


