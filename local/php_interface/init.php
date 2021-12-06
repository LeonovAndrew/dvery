<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

require_once('const.php');


//Автозагрузка классов
require dirname(__FILE__) . '/autoload.php';

//Обработка событий
require dirname(__FILE__) . '/event_handler.php';


function drawFormField($FIELD_SID, $arQuestion){
?>
<?$arQuestion["HTML_CODE"] = str_replace('name=', 'data-sid="'.$FIELD_SID.'" name=', $arQuestion["HTML_CODE"]);?>
<?$arQuestion["HTML_CODE"] = str_replace('left', '', $arQuestion["HTML_CODE"]);?>
<?$arQuestion["HTML_CODE"] = str_replace('size="0"', '', $arQuestion["HTML_CODE"]);?>
<?if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'):?>
	<?=$arQuestion["HTML_CODE"];?>
<?else:?>
		<label><span><?=$arQuestion["CAPTION"]?><?=($arQuestion["REQUIRED"] == "Y" ? '&nbsp;<sup class="star">*</sup>' : '')?></span></label>
		<?
		if(is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS']))
			$arQuestion["HTML_CODE"] = str_replace('class="', 'class="error ', $arQuestion["HTML_CODE"]);

		if($arQuestion["REQUIRED"] == "Y")
			$arQuestion["HTML_CODE"] = str_replace('name=', 'required name=', $arQuestion["HTML_CODE"]);

		if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "email")
			$arQuestion["HTML_CODE"] = str_replace('type="text"', 'type="email" placeholder="mail@domen.com"', $arQuestion["HTML_CODE"]);

		if((strpos($arQuestion["HTML_CODE"], "phone") !== false) || (strpos(strToLower($FIELD_SID), "phone") !== false))
			$arQuestion["HTML_CODE"] = str_replace('type="text"', 'type="tel"', $arQuestion["HTML_CODE"]);
		?>
		<?=$arQuestion["HTML_CODE"]?>
<?endif;?>
<?
}

function debug($arr){
	global $USER;
	if($USER->IsAdmin())
	{
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

}

AddEventHandler('main', 'OnEpilog', 'setCanonical', 1);
function setCanonical()
{
    global $APPLICATION;

    if (strpos($APPLICATION->GetCurPageParam(), '?') !== false) {
        if ($APPLICATION->GetPageProperty('canonical') == '') {
            CMain::IsHTTPS() ? $s = 's' : $s = '';
            $url = 'http' . $s . '://' . SITE_SERVER_NAME . $APPLICATION->GetCurPage();
            $APPLICATION->SetPageProperty("canonical", $url);   
        }
    }
}