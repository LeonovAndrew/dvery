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
<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" class="popup__cont">
    <?foreach ($arResult['HIDDEN_FIELDS'] as $ar):?>
        <input type="hidden" name="<?=$ar['NAME']?>" value="<?=$ar['VALUE']?>">
    <?endforeach?>
    <div class="popup__close">
        <div class="popup__close-item"></div>
        <div class="popup__close-item"></div>
    </div>
    <div class="popup__title">
        Заказать звонок
    </div>
    <?if ($arResult['SUCCESS']):?>
        <p class="form__message">
            <div class="alert alert-success">Ваша заявка отправлена.</div>
 
        </p>
    <?else:?>
    <div class="popup__list">
        <input type="text" name="UF_NAME" placeholder="Имя" class="popup__list-item" value="<?=$arResult['FIELDS']['UF_NAME']['VALUE']?>">
        <input type="text" name="UF_PHONE" autocomplete="off" placeholder="Телефон" class="popup__list-item tel" value="<?=$arResult['FIELDS']['UF_PHONE']['VALUE']?>">
        <input type="text" name="UF_EMAIL" autocomplete="off" placeholder="E-mail" class="popup__list-item" value="<?=$arResult['FIELDS']['UF_EMAIL']['VALUE']?>">
    </div>
    <div class="popup__text">
        Нажимая кнопку «Отправить», Вы принимаете условия обработки Ваших персональных данных
    </div>
    <button type="submit" class="form_callback popup__btn">Отправить</button>
    <p class="form__message">
        <?foreach ($arResult['ERRORS'] as $ar):?>
            <div class="alert alert-danger"><?=$ar['text']?></div>
        <?endforeach?>
    </p>

        <script>$(".tel").mask("+7 999 999-99-99");</script>
    <?endif?>
</form>

<script>
    document.querySelector('.popup__cont').addEventListener('submit', function() {
        ym(64922065,'reachGoal','send_all_forms');
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form'});
        console.log('form zv skvoznaya');
    });
</script>

