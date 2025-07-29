"<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

if (empty($arResult['ITEMS']))
    return;

?>
<div class="card__slides_title" style="margin-top:40px;">
   <h2> Двери салона</h2>
</div>
<div class="card__slide__items">
<? foreach ($arResult['ITEMS'] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="card__side js-card-side" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <? if ($arItem['PROPERTIES']['TOP_TEXT']['VALUE']) :?>
            <div class="card__main-text card__main-text-mobile">
                <?=html_entity_decode($arItem['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']);?>
            </div>
        <? endif; ?>
        <div class="card__main-text card__main-text-mobile catalog-price-test" style="font-size:14px">
            Двери можно приобрести в готовом дизайне или <a href="#foot-form">заказать свой рисунок</a>.
        </div>

        <?/*<div class="card__result-pic">
					<div class="card__show js-material-image-left" data-result-id="<?=$arItem['CURRENT_OFFER']['ID']?>" style="background-image: url(<?=empty($arItem['OFFERS']) ? $arItem['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arItem['CURRENT_OFFER']['DETAIL_PICTURE']['SRC']?>)"></div>
					<div class="card__show js-design-image" data-result-id="<?=$arItem['CURRENT_DESIGN']['ID']?>" style="background-image: url(<?=$arItem['CURRENT_DESIGN']['PICTURE']?>)"></div>
				</div>*/?>


        <div class="card__result-pic">
            <div class="card__result-pic-int">
                <img class="js-loupe2" src="<?=empty($arItem['OFFERS']) ? $arItem['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arItem['CURRENT_OFFER']['DETAIL_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" data-result-id="<?=$arItem['CURRENT_OFFER']['ID']?>" data-large="<?=empty($arItem['OFFERS']) ? $arItem['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arItem['CURRENT_OFFER']['DETAIL_PICTURE']['SRC']?>">
            </div>

            <div class="card__result-pic-ext">
                <img class="js-loupe" src="<?=$arItem['CURRENT_DESIGN']['PICTURE']?>" alt="<?=$arItem['NAME']?>	" data-result-id="<?=$arItem['CURRENT_DESIGN']['ID']?>" data-large="<?=$arItem['CURRENT_DESIGN']['PICTURE']?>">
            </div>
        </div>



        <div class="card__info">
            <div class="card__title">
                <?=$arItem['NAME']?>
            </div>
            <?/*
            <?if (!empty($arItem['OFFERS'])) :?>
                <div class="card__text">
                    Модель: <?=$arItem['CURRENT_OFFER']['DETAIL_TEXT']?>
                </div>
            <? endif;?>
            <div class="card__price">
                от <span><?=number_format(current($arItem['CURRENT_OFFER']['ITEM_PRICES'])['PRICE'], 0, '', ' ')?></span> ₽
            </div>
            */?>

            <?if ($arItem['OFFER_MIN_PRICE']):?>
                <div class="card__price">
                    от <span><?=number_format($arItem['OFFER_MIN_PRICE'], 0, '', ' ')?></span> ₽
                </div>
            <?endif?>

            <div class="card__title">
                <a href="/services/guarantee/">Гарантия до 7 лет</a>
                <p>Рассрочка от 3 до 36 месяцев</p>
            </div>

            <div class="card__order" data-popup-selector="order">
                Заказать
            </div>
            <? if ($arItem['PROPERTIES']['CATALOG']['VALUE']) :?>
                <a href="<?=CFile::GetPath($arItem['PROPERTIES']['CATALOG']['VALUE'])?>" target="_blank" class="card__download">
                    Скачать каталог
                </a>
            <? endif; ?>
        </div>
    </div>
<? endforeach ?>
</div>
