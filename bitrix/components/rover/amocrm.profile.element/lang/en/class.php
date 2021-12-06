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
use \Rover\AmoCRM\Model\Rest;
use \Rover\AmoCRM\Config\Tabs;

$MESS['rover-acpe__title']                   = 'Editing an integration profile В«#name#В»';
$MESS['rover-acpe__action-remove']           = 'Remove';
$MESS['rover-acpe__action-remove_title']     = 'Remove checked elements';
$MESS['rover-acpe__action-confirm']          = 'Confirm action for checked elements';
$MESS['rover-acpe__action-update']           = 'Update';
$MESS['rover-acpe__action-elements']         = 'Results (#cnt#)';
$MESS['rover-acpe__action-elements_title']   = 'Profile\'s results';
$MESS['rover-acpe__action-cancel']           = 'Cancel';
$MESS['rover-acpe__action-back']             = 'To the list of profiles (#cnt#)';
$MESS['rover-acpe__action-back_title']       = 'Return to the list of integration profiles';
$MESS['rover-acpe__action-connections']      = 'AmoCRM connections (#cnt#)';
$MESS['rover-acpe__action-connections_title']= 'AmoCRM connections list';
$MESS['rover-acpe__action-settings']         = 'Module settings';
$MESS['rover-acpe__action-settings_title']   = 'Module settings';
$MESS['rover-acpe__connection-unavailable'] = 'Connection unavailable';
$MESS['rover-acpe__to-list']                 = '<a href="/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID . '">Back to list</a>';
$MESS['rover-acpe__insert-placeholders']    = '&nbsp;<a href="#" onclick="RoverAmoCrmPlaceholder.openPopup(\'#elementId#\'); return false;">placeholders</a><div id="#elementId#_placeholders" style="display: none">#content#</div>';

$MESS['rover-acpe__header-fields-auto-' . Rest\Lead::getType()]                 = 'Main';
$MESS['rover-acpe__header-fields-auto-' . Rest\Contact::getType()]              = 'Main';
$MESS['rover-acpe__header-fields-auto-' . Rest\Company::getType()]              = 'Main';
$MESS['rover-acpe__header-fields-auto-' . Rest\Task::getType()]                 = 'Main';
$MESS['rover-acpe__header-fields-auto-' . Rest\Lead::getType() . '-help']       = 'on the left вЂ” the value of the event field, on the right вЂ” the lead field in amoCRM';
$MESS['rover-acpe__header-fields-auto-' . Rest\Contact::getType() . '-help']    = 'on the left вЂ” the value of the event field, on the right вЂ” the contact field in amoCRM';
$MESS['rover-acpe__header-fields-auto-' . Rest\Company::getType() . '-help']    = 'on the left вЂ” the value of the event field, on the right вЂ” the company field in amoCRM';
$MESS['rover-acpe__header-fields-auto-' . Rest\Task::getType() . '-help']       = 'on the left вЂ” the value of the event field, on the right вЂ” the task field in amoCRM';

$MESS['rover-acpe__header-fields-custom-' . Rest\Lead::getType()]               = 'Preset values such as "list"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Contact::getType()]            = 'Preset values such as "list"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Company::getType()]            = 'Preset values such as "list"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Task::getType()]               = 'Preset values such as "list"';
$MESS['rover-acpe__header-fields-custom-' . Rest\Lead::getType() . '-help']     = 'left вЂ” lead field in amoCRM, right вЂ” set value';
$MESS['rover-acpe__header-fields-custom-' . Rest\Contact::getType() . '-help']  = 'left вЂ” contact field in amoCRM, right вЂ” set value';
$MESS['rover-acpe__header-fields-custom-' . Rest\Company::getType() . '-help']  = 'left вЂ” company field in amoCRM, right вЂ” set value';
$MESS['rover-acpe__header-fields-custom-' . Rest\Task::getType() . '-help']     = 'left вЂ” task field in amoCRM, right - set value';

