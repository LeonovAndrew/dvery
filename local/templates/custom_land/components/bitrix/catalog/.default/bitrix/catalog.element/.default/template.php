<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true);
?>

<div class="main-banner" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>);">
    <div class="main-banner__bg">
        <div class="cont">
            <div class="main-banner__cont">
                <div class="main-banner__block">
                    <div class="main-banner__head">
                        <?=$arResult['NAME']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cont" style="margin-top: 20px;">
	<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0",
		),
	false
	);?>
</div>
<div class="card">
    <div class="cont">
        <div class="card__cont">
            <div class="card__side js-card-side">
                <? if ($arResult['PROPERTIES']['TOP_TEXT']['VALUE']) :?>
	                <div class="card__main-text card__main-text-mobile">
	                	<?=html_entity_decode($arResult['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']);?>
	                </div>
                <? endif; ?>
                <div class="card__main-text card__main-text-mobile" style="font-size:14px">
                	На странице представлены самые популярные модели двери. Вы можете <a href="<?=CFile::GetPath($arResult['PROPERTIES']['CATALOG2']['VALUE'])?>">скачать полный каталог</a> или заказать свой рисунок, <a href="">заполнив форму</a>
                </div>
                
				<div class="card__result-pic">
					<div class="card__show js-material-image-left" data-result-id="<?=$arResult['CURRENT_OFFER']['ID']?>" style="background-image: url(<?=empty($arResult['OFFERS']) ? $arResult['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arResult['CURRENT_OFFER']['DETAIL_PICTURE']['SRC']?>)"></div>
					<div class="card__show js-design-image" data-result-id="<?=$arResult['CURRENT_DESIGN']['ID']?>" style="background-image: url(<?=$arResult['CURRENT_DESIGN']['PICTURE']?>)"></div>
				</div>

				<div class="card__info">
					<div class="card__title">
						<?=$arResult['NAME']?>
					</div>
					<? if (!empty($arResult['OFFERS'])) :?>
						<div class="card__text">
							<?=$arResult['CURRENT_OFFER']['DETAIL_TEXT']?>
						</div>
					<? endif; ?>
					<div class="card__price">
						от <span><?=number_format(current($arResult['CURRENT_OFFER']['ITEM_PRICES'])['PRICE'], 0, '', ' ')?></span> ₽
					</div>
					<div class="card__order" data-popup-selector="order">
						Заказать
					</div>
					<? if ($arResult['PROPERTIES']['CATALOG']['VALUE']) :?>
						<a href="<?=CFile::GetPath($arResult['PROPERTIES']['CATALOG']['VALUE'])?>" target="_blank" class="card__download">
							Скачать каталог
						</a>
					<? endif; ?>
				</div>
            </div>
            
            <div class="card__main js-card-main">
            	<? if (!empty($arResult['OFFERS'])) :?>
	                <div class="card__tools-mobile">
	                    <div class="card__tools-mobile-item">
	                        <div class="card__tools-head">
	                            Модель
	                        </div>
	                        <div class="card__tools-body">
	                            <div class="card__models">
	                            	<? foreach($arResult['OFFERS'] as $offer) :?>
		                                <div class="card__model-help" <?=!$offer['ACTUAL'] ? 'style="display:none"' : ''?>>
		                                    <div class="card__model-border model-item <?=$offer['ID'] == $arResult['CURRENT_OFFER']['ID'] ? 'card__model-active' : ''?>" data-id="<?=$offer['PROPERTIES']['MODEL']['VALUE']?>">
		                                        <div class="card__model js-material-image" style="background-image: url(<?=$offer['DETAIL_PICTURE']['SRC']?>)"></div>
		                                        <div class="card__model js-design-image" style="background-image: url(<?=$arResult['CURRENT_DESIGN']['PICTURE']?>)"></div>
		                                    </div>
		                                </div>
	                                <? endforeach; ?>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="card__tools-mobile-item">
	                        <div class="card__tools-head">
	                            Материал
	                        </div>
	                        <div class="card__tools-body">
	                            <div class="card__material-block">
	                            	<? foreach($arResult['MATERIALS'] as $materialSection) :?>
		                                <div class="card__material-head">
		                                    <?=$materialSection['NAME']?>
		                                </div>
		                                <div class="card__material-body">
		                                	<? foreach($materialSection['CHILDS'] as $material) :?>
				                                <div class="card__material-help">
				                                    <div class="card__material-p material-item <?=$material['ID'] == $arResult['ACTUAL_MATERIAL'] ? 'card__material-p-active' : ''?>" data-id="<?=$material['ID']?>">
				                                        <div class="card__material-item" style="background-image: url(<?=$material['PICTURE']?>)"></div>
				                                    </div>
				                                </div>
			                                <? endforeach; ?>
		                                </div>
	                                <? endforeach; ?>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="card__tools-mobile-item">
	                        <div class="card__tools-head">
	                            Оформление
	                        </div>
	                        <div class="card__tools-body">
	                            <div class="card__material-block">
	                                <div class="card__material-head">
	                                    Оформление
	                                </div>
	                                <div class="card__material-body">
	                                    <? foreach($arResult['DESIGN'] as $key => $design) :?>
			                                <div class="card__material-help">
			                                    <div class="card__material-p decor-item <?=$key == 0 ? 'card__material-p-active' : ''?>" data-id="<?=$design['ID']?>">
			                                        <div class="card__decor-item" style="background-image: url(<?=$design['PICTURE']?>)"></div>
			                                    </div>
			                                </div>
		                                <? endforeach; ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <? endif; ?>

                <? if ($arResult['PROPERTIES']['TOP_TEXT']['VALUE']) :?>
	                <div class="card__main-text">
	                	<?=html_entity_decode($arResult['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']);?>
	                </div>
                <? endif; ?>
	                <div class="card__main-text" style="font-size:14px">
	                	На странице представлены самые популярные модели двери. Вы можете <a href="<?=CFile::GetPath($arResult['PROPERTIES']['CATALOG2']['VALUE'])?>">скачать полный каталог</a> или заказать свой рисунок, <a href="">заполнив форму</a>
	                </div>
                <? if (!empty($arResult['OFFERS'])) :?>
	                <div class="card__tools">
	                    <div class="tool1 card__tools-item card__tools-item-active">Модель</div>
	                    <div class="tool2 card__tools-item">Материал</div>
	                    <div class="tool3 card__tools-item">Оформление</div>
	                </div>
	                
	                <div class="card__content ">
	                    <div class="tool1-body card__tool-body card__tool-body-active">
	                        <div class="card__body">
	                        	<? foreach($arResult['OFFERS'] as $offer) :?>
	                                <div class="card__model-help" <?=!$offer['ACTUAL'] ? 'style="display:none"' : ''?>>
	                                    <div class="card__model-border model-item <?=$offer['ID'] == $arResult['CURRENT_OFFER']['ID'] ? 'card__model-active' : ''?>" data-id="<?=$offer['PROPERTIES']['MODEL']['VALUE']?>">
	                                        <div class="card__model js-material-image" style="background-image: url(<?=$offer['DETAIL_PICTURE']['SRC']?>)"></div>
	                                        <div class="card__model js-design-image" style="background-image: url(<?=$arResult['CURRENT_DESIGN']['PICTURE']?>)"></div>
	                                        
	                                    </div>
	                                </div>
	                            <? endforeach; ?>
	                         </div>
	                    </div>
	                    
	                    <div class="tool2-body card__material card__tool-body">
	                        <div class="card__material-block">
	                        	<? foreach($arResult['MATERIALS'] as $materialSection) :?>
		                            <div class="card__material-head">
		                                <?=$materialSection['NAME']?>
		                            </div>
		                            <div class="card__material-body">
		                            	<? foreach($materialSection['CHILDS'] as $material) :?>
			                                <div class="card__material-help">
			                                    <div class="card__material-p material-item <?=$material['ID'] == $arResult['ACTUAL_MATERIAL'] ? 'card__material-p-active' : ''?>" data-id="<?=$material['ID']?>">
			                                        <div class="card__material-item" style="background-image: url(<?=$material['PICTURE']?>)"></div>
			                                    </div>
			                                </div>
		                                <? endforeach; ?>
		                            </div>
	                            <? endforeach; ?>
	                        </div>
	                    </div>
	                    <div class="tool3-body card__material card__tool-body">
	                        <div class="card__material-block">
	                            <div class="card__material-head">
	                                Оформление
	                            </div>
	                            <div class="card__material-body">
	                            	<? foreach($arResult['DESIGN'] as $key => $design) :?>
		                                <div class="card__material-help">
		                                    <div class="card__material-p decor-item <?=$key == 0 ? 'card__material-p-active' : ''?>" data-id="<?=$design['ID']?>">
		                                        <div class="card__decor-item" style="background-image: url(<?=$design['PICTURE']?>)"></div>
		                                    </div>
		                                </div>
	                                <? endforeach; ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
            	<? endif; ?>
            </div>
        </div>
    </div>
