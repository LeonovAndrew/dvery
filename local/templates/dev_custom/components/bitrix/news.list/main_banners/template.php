<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="main-slider">
    <? foreach ($arResult['ITEMS'] as $item) : ?>
    <?
    $mobile = $item['PROPERTIES']['MOBILE']['VALUE'] ? CFile::GetPath($item['PROPERTIES']['MOBILE']['VALUE']) :
        $item['DETAIL_PICTURE']['SRC'];
    ?>
    <?php if (!empty($item['PROPERTIES']['BANNER_LINK']['VALUE'])) { ?>
    <a href="<?= $item['CODE'] ?>" class="main-slider__item" target="_blank">
        <?php } else { ?>
        <div class="main-slider__item">
            <?php } ?>
            <div class="main-slider__item-bg_mob" style="background-image:url(<?= $mobile ?>)"></div>
            <div class="main-slider__item-bg_dsc"
                 style="background-image:url(<?= $item['DETAIL_PICTURE']['SRC'] ?>)"></div>
            <div class="main-slider__item-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="main-slider__content">
                                <?php if (empty($item['PROPERTIES']['HIDE_TITLE']['VALUE'])) { ?>
                                    <div class="main-slider__info">
                                        <div class="main-slider__title">
                                            <?= $item['NAME'] ?>
                                        </div>

                                        <div class="main-slider__text">
                                            <?= $item['DETAIL_TEXT'] ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($item['CODE']) && empty($item['PROPERTIES']['BANNER_LINK']['VALUE'])) { ?>
                                    <a href="<?= $item['CODE'] ?>" class="main-slider__link">Подробнее</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($item['PROPERTIES']['BANNER_LINK']['VALUE'])) { ?>
    </a>
    <?php } else { ?>
</div>
<?php } ?>
<? endforeach; ?>
</div>