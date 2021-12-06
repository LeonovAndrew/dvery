<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if($arResult["NavPageCount"] > 1) :?>

<div class="pagination">

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
    	<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="prev">
			<svg>
				<use xlink:href="#arrow_pag"></use>
			</svg>
		</a>
    <? endif; ?> 

    <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
        <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
        	<a class="active"><?=$arResult["nStartPage"]?></a>
        <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
            <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
        <?else:?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
        <?endif?>
        <?$arResult["nStartPage"]++?>
    <?endwhile?>

    <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) :?>
    	<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="next">
			<svg>
				<use xlink:href="#arrow_pag"></use>
			</svg>
		</a>
    <? endif; ?>
</div>
<? endif; ?>

<div id="svg_icons">
	<svg style="display:none;">
		<symbol id="arrow_pag" viewBox="0 0 13 8">
		    <path d="M12.0175 4.00139L8.78193 0.765869M12.0175 4.00139L8.78193 7.23692M12.0175 4.00139H-0.000210047" stroke-width="1.06666"/>
		</symbol>
	</svg>
</div>