<div class="items productList">
    <div class="in_shopping_cart_flex_1_title">
        <h3>Корзина</h3>
    </div>
	<?foreach ($arResult["ITEMS"] as $ix => $arElement):?>
		<?
        $countPos += $arElement["QUANTITY"]?>
		<div class="item product parent" data-product-iblock-id="<?=$arElement["IBLOCK_ID"]?>" data-id="<?=$arElement["ID"]?>" data-cart-id="<?=$arElement["ID"]?>">
			<div class="tabloid">
			 	<div class="topSection">
					<div class="column">
						<?if($arElement["CATALOG_QUANTITY"] > 0):?>

						<?else:?>
							<?if(!empty($arElement["CATALOG_AVAILABLE"]) && $arElement["CATALOG_AVAILABLE"] == "Y"):?>
								<a class="onOrder label changeAvailable"><img src="<?=SITE_TEMPLATE_PATH?>/images/onOrder.png" alt="<?=GetMessage("ON_ORDER")?>" class="icon"><?=GetMessage("ON_ORDER")?></a>
							<?else:?>
								<a class="outOfStock label changeAvailable"><img src="<?=SITE_TEMPLATE_PATH?>/images/outOfStock.png" alt="<?=GetMessage("NOAVAILABLE")?>" class="icon"><?=GetMessage("NOAVAILABLE")?></a>
							<?endif;?>
						<?endif;?>
                    </div>
                    <div class="column">
						<a href="#" class="delete" data-id="<?=$arElement["BASKET_ID"]?>"></a>
                    </div>
			 	</div>
				<div class="productTable">
					<div class="productColImage">
					    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="picture" target="_blank">
					    	<img src="<?=!empty($arElement["PICTURE"]["src"]) ? $arElement["PICTURE"]["src"] : SITE_TEMPLATE_PATH."/images/empty.png"?>" alt="<?=$arElement["NAME"]?>">
					    </a>
					</div>
					<div class="productColText">
                        <?if($arElement["BRAND"]) { ?>
                        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="brand" target="_blank"><?=$arElement["BRAND"]?></a>
                        <? } ?>

                        <?/*if($arElement["COUNT_PRICES"] > 1):?>
                            <a href="#" class="price getPricesWindow <?if(!empty($arElement["DISCOUNT"])):?>with-discount<?endif;?>" data-id="<?=$arElement["ID"]?>">
                                <s class="discount"><span class="discountContainer<?if(empty($arElement["DISCOUNT"])):?> hidden<?endif;?>"><?=$arElement["BASE_PRICE_FORMATED"]?></span></s>
                                <span class="priceIcon"></span><span class="priceContainer" data-price="<?=$arElement["PRICE"];?>"><?=$arElement["PRICE_FORMATED"];?></span>
                                <?if($arParams["HIDE_MEASURES"] != "Y" && !empty($arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"])):?>
                                    <span class="measure"> / <?=$arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"]?></span>
                                <?endif;?>
                            </a>
                        <?else:*/?>
                            <a class="price <?if(!empty($arElement["DISCOUNT"])):?>with-discount<?endif;?>">
                                <s class="discount">
                                    <span class="discountContainer<?if(empty($arElement["DISCOUNT"])):?> hidden<?endif?>">
                                        <?=$arElement["BASE_PRICE_FORMATED"]?>
                                    </span>
                                </s>
                                <span class="priceContainer" data-price="<?=$arElement["PRICE"];?>"><?=$arElement["PRICE_FORMATED"];?></span>
                                <?if($arParams["HIDE_MEASURES"] != "Y" && !empty($arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"])):?>
                                    <span class="measure"> / <?=$arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"]?></span>
                                <?endif;?>
                            </a>
                        <?/*endif;*/?>

                        <p class="text-line">Размер: <?=$arElement['PROPERTIES']['RAZMER']['VALUE']?></p>
                        <p class="text-line">Код товара: <?=$arElement['ARTICLE']?></p>
						<p class="text-line"><?=$arElement["NAME"]?></p>

                        <div class="basketQty">
                            <label>Количество</label>
                            <div class="input-border">
                                <a href="#" class="minus" data-id="<?=$arElement["BASKET_ID"]?>">-</a>
                                <input name="qty" type="text" value="<?=$arElement["QUANTITY"]?>" class="qty"<?if($arElement["CATALOG_QUANTITY_TRACE"] == "Y" && $arElement["CATALOG_CAN_BUY_ZERO"] == "N"):?> data-last-value="<?=$arElement["QUANTITY"]?>" data-max-quantity="<?=$arElement["CATALOG_QUANTITY"]?>"<?endif;?> data-id="<?=$arElement["BASKET_ID"]?>" data-ratio="<?=$arElement["CATALOG_MEASURE_RATIO"]?>" />
                                <a href="#" class="plus" data-id="<?=$arElement["BASKET_ID"]?>">+</a>
                            </div>
                        </div>

					</div>
				</div>
			</div>
		</div>
	<?endforeach;?>
    <?/*
    <div class="in_shopping_cart_flex_1_inf">
        <div>
            <img src="<?=SITE_TEMPLATE_PATH?>/img/DHL_Logo.svg" alt="" width="100">
            <p>Доставка по России компаниями DHL и СДЭК.</p>
        </div>

        <div>
            <img src="<?=SITE_TEMPLATE_PATH?>/img/hanger.png" alt="" width="50" height="36">
            <p>Бесплатная примерка. Ожидание курьера включено</p>
        </div>
    </div>*/?>

<!--
	<?if($arParams["DISABLE_FAST_ORDER"] !== "Y"):?>
		<div class="item product fastBayContainer<?if(empty($arResult["IS_MIN_ORDER_AMOUNT"])):?> hidden<?endif;?>">
			<div class="tb">
				<div class="tc">
					<img class="fastBayImg" src="<?=SITE_TEMPLATE_PATH?>/images/basketProductListCart.png" alt="<?=GetMessage("FAST_BUY_PRODUCT_LABEL")?>">
					<div class="fastBayLabel"><?=GetMessage("FAST_BUY_PRODUCT_LABEL")?></div>
					<div class="fastBayText"><?=GetMessage("FAST_BUY_PRODUCT_TEXT")?></div>
					<a href="#" class="show-always btn-simple btn-micro" id="fastBasketOrder"><?=GetMessage("FAST_BUY_PRODUCT_BTN_TEXT")?></a>
				</div>
			</div>
		</div>
	<?endif;?> -->

	<div class="clear"></div>
</div>