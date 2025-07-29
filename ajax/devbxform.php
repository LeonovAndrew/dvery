<?php

define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('NOT_CHECK_PERMISSIONS', true);
define("NO_AGENT_CHECK", true);

$siteId = isset($_REQUEST['SITE_ID']) && is_string($_REQUEST['SITE_ID']) ? $_REQUEST['SITE_ID'] : '';
$siteId = mb_substr(preg_replace('/[^a-z0-9_]/i', '', $siteId), 0, 2);
if (!empty($siteId) && is_string($siteId)) {
    define('SITE_ID', $siteId);
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();

if ($request->isPost())
{
    $request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);
}

$result = array();

if (check_bitrix_sessid())
{
    switch ($request->get('action'))
    {
        case 'form':

            if ($request->get('type') == 'signUpSalon')
            {
                $APPLICATION->IncludeComponent("devbx:form", "footer-form", Array(
                    "ACTION_VARIABLE" => "form-action",
                    "AJAX_LOAD_FORM" => "Y",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "DEFAULT_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FORM_ID" => "1",
                    "READ_ONLY_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "SUBMIT_BUTTON_NAME" => "Отправить",
                    "FORM_TITLE" => ($curPage == '/about/' ? 'Написать директору' : 'Получите консультацию специалиста'),
                ),
                    false
                );
            }

            break;

        case 'header-callback':
            $APPLICATION->IncludeComponent("devbx:form", "header-callback", Array(
                "ACTION_VARIABLE" => "form-action",
                "AJAX_LOAD_FORM" => "Y",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "DEFAULT_FIELDS" => array(
                    "UF_FORM_TYPE",
                ),
                "FORM_ID" => "1",
                "READ_ONLY_FIELDS" => array(
                    "UF_FORM_TYPE",
                ),
                "DEFAULT_FIELD_VALUE_UF_FORM_TYPE" => "HEADER_CALLBACK"
            ),
                false
            );

            break;
        case 'order-form':
            $APPLICATION->IncludeComponent("devbx:form", "order-form", Array(
                "ACTION_VARIABLE" => "form-action",
                "AJAX_LOAD_FORM" => "Y",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "DEFAULT_FIELDS" => array(
                    "UF_FORM_TYPE",
                ),
                "FORM_ID" => "1",
                "READ_ONLY_FIELDS" => array(
                    "UF_FORM_TYPE",
                ),
                "DEFAULT_FIELD_VALUE_UF_FORM_TYPE" => $request->get('FORM_TYPE')
            ),
                false
            );

            break;
    }
}

/*
$response = \Bitrix\Main\Context::getCurrent()->getResponse();
$response->addHeader("Content-Type", "application/json; charset=UTF-8");

$response->flush(\Bitrix\Main\Web\Json::encode($result));
*/