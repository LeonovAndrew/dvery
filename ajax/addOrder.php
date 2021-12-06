<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->RestartBuffer();

CModule::IncludeModule('iblock');

$iblockId = intval($_POST['IBLOCK_ID']);
$name = htmlspecialchars($_POST['NAME']);
$phone = htmlspecialchars($_POST['PHONE']);
$product = intval($_POST['PRODUCT']);
$design = intval($_POST['DESIGN']);

if ($iblockId > 0 && $name && $phone) {
	$el = new CIBlockElement;

	$PROP = array(
		"PRODUCT" => $product,
		"DESIGN" => $design
	);

	$arLoadRequestArray = Array(
		"IBLOCK_ID"   => $iblockId,
		"NAME"        => $name,
		"CODE"        => $phone,
		"PROPERTY_VALUES" => $PROP
  	);

  	$arFields = array('NAME' => $name, 'PHONE' => $phone, 'DESIGN' => $design, 'PRODUCT' => $product);
  	
	if ($request_id = $el->Add($arLoadRequestArray))
	{
  		echo json_encode(['success' => true, 'message' => 'Ваш заказ отправлен']);
  		CEvent::Send('ADD_ORDER', array(SITE_ID), $arFields);
	}
	else
	{
	  	echo json_encode(['success' => false, 'message' => $el->LAST_ERROR]);
	}
} else {
	echo json_encode(['success' => false, 'message' => "Некорректные данные"]);
}