$MESS['rover-acpe__header-fields-add-' . Rest\Task::getType()]    = 'Additional fields';
$MESS['rover-acpe__header-fields-add-' . Rest\Contact::getType()] = 'Additional fields';
$MESS['rover-acpe__header-fields-add-' . Rest\Company::getType()] = 'Additional fields';
$MESS['rover-acpe__header-fields-add-' . Rest\Lead::getType()]    = 'Additional fields';
$MESS['rover-acpe__header-fields-add-' . Rest\Task::getType(). '-help']    = 'on the left вЂ” the value of the additional field of the event, on the right вЂ” the task field in amoCRM';
$MESS['rover-acpe__header-fields-add-' . Rest\Contact::getType(). '-help'] = 'on the left вЂ” the value of the additional field of the event, on the right вЂ” the contact field in amoCRM';
$MESS['rover-acpe__header-fields-add-' . Rest\Company::getType(). '-help'] = 'on the left вЂ” the value of the additional field of the event, on the right вЂ” the company field in amoCRM';
$MESS['rover-acpe__header-fields-add-' . Rest\Lead::getType(). '-help']    = 'on the left вЂ” the value of the additional field of the event, on the right вЂ” the lead field in amoCRM';

$MESS['rover-acpe__header-fields-adv-' . Rest\Task::getType()]    = 'Marks of advertising campaigns and analytics';
$MESS['rover-acpe__header-fields-adv-' . Rest\Contact::getType()] = 'Marks of advertising campaigns and analytics';
$MESS['rover-acpe__header-fields-adv-' . Rest\Company::getType()] = 'Marks of advertising campaigns and analytics';
$MESS['rover-acpe__header-fields-adv-' . Rest\Lead::getType()]    = 'Marks of advertising campaigns and analytics';
$MESS['rover-acpe__header-fields-adv-' . Rest\Task::getType() . '-help']    = 'on the left - available marks for advertising campaigns and analytics, on the right - task fields in amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>customize marks</a>';
$MESS['rover-acpe__header-fields-adv-' . Rest\Contact::getType() . '-help'] = 'on the left - available marks for advertising campaigns and analytics, on the right - contact fields in amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>customize marks</a>';
$MESS['rover-acpe__header-fields-adv-' . Rest\Company::getType() . '-help'] = 'on the left - available marks for advertising campaigns and analytics, on the right - company fields in amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>customize marks</a>';
$MESS['rover-acpe__header-fields-adv-' . Rest\Lead::getType() . '-help']    = 'on the left - available marks for advertising campaigns and analytics, on the right - lead fields in amoCRM<br><a target=\'_blank\' href=\'/bitrix/admin/settings.php?mid=rover.amocrm&lang=' . LANGUAGE_ID .'&tabControl_active_tab=' . Tabs::TAB__ADD . '\'>customize marks</a>';
$MESS['rover-acpe__header-fields-adv-all']      = '(all)';

$MESS['rover-acpe__field-' . Tabs::MAPPING_SUBTABCONROL . '_label']         = 'Fields mapping';
$MESS[Tabs::LEAD_SALE . '_label']                                           = 'Budget';
$MESS['name_' . EntityTypesInterface::CONTACTS . '_label']                  = 'Contact\'s name';
$MESS['name_' . EntityTypesInterface::COMPANIES . '_label']                 = 'Company\'s name';

$MESS['rover-acpe__header-duplicates-' . EntityTypesInterface::CONTACTS]    = 'Duplicates control';
$MESS['rover-acpe__header-duplicates-' . EntityTypesInterface::COMPANIES]   = 'Duplicates control';
$MESS['rover-acpe__header-duplicates-' . EntityTypesInterface::LEADS]       = 'Duplicates control';

