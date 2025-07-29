<?

/** @global $APPLICATION */

use Bitrix\Main\Localization\Loc;

$module_id = 'local.lib';
$moduleAccessLevel = $APPLICATION->GetGroupRight($module_id);

if ($moduleAccessLevel >= 'R') {
    \Bitrix\Main\Loader::includeModule("devbx.core");
    \Bitrix\Main\Loader::includeModule($module_id);
    IncludeModuleLangFile(__FILE__);

    $aTabs = array(
        //array("DIV" => "edit1", "TAB" => Loc::getMessage("CO_TAB_RIGHTS"), "TITLE" => Loc::getMessage("CO_TAB_RIGHTS_TITLE")),
        array("DIV" => "edit2", "TAB" => Loc::getMessage("CO_TAB_MODULE_SETTINGS"), "TITLE" => Loc::getMessage("CO_TAB_MODULE_SETTINGS_TITLE")),
    );

    $tabControl = new CAdminTabControl("TabControl" . md5($module_id), $aTabs, true, true);

    $options = new \DevBx\Core\Admin\Options($module_id);

    $arSettings = array(
        "DADATA" => array(
            "TITLE" => Loc::getMessage("LOCAL_LIB_DADATA_TITLE"),
            "ITEMS" => array(
                "DADATA_TOKEN" => array(
                    "TYPE" => "STRING",
                    "TITLE" => Loc::getMessage("LOCAL_LIB_DADATA_TOKEN_TITLE"),
                    "SIZE" => 40,
                ),
            )
        ),
    );

    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['RestoreDefaults']) && !empty($_GET['RestoreDefaults']) && $moduleAccessLevel == "W" && check_bitrix_sessid()) {
        COption::RemoveOption($module_id);
        /*$v1 = "id";
        $v2 = "asc";
        $z = CGroup::GetList($v1, $v2, array("ACTIVE" => "Y", "ADMIN" => "N"));
        while ($zr = $z->Fetch())
            $APPLICATION->DelGroupRight($module_id, array($zr["ID"]));
        */
        LocalRedirect($APPLICATION->GetCurPage() . '?lang=' . LANGUAGE_ID . '&mid=' . $module_id);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $moduleAccessLevel == "W" && check_bitrix_sessid()) {
        if (isset($_POST['Update']) && $_POST['Update'] === 'Y') {

            /*
            ob_start();
            require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/admin/group_rights.php');
            ob_end_clean();
            */

            $options->saveSettings($arSettings);

            LocalRedirect($APPLICATION->GetCurPage() . '?lang=' . LANGUAGE_ID . '&mid=' . $module_id . '&' . $tabControl->ActiveTabParam());
        }
    }

    $tabControl->Begin();
    ?>
    <form method="POST" action="<?
    echo $APPLICATION->GetCurPage() ?>?lang=<?
    echo LANGUAGE_ID ?>&mid=<?= $module_id ?>"
          name="module_settings">
        <? echo bitrix_sessid_post();

        /*$tabControl->BeginNextTab();

        require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/admin/group_rights.php");*/

        $tabControl->BeginNextTab();

        echo '<tr><td colspan="2">';

        $options->showSettings($arSettings);

        echo '</td></tr>';

        $tabControl->Buttons(); ?>
        <script type="text/javascript">
            function RestoreDefaults() {
                if (confirm('<? echo CUtil::JSEscape(Loc::getMessage("CUR_OPTIONS_BTN_HINT_RESTORE_DEFAULT_WARNING")); ?>'))
                    window.location = "<?echo $APPLICATION->GetCurPage()?>?lang=<? echo LANGUAGE_ID; ?>&mid=<? echo $module_id; ?>&RestoreDefaults=Y&<?=bitrix_sessid_get()?>";
            }

        </script>
        <input type="submit" <?
        if ($moduleAccessLevel < "W") echo "disabled" ?> name="Update"
               value="<?
               echo Loc::getMessage("CUR_OPTIONS_BTN_SAVE") ?>">
        <input type="hidden" name="Update" value="Y">
        <input type="reset" name="reset" value="<?
        echo Loc::getMessage("CUR_OPTIONS_BTN_RESET") ?>">
        <input type="button" <?
        if ($moduleAccessLevel < "W") echo "disabled" ?>
               title="<?
               echo Loc::getMessage("CUR_OPTIONS_BTN_HINT_RESTORE_DEFAULT") ?>" onclick="RestoreDefaults();"
               value="<?
               echo Loc::getMessage("CUR_OPTIONS_BTN_RESTORE_DEFAULT") ?>">
    </form>

    <?
    $tabControl->End();
}
?>