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
$this->setFrameMode(true);
?>
<div class="container">
    <div class="block_2">
        <div class="container">
            <div class="container">
                <div class="block_2_in">
                    <a href="/vakansii/" class="back_btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                            <path
                                    d="M5.707 11.293a1 1 0 01-1.414 1.414L1 9.414a2 2 0 010-2.828l3.293-3.293a1 1 0 011.414 1.414L2.414 8l3.293 3.293z"
                                    fill="currentColor"></path>
                        </svg> <span>Все вакансии</span></a>
                    <div class="block_2_in_inner">
                        <h2><?=$arResult['NAME']?></h2>
                        <h4><?=$arResult['PROPERTIES']['PAY']['VALUE']?></h4>
                        <?
                        echo $arResult['DETAIL_TEXT'] ? $arResult['DETAIL_TEXT'] : $arResult['PREVIEW_TEXT'];
                        $arJSParams = array(
                            'form' => 'JobResponse',
                            'params' => array(
                                'ELEMENT_ID' => $arResult['ID'],
                            )
                        );
                        ?>
                        <a href="#" class="btn_1" data-action="showForm" data-params="<?=htmlspecialcharsbx(\Bitrix\Main\Web\Json::encode($arJSParams))?>">Откликнуться</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
