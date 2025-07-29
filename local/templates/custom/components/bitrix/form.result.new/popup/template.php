<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<script> 
function ReachGoal1()
{
	ym(64922065,'reachGoal','send_all_forms');
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form'});
	console.log('form zamershik, zapis v salon...');
}
</script>
<?
$arResult["FORM_HEADER"] = str_replace('<form', '<form onsubmit="ReachGoal1()" class="popup__cont js-form-ajax'.$arResult["arForm"]["SID"].'"', $arResult["FORM_HEADER"]);
?>
<?=$arResult["FORM_HEADER"]?>

    <div class="popup__close">
        <div class="popup__close-item"></div>
        <div class="popup__close-item"></div>
    </div>
    <div class="popup__title">
        <?if($arResult["isFormTitle"] == "Y"):?>
			<?=$arResult["FORM_TITLE"]?>
		<?endif;?>
    </div>

	    <?if(strlen($arResult["FORM_NOTE"])){?>
			<div class="form_result <?=($arResult["isFormErrors"] == "Y" ? 'error' : 'success')?>">
				<?if($arResult["isFormErrors"] == "Y"):?>
					<?=$arResult["FORM_ERRORS_TEXT"]?>
				<?else:?>
					<script type="text/javascript">
					$(document).ready(function(){
						if(arOptimusOptions['COUNTERS']['USE_FORMS_GOALS'] !== 'NONE'){
							var eventdata = {goal: 'goal_webform_success' + (arOptimusOptions['COUNTERS']['USE_FORMS_GOALS'] === 'COMMON' ? '' : '_<?=$arParams['WEB_FORM_ID']?>')};
							BX.onCustomEvent('onCounterGoals', [eventdata]);
						}
					});
					</script>
					<?$successNoteFile = SITE_DIR."include/form/success_{$arResult["arForm"]["SID"]}.php";?>
					<?$successNoteFile = SITE_DIR."include/form/success_{$arResult["arForm"]["SID"]}.php";?>
					<?if(file_exists($_SERVER["DOCUMENT_ROOT"].$successNoteFile)):?>
					<?$APPLICATION->IncludeFile($successNoteFile, array(), array("MODE" => "html", "NAME" => "Form success note"));?>
					<?else:?>
						<?=GetMessage("FORM_SUCCESS");?>
					<?endif;?>
				<?endif;?>
			</div>
		<?}else{?>
    		<?if($arResult["isFormErrors"] == "Y"):?>
				<div class="form_body error"><?=$arResult["FORM_ERRORS_TEXT"]?></div>
			<?endif;?>
			<?//=$arResult["FORM_HEADER"]?>
				 <div class="popup__list">
					<?=bitrix_sessid_post();?>
				
					<?if(is_array($arResult["QUESTIONS"])):?>
						<?foreach($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
							<?drawFormField($FIELD_SID, $arQuestion);?>
						<?endforeach;?>
					<?endif;?>
					<div class="clearboth"></div>
					<?if($arResult["isUseCaptcha"] == "Y"):?>
						<div class="form-control captcha-row clearfix">
							<label><span><?=GetMessage("FORM_CAPRCHE_TITLE")?> <span class="star">*</span></span></label>
							<div class="captcha_image">
								<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"])?>" border="0" />
								<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"])?>" />
								<div class="captcha_reload"></div>
							</div>
							<div class="captcha_input">
								<input type="text" class="inputtext captcha" name="captcha_word" size="30" maxlength="50" value="" required />
							</div>
						</div>
					<?endif;?>
					<div class="clearboth"></div>
	        	
				</div>
				<div class="popup__text">
			        Нажимая кнопку «<?=$arResult["arForm"]["BUTTON"]?>», Вы принимаете условия обработки Ваших персональных данных
			    </div>
			    <button type="submit" value="<?=$arResult["arForm"]["BUTTON"]?>" class="popup__btn form_<?=$arResult["arForm"]["SID"]?>" name="web_form_submit"><?=$arResult["arForm"]["BUTTON"]?></button>
			    <p class="form__message"></p>
			<?//=$arResult["FORM_FOOTER"]?>
    	<?}?>
	<?=$arResult["FORM_FOOTER"]?>
