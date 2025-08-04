<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="main-banner" data-src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>">
    <div class="main-banner__bg">
        <div class="cont">
            <div class="main-banner__cont">
                <div class="main-banner__block">
                    <h1 class="main-banner__head">
                        <?= $arResult['NAME'] ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cont" style="margin-top: 20px;">
    <?php $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        ".default",
        [
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0",
        ],
        false
    ); ?>
</div>

<div class="card">
    <div class="cont">
        <div class="card__cont">
            <div class="card__side js-card-side">

                <?php if ($arResult['PROPERTIES']['TOP_TEXT']['VALUE']) : ?>
                    <div class="card__main-text card__main-text-mobile">
                        <?= html_entity_decode($arResult['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']); ?>
                    </div>
                <?php endif; ?>

                <?php // Слайдер ?>
                <div class="card__result-pics">
                    <?php if ($arResult['OFFERS']) {
                        foreach ($arResult['OFFERS'] as $k => $offer) {

                            if (!$offer['ACTUAL']) continue;
                            $image = $offer['PREVIEW_PICTURE']['SRC'] ?: $offer['DETAIL_PICTURE']['SRC'];
                            ?>

                            <div class="card__result-pic">
                                <div class="card__result-pic-int">
                                    <img class="js-loupe2" src="<?= $image ?>" alt="<?= $arResult['NAME'] ?>"
                                         data-result-id="<?= $offer['ID'] ?>" data-large='<?= $image ?>'>
                                </div>
                                <?php if (!empty($arResult['CURRENT_DESIGN']['PICTURE'])) : ?>
                                    <div class="card__result-pic-ext">
                                        <img class="js-loupe" src="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>"
                                             alt="<?= $arResult['NAME'] ?>" data-result-id="<?= $offer['ID'] ?>"
                                             data-large="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($k == 10) break;
                        }
                    } else { ?>
                        <div class="card__result-pic">
                            <div class="card__result-pic-int">
                                <img class="js-loupe2"
                                     src="<?= empty($arResult['OFFERS']) ? $arResult['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arResult['CURRENT_OFFER']['DETAIL_PICTURE']['SRC'] ?>"
                                     alt="<?= $arResult['NAME'] ?>"
                                     data-result-id="<?= $arResult['CURRENT_OFFER']['ID'] ?>"
                                     data-large='<?= empty($arResult['OFFERS']) ? $arResult['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arResult['CURRENT_OFFER']['DETAIL_PICTURE']['SRC'] ?>'>
                            </div>
                            <?php if (!empty($arResult['CURRENT_DESIGN']['PICTURE'])) : ?>
                                <div class="card__result-pic-ext">
                                    <img class="js-loupe" src="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>"
                                         alt="<?= $arResult['NAME'] ?>"
                                         data-result-id="<?= $arResult['CURRENT_DESIGN']['ID'] ?>"
                                         data-large="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="card__main-text card__main-text-mobile card__text-for-mobile" style="font-size:14px">
                    Двери можно приобрести в готовом дизайне или <a href="#foot-form">заказать свой рисунок</a>.
                </div>

                <div class="card__info">

                    <button type="button" class="mob-base-button"><span class="base-button__content">
						Выбрать модель и материал
                    </button>

                    <?php if (!empty($arResult['OFFERS'])) : ?>
                        <div class="card__tools-mobile">
                            <div class="card__tools-mobile-item">
                                <div class="card__tools-head">
                                    Модель
                                </div>
                                <div class="card__tools-body">
                                    <div class="card__models">
                                        <?php foreach ($arResult['OFFERS'] as $offer) : ?>
                                            <div class="card__model-help" <?= !$offer['ACTUAL'] ? 'style="display:none"' : '' ?>>
                                                <div class="card__model-border model-item <?= $offer['ID'] == $arResult['CURRENT_OFFER']['ID'] ? 'card__model-active' : '' ?>"
                                                     data-id="<?= $offer['PROPERTIES']['MODEL']['VALUE'] ?>">
                                                    <div class="card__model js-material-image"
                                                         style="background-image: url('<?= $offer['DETAIL_PICTURE']['SRC'] ?>');"></div>
                                                    <div class="card__model js-design-image"
                                                         style="background-image: url('<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>');"></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card__tools-mobile-item">
                                <div class="card__tools-head">
                                    Материал
                                </div>
                                <div class="card__tools-body">
                                    <div class="card__material-block">
                                        <?php foreach ($arResult['MATERIALS'] as $materialSection) : ?>
                                            <div class="card__material-head">
                                                <?= $materialSection['NAME'] ?>
                                            </div>
                                            <div class="card__material-body">
                                                <?php foreach ($materialSection['CHILDS'] as $material) : ?>
                                                    <div class="card__material-help">
                                                        <div class="card__material-p material-item <?= $material['ID'] == $arResult['ACTUAL_MATERIAL'] ? 'card__material-p-active' : '' ?>"
                                                             data-id="<?= $material['ID'] ?>">
                                                            <div class="card__material-item"
                                                                 style="background-image: url(<?= $material['PICTURE'] ?>)"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card__tools-mobile-item">
                                <div class="card__tools-head">
                                    Оформление
                                </div>
                                <div class="card__tools-body">
                                    <div class="card__material-block">
                                        <?php if ($arResult['DESIGN']): ?>
                                            <div class="card__material-head">
                                                Оформление
                                            </div>
                                            <div class="card__material-body">
                                                <?php foreach ($arResult['DESIGN'] as $key => $design) : ?>
                                                    <div class="card__material-help">
                                                        <div class="card__material-p decor-item <?= $key == 0 ? 'card__material-p-active' : '' ?>"
                                                             data-id="<?= $design['ID'] ?>">
                                                            <div class="card__decor-item"
                                                                 style="background-image: url(<?= $design['PICTURE'] ?>)"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="card__price">
                        <?php
                        $old_price_coef = $arResult['PROPERTIES']['OLD_PRICE_COEF']['VALUE'] ?: 20;
                        $price = current($arResult['CURRENT_OFFER']['ITEM_PRICES'])['PRICE'];
                        $old_price = $price + (($price / 100) * $old_price_coef);
                        ?>
                        <div class="card__price_old"><span><?= number_format($old_price, 0, '', ' ') ?></span> ₽
                        </div>
                        <div class="card__price_act"><span><?= number_format($price, 0, '', ' ') ?></span> ₽</div>
                        <div class="card__price_parts">Частями по
                            <span><?= number_format(round($price / 6, 0), 0, '', ' ') ?></span> руб в мес.
                        </div>
                    </div>

                    <div class="card__kit">
                        <a href="#card__kit_popup" class="open_card_popup _link">*Что входит<br>в&nbsp;комплект?</a>
                        <div class="card__popup" id="card__kit_popup">
                            <div class="card__popup_window">
                                <div class="card__popup_head">
                                    <div class="card__popup_title">В комплект входит:</div>
                                    <button type="button" class="card__popup_close">
                                        <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/cross.svg'); ?>
                                    </button>
                                </div>
                                <div class="card__popup_body">
                                    <ol id="complect-list">
                                        <?php foreach ($arResult['OFFERS'] as $offer) {
                                            if (!$offer['ACTUAL']) continue;

                                            if (!empty($offer['PROPERTIES']['COMPLECT']['VALUE'])) {
                                                foreach ($offer['PROPERTIES']['COMPLECT']['VALUE'] as $complectItem) { ?>
                                                    <li><?php echo $complectItem; ?></li>
                                                <?php }
                                                break;
                                            }
                                        } ?>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card__meta">
                        <div class="card__meta_series"><?= $arResult['NAME']; ?></div>
                        <?php if (!empty($arResult['OFFERS'])) : ?>

                            <div class="card__meta_sep"> -</div>
                            <div class="card__meta_model">Модель:
                                <span><?= $arResult['CURRENT_OFFER']['DETAIL_TEXT'] ?></span></div>

                            <?php if ($arResult['CURRENT_OFFER']['COVER']): ?>
                                <div class="card__meta_small">Покрытие: <?= $arResult['CURRENT_OFFER']['COVER'] ?></div>
                            <?php endif ?>
                        <?php endif; ?>
                    </div>

                    <a href="#card__warranty_popup" class="card__warranty open_card_popup _link desktop">
                        <div class="card__warranty_pic"><?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/warranty.svg'); ?></div>
                        <div class="card__warranty_text">Гарантия<br>до <?php echo $arResult['PROPERTIES']['GARANTY']['VALUE'] ?: 5; ?> лет</div>
                    </a>
                    <div class="card__popup" id="card__warranty_popup">
                        <div class="card__popup_window">
                            <div class="card__popup_head">
                                <div class="card__popup_title">Условия гарантии</div>
                                <button type="button" class="card__popup_close">
                                    <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/cross.svg'); ?>
                                </button>
                            </div>
                            <div class="card__popup_body">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    [
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => "/include/garanty-text.php",
                                    ]
                                ); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card__links mobile">
                        <a href="#card__place_popup" class="open_card_popup _link">
                            <div class="_icon">
                                <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/place.svg'); ?>
                            </div>
                            <div class="_text">Где посмотреть?<br>Адреса салонов</div>
                        </a>
                    </div>

                    <div class="card-order-btns">
                        <div class="card__order" data-popup-selector="order">Получить расчет</div>

                        <a href="https://wa.me/79671098956?text=Здравствуйте! Пришлите, пожалуйста, полный каталог дверей"
                           target="_blank" class="card__download">
                            Получить каталог на WhatsApp<i class="fa fa-whatsapp"
                                                           style="font-size:24px;margin-left:4px;position: relative;top: 4px;"></i>
                        </a>
                    </div>

                    <div class="card__links desktop">
                        <a href="#card__place_popup" class="open_card_popup _link">
                            <div class="_icon">
                                <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/place.svg'); ?>
                            </div>
                            <div class="_text">Где посмотреть?<br>Адреса салонов</div>
                        </a>
                    </div>

                    <div class="card__popup" id="card__place_popup">
                        <div class="card__popup_window">
                            <div class="card__popup_head">
                                <div class="card__popup_title">Адреса салонов</div>
                                <button type="button" class="card__popup_close">
                                    <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/cross.svg'); ?>
                                </button>
                            </div>
                            <div class="card__popup_body">
                                <?php $APPLICATION->IncludeComponent(
                                    "bitrix:catalog.section.list",
                                    "salons",
                                    [
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "CACHE_FILTER" => "N",
                                        "CACHE_GROUPS" => "Y",
                                        "CACHE_TIME" => "36000000",
                                        "CACHE_TYPE" => "A",
                                        "COUNT_ELEMENTS" => "N",
                                        "IBLOCK_ID" => 10,
                                        "IBLOCK_TYPE" => "content",
                                        "SECTION_CODE" => "",
                                        "SECTION_FIELDS" => ["", ""],
                                        "SET_BROWSER_TITLE" => "N",
                                        "SET_META_DESCRIPTION" => "N",
                                        "SET_META_KEYWORDS" => "N",
                                        "SET_TITLE" => "N",
                                        "TOP_DEPTH" => "1",
                                    ]
                                ); ?>
                                <p><a href="/contacts/" target="_blank" class="btnSmall">Подробнее</a></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="card__main js-card-main">

                <?php if ($arResult['PROPERTIES']['TOP_TEXT']['VALUE']) : ?>
                    <div class="card__main-text">
                        <?= html_entity_decode($arResult['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($arResult['OFFERS'])) : ?>
                    <div class="card__tools">
                        <div class="tool1 card__tools-item card__tools-item-active">Модель</div>
                        <div class="tool2 card__tools-item">Цвет</div>
                        <div class="tool3 card__tools-item">Оформление</div>
                    </div>

                    <div class="card__content ">
                        <div class="tool1-body card__tool-body card__tool-body-active">
                            <div class="card__body">
                                <?php foreach ($arResult['OFFERS'] as $offer) : ?>
                                    <div class="card__model-help" <?= !$offer['ACTUAL'] ? 'style="display:none"' : '' ?>>
                                        <div class="card__model-border model-item <?= $offer['ID'] == $arResult['CURRENT_OFFER']['ID'] ? 'card__model-active' : '' ?>"
                                             data-id="<?= $offer['PROPERTIES']['MODEL']['VALUE'] ?>">
                                            <div class="card__model js-material-image"
                                                 style="background-image: url(<?= $offer['DETAIL_PICTURE']['SRC'] ?>)"></div>
                                            <div class="card__model js-design-image"
                                                 style="background-image: url(<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>)"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>

                        <div class="tool2-body card__material card__tool-body">
                            <div class="card__material-block">
                                <?php foreach ($arResult['MATERIALS'] as $materialSection) : ?>
                                    <div class="card__material-head">
                                        <?= $materialSection['NAME'] ?>
                                    </div>
                                    <div class="card__material-body">
                                        <?php foreach ($materialSection['CHILDS'] as $material) : ?>
                                            <div class="card__material-help">
                                                <div class="card__material-p material-item <?= $material['ID'] == $arResult['ACTUAL_MATERIAL'] ? 'card__material-p-active' : '' ?>"
                                                     data-id="<?= $material['ID'] ?>">
                                                    <div class="card__material-item"
                                                         style="background-image: url(<?= $material['PICTURE'] ?>)"></div>
                                                </div>
                                                <div class="card__material-name"><?= $material['NAME'] ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tool3-body card__material card__tool-body">
                            <div class="card__material-block">
                                <div class="card__material-head">
                                    Оформление
                                </div>
                                <div class="card__material-body">
                                    <?php foreach ($arResult['DESIGN'] as $key => $design) : ?>
                                        <div class="card__material-help">
                                            <div class="card__material-p decor-item <?= $key == 0 ? 'card__material-p-active' : '' ?>"
                                                 data-id="<?= $design['ID'] ?>">
                                                <div class="card__decor-item"
                                                     style="background-image: url(<?= $design['PICTURE'] ?>)"></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card__text-for-pc" style="font-size:14px;margin:10px">
                    Двери можно приобрести в готовом дизайне или <a href="#foot-form">заказать свой рисунок</a>.
                </div>
            </div>

        </div>
    </div>
</div>

<div class="card-text">
    <div class="cont">
        <div class="card-tabs-btns">
            <?php if ($arResult['DETAIL_TEXT']) : ?>
                <div class="card-tabs-btn">Описание</div>
            <?php endif; ?>
            <div class="card-tabs-btn">Сервис и доставка</div>
            <div class="card-tabs-btn">Мой дизайн</div>
        </div>

        <div class="cart-tabs">
            <?php if ($arResult['DETAIL_TEXT']) : ?>
                <div class="card-tabs-tab card-text__cont">
                    <div class="card-text__body">
                        <p><?= $arResult['DETAIL_TEXT'] ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card-tabs-tab card-text__cont">
                <div class="card-text__body">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/service.php",
                        ]
                    ); ?>
                </div>
            </div>

            <div class="card-tabs-tab card-text__cont">
                <div class="card-text__body">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/design.php",
                        ]
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($arResult['PROPERTIES']['VIDEO']['VALUE']) : ?>
    <div class="video">
        <div class="cont">
            <div class="video__cont">
                <?= html_entity_decode($arResult['PROPERTIES']['VIDEO']['VALUE']) ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($arResult['PROPERTIES']['SYSTEMS']['VALUE']) : ?>
    <?php
    global $arrSystemsFilter;
    $arrSystemsFilter['ID'] = $arResult['PROPERTIES']['SYSTEMS']['VALUE'];
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "systems",
        [
            "COMPONENT_TEMPLATE" => "systems",
            "IBLOCK_TYPE" => "catalog",
            "IBLOCK_ID" => "11",
            "NEWS_COUNT" => "100",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2" => "ID",
            "SORT_ORDER2" => "DESC",
            "AJAX_MODE" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "SET_TITLE" => "N",
            "SET_BROWSER_TITLE" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_META_DESCRIPTION" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "FILTER_NAME" => "arrSystemsFilter",
        ],
        false
    ); ?>
