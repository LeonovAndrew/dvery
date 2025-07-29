<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->RestartBuffer();

CModule::IncludeModule('iblock');

$iblockId = intval($_POST['IBLOCK_ID']);
$name = strip_tags($_POST['NAME']);
$phone = strip_tags($_POST['PHONE']);

function codeOutput($text)
{
	return '<div style="text-align:center"><span class="text-type-4 text-bold">'.$text.'</span><br><br><span class="text-type-1">Предъявите код менеджеру при покупке дверей</span></div>';
}

if ($name && $phone) {
	
	$rsElement = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 31, 'PROPERTY_PHONE' => $phone), false, false, array('PROPERTY_CODE'));
	if($rsElement->SelectedRowsCount() > 0)
	{
		$arElement=$rsElement->Fetch();
	  	echo json_encode(['success' => true, 'message' => codeOutput($arElement['PROPERTY_CODE_VALUE'])]);
		
	}else {
		$el = new CIBlockElement;
	
		$promokod = randString(6, array("ABCDEFGHIJKLNMPQRSTUVWXYZ","123456789"));
		
		$PROP = array(
			'PHONE' => $phone,
			'CODE' => $promokod
		);
	
		$arLoadRequestArray = Array(
			"IBLOCK_ID"   => 31,
			"NAME"        => $name,
			"PROPERTY_VALUES" => $PROP,
	  	);
	  	
	  	$arFields = array('NAME' => $name, 'PHONE' => $phone);
	
		if ($request_id = $el->Add($arLoadRequestArray))
		{
	  		echo json_encode(['success' => true, 'message' => codeOutput($promokod)]);
		}
		else
		{
		  	echo json_encode(['success' => false, 'message' => $el->LAST_ERROR]);
		}
	}
} else {
	echo json_encode(['success' => false, 'message' => "Некорректные данные"]);
}