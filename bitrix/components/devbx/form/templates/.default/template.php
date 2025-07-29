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
<form action="<?=POST_FORM_ACTION_URI?>" method="post">

    <?foreach ($arResult['HIDDEN_FIELDS'] as $ar):?>
    <input type="hidden" name="<?=$ar['NAME']?>" value="<?=$ar['VALUE']?>">
    <?endforeach?>

    <?foreach ($arResult['ERRORS'] as $ar):?>
        <div class="alert alert-danger"><?=$ar['text']?></div>
    <?endforeach?>

    <? foreach ($arResult['FIELDS'] as $arField): ?>
        <div class="form-group">
            <label><?= $arField['EDIT_FORM_LABEL'] ?></label>
            <?= $arField["HTML"] ?>
        </div>
    <? endforeach; ?>

    <button type="submit" class="btn btn-primary"><?=$arParams['SUBMIT_BUTTON_NAME']?></button>
</form>