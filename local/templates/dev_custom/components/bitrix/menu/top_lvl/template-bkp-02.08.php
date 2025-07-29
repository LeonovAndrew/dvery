<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul class="top-menu">
		<?
		$previousLevel = 0;
		foreach($arResult as $arItem):?>
			<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
				<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
			<?endif?>

			<?if ($arItem["IS_PARENT"]):?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="top-menu__item<?if($arItem['SELECTED']){?> active<?}?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
						<ul class="top-menu__sub">
				<?else:?>
					<li class="top-menu__sub-item<?if($arItem['SELECTED']){?> active<?}?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
						<ul class="top-menu__sub">
				<?endif?>

			<?else:?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="top-menu__item<?if($arItem['SELECTED']){?> active<?}?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li class="top-menu__sub-item<?if($arItem['SELECTED']){?> active<?}?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>

			<?endif?>

			<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

		<?endforeach?>

		<?if ($previousLevel > 1)://close last item tags?>
			<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
		<?endif?>

	</ul>
<?endif?>