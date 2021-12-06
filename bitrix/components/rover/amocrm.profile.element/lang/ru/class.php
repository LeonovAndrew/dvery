<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 14.06.2017
 * Time: 11:47
 *
 * @author Pavel Shulaev (https://rover-it.me)
 */

use AmoCRM\Helpers\EntityTypesInterface;
use Rover\AmoCRM\Controller\Duplicate;
use Rover\AmoCRM\Directory\Entity\Profile;
use Rover\AmoCRM\Model\Rest;
use Rover\AmoCRM\Config\Tabs;

$MESS['rover-acpe__title']                      = 'Редактирование профиля интеграции «#name#»';
$MESS['rover-acpe__action-remove']              = 'Удалить';
$MESS['rover-acpe__action-remove_title']        = 'Удалить отмеченные элементы';
$MESS['rover-acpe__action-confirm']             = 'Подтвердите действие для отмеченных элементов';
$MESS['rover-acpe__action-update']              = 'Изменить';
$MESS['rover-acpe__action-elements']            = 'Результаты (#cnt#)';
$MESS['rover-acpe__action-elements_title']      = 'Результаты профиля';
$MESS['rover-acpe__action-cancel']              = 'Отменить';
$MESS['rover-acpe__action-back']                = 'К списку профилей (#cnt#)';
$MESS['rover-acpe__action-back_title']          = 'Вернуться к списку профилей интеграции';
$MESS['rover-acpe__action-connections']         = 'Подключения к amoCRM (#cnt#)';
$MESS['rover-acpe__action-connections_title']   = 'Список подключений к amoCRM';
$MESS['rover-acpe__action-settings']            = 'Настройки';
$MESS['rover-acpe__action-settings_title']      = 'Настройки модуля интеграции';
$MESS['rover-acpe__connection-unavailable']     = 'Подключение недоступно';
$MESS['rover-acpe__to-list']                    = '<a href="/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID . '">Вернуться к списку</a>';
$MESS['rover-acpe__insert-placeholders']        = '&nbsp;<a href="#" onclick="RoverAmoCrmPlaceholder.openPopup(\'#elementId#\'); return false;">плейсхолдеры</a><div id="#elementId#_placeholders" style="display: none">#content#</div>';

$MESS['rover-acpe__header-fields-auto-' . Rest\Lead::getType()]                 = 'Основные';
$MESS['rover-acpe__header-fields-auto-' . Rest\Contact::getType()]              = 'Основные';
$MESS['rover-acpe__header-fields-auto-' . Rest\Company::getType()]              = 'Основные';
$MESS['rover-acpe__header-fields-auto-' . Rest\Task::getType()]                 = 'Основные';
$MESS['rover-acpe__header-fields-auto-' . Rest\Lead::getType() . '-help']       = 'слева — поля события, справа — поля сделки в amoCRM';
$MESS['rover-acpe__header-fields-auto-' . Rest\Contact::getType() . '-help']    = 'слева — поля события, справа — поля контакта в amoCRM';
$MESS['rover-acpe__header-fields-auto-' . Rest\Company::getType() . '-help']    = 'слева — поля события, справа — поля компании в amoCRM';
$MESS['rover-acpe__header-fields-auto-' . Rest\Task::getType() . '-help']       = 'слева — поля события, справа — поля задачи в amoCRM';

$MESS['rover-acpe__header-fields-custom-' . Rest\Lead::getType()]               = 'Предустановленные значения типа "список"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Contact::getType()]            = 'Предустановленные значения типа "список"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Company::getType()]            = 'Предустановленные значения типа "список"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Task::getType()]               = 'Предустановленные значения типа "список"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Lead::getType() . '-help']     = 'слева — поля типа \'список\' сделки в amoCRM, справа — возможные устанавливаемые значения';
$MESS['rover-acpe__header-fields-custom-' . Rest\Contact::getType() . '-help']  = 'слева — поля типа \'список\' контакта в amoCRM, справа — возможные устанавливаемые значения';
$MESS['rover-acpe__header-fields-custom-' . Rest\Company::getType() . '-help']  = 'слева — поля типа \'список\' компании в amoCRM, справа — возможные устанавливаемые значения';
$MESS['rover-acpe__header-fields-custom-' . Rest\Task::getType() . '-help']     = 'слева — поля типа \'список\' задачи в amoCRM, справа — возможные устанавливаемые значения';

