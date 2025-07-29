<?php

namespace Local\Lib\Internals;

use Bitrix\Main;
use Local\Lib\Api;

class FormsApi
{

    public static function showForm(Api $context, Main\Type\ParameterDictionary $params)
    {
        global $APPLICATION;

        if (!Main\Loader::includeModule('devbx.forms'))
            return ['error'=>'devbx.forms not installed'];

        $formInstance = \DevBx\Forms\FormManager::getInstance()->getFormInstance($params['form']);
        if (!$formInstance)
        {
            return ['error'=>'form not found '.$params['form']];
        }

        ob_start();

        $arFormParams = array(
            "ACTION_VARIABLE" => "form-action",
            "AJAX_LOAD_FORM" => "Y",
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "FORM_ID" => $formInstance->getFormId(),
        );

        if (is_array($params['params']))
        {
            foreach ($params['params'] as $fieldName=>$fieldValue)
            {
                $arFormParams['DEFAULT_FIELDS'][] = $fieldName;
                $arFormParams['READ_ONLY_FIELDS'][] = $fieldName;
                $arFormParams['DEFAULT_FIELD_VALUE_UF_'.$fieldName] = $fieldValue;
            }
        }

        $APPLICATION->IncludeComponent(
            "devbx:form",
            strtolower($formInstance->getForm()->getCode()),
            $arFormParams,
            false,
            array('HIDE_ICONS' => 'Y')
        );

        return ['content' => ob_get_clean(),'js'=>Main\Page\Asset::getInstance()->getJs()];
    }

    public static function registerApi(Api $api)
    {
        $api->registerApi('showForm', array(__CLASS__, 'showForm'));
    }

}