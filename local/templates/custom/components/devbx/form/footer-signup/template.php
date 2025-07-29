<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<? if ($arResult['ACTION'] != CDevBxFormsForm::defaultFormAction): ?>
    <div class="footer-form__cont">
        <?if ($arResult['SUCCESS']):?>
            <div class="footer-form__head">
                Благодарим за обращение. Ваша заявка направлена эксперту салона. Ожидайте обратной связи в ближайшее время.
            </div>
        <?else:?>
            <div class="footer-form__head">
                <?=$arParams['FORM_TITLE']?>
            </div>
            <form action="<?=POST_FORM_ACTION_URI?>" method="post" class="footer-form__body<?/* js-form-ajax*/?>" onsubmit="ym(64922065,'reachGoal','send_all_forms'); var _tmr = window._tmr || (window._tmr = []); _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form'}); console.log('form zv signup');">

                <?foreach ($arResult['HIDDEN_FIELDS'] as $ar):?>
                    <input type="hidden" name="<?=$ar['NAME']?>" value="<?=$ar['VALUE']?>">
                <?endforeach?>
                <input type="text" name="UF_NAME" class="footer-form__input" placeholder="Имя" value="<?=$arResult['FIELDS']['UF_NAME']['VALUE']?>">
                <input type="text" name="UF_PHONE" autocomplete="off" class="footer-form__input tel" placeholder="Телефон" value="<?=$arResult['FIELDS']['UF_PHONE']['VALUE']?>">
                <input type="text" name="UF_EMAIL" autocomplete="off" class="footer-form__input" placeholder="E-mail" value="<?=$arResult['FIELDS']['UF_EMAIL']['VALUE']?>">
                <input type="text" name="UF_COMMENT" autocomplete="off" class="footer-form__input form__comment" placeholder="Ваш вопрос" value="<?=$arResult['FIELDS']['UF_COMMENT']['VALUE']?>">

                <button type="submit" class="footer-form__btn">Отправить</button>

            </form>
            <p class="form__message">
				<pre style="display:none;">
				<?
				var_dump($arResult);
				?>
				</pre>
			
                <?foreach ($arResult['ERRORS'] as $ar):?>
            <div class="alert alert-danger"><?=$ar['text']?></div>
        <?endforeach?>
            </p>
            <script>$(".tel").mask("+7 999 999-99-99");</script>
        <?endif?>
    </div>
<?else:?>
<div class="footer-form">
    <div class="cont" style="text-align: center;">
        <?
        $obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId('ajax-form'));

        $uniqueId = md5($this->randString());

        $signer = new \Bitrix\Main\Security\Sign\Signer;
        $signedTemplate = $signer->sign($templateName, 'devbx.form');
        $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'devbx.form');

        ?>
        <button id="<?= $uniqueId ?>" class="footer-form__btn">Записаться в салон</button>
        <script>
            var <?=$obName?> = new JCDevBxPopupForm({
                signedTemplate: '<?=CUtil::JSEscape($signedTemplate)?>',
                signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
                uniqueId: '<?=CUtil::JSEscape($uniqueId)?>',
                ajaxUrl: '<?=CUtil::JSEscape($component->getPath() . '/ajax.php')?>',
                actionVariable: '<?=CUtil::JSEscape($arParams['ACTION_VARIABLE'])?>',
                siteId: '<?=CUtil::JSEscape(SITE_ID)?>',
                hiddenFields: <?=json_encode($arResult['HIDDEN_FIELDS'])?>
            });
        </script>
    </div>
</div>
<?endif?>