$MESS['rover-acpe__header-fields-add-' . Rest\Task::getType()]    = 'Дополнительные поля';
$MESS['rover-acpe__header-fields-add-' . Rest\Contact::getType()] = 'Дополнительные поля';
$MESS['rover-acpe__header-fields-add-' . Rest\Company::getType()] = 'Дополнительные поля';
$MESS['rover-acpe__header-fields-add-' . Rest\Lead::getType()]    = 'Дополнительные поля';
$MESS['rover-acpe__header-fields-add-' . Rest\Task::getType() . '-help']    = 'слева — дополнительные поля события, справа — поля задачи в amoCRM';
$MESS['rover-acpe__header-fields-add-' . Rest\Contact::getType() . '-help'] = 'слева — дополнительные поля события, справа — поля контакта в amoCRM';
$MESS['rover-acpe__header-fields-add-' . Rest\Company::getType() . '-help'] = 'слева — дополнительные поля события, справа — поля компании в amoCRM';
$MESS['rover-acpe__header-fields-add-' . Rest\Lead::getType() . '-help']    = 'слева — дополнительные поля события, справа — поля сделки в amoCRM';

$MESS['rover-acpe__header-fields-adv-' . Rest\Task::getType()]    = 'Метки рекламных кампаний и аналитики';
$MESS['rover-acpe__header-fields-adv-' . Rest\Contact::getType()] = 'Метки рекламных кампаний и аналитики';
$MESS['rover-acpe__header-fields-adv-' . Rest\Company::getType()] = 'Метки рекламных кампаний и аналитики';
$MESS['rover-acpe__header-fields-adv-' . Rest\Lead::getType()]    = 'Метки рекламных кампаний и аналитики';
$MESS['rover-acpe__header-fields-adv-' . Rest\Task::getType() . '-help']    = 'слева — доступные метки РК и аналитики, справа — поля задачи в amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>настроить метки</a>';
$MESS['rover-acpe__header-fields-adv-' . Rest\Contact::getType() . '-help'] = 'слева — доступные метки РК и аналитики, справа — поля контакта в amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>настроить метки</a>';
$MESS['rover-acpe__header-fields-adv-' . Rest\Company::getType() . '-help'] = 'слева — доступные метки РК и аналитики, справа — поля компании в amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>настроить метки</a>';
$MESS['rover-acpe__header-fields-adv-' . Rest\Lead::getType() . '-help']    = 'слева — доступные метки РК и аналитики, справа — поля сделки в amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>настроить метки</a>';
$MESS['rover-acpe__header-fields-adv-all']      = '(все)';

$MESS['rover-acpe__field-' . Tabs::MAPPING_SUBTABCONROL . '_label']      = 'Маппинг полей';
$MESS[Tabs::LEAD_SALE . '_label']                           = 'Бюджет';
$MESS['name_' . EntityTypesInterface::CONTACTS .  '_label'] = 'Имя контакта';
$MESS['name_' . EntityTypesInterface::COMPANIES . '_label'] = 'Название компании';

$MESS['rover-acpe__header-duplicates-' . EntityTypesInterface::CONTACTS ] = 'Контроль дубликатов нового контакта';
$MESS['rover-acpe__header-duplicates-' . EntityTypesInterface::COMPANIES] = 'Контроль дубликатов новой компании';
$MESS['rover-acpe__header-duplicates-' . EntityTypesInterface::LEADS]    = 'Контроль дубликатов новой сделки';

