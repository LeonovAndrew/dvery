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

    $arBasketTemplates["TABLE"]["SELECTED"] = "Y";
?>

<?if(!empty($arResult["ITEMS"])):?>
	<?
		//vars
		$personTypeIndex = 0;
		$component = $this->getComponent();
		$countPos = 0;
	?>

	<div id="personalCart" class="DwBasket">
        <div id="basketProductList" style="display: none">
            <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/view_templates/basket_squares.php");?>
        </div>
		<div id="order" class="DwBasketOrder orderContainer<?if(empty($arResult["IS_MIN_ORDER_AMOUNT"])):?> hidden<?endif;?>">

            <?if(!empty($arResult["PERSON_TYPES"])):?>
                <?foreach($arResult["PERSON_TYPES"] as $arPersonType):?>
                    <form enctype="multipart/form-data" class="orderForm<?if($personTypeIndex == 0):?> active<?endif;?>" id="orderForm_<?=$arPersonType["ID"]?>" data-id="<?=$arPersonType["ID"]?>">
                        <div class="orderAreas order-section<?if($personTypeIndex == 0):?> active<?endif;?>" data-person-id="<?=$arPersonType["ID"]?>">
                            <?if(!empty($arResult["PROPERTY_GROUPS"])):?>
                                <?foreach($arResult["PROPERTY_GROUPS"] as $arGroup):?>
                                    <?if(\DigitalWeb\Basket::checkGroupProperties($arGroup["ID"], $arPersonType["ID"], $arResult["PROPERTIES"])):?>
                                        <h4 class="section-name open"><?=$arGroup["NAME"]?>  </h4>
                                        <div class="mainPropArea">
                                            <ul class="userProp">
                                                <?foreach($arResult["PROPERTIES"] as $arProperty){
                                                    if($arProperty["PROPS_GROUP_ID"] == $arGroup["ID"] && $arProperty["PERSON_TYPE_ID"] == $arPersonType["ID"] && empty($arProperty["RELATION"])){
                                                        printOrderPropertyHTML($arProperty, ' class="propItem"', $arParams);
                                                    }
                                                }?>

                                            </ul>
                                        </div>

                                    <?endif;?>
                                <?endforeach;?>
                            <?endif;?>
