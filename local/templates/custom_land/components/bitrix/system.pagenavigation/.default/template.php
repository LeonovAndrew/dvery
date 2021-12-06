<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if($arResult["NavPageCount"] > 1) :?>
    <div class="news-pagination">
        <div class="cont">
            <div class="news-pagination__cont">
                <?if(!$arResult["NavShowAlways"])
                {
                    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
                        return;
                }

                $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
                $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
                $arResult["nStartPage"] = 1;
                ?> 

                <? if ($arResult["NavPageNomer"] > 1) :?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="news-pagination__img">
                        <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: scaleX(-1);">
                            <path d="M15.1338 5.00015L11.0594 0.925781M15.1338 5.00015L11.0594 9.07451M15.1338 5.00015H0.000432611" stroke="white" stroke-width="1.3432"/>
                        </svg>
                    </a>
                <? endif; ?> 

                <?while($arResult["nStartPage"] <= $arResult["NavPageCount"]):?>
                    <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                        <span class="news-pagination__item news-pagination__item-active">
                            <span><?=$arResult["nStartPage"]?></span>
                        </span>
                    <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
                        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="news-pagination__item"><?=$arResult["nStartPage"]?></a>
                    <?else:?>
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" class="news-pagination__item"><?=$arResult["nStartPage"]?></a>
                    <?endif?>
                    <?$arResult["nStartPage"]++?>
                <?endwhile?>

                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) :?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="news-pagination__img">
                        <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1338 5.00015L11.0594 0.925781M15.1338 5.00015L11.0594 9.07451M15.1338 5.00015H0.000432611" stroke="white" stroke-width="1.3432"/>
                        </svg>
                    </a>
                <? endif; ?>
            </div>
        </div>
    </div>
<? endif; ?>