$MESS['rover-acpe__duplicate-control-label']        = 'Контролировать дубликаты';
$MESS['rover-acpe__duplicate-control-' . EntityTypesInterface::LEADS . '-help']       = 'При большом количестве уже существующих сделок, влючение этого функцинала может замедлить отклик сайта. Для ускорения отклика рекомендуется отложить <a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID . '&tabControl_active_tab=agents\'>обработку новых событий на агента</a>. При этом агенты на сайте <u>обязательно</u> должны быть <a target="_blank" href="https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943">переведены на cron</a>.';
$MESS['rover-acpe__duplicate-control-' . EntityTypesInterface::CONTACTS . '-help']    = 'При большом количестве уже существующих контактов, включение этого функцинала может замедлить отклик сайта. Для ускорения отклика рекомендуется отложить <a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID . '&tabControl_active_tab=agents\'>обработку новых событий на агента</a>. При этом агенты на сайте <u>обязательно</u> должны быть <a target="_blank" href="https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943">переведены на cron</a>.';
$MESS['rover-acpe__duplicate-control-' . EntityTypesInterface::COMPANIES . '-help'] = 'При большом количестве уже существующих компаний, включение этого функцинала может замедлить отклик сайта. Для ускорения отклика рекомендуется отложить <a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID . '&tabControl_active_tab=agents\'>обработку новых событий на агента</a>. При этом агенты на сайте <u>обязательно</u> должны быть <a target="_blank" href="https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943">переведены на cron</a>.';
$MESS['rover-acpe__duplicate-fields-label']         = 'Искать по полям';
$MESS['rover-acpe__duplicate-fields-help']          = 'Должно быть выбрано хотя бы одно поле, иначе поиск осуществлён не будет';
$MESS['rover-acpe__duplicate-logic-label'] = 'Искать по совпадению';
$MESS['rover-acpe__duplicate-logic-' . Duplicate::LOGIC__AND . '_label']    = 'всех выбранных полей';
$MESS['rover-acpe__duplicate-logic-' . Duplicate::LOGIC__OR . '_label']     = 'любого из выбранных полей';
$MESS['rover-acpe__duplicate-action-label']         = 'Действие при обнаружении дубликата';
$MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__ADD_NOTE . '_label']   = 'Добавить примечание со ссылками на дубликаты';
$MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__COMBINE . '_label']    = 'Обновить и использовать самый первый из найденных дубликатов';
$MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__SKIP . '_label']       = 'Использовать самый первый из найденных дубликатов без обновления';

$MESS['rover-acpe__duplicate-' . Duplicate::STATUS . '_label']          = 'Искать в этапах';
$MESS['rover-acpe__duplicate-' . Duplicate::STATUS . '_help']           = 'Ограничивает область поиска дубликатов сделками в указанных воронках и этапах.';
$MESS['rover-acpe__duplicate-' . Duplicate::CONTACT . '_label']         = 'Ограничить область поиска существующими сделками контакта';
$MESS['rover-acpe__duplicate-' . Duplicate::CONTACT . '_help']          = 'На вкладке "Контакт" <u>обязательно</u> должен быть включен контроль дубликатов в режимах <i>«' . $MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__COMBINE . '_label'] . '»</i> или <i>«' . $MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__SKIP . '_label'] . '»</i>, иначе не будет найден контакт и, соответственно, дубликаты его сделок.';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_NAME . '_label']     = 'Обновить название дубликата';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_NAME . '_help']      = 'Работает, если выбрано действие «' . $MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__COMBINE . '_label'] . '»';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_STATUS . '_label']   = 'Обновить статус дубликата';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_STATUS . '_help']    = 'Работает, если выбрано действие «' . $MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__COMBINE . '_label'] . '»';
$MESS['rover-acrm__duplicate_action_unsorted_help']                     = 'При создании сделки в «неразобранном» будут добавлены примечания со ссылками на дубликаты.';

$MESS['rover-acpe__header-main']                                    = 'Общие настройки';
$MESS['rover-acpe__field-' . Profile::UF_ACTIVE . '_help']          = 'Включение/отключение текущего профиля интеграции';
$MESS['rover-acpe__field-' . Profile::UF_NAME . '_help']            = 'Источник: #type#<br>Подключение: #connection#';
$MESS['rover-acpe__field-' . Profile::UF_SITES_IDS . '_help']       = 'Если не выбран ни один сайт, профиль будет работать на всех';
$MESS['rover-acpe__field-' . Profile::UF_RESPONSIBLE_LIST . '_help']= 'Пользователь будет назначен ответственным за создаваемые сделки, контакты и компании. Также ему будет ставиться создаваемая задача.<br>Если выбрано несколько пользователей, они будут назначаться по очереди.';
$MESS['rover-acpe__field-' . Profile::UF_COMMON_TAGS . '_help']     = 'Должны быть указаны через запятую.<br>Будут добавлены к сделкам, контактам и компаниям.';
$MESS['rover-acpe__field-' . Profile::UF_GROUP_NOTES . '_help']     = 'К сделке, контакту и компании будет добавлено по одному примечанию, группирующему общую информацию.<br>В группировке участвуют только те поля, для которых настроена передача в примечание в маппинге.';
$MESS['rover-acpe__field-' . Profile::UF_HIT_DUPLICATES . '_help']  = 'Помогает избавиться от дублей в amoCRM, если на одном хите событие вызывается несколько раз.';

