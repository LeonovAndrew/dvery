<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 14.06.2017
 * Time: 13:15
 *
 * @author Pavel Shulaev (https://rover-it.me)
 */
use Rover\AmoCRM\Model\Source\PostEvent;
use Rover\AmoCRM\Model\Source\WebForm;

$MESS['rover-apl__presets']     = 'Профиль интеграции';
$MESS['rover-apl__show']        = 'Показать';
$MESS['rover-apl__all']         = 'Всего';
$MESS['rover-apl__check']       = 'выбрать';
$MESS['rover-apl__activate']    = 'активировать';
$MESS['rover-apl__deactivate']  = 'деактивировать';
$MESS['rover-apl__delete']      = 'удалить';

$MESS['rover-acrm__title']                                  = 'Добавление нового профиля интеграции';
$MESS['rover-acrm__connection_select']                      = 'Выберите подключение';
$MESS['rover-acrm__' . WebForm::getType() . '_select']     = 'Выберите веб-форму';
$MESS['rover-acrm__' . PostEvent::getType() . '_select']   = 'Выберите почтовое событие';
$MESS['rover-acrm__connection_empty']                       = 'Не найдено ни одного доступного подключения к amoCRM. <a target="_blank" href="/bitrix/admin/rover-acrm__connection-list.php?lang=' . LANGUAGE_ID . '">Перейти к списку</a>.';
$MESS['rover-acrm__' . WebForm::getType() . '_empty']     = 'Не найдено ни одной веб-формы. <a target="_blank" href="/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID . '">Перейти к списку</a>';
$MESS['rover-acrm__' . PostEvent::getType() . '_empty']   = 'Не найдено ни однго почтового события. <a target="_blank" href="/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID . '">Перейти к списку</a>';
$MESS['rover-acrm__button_close']   = 'Закрыть';
$MESS['rover-acrm__button_add']   = 'Создать';