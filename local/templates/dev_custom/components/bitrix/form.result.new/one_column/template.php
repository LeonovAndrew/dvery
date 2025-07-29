<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="coop-form">
	<div class="cont">
		<div class="coop-form__cont">
		
		<div class="coop-form__head">
			<?if ($arResult["isFormTitle"])
			{
			?>
				<?=$arResult["FORM_TITLE"]?>
			<?} //endif ;?>
		</div>
		<p><?=$arResult["FORM_DESCRIPTION"]?></p>		
		
<?if ($arResult["isFormErrors"] == "Y"):?><p class="form__message"><?=$arResult["FORM_ERRORS_TEXT"];?></p><?endif;?>
<p class="form__message"><?=$arResult["FORM_NOTE"]?></p>
	
		<?if ($arResult["isFormNote"] != "Y")
		{
			$arResult['FORM_HEADER'] = str_replace('<form', '<form class="coop-form__body"', $arResult['FORM_HEADER']); // убран класс js-form-ajax?> 
			<?=$arResult["FORM_HEADER"]?>
				<div class="coop-form__content">
					<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
						echo '<div class="coop-form__item">';
							if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
							{
								echo $arQuestion["HTML_CODE"];
							}
							else
							{?>
								<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
									<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
								<?endif;?>
								<div class="coop-form__label">
									<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
									<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
								</div>
								<div class="coop-form__field"><?=$arQuestion["HTML_CODE"]?></div>
					<?}
						echo '</div>';
					} //endwhile
					?>
					</div>
			<?if($arResult["isUseCaptcha"] == "Y")
			{?>
				<tr>
					<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
				</tr>
				<tr>
					<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
					<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
				</tr>
			<?} // isUseCaptcha?>
			
			<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit form_<?=$arResult["arForm"]["SID"]?> " class="coop-form__btn" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />&nbsp;<input type="hidden" name="web_form_apply" value="Y" />
			<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
			<?=$arResult["FORM_FOOTER"]?>
		<?} //endif (isFormNote)?>
		</div>
	</div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function() {
        ym(64922065, 'reachGoal', 'send_all_forms');
        console.log('form on p');
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form' });
    });
</script>