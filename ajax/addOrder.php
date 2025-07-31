<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->RestartBuffer();

CModule::IncludeModule('iblock');

$iblockId = intval($_POST['IBLOCK_ID']);
$name = htmlspecialchars($_POST['NAME']);
$phone = htmlspecialchars($_POST['PHONE']);
$product = intval($_POST['PRODUCT']);
$design = intval($_POST['DESIGN']);
if ($iblockId == 18) {
    // Создаем массив с данными для формы
    $arFields = array(
        'form_text_252' => $name,       // Поле для имени
        'form_text_253' => $phone,      // Поле для телефона
        'form_text_254' => $_POST['PRODUCT_ONE_CL'], // Поле для продукта (без htmlspecialchars, если ожидается ID)
         'STATUS_ID' => '1'
    );

    // Инициализируем CForm для работы с веб-формами
    if (CModule::IncludeModule('form')) {
        // Укажите ID вашей веб-формы вместо WEB_FORM_ID
        $FORM_ID = 11;
        if ($RESULT_ID = CFormResult::Add($FORM_ID, $arFields)) {
            // При необходимости можно выполнить дополнительные действия после успешного сохранения
            // Например, отправить уведомление
        } else {
            // Обработка ошибки сохранения
            global $strError;
            echo $strError;
        }
        // Отправляем данные в форму
    }
}
if ($iblockId > 0 && $phone) {
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

  	///$arFields = array('NAME' => $name, 'PHONE' => $phone, 'DESIGN' => $design, 'PRODUCT' => $product); htmlspecialchars($_POST['PRODUCT']
  	$arFields = array('NAME' => $name, 'PHONE' => $phone, 'DESIGN' => $design, 'PRODUCT' => htmlspecialchars($_POST['PRODUCT_ONE_CL']));
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