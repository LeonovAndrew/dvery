<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	//namespace
	use Bitrix\Main\Localization\Loc;

	//composit bitrix off
	$this->setFrameMode(false);

	//suuport bitrix:sale.order.ajax events for delivery modules
	$this->addExternalJS($templateFolder."/js/compatibility.js");

	//check created order
	if(!empty($arResult["CONFIRM_ORDER"]) && $arResult["CONFIRM_ORDER"] == "Y"){
		//confirm page
		include_once($_SERVER["DOCUMENT_ROOT"]."/".$templateFolder."/confirm_template.php");
		return false;
	}

	//template functions
	include_once($_SERVER["DOCUMENT_ROOT"]."/".$templateFolder."/template_functions.php");
?>

<?if(!empty($arResult["ITEMS"])):?>
	<?
		//vars
		$personTypeIndex = 0;
		$component = $this->getComponent();
		$countPos = 0;
	?>

	<div id="personalCart" class="DwBasket">
		<div id="basketProductList">
            <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/view_templates/basket_squares.php");?>
		</div>
		<div class="orderLine">
			<div id="sum">
				<span class="label hd"><?=Loc::getMessage("TOTAL_QTY")?></span>
				<span class="price hd countItems"><?=$countPos?></span>
				<span class="label"><?=Loc::getMessage("TOTAL_SUM")?></span>
				<span class="price">
					<span class="basketSum"><?=FormatCurrency($arResult["BASKET_SUM"], $arResult["CURRENCY"]["CODE"]);?></span>
				</span>
			</div>
			<form id="coupon">
				<input placeholder="<?=Loc::getMessage("COUPON_LABEL")?>" name="user" class="couponField"><input type="submit" value="<?=Loc::getMessage("COUPON_ACTIVATE")?>" class="couponActivate">
			</form>
		</div>
		<div class="minimumPayment<?if(!empty($arResult["IS_MIN_ORDER_AMOUNT"])):?> hidden<?endif;?>">
			<div class="minimumPaymentLeft">
				<div class="paymentIcon"><img src="<?=$templateFolder?>/images/minOrder.png" alt="" title=""></div>
				<div class="paymentMessage">
					<div class="paymentMessageHeading">
						<?=Loc::getMessage("MINIMUM_PAYMENT_HEADING", array(
							"#MIN_PRICE_FORMATED#" => \DigitalWeb\Basket::formatPrice($arParams["MIN_SUM_TO_PAYMENT"]),
						))?>
					</div>
					<div class="paymentMessageText">
						<?=Loc::getMessage("MINIMUM_PAYMENT_TEXT")?>
					</div>
				</div>
			</div>
			<div class="minimumPaymentRight">
				<div class="paymentButtons">
					<div class="paymentButtonsMain">
						<a href="<?=SITE_DIR?>" class="btn-simple btn-small btn-border"><?=Loc::getMessage("MINIMUM_PAYMENT_MAIN_BUTTON")?></a>
					</div>
					<div class="paymentButtonsCatalog">
						<a href="<?=SITE_DIR?>catalog/" class="btn-simple btn-small"><?=Loc::getMessage("MINIMUM_PAYMENT_CATALOG_BUTTON")?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="giftContainer">
			<?$APPLICATION->IncludeComponent("bitrix:sale.gift.basket", ".default", Array(
					"APPLIED_DISCOUNT_LIST" => $arResult["APPLIED_DISCOUNT_LIST"],
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"CONVERT_CURRENCY" => $arParams["GIFT_CONVERT_CURRENCY"],
					"FULL_DISCOUNT_LIST" => $arResult["FULL_DISCOUNT_LIST"],
					"PRODUCT_PRICE_CODE" => $arParams["PRODUCT_PRICE_CODE"],
					"CURRENCY_ID" => $arParams["GIFT_CURRENCY_ID"],
					"HIDE_MEASURES" => $arParams["HIDE_MEASURES"],
					"PAGE_ELEMENT_COUNT" => "12",
					"LINE_ELEMENT_COUNT" => "12",
					"CACHE_GROUPS" => "Y",
				),
				false
			);?>
		</div>
		<div class="clear"></div>
	</div>
	<a href="<?=SITE_DIR?>personal/cart/order/" class="btn-simple btn-medium goToOrder<?if(empty($arResult["IS_MIN_ORDER_AMOUNT"])):?> hidden<?endif;?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/order.png"><?=GetMessage("BASKET_TABS_ORDER_MAKE")?></a>
	<div class="basketError error1">
		<div class="basketErrorContainer">
			<div class="errorPicture"><img src="<?=$templateFolder?>/images/error.jpg" alt="" title=""></div>
			<div class="errorHeading"><?=Loc::getMessage("ORDER_ERROR_1_HEADING")?></div>
			<a href="#" class="basketErrorClose errorClose"><span class="errorCloseLink"></span></a>
			<div class="errorMessage"><?=Loc::getMessage("ORDER_ERROR_1")?></div>
			<a href="#" class="basketErrorClose btn-simple btn-small"><?=Loc::getMessage("ORDER_CLOSE")?></a>
		</div>
	</div>
	<div class="basketError error2">
		<div class="basketErrorContainer">
			<div class="errorPicture"><img src="<?=$templateFolder?>/images/error.jpg" alt="" title=""></div>
			<div class="errorHeading"><?=Loc::getMessage("ORDER_ERROR_2_HEADING")?></div>
			<a href="#" class="basketErrorClose errorClose"><span class="errorCloseLink"></span></a>
			<div class="errorMessage"><?=Loc::getMessage("ORDER_ERROR_2")?></div>
			<a href="#" class="basketErrorClose btn-simple btn-small"><?=Loc::getMessage("ORDER_CLOSE")?></a>
		</div>
	</div>
	<div class="basketError error3">
		<div class="basketErrorContainer">
			<div class="errorPicture"><img src="<?=$templateFolder?>/images/error.jpg" alt="" title=""></div>
			<div class="errorHeading"><?=Loc::getMessage("ORDER_ERROR_3_HEADING")?></div>
			<a href="#" class="basketErrorClose errorClose"><span class="errorCloseLink"></span></a>
			<div class="errorMessage"><?=Loc::getMessage("ORDER_ERROR_3")?></div>
			<a href="#" class="basketErrorClose btn-simple btn-small"><?=Loc::getMessage("ORDER_CLOSE")?></a>
		</div>
	</div>
<?else:?>
    <div class="center cartWrapper">
        <section class="cart empty">
            <h3>Ваша корзина пуста</h3>
        </section>
    </div>
<?endif;?>

<script>
	var basketLang = {
		"max-quantity": '<?=Loc::getMessage("MAX_QUANTITY")?>',
		"empty-paysystems": '<?=Loc::getMessage("EMPTY_PAYSYSTEMS")?>',
		"empty-deliveries": '<?=Loc::getMessage("EMPTY_DELIVERIES")?>',
	};
</script>

<script>
	// var ajaxDir = "<?=$componentPath?>";
	var ajaxDir = "<?=$templateFolder?>";
	var ajaxCharset = "<?=LANG_CHARSET?>";
	var siteId = "<?=$component->getSiteId()?>";
	var siteCurrency = <?=\Bitrix\Main\Web\Json::encode($arResult["CURRENCY"]);?>;
	var basketParams = <?=\Bitrix\Main\Web\Json::encode(\DigitalWeb\Basket::clearParams($arParams));?>;
	var basketTemplatePath = "<?=$templateFolder?>";
	var maskedUse = "<?=$arParams["USE_MASKED"]?>";
	var maskedFormat = "<?=$arParams["MASKED_FORMAT"]?>";
</script>