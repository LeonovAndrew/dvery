<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="r-stars-slider js-r-stars-slider">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="review-stars-item">
			<div class="review-stars-item__main">
				<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?>
					<div class="review-stars-item__img" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div>
				<?}?>

				<?//Вычисляем рейтинг по чмислу
					if($arItem['PROPERTIES']['RATING']['VALUE']){
						$rating = $arItem['PROPERTIES']['RATING']['VALUE'] *20;
					}else{
						$rating = 0;
					}
				?>

				<div class="review-stars-item__info">
					<div class="rating">
						<div class="rating__content" style="width: <?=$rating?>%;"></div>
					</div>

					<div class="review-stars-item__name"><?=$arItem["NAME"]?></div>

					<?if($arItem["DISPLAY_ACTIVE_FROM"]){?>
						<div class="review-stars-item__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
					<?}?>
				</div>
			</div>

			<div class="review-stars-item__content">
				<?if($arItem["PREVIEW_TEXT"]){?>
					<div class="review-stars-item__text"><?=$arItem["PREVIEW_TEXT"]?></div>
				<?}?>

				<!-- <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="review-stars-item__more"><?=GetMessage('T_MORE')?></a> -->
			</div>
		</div>
	<?endforeach;?>
</div>
