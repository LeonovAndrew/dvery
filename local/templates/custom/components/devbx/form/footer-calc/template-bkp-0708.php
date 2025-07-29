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
<div class="block_7">
    <div class="container">
        <?if ($arResult['SUCCESS']):?>
		<div class="footer-form__head" style="color: #fff;position: relative;z-index: 2; font-size: 20px;">
                Благодарим за заявку! Ожидайте звонка специалиста. <br>
                Мы работаем: Ежедневно с 9:00 до 20:00 ч
            </div>
            <script>
                function onsubmit(event) {
  ym(64922065, 'reachGoal', 'zaproskonsultaciiotprav');
  return true;
}
            </script>
        <?else:?>
        <form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" class="form-calc" >
            <?foreach ($arResult['HIDDEN_FIELDS'] as $ar):?>
                <input type="hidden" name="<?=$ar['NAME']?>" value="<?=$ar['VALUE']?>">
            <?endforeach?>
            <div class="block_7_in">
                <div class="block_7_in_flex_txt">
                    <h2 class="heading">Бесплатная консультация</h2>
                    <p>Выберите лучший вариант под свой интерьер</p>
                </div>
                <div class="block_7_in_flex">
                    <div class="block_7_in_flex_left">
                        <div class="inpt">
                            <input type="text" placeholder="Имя*" name="UF_NAME" value="<?=$arResult['FIELDS']['UF_NAME']['VALUE']?>">
                        </div>
                        <div class="inpt">
                            <input type="email" placeholder="E-mail (не обязательно)" name="UF_EMAIL" value="<?=$arResult['FIELDS']['UF_EMAIL']['VALUE']?>">
                        </div>
                        <div class="inpt">
                            <input type="tel" class="tel" placeholder="Телефон*" name="UF_PHONE" value="<?=$arResult['FIELDS']['UF_PHONE']['VALUE']?>">
                        </div>
                        <div class="inpt inpt_file">
                            <input type="file" onchange="file_upload();" id="inpt_file" name="file">
                            <label for="inpt_file">Загрузить проект (если есть) <i class="fa fa-upload" aria-hidden="true"></i></label>
                        </div>
                    </div>
                    <button class="btn_send" type="submit">отправить</button>
                </div>
            </div>

            <?if ($arResult['ERRORS']):?>
                <p class="form__message">
                <?foreach ($arResult['ERRORS'] as $ar):?>
                    <div class="alert alert-danger"><?=$ar['text']?></div>
                <?endforeach?>
                </p>
            <?endif?>
            <script>$(".tel").mask("+7 999 999-99-99");</script>
        </form>
        <?endif?>
    </div>
</div>

<script>
    document.querySelector('.form-calc').addEventListener('submit', function() {
        ym(64922065,'reachGoal','send_all_forms');
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form'});
        console.log('form consult');
    });
</script>

<script>
	function file_upload(){$('#inpt_file').parent().find('label').html('Файл загружен <i class="fa fa-upload" aria-hidden="true"></i>'); }
</script>