</div>
						<?php /*
						<ul class="userProp add-services">
							<li class="propItem"> 
								  <label class="custom-checkbox">
									<input type="checkbox" name="zamer" value="Замер">
									<span>Замер</span>
								  </label>

								<p>Предоставляется в подарок в пределах МКАД.<br>
									Замер поможет точно определить размеры предполагаемой двери, сопоставить список необходимых конструктивных элементов, выяснить нужны ли дополнительные ремонтные работы перед установкой двери.</p>
							</li>

							<li class="propItem"> 
								  <label class="custom-checkbox">
									<input type="checkbox" name="deliv" value="Доставка">
									<span>Доставка</span>
								  </label>

								<p>До МКАД стоимость доставки составляет 2500 руб. (До подъехда, без разгрузки).<br>
За МКАД дополнительно оплачивается каждый километр пути (1 км = 50 руб.).</p>
							</li>

							<li class="propItem"> 
								  <label class="custom-checkbox">
									<input type="checkbox" name="montaj" value="Монтаж">
									<span>Монтаж</span>
								  </label>

								<p>Монтаж дверей в проемы, настройка фурнитуры</p>
							</li>
</ul> */ ?>


                        <div class="orderAreas order-col-50 order-section<?if($personTypeIndex == 0):?> active<?endif;?>" data-person-id="<?=$arPersonType["ID"]?>">
                            <div class="orderDeliveryPaySection">
                                <?if(!empty($arResult["ORDER"]["DELIVERIES"])):?>
                                    <h4 class="section-name open"><?=Loc::getMessage("ORDER_DELIVERY")?></h4>
                                    <div class="propItem">
                                        <select class="deliverySelect" name="DEVIVERY_TYPE" data-default="<?=$arResult["FIRST_DELIVERY"]["ID"]?>">
                                            <?foreach($arResult["ORDER"]["DELIVERIES"] as $arDevivery):?>
                                                <option data-price="<?=doubleval($arDevivery["PRICE"])?>" data-code="<?=$arDevivery["CODE"]?>" data-name="<?=htmlspecialcharsbx($arDevivery["NAME"])?>"<?if($arResult["FIRST_DELIVERY"]["ID"] == $arDevivery["ID"]):?> selected<?endif;?> value="<?=$arDevivery["ID"]?>"><?=htmlspecialcharsbx($arDevivery["NAME"])?> <?=$arDevivery["PRICE_FORMATED"]?></option>
                                            <?endforeach;?>
                                        </select>
                                        <?if(!empty($arResult["STORES"])):?>
                                            <div class="storeSelectContainer<?if(empty($arResult["FIRST_DELIVERY"]["STORES"])):?> hidden<?endif;?>">
                                                <span class="label"><?=Loc::getMessage("STORE_SELECT")?></span>
                                                <select class="storeSelect" name="STORE">
                                                    <?foreach($arResult["STORES"] as $arStore):?>
                                                        <?if(in_array($arStore["ID"], $arResult["FIRST_DELIVERY"]["STORES"])):?>
                                                            <option value="<?=$arStore["ID"]?>"><?=$arStore["TITLE"]?> - <?=$arStore["ADDRESS"]?> - <?=$arStore["PRODUCTS_STATUS"]?></option>
                                                        <?endif;?>
                                                    <?endforeach;?>
                                                </select>
                                            </div>
                                        <?endif;?>
                                        <div class="extraServiceItems<?if(empty($arResult["FIRST_DELIVERY"]["EXTRA_SERVICES"])):?> hidden<?endif;?>">
                                            <?if(!empty($arResult["FIRST_DELIVERY"]["EXTRA_SERVICES"])):?>
                                                <?=getExtraServicesHTML($arResult["FIRST_DELIVERY"]["EXTRA_SERVICES"], $arResult["CURRENCY"]["CODE"]);?>
                                            <?endif;?>
                                        </div>
                                        <?if(!empty($arResult["FIRST_DELIVERY"])):?>
                                            <ul class="userProp">
                                                <?foreach($arResult["PROPERTIES"] as $arProperty){
                                                    if(!empty($arProperty["RELATION"]) && $arProperty["PERSON_TYPE_ID"] == $arPersonType["ID"]){
                                                        $attrList = ' data-property-id="'.$arProperty["ID"].'" class="propItem deliveryProps'.(empty($arProperty["DELIVERY_RELATION"]) || $arProperty["DELIVERY_RELATION"] == "N" ? ' hidden' : '').'"';
                                                        printOrderPropertyHTML($arProperty, $attrList, $arParams);
                                                    }
                                                }?>
                                            </ul>
                                        <?endif;?>
                                        <?/*
										<div class="deliveryDescription<?if(empty($arResult["FIRST_DELIVERY"]["DESCRIPTION"])):?> hidden<?endif;?>">
											<?if(!empty($arResult["FIRST_DELIVERY"]["DESCRIPTION"])):?>
												<?=$arResult["FIRST_DELIVERY"]["DESCRIPTION"]?>
											<?endif;?>
										</div>*/?>
                                        <div class="deliveryPeriod<?if(empty($arResult["FIRST_DELIVERY"]["PERIOD_DESCRIPTION"])):?> hidden<?endif;?>">
                                            <div class="deliveryPeriodLabel"><?=GetMessage("ORDER_PERIOD_DESCRIPTION")?></div>
                                            <div class="deliveryPeriodDescription">
                                                <?if(!empty($arResult["FIRST_DELIVERY"]["PERIOD_DESCRIPTION"])):?>
                                                    <?=$arResult["FIRST_DELIVERY"]["PERIOD_DESCRIPTION"]?>
                                                <?endif;?>
                                            </div>
                                        </div>
                                        <div id="bx-soa-delivery" class="deliveryModulesContainer">
                                            <div class="bx-soa-pp-company-desc deliveryModulesContainerDesc"></div>
                                        </div>
                                    </div>

                                <?endif;?>
                            </div>

                            <div class="orderDeliveryPaySection">
                                <h4 class="section-name open"><?=Loc::getMessage("ORDER_PAY")?></h4>
                                <div class="propItem">
                                    <select class="paySelect" name="PAY_TYPE">
                                        <?if(!empty($arResult["ORDER"]["PAYSYSTEMS"])):?>
                                            <?foreach($arResult["ORDER"]["PAYSYSTEMS"] as $arPaysystem):?>
                                                <option value="<?=$arPaysystem["ID"]?>"><?=$arPaysystem["NAME"]?></option>
                                            <?endforeach;?>
                                        <?else:?>
                                            <option value="0" data-empty="Y"><?=Loc::getMessage("EMPTY_PAYSYSTEMS")?></option>
                                        <?endif;?>
                                    </select>
                                    <div class="payFromBudget<?if(empty($arResult["ORDER"]["INNER_PAYMENT"])):?> hidden<?endif;?>">
                                        <input type="checkbox" value="Y" id="payFromBudget_<?=$arPersonType["ID"]?>" name="payFromBudget" class="budgetSwitch"<?if(!empty($arResult["ORDER"]["INNER_PAYMENT"]["RANGE"]["MAX"])):?> data-max="<?=$arResult["ORDER"]["INNER_PAYMENT"]["RANGE"]["MAX"]?>"<?endif;?> data-account-balance="<?=$arResult["USER_ACCOUNT"]["CURRENT_BUDGET"]?>">
                                        <label for="payFromBudget_<?=$arPersonType["ID"]?>"><?=Loc::getMessage("PAY_FROM_BUDGET")?> (<?=Loc::getMessage("ACCOUNT_BALANCE")?> <?=$arResult["USER_ACCOUNT"]["PRINT_CURRENT_BUDGET"]?>)</label>
                                    </div>
                                    <?if(!empty($arResult["PROPERTIES"])):?>
                                        <ul class="userProp">
                                            <?foreach($arResult["PROPERTIES"] as $arProperty){
                                                if(!empty($arProperty["RELATION"]) && $arProperty["PERSON_TYPE_ID"] == $arPersonType["ID"]){
                                                    $attrList = ' data-property-id="'.$arProperty["ID"].'" class="propItem payProps'.(empty($arProperty["PAYSYSTEM_RELATION"]) || $arProperty["PAYSYSTEM_RELATION"] == "N" ? ' hidden' : '').'"';
                                                    printOrderPropertyHTML($arProperty, $attrList, $arParams);
                                                }
                                            }?>
                                        </ul>
                                    <?endif;?>
                                </div>
                            </div>

                            <div class="propItem">
                                <h4 class="section-name open"><?=Loc::getMessage("ORDER_COMMENT")?></h4>
                                <textarea name="comment" class="orderComment"></textarea>
                            </div>
                            <input type="hidden" name="PERSON_TYPE" value="<?=$arPersonType["ID"]?>">
                        </div>
                    </form>
                    <?$personTypeIndex++;?>
                <?endforeach;?>
            <?endif;?>

            <div class="orderLine order-section order-col-50">

                <h4 class="section-name open">Проверка заказа</h4>

                <div id="sum">
                    <div>
                        <span class="label"><?=Loc::getMessage("TOTAL_SUM")?></span>
                        <span class="price">
					        <span class="basketSum"><?=FormatCurrency($arResult["BASKET_SUM"], $arResult["CURRENCY"]["CODE"]);?></span>
				        </span>
                    </div>
                    <div>
                        <span class="label<?if(empty($arResult["ORDER"]["DELIVERIES"])):?> hidden<?endif;?>"><?=Loc::getMessage("ORDER_DELIVERY")?>:</span>
                        <span class="price<?if(empty($arResult["ORDER"]["DELIVERIES"])):?> hidden<?endif;?>">
                            <span class="deliverySum"><?=$arResult["FIRST_DELIVERY"]["PRICE_FORMATED"];?></span>
                        </span>
                    </div>
                    <div>
                        <span class="label"><?=Loc::getMessage("ORDER_TOTAL_SUM")?></span>
                        <span class="price"><span class="orderSum"><?=FormatCurrency($arResult["BASKET_SUM"] + $arResult["FIRST_DELIVERY"]["PRICE"], $arResult["CURRENCY"]["CODE"]);?></span></span>
                    </div>
                </div>

                <form id="coupon">
                    <input placeholder="<?=Loc::getMessage("COUPON_LABEL")?>" name="user" class="couponField">
                    <input type="submit" value="<?=Loc::getMessage("COUPON_ACTIVATE")?>" class="couponActivate">
                </form>

                <a href="#" class="order orderMake" id="orderMake"><?=Loc::getMessage("ORDER_GO")?></a>

                <div class="personalInfoLabel"><?=Loc::getMessage("PERSONTAL_INFO_ORDER_LABEL")?></div>
            </div>
            <?/*
			<div class="personSelectContainer order-section">
                <h4 class="section-name open"><?=Loc::getMessage("ORDER_PERSON")?></h4>
                    <?if(!empty($arResult["PERSON_TYPES"])):?>
                        <label><?=Loc::getMessage("ORDER_PERSON_SELECT")?></label>
                        <select id="personSelect" class="personSelect">
                            <?foreach($arResult["PERSON_TYPES"] as $arPersonType):?>
                                <?if($arPersonType["ACTIVE"] === "Y"):?>
                                    <option value="<?=$arPersonType["ID"]?>" data-id="<?=$arPersonType["ID"]?>"><?=$arPersonType["NAME"]?></option>
                                <?endif;?>
                            <?endforeach;?>
                        </select>
                        <div class="personTypeForModules hidden">
                            <?$personIter = 0?>
                            <?foreach($arResult["PERSON_TYPES"] as $arPersonType):?>
                                <?if($arPersonType["ACTIVE"] === "Y"):?>
                                    <input type="radio" name="PERSON_TYPE" value="<?=$arPersonType["ID"]?>" data-id="<?=$arPersonType["ID"]?>" class="personTypeModules"<?if($personIter++ == 0):?> checked<?endif;?>>
                                <?endif;?>
                            <?endforeach;?>
                        </div>
                    <?endif;?>
			</div>
            */?>


		</div>
	</div>
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
	<div id="empty">
		<div class="emptyWrapper">
			<div class="pictureContainer">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/emptyFolder.png" alt="<?=Loc::getMessage("EMPTY_HEADING")?>" class="emptyImg">
			</div>
			<div class="info">
				<h3><?=Loc::getMessage("EMPTY_HEADING")?></h3>
				<p><?=Loc::getMessage("EMPTY_TEXT")?></p>
				<a href="<?=SITE_DIR?>" class="back"><?=Loc::getMessage("MAIN_PAGE")?></a>
			</div>
		</div>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "emptyMenu", Array(
			"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => "",
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N",
			),
			false
		);?>
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