</div>
<? if ($arResult['DETAIL_TEXT']) :?>
	<div class="card-text">
	    <div class="cont">
	        <div class="card-text__cont">
	            <div class="card-text__head">
	                Общее описание коллекции
	            </div>
	            <div class="card-text__body">
	                <?=$arResult['DETAIL_TEXT']?>
	            </div>
	        </div>
	    </div>
	</div>
<? endif; ?>
<? if ($arResult['PROPERTIES']['VIDEO']['VALUE']) :?>
	<div class="video">
	    <div class="cont">
	        <div class="video__cont">
        		<?=html_entity_decode($arResult['PROPERTIES']['VIDEO']['VALUE'])?>
	            <!-- <div class="video__bg" style="background-image: url(<?=CFile::GetPath($arResult['PROPERTIES']['PREVIEW_VIDEO']['VALUE'])?>);">
	                <a href="<?=$arResult['PROPERTIES']['VIDEO']['VALUE']?>" class="video__link">
	                    <svg width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path d="M22 13.5L0.250001 26.0574L0.250002 0.942631L22 13.5Z" fill="white"/>
	                    </svg>
	                </a>
	            </div> -->
	        </div>
	    </div>
	</div>
<? endif; ?>


<? if ($arResult['PROPERTIES']['SYSTEMS']['VALUE']) :?>
	<? 
		global $arrSystemsFilter;
		$arrSystemsFilter['ID'] = $arResult['PROPERTIES']['SYSTEMS']['VALUE'];
	?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list", 
		"systems", 
		array(
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
			"FILTER_NAME" => "arrSystemsFilter"
		),
		false
	);?>
<? endif; ?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"similar_collections", 
	array(
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
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
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
		"PRICE_CODE" => array(
			0 => "BASE",
		),
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
		"CURRENT_ITEM" => $arResult['ID']
	),
	false
);?>

<script type="text/javascript">
	var design = <?=json_encode($arResult['DESIGN_PHOTOS'])?>;
	var offers = <?=json_encode($arResult['JSON_OFFERS'])?>;	
</script>