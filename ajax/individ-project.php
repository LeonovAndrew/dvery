<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
$arResul['sus']=true;

$phone = htmlspecialchars($_REQUEST['phone']);

// Инициализируем CForm для работы с веб-формами
$arFields = array('PHONE' => $phone);
if(CEvent::Send('INDIVIDUAL_PROJEKT', array(SITE_ID), $arFields)){
    $arResul['sus']=true;
}
echo json_encode($arResul);
