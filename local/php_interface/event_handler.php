<?php

use Bitrix\Main;
$eventManager = Main\EventManager::getInstance();

//Вешаем обработчик на событие создания списка пользовательских свойств OnUserTypeBuildList
$eventManager->addEventHandler('main', 'OnUserTypeBuildList', ['lib\UserType\CUserTypeUserGroupId', 'GetUserTypeDescription']);
//$eventManager->addEventHandler('main', 'OnUserTypeBuildList', ['lib\UserType\CUserTypeColor', 'GetUserTypeDescription']);

 //AddEventHandler("main", "OnEndBufferContent", "delete_type");
function delete_type(&$content) {
  $content = str_replace(" type=\"text/javascript\"", false, $content);
}


/* Обработчик одбавления вариантов ответов на основе инфоблока*/

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "OnAfterIBlockElementHandler", 1000);
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementHandler", 1000);
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "OnBeforeIBlockElementUpdateHandler", 1000);
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", "OnBeforeIBlockElementDeleteHandler", 1000);

$old_name = "";
$QUESTION_ID = 23; // ID вопроса, в который мы будем добавлять ответы

function OnBeforeIBlockElementUpdateHandler (&$arFields)
{
	global $old_name;
	$arr = CIblockElement::GetByID($arFields["ID"]);
	if ($ar = $arr->Fetch())
		$old_name = trim ($ar["NAME"]);	
}
function OnBeforeIBlockElementDeleteHandler ($ID)
{
	global $QUESTION_ID;
	$arr = CIblockElement::GetByID($ID);
	if ($ar = $arr->Fetch())
	{
		CModule::IncludeModule("form");
		$rsAnswersDel = CFormAnswer::GetList($QUESTION_ID, $by="s_id", $order="desc", Array("MESSAGE" => $ar["NAME"]), $is_filtered);
		while ($arAnswerDel = $rsAnswersDel->Fetch())
			CFormAnswer::Delete($arAnswerDel["ID"]);
	}
}
function OnAfterIBlockElementHandler(&$arFields)
{
	//Здесь надо поменять ID инфоблока, из которого мы будем брать названия элементов
	if ($arFields["IBLOCK_ID"] != '10' || intval($arFields["RESULT"]) <= 0) 
		return $arFields;
	if(!in_array(16, $arFields['IBLOCK_SECTION']) || $arFields['ACTIVE'] == 'N') return $arFields;
	global $old_name, $QUESTION_ID;
	
	CModule::IncludeModule("form");
	//Удаляем старое значение ответа при возможном Update.
	if (strlen($old_name)>0)
	{
			$rsAnswersDel = CFormAnswer::GetList($QUESTION_ID, $by="s_id", $order="desc", Array("MESSAGE" => $old_name), $is_filtered);
		while ($arAnswerDel = $rsAnswersDel->Fetch())
			CFormAnswer::Delete($arAnswerDel["ID"]);
	}
		//Добавляем новое значение
	$rsAnswers = CFormAnswer::GetList($QUESTION_ID, $by="s_id", $order="desc", Array(), $is_filtered);
	$arAnswer = $rsAnswers->Fetch();
		if (!$arAnswer)
	{
		$arAdd = Array("QUESTION_ID"=> $QUESTION_ID, "MESSAGE"=> $arFields["NAME"], "FIELD_TYPE"=> "dropdown", 'FIELD_PARAM' => 'class="popup__list-item"', 'C_SORT' => $arFields['SORT']);
		CFormAnswer::Set($arAdd, false, $QUESTION_ID);
	}
	else
	{
		$bnew = true;
		do{
			if ($arAnswer["MESSAGE"] == $arFields["NAME"])
			{
				$bnew = false; break;
			}
		}while ($arAnswer = $rsAnswers->Fetch());
			if ($bnew)
		{
			$arAdd = Array("QUESTION_ID"=> $QUESTION_ID, "MESSAGE"=> $arFields["NAME"], "FIELD_TYPE"=> "dropdown",'FIELD_PARAM' => 'class="popup__list-item"', 'C_SORT' => $arFields['SORT']);
			CFormAnswer::Set($arAdd, false, $QUESTION_ID);
		}
	}
}
?>
