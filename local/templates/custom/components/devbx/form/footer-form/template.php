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

if (empty($arParams['SUBMIT_BUTTON_NAME']))
    $arParams['SUBMIT_BUTTON_NAME'] = GetMessage('DEVBX_FORMS_COMPONENT_FORM_SUBMIT_BUTTON_NAME_DEFAULT');

?>
<div id="foot-form" class="footer-form">
    <div class="cont">
        <div class="footer-form__cont" id="footerFormContId">
<?if ($arResult['SUCCESS']):?>
            <div class="footer-form__head">
               Благодарим за заявку! Ожидайте звонка специалиста. <br>
Мы работаем: Ежедневно с 9:00 до 20:00 ч
            </div>
			<script>
				  ym(64922065,'reachGoal','form_footer');
				  console.log('form_footer');
			</script> 	
<?else:?>
            <div class="footer-form__head">
                <?=$arParams['FORM_TITLE']?>
            </div>
<form action="<?=POST_FORM_ACTION_URI?>" method="post" class="footer-form__body<?/* js-form-ajax*/?>">

    <?foreach ($arResult['HIDDEN_FIELDS'] as $ar):?>
    <input type="hidden" name="<?=$ar['NAME']?>" value="<?=$ar['VALUE']?>">
    <?endforeach?>
	<div class="footer-row">
                <input type="hidden" name="UF_NAME" class="footer-form__input" placeholder="Имя*" value="<?=$arResult['FIELDS']['UF_NAME']['VALUE']?>">
                <input type="text" id="text-phone-form-individ" name="UF_PHONE" autocomplete="off" class="footer-form__input tel" placeholder="Телефон*" value="<?=$arResult['FIELDS']['UF_PHONE']['VALUE']?>">
                <input type="hidden" name="UF_EMAIL" autocomplete="off" class="footer-form__input" placeholder="E-mail" value="<?=$arResult['FIELDS']['UF_EMAIL']['VALUE']?>">
                <input type="hidden" name="UF_COMMENT" autocomplete="off" class="footer-form__input form__comment" placeholder="Ваш вопрос" value="<?=$arResult['FIELDS']['UF_COMMENT']['VALUE']?>">
	</div>
	<div class="footer-row">
                <button type="submit" class="footer-form__btn">Обсудить проект</button>
	</div>

</form>

    <script>
        document.querySelector('.footer-form__body').addEventListener('submit', function(e) {
            e.preventDefault();

            const phoneInput = document.getElementById('text-phone-form-individ');
            const formData = new FormData();
            formData.append('phone', phoneInput.value); // Отправляем только телефон

            fetch('/ajax/individ-project.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    // Успешная отправка
                    var _tmr = window._tmr || (window._tmr = []);
                    _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form' });
                    document.querySelector('#foot-form .footer-form__head').innerHTML = 'Благодарим за заявку! Ожидайте звонка специалиста.';
                    document.querySelector('#foot-form .footer-form__body').style.display = 'none';
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    // Можно добавить уведомление об ошибке
                });
        });
    </script>

    <style>
.footer-row {
}
</style>
            <p class="form__message">
    <?foreach ($arResult['ERRORS'] as $ar):?>
        <div class="alert alert-danger"><?=$ar['text']?></div>
    <?endforeach?>
</p>
<script>$(".tel").mask("+7 999 999-99-99");</script>
<?endif?>
        </div>
    </div>
</div>