$MESS['rover-acpe__header-order']                                                   = 'Заказ';
$MESS['rover-acpe__header-fields-bx-to-amo-order']                                  = 'Синхронизация в направлении интернет-магазин — amoCRM';
$MESS['rover-acpe__header-fields-amo-to-bx-order']                                  = 'Синхронизация в направлении amoCRM — интернет-магазин';
$MESS['rover-acpe__header-fields-statuses-mapping-order']                           = 'Маппинг статусов';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_STATUSES . '_help']           = 'Синхронизируются согласно настройкам маппинга';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_PRODUCTS . '_help']           = 'Товары будут переданы из заказа. Если в амо таких еще нет, то будут созданы новые.';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_PRODUCTS . '_unsorted_help']  = 'Не добавляются при создании сделки в «неразобранном»';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_STATUSES . '_help']           = 'Синхронизируются согласно настройкам маппинга';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_PRODUCTS . '_help']           = 'Синхронизация по количеству и наличию';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_PRODUCTS . '_unsorted_help']  = 'Не добавляются при создании сделки в «неразобранном»';
$MESS['rover-acpe__field-' . Tabs::ORDER_STATUSES_MAPPING_CANCELLED . '_label']     = '[флаг отмены]';

$MESS['rover-acpe__header-' . Rest\Lead::getType()]                         = 'Сделка';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_CREATE . '_help']             = 'Сделка будет привязана к контакту, в случае его создания.<br>При добавлении в «Неразобранное» сделка будет создаваться всегда, согласно своим настройкам.';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_NAME . '_help']               = 'Если поле пустое, берется значение по-умолчанию';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_multy']   = 'Воронка и этап';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_single']  = 'Этап';
$MESS['rover-acpe__field-contacts_id_label']                                = 'Привязанные контакты';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_VISITOR_UID . '_help']        = 'Позволяет отслеживать посетителя в автоворонках. Подробнее в <a href="https://www.amocrm.ru/developers/content/digital_pipeline/site_visit" target="_blank">документации amoCRM</a>';

$MESS['rover-acpe__header-' . EntityTypesInterface::CONTACTS]   = 'Контакт';
$MESS['rover-acpe__header-' . EntityTypesInterface::COMPANIES]  = 'Компания';

$MESS['rover-acpe__header-' . Rest\Task::getType()]                     = 'Задача';
$MESS['rover-acpe__header-' . Rest\Task::getType() . '-disabled']       = 'Задача (отключено, т.к. сделка создаётся в «неразобранном»)';
$MESS['rover-acpe__field-' . Profile::UF_TASK_CREATE . '_help']         = 'К задаче должны быть привязаны контакт или сделка. Если ни контакт ни сделка созданы не будут, задача так же не будет создана';
$MESS['rover-acpe__field-' . Profile::UF_TASK_ELEMENT_TYPE . '_help']   = 'Задача будет привязана к выбранной сущности в случае ее наличия. В противном случае будет выбрана первая из существующих: сделка, контакт, компания';
$MESS['rover-acpe__field-' . Profile::UF_TASK_TEXT . '_fields']         = 'Значения переданных полей через запятую';
$MESS['rover-acpe__field-' . Profile::UF_TASK_TEXT . '_help']           = 'В случае отсутствия плейсхолдера #FIELDS#, значения будут добавлены в конец текста';
$MESS['rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_help']       = 'Пожалуйста, убедитесь, что часовые пояса Вашего сайта и амоСрм синхронизированы';
$MESS['rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_now']        = 'В момент постановки задачи';
$MESS['rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_day-end']    = 'В 23:59 текущего дня';
$MESS['rover-acpe__entity-' . Rest\Contact::getType() . '_label']       = 'контакт';
$MESS['rover-acpe__entity-' . Rest\Lead::getType() . '_label']          = 'сделка';
$MESS['rover-acpe__entity-' . Rest\Company::getType() . '_label']       = 'компания';