<?php endif; ?>

<?php $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "similar_collections",
    [
        "COMPONENT_TEMPLATE" => "similar_collections",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"],
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "ID",
        "SORT_ORDER2" => "DESC",
        "AJAX_MODE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "SECTION_CODE" => "",
        "SECTION_USER_FIELDS" => [
            0 => "",
            1 => "",
        ],
        "FILTER_NAME" => "arrFilter",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SHOW_ALL_WO_SECTION" => "N",
        "HIDE_NOT_AVAILABLE" => "N",
        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER2" => "desc",
        "PAGE_ELEMENT_COUNT" => "18",
        "LINE_ELEMENT_COUNT" => "3",
        "OFFERS_LIMIT" => "1",
        "BACKGROUND_IMAGE" => "-",
        "SECTION_URL" => "",
        "DETAIL_URL" => "",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "SEF_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_GROUPS" => "Y",
        "BROWSER_TITLE" => "-",
        "META_KEYWORDS" => "-",
        "META_DESCRIPTION" => "-",
        "SET_LAST_MODIFIED" => "N",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "CACHE_FILTER" => "N",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRICE_CODE" => [
            0 => "BASE",
        ],
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "BASKET_URL" => "/personal/basket.php",
        "USE_PRODUCT_QUANTITY" => "N",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "DISPLAY_COMPARE" => "N",
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => "",
        "COMPATIBLE_MODE" => "Y",
        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
        "CURRENT_ITEM" => $arResult['ID'],
    ],
    false
); ?>

<script type="text/javascript">
    let design = <?= json_encode($arResult['DESIGN_PHOTOS']) ?>;
    let offers = <?= json_encode($arResult['JSON_OFFERS']) ?>;
    let complect = <?= json_encode($arResult['COMPLECT']) ?>;
</script>