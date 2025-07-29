<?
CModule::AddAutoloadClasses(
	"local.lib",
	array(
	)
);

if (!\Bitrix\Main\Loader::includeModule('devbx.core'))
    return false;

CJSCore::RegisterExt('local_lib', [
    'js' => '/bitrix/js/local.lib/common.js',
    'rel' => array('core', 'ajax', 'devbx_core_utils'),
    'lang' => str_replace($_SERVER['DOCUMENT_ROOT'],'', \Bitrix\Main\Loader::getLocal("modules/local.lib/lang/".LANGUAGE_ID."/js/common.php"))
]);


?>