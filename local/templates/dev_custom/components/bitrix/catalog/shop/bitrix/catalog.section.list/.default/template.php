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


<div class="catalog__block">
    
<?
			$intCurrentDepth = 1;
			$boolFirst = true;
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
?>


				<?if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL'])
				{
					if (0 < $intCurrentDepth)
						echo "\n",str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']),'<div class="catalog__body">';
				}
				else
				{
					while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL'])
					{
						echo "\n",str_repeat("\t", $intCurrentDepth),'</div>',"\n",str_repeat("\t", $intCurrentDepth-1);
						$intCurrentDepth--;
					}
					echo str_repeat("\t", $intCurrentDepth-1),'</li>';
				}

				echo (!$boolFirst ? "\n" : ''),str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']);
				?>
				<?if($arSection['DEPTH_LEVEL'] == 1)
				{?>
					<div class="catalog__head">
				        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="catalog__top_title"><?=$arSection['NAME']?></a>
				    </div>
				<?}else {?>
					<div class="catalog__item-help">
				        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="catalog__item">
				            <div class="catalog__img" data-src="<?=$arSection['PICTURE']['SRC']?>"></div>
				            <div class="catalog__title">
				                <?=$arSection['NAME']?>
				            </div>
				            <div class="catalog__text">
				                <?=$arSection['PREVIEW_TEXT']?>
				            </div>
				        </a>
				    </div>
				
				<?}

				$intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
				$boolFirst = false;
			}
			unset($arSection);
			while ($intCurrentDepth > 1)
			{
				echo "\n",str_repeat("\t", $intCurrentDepth),'</div>',"\n",str_repeat("\t", $intCurrentDepth-1);
				$intCurrentDepth--;
			}
			if ($intCurrentDepth > 0)
			{
				echo '</div>',"\n";
			}
	echo ('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
?></div>