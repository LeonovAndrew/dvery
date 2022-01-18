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