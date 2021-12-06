<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->RestartBuffer();

CModule::IncludeModule('iblock');

$iblockId = intval($_POST['IBLOCK_ID']);
$name = htmlspecialchars($_POST['NAME']);
$phone = htmlspecialchars($_POST['PHONE']);

if ($iblockId > 0 && $name && $phone) {
	$el = new CIBlockElement;

	$PROP = array();

	$arLoadRequestArray = Array(
		"IBLOCK_ID"   => $iblockId,
		"NAME"        => $name,
		"CODE"        => $phone
  	);
  	
  	$arFields = array('NAME' => $name, 'PHONE' => $phone);

	if ($request_id = $el->Add($arLoadRequestArray))
	{
  		echo json_encode(['success' => true, 'message' => 'Ваша заявка отправлена']);
  		if($iblockId == 8) $MESSAGE_TYPE = 'CALL_ORDER';
  		if($iblockId == 7) $MESSAGE_TYPE = 'CONSULT_ORDER';
  		CEvent::Send($MESSAGE_TYPE, array(SITE_ID), $arFields);
	}
	else
	{
	  	echo json_encode(['success' => false, 'message' => $el->LAST_ERROR]);
	}
} else {
	echo json_encode(['success' => false, 'message' => "Некорректные данные"]);
}