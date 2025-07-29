<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use \Bitrix\Main\Localization\Loc;
use Rover\AmoCRM\Model\Source;
use Rover\AmoCRM\Service\Dependence;
use Rover\AmoCRM\Service\Message;

Loc::loadMessages(__FILE__);

$this->setFrameMode(false);

try{
    Message::showAdmin();

    if (!Dependence::getCheckStatus())
        return;

    CUtil::InitJSCore(array('popup'));

    $APPLICATION->IncludeComponent(
        "bitrix:main.interface.toolbar",
        "",
        array(
            "BUTTONS"=> $arResult['ACTION_PANEL']
        ),
        false,
        array('HIDE_ICONS' => 'Y')
    );

    $APPLICATION->IncludeComponent(
        "bitrix:main.interface.grid",
        ".default",
        array(
            "GRID_ID"   => RoverAmoCrmProfileList::GRID_ID,
            "HEADERS"   => $arResult["HEADERS"],
            'SORT'      => $arResult['SORT']['sort'],
            'SORT_VARS' => $arResult['SORT']['vars'],
            "ROWS"      => $arResult["ROWS"],
            'FOOTER'    => array(
                array(
                    'title' => Loc::getMessage('rover-apl__all'),
                    'value' => is_object($arResult["NAV"])
                        ? $arResult["NAV"]->getRecordCount()
                        : 0
                )
            ),
            'ACTIONS'   => array(
                "delete"=> true,
                "list"  => array(
                    "activate"      => Loc::getMessage('rover-apl__activate'),
                    "deactivate"    => Loc::getMessage('rover-apl__deactivate'),
                    //    'delete'        => Loc::getMessage('rover-apl__delete'),
                ),
            ),

            "NAV_OBJECT"=> $arResult["NAV"],

            "AJAX_MODE"         =>"N",
            "AJAX_OPTION_JUMP"  =>"N",
            "AJAX_OPTION_STYLE" =>"Y",
            'EDITABLE'          => true,
            'ACTION_ALL_ROWS'   => false,
        ),
        $component, array("HIDE_ICONS" => "Y")
    );

    $types = Source::getChildTypes();

    ?><script type="text/javascript">
        BX.message({
            <?php foreach ($types as $type): ?>
                'rover-acrm__<?=$type?>_select': '<?=GetMessageJS("rover-acrm__" . $type ."_select")?>',
                'rover-acrm__<?=$type?>_empty': '<?=GetMessageJS("rover-acrm__" . $type ."_empty")?>',
            <?php endforeach; ?>
            'rover-acrm__button_close': '<?=GetMessageJS('rover-acrm__button_close')?>',
            'rover-acrm__button_add': '<?=GetMessageJS('rover-acrm__button_add')?>',
            'rover-acrm__language_id': '<?=LANGUAGE_ID?>',
            'rover-acrm__title': '<?=GetMessageJS('rover-acrm__title')?>',
            'rover-acrm__connection_empty': '<?=GetMessageJS('rover-acrm__connection_empty')?>',
            'rover-acrm__connection_select': '<?=GetMessageJS('rover-acrm__connection_select')?>',

        });

        var amoCrmPresetList;

        BX.ready(function(){

            var sourceTypes = <?=CUtil::PhpToJSObject($arResult['SOURCES_LIST'])?>;
            var connections = <?=CUtil::PhpToJSObject($arResult['CONNECTIONS_LIST'])?>;

            amoCrmPresetList = new AmoCrmPresetList(sourceTypes, connections);
        });
    </script><?php
} catch (\Exception $e) {
    ShowError($e->getMessage());
}