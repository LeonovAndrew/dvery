<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? use Bitrix\Main\Localization\Loc; ?>
<? global $USER; ?>
<? if (!empty($arResult["ERRORS"]["ORDER_NOT_FOUND"])): ?>
    <div class="orderError"><?= Loc::GetMessage("ORDER_NOT_FOUND"); ?></div>
    <? return false; ?>
<? endif; ?>
<? if (!empty($arResult["ORDER"])): ?>
    <?php
    $delivery = \Bitrix\Sale\Delivery\Services\Manager::getById($arResult['ORDER']['DELIVERY_ID']);

    /*$coupons = \Bitrix\Sale\Internals\DiscountCouponTable::getList(['filter' => ['DESCRIPTION' => $arResult["ORDER"]["ACCOUNT_NUMBER"]]])->fetchAll();
    if ($coupons && is_array($coupons)) {
        $coupon = array_shift($coupons);
        $coupon = $coupon['COUPON'];
    } else {
        $coupon = GenerateCoupon();
        $fields = array(                        // массив $data
            'DISCOUNT_ID' => 11,                        // id правила корзины
            'ACTIVE_FROM' => null,                        // выставляем без ограничения к началу даты активности купона
            'ACTIVE_TO' => null,                        // выставляем без ограничения к окончанию даты активности купона
            'TYPE' => \Bitrix\Sale\Internals\DiscountCouponTable::TYPE_ONE_ORDER, // выставляем тип купона TYPE_ONE_ORDER - использовать на один заказ, TYPE_MULTI_ORDER - использовать на несколько заказов
            'MAX_USE' => 1,                           // выставляем максимальное кол-во применений купона
            'COUPON' => $coupon,
            'DESCRIPTION' => $arResult["ORDER"]["ACCOUNT_NUMBER"]
        );
        $couponsResult = \Bitrix\Sale\Internals\DiscountCouponTable::add($fields);
        $CID = $couponsResult->isSuccess();
    }*/

    ?>
    <style>
        h1 {
            display: none
        }
    </style>
    <div class="center">
        <section class="cart orderOk">
			<h2>Спасибо!</h2> <br>
			<p style="font-size:18px;">В ближайшее время наш специалист перезвонит Вам для подтверждения заказа. <br>
				График работы:  Ежедневнос 9 ч. до 20 ч. </p>

			<div style="display:none;">
            <h3>Детали заказа</h3>
            <ul class="list">
                <li>Номер заказа <span><?= $arResult["ORDER"]["ACCOUNT_NUMBER"] ?></span></li>
                <li>Сумма заказа <span><?= CurrencyFormat($arResult["ORDER"]["PRICE"], 'RUB') ?></span></li>
                <li>Способ получения <span><?= $delivery['NAME'] ?></span></li>
                <li>Способ оплаты
                    <span><?= $arResult["ORDER"]["PAYMENTS"][$arResult["ORDER"]["PAYMENT_ID"]]["PAY_SYSTEM_NAME"] ?></span>
                </li>
            </ul>
            <?/*
            <h3>Скидка 10% по промокоду <?= $coupon ?></h3>
            <p>Получите скидку по промокоду на последующую покупку.<br> Промокод действителен один раз.</p>
            */?>
            <? if (empty($arResult["ERRORS"])): ?>
                <? if (!empty($arResult["ORDER"]["PAYMENT_SERVICES"])): ?>
                    <? foreach ($arResult["ORDER"]["PAYMENT_SERVICES"] as $paymentService): ?>
                        <div class="nextPayment">
                            <? if (empty($paymentService["ERROR"])): ?>
                                <? if (!empty($paymentService["LOGOTIP"])): ?>
                                    <div class="paymentLogo"><img src="<?= $paymentService["LOGOTIP"]["src"] ?>"
                                                                  alt="<?= $paymentService["NAME"] ?>"
                                                                  title="<?= $paymentService["NAME"] ?>"></div>
                                <? endif; ?>

                                <div class="paymentDescription"><?= $paymentService["DESCRIPTION"] ?></div>
                                <div class="paymentContainer">
                                    <? if (!empty($paymentService["ACTION_FILE"]) && $paymentService["NEW_WINDOW"] == "Y" && $paymentService["IS_CASH"] != "Y"): ?>
                                        <script>
                                            window.open("<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]))?>&PAYMENT_ID=<?=$arResult["ORDER"]["PAYMENTS"][$arResult["ORDER"]["PAYMENT_ID"]]["ACCOUNT_NUMBER"]?>");
                                        </script>
                                        <?= Loc::getMessage("ORDER_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])) . "&PAYMENT_ID=" . $arResult["ORDER"]["PAYMENTS"][$arResult["ORDER"]["PAYMENT_ID"]]["ACCOUNT_NUMBER"])) ?>
                                        <? if (CSalePdf::isPdfAvailable() && $paymentService["IS_AFFORD_PDF"]): ?>
                                            <?= Loc::getMessage("ORDER_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])) . "&pdf=1&DOWNLOAD=Y")) ?>
                                        <? endif ?>
                                    <? else: ?>
                                        <?= $paymentService["BUFFERED_OUTPUT"] ?>
                                    <? endif; ?>
                                </div>
                            <? else: ?>
                                <div class="paymentError">
                                    <?= Loc::GetMessage("ORDER_PAY_ERROR"); ?>
                                </div>
                            <? endif; ?>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
            <? endif; ?>

		</div>
        </section>
    </div>

<? endif; ?>