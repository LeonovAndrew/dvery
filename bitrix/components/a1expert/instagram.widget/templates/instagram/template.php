<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

global $APPLICATION;
?>
<style>
    #instagram-app-{<?php echo $arResult['hash'] ?>}.instagram-feed {
        width: <?php echo is_numeric($arResult['WIDTH']) ? $arResult['WIDTH'] . 'px' : $arResult['WIDTH'] ?> !important;
        margin: 0 auto;
    }
</style>
<?php if ($arResult['USE_ACTIVE'] !== 'Y'): ?>
    <div class="alert" style="color: red"><?php echo Loc::getMessage('WIDGET_OFF') ?></div>
<?php elseif (is_array($arResult["ITEMS"]) || is_object($arResult["ITEMS"])) : ?>
    <div id="instagram-app-<?php echo $arResult['hash'] ?>"
         class="instagram-feed instagram-widget <?php echo $arResult['LAYOUT'] ?>">
        <div class="instagram_ajax loader_circle"></div>
        <?php
        $APPLICATION->IncludeFile($this->GetFolder() . "/blocks/{$arResult['LAYOUT']}.php", [
            'result' => $arResult,
            'option' => A1expert::GetFrontParametrsValues(SITE_ID)
        ]);
        ?>
    </div>
<?php endif; ?>