$MESS['rover-acpe__duplicate-control-label']       = 'Control duplicates';
$MESS['rover-acpe__duplicate-control-' . EntityTypesInterface::LEADS . '-help']   = 'Inclusion of this function can slow down the response of the system with a large number of already existing leads. To solve this problem, it is recommended to defer integration to the agent. At the same time, agents on the site <u>must</ u> have to be <a target="_blank" href="https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943">translated on cron</a>.';
$MESS['rover-acpe__duplicate-control-' . EntityTypesInterface::CONTACTS . '-help']= 'Inclusion of this function can slow down the response of the system with a large number of already existing contacts. To solve this problem, it is recommended to defer integration to the agent. At the same time, agents on the site <u>must</ u> have to be <a target="_blank" href="https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943">translated on cron</a>.';
$MESS['rover-acpe__duplicate-control-' . EntityTypesInterface::COMPANIES . '-help']= 'Inclusion of this function can slow down the response of the system with a large number of already existing companies. To solve this problem, it is recommended to defer integration to the agent. At the same time, agents on the site <u>must</ u> have to be <a target="_blank" href="https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943">translated on cron</a>.';
$MESS['rover-acpe__duplicate-fields-label']        = 'Search by fields';
$MESS['rover-acpe__duplicate-fields-help']         = 'At least one field must be selected';
$MESS['rover-acpe__duplicate-logic-label']         = 'Search by match';
$MESS['rover-acpe__duplicate-logic-' . Duplicate::LOGIC__AND . '_label']    = 'of all selected fields';
$MESS['rover-acpe__duplicate-logic-' . Duplicate::LOGIC__OR . '_label']     = 'any of the selected fields';
$MESS['rover-acpe__duplicate-action-label']        = 'If a duplicate is found';
$MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__ADD_NOTE . '_label']   = 'Add a note with reference to the original';
$MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__COMBINE . '_label']    = 'Update original with duplicate data';
$MESS['rover-acpe__duplicate-action-' . Duplicate::ACTION__SKIP . '_label']       = 'Do not create duplicate';

$MESS['rover-acpe__duplicate-' . Duplicate::STATUS . '_label']          = 'Search in statuses';
$MESS['rover-acpe__duplicate-' . Duplicate::STATUS . '_help']           = 'Limits the scope of duplicate search by leads in selected statuses.';
$MESS['rover-acpe__duplicate-' . Duplicate::CONTACT . '_label']         = 'Search only for contact\'s leads';
$MESS['rover-acpe__duplicate-' . Duplicate::CONTACT . '_help']          = 'Limits the scope of duplicate search by the leads of the created contact. For the created contact, the duplicate control in modes В«' . $MESS[Duplicate::ACTION__COMBINE . '_label'] . 'В» or В«' . $MESS[Duplicate::ACTION__SKIP . '_label'] . 'В».';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_NAME . '_label']     = 'Update duplicate name';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_NAME . '_help']      = 'Works if action В«' . $MESS[Duplicate::ACTION__COMBINE . '_label'] . 'В» is selected';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_STATUS . '_label']   = 'Update duplicate status';
$MESS['rover-acpe__duplicate-' . Duplicate::UPDATE_STATUS . '_help']    = 'Works if action В«' . $MESS[Duplicate::ACTION__COMBINE . '_label'] . 'В» is selected';
$MESS['rover-acrm__duplicate_action_unsorted_help']                     = 'When creating a lead in В«UnsortedВ», notes with links to duplicates will be added.';

$MESS['rover-acpe__header-main']                                    = 'Common settings';
$MESS['rover-acpe__field-' . Profile::UF_ACTIVE . '_help']          = 'Enable/disable the current integration profile';
$MESS['rover-acpe__field-' . Profile::UF_NAME . '_help']            = 'Source: #type#<br>Connection: #connection#';
$MESS['rover-acpe__field-' . Profile::UF_SITES_IDS . '_help']       = 'If is empty, profile works on all sites';
$MESS['rover-acpe__field-' . Profile::UF_RESPONSIBLE_LIST . '_help']= 'This user will be appointed responsible for the created lead, contact and company. He will also be given the task to be created.<br>f several users are selected, they will be appointed in turn.';
$MESS['rover-acpe__field-' . Profile::UF_COMMON_TAGS . '_help']     = 'adds to all created objects.';
$MESS['rover-acpe__field-' . Profile::UF_GROUP_NOTES . '_help']     = 'Instead of a lot of notes, one note with sum of information will be added to the lead and contact.';
$MESS['rover-acpe__field-' . Profile::UF_HIT_DUPLICATES . '_help']  = 'Helps you get rid of duplication when integrating a post event by sending a web form and in some other cases.';

$MESS['rover-acpe__header-order']                                                   = 'Order';
$MESS['rover-acpe__header-fields-bx-to-amo-order']                                  = 'Sync Bitrix to amoCRM';
$MESS['rover-acpe__header-fields-amo-to-bx-order']                                  = 'Sync amoCRM to Bitrix';
$MESS['rover-acpe__header-fields-statuses-mapping-order']                           = 'Statuses Mapping';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_STATUSES . '_help']           = 'Synchronized according to the mapping settings';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_PRODUCTS . '_help']           = 'Products will be transferred from the order. If there are no such ones in AMO yet, then new ones will be created.';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_PRODUCTS . '_unsorted_help']  = 'Not added when creating a lead in "unsorted"';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_STATUSES . '_help']           = 'Synchronized according to the mapping settings';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_PRODUCTS . '_help']           = 'Synchronization by quantity and availability';
$MESS['rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_PRODUCTS . '_unsorted_help']  = 'Not added when creating a lead in "unsorted"';
$MESS['rover-acpe__field-' . Tabs::ORDER_STATUSES_MAPPING_CANCELLED . '_label']     = '[the cancel flag]';

$MESS['rover-acpe__header-' . Rest\Lead::getType()]       = 'Lead';

$MESS['rover-acpe__field-' . Profile::UF_LEAD_CREATE . '_help']             = 'The lead will be connected to the contact, if it is also created';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_NAME . '_help']               = 'If the field is empty, the value is taken by default.';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_multy']   = 'Pipeline and status';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_single']  = 'Status';
$MESS['rover-acpe__field-' . Profile::UF_LEAD_VISITOR_UID . '_help']        = 'Allows you to track the visitor in the autopipelines. Read more in <a href="https://www.amocrm.com/developers/content/digital_pipeline/site_visit" target="_blank">documentation of amoCRM</a>';

$MESS['rover-acpe__header-' . EntityTypesInterface::CONTACTS]    = 'Contact';
$MESS['rover-acpe__header-' . EntityTypesInterface::COMPANIES]    = 'Company';

$MESS['rover-acpe__header-' . Rest\Task::getType()]       = 'Task';
$MESS['rover-acpe__header-' . Rest\Task::getType() . '-disabled'] = 'Task (disabled, because lead creates in "Unsorted" status")';
$MESS['rover-acpe__field-' . Profile::UF_TASK_CREATE . '_help']         = 'The contact or transaction must be tied to the task. If a contact or transaction is not created, the task will not be created either';
$MESS['rover-acpe__field-' . Profile::UF_TASK_ELEMENT_TYPE . '_help']   = 'The task will be bound to the selected entity if it exists. Otherwise, the first existing one will be chosen: lead, contact, company';
$MESS['rover-acpe__field-' . Profile::UF_TASK_TEXT . '_fields']         = 'The values of the passed fields are separated by commas';
$MESS['rover-acpe__field-' . Profile::UF_TASK_TEXT . '_help']           = 'In the absence of a placeholder #FIELDS#, the values will be added to the end of the text';
$MESS['rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_help']       = 'Please, make sure that the time zones of your site and amoCrm are synchronized';
$MESS['rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_now']        = 'At the time of setting the task';
$MESS['rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_day-end']    = 'At 11:59 pm the current day';
$MESS['rover-acpe__entity-' . Rest\Contact::getType() . '_label']       = 'contact';
$MESS['rover-acpe__entity-' . Rest\Lead::getType() . '_label']          = 'lead';
$MESS['rover-acpe__entity-' . Rest\Company::getType() . '_label']       = 'company';