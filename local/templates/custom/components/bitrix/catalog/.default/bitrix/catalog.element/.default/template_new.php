<?
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
	<? $APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		".default",
		array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0",
		),
		false
	); ?>
</div>

<div class="card">
	<div class="cont">
		<div class="card__cont">
			<div class="card__side js-card-side">

				<? if ($arResult['PROPERTIES']['TOP_TEXT']['VALUE']) : ?>
					<div class="card__main-text card__main-text-mobile">
						<?= html_entity_decode($arResult['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']); ?>
					</div>
				<? endif; ?>

				<? // Слайдер ?>
				<div class="card__result-pics">
					<? if($arResult['OFFERS']){
						foreach ($arResult['OFFERS'] as $k=>$offer){

							if(!$offer['ACTUAL'])continue;
							$image = $offer['PREVIEW_PICTURE']['SRC'] ? : $offer['DETAIL_PICTURE']['SRC'];
							?>

							<div class="card__result-pic">
								<div class="card__result-pic-int">
									<img class="js-loupe2" src="<?=$image?>" alt="<?= $arResult['NAME'] ?>" data-result-id="<?= $offer['ID']?>" data-large='<?=$image?>'>
								</div>
								<? if (!empty($arResult['CURRENT_DESIGN']['PICTURE'])) : ?>
									<div class="card__result-pic-ext">
										<img class="js-loupe" src="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>" alt="<?= $arResult['NAME'] ?>" data-result-id="<?= $offer['ID'] ?>" data-large="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>">
									</div>
								<? endif; ?>
							</div>

							<? if($k==10) break;
						}
					}
					else{ ?>
						<div class="card__result-pic">
							<div class="card__result-pic-int">
								<img class="js-loupe2" src="<?= empty($arResult['OFFERS']) ? $arResult['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arResult['CURRENT_OFFER']['DETAIL_PICTURE']['SRC'] ?>" alt="<?= $arResult['NAME'] ?>" data-result-id="<?= $arResult['CURRENT_OFFER']['ID'] ?>" data-large='<?= empty($arResult['OFFERS']) ? $arResult['CURRENT_OFFER']['PREVIEW_PICTURE']['SRC'] : $arResult['CURRENT_OFFER']['DETAIL_PICTURE']['SRC'] ?>'>
							</div>
							<? if (!empty($arResult['CURRENT_DESIGN']['PICTURE'])) : ?>
								<div class="card__result-pic-ext">
									<img class="js-loupe" src="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>" alt="<?= $arResult['NAME'] ?>" data-result-id="<?= $arResult['CURRENT_DESIGN']['ID'] ?>" data-large="<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>">
								</div>
							<? endif; ?>
						</div>
					<? } ?>
				</div>

				<div class="card__main-text card__main-text-mobile card__text-for-mobile" style="font-size:14px">
					Двери можно приобрести в готовом дизайне или <a href="#foot-form">заказать свой рисунок</a>.
				</div>

				<div class="card__info">

					<button type="button" class="mob-base-button"><span class="base-button__content"><!---->
						Выбрать модель и материал
						<svg xmlns="http://www.w3.org/2000/svg" class="icon sprite-main-icons base-button__icon base-button__icon--right"><use href="/upload/ic-btn.svg#i-configure" xlink:href="/upload/ic-btn.svg#i-configure"></use></svg> <!----></span> <!---->
					</button>

					<? if (!empty($arResult['OFFERS'])) : ?>
						<div class="card__tools-mobile">
							<div class="card__tools-mobile-item">
								<div class="card__tools-head">
									Модель
								</div>
								<div class="card__tools-body">
									<div class="card__models">
										<? foreach ($arResult['OFFERS'] as $offer) : ?>
											<div class="card__model-help" <?= !$offer['ACTUAL'] ? 'style="display:none"' : '' ?>>
												<div class="card__model-border model-item <?= $offer['ID'] == $arResult['CURRENT_OFFER']['ID'] ? 'card__model-active' : '' ?>" data-id="<?= $offer['PROPERTIES']['MODEL']['VALUE'] ?>">
													<div class="card__model js-material-image" style="background-image: url('<?= $offer['DETAIL_PICTURE']['SRC'] ?>');"></div>
													<div class="card__model js-design-image" style="background-image: url('<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>');"></div>
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
										<? foreach ($arResult['MATERIALS'] as $materialSection) : ?>
											<div class="card__material-head">
												<?= $materialSection['NAME'] ?>
											</div>
											<div class="card__material-body">
												<? foreach ($materialSection['CHILDS'] as $material) : ?>
													<div class="card__material-help">
														<div class="card__material-p material-item <?= $material['ID'] == $arResult['ACTUAL_MATERIAL'] ? 'card__material-p-active' : '' ?>" data-id="<?= $material['ID'] ?>">
															<div class="card__material-item" style="background-image: url(<?= $material['PICTURE'] ?>)"></div>
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
											<? foreach ($arResult['DESIGN'] as $key => $design) : ?>
												<div class="card__material-help">
													<div class="card__material-p decor-item <?= $key == 0 ? 'card__material-p-active' : '' ?>" data-id="<?= $design['ID'] ?>">
														<div class="card__decor-item" style="background-image: url(<?= $design['PICTURE'] ?>)"></div>
													</div>
												</div>
											<? endforeach; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<? endif; ?>

					<? $has_old_price = $has_parts = $has_kit = $has_small = $has_warranty = $has_no_wa = $has_links = isset($_GET['new']); ?>

					<div class="card__price">
						<? if ($has_old_price) : ?>
							<div class="card__price_old">69 500 ₽</div>
						<? endif; ?>
						<div class="card__price_act">от <span><?= number_format(current($arResult['CURRENT_OFFER']['ITEM_PRICES'])['PRICE'], 0, '', ' ') ?></span> ₽</div>
						<? if ($has_parts) : ?>
							<div class="card__price_parts">Частями по 9623 руб в мес.</div>
						<? endif; ?>
					</div>

					<? if ($has_kit) : ?>
						<div class="card__kit">
							<a href="#card__kit_popup" class="open_card_popup _link">*Что входит<br>в&nbsp;комплект?</a>
							<div class="card__popup" id="card__kit_popup">
								<div class="card__popup_window">
									<div class="card__popup_head">
										<div class="card__popup_title">*В комплект входит:</div>
										<button type="button" class="card__popup_close">
											<?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/cross.svg'); ?>
										</button>
									</div>
									<div class="card__popup_body">
										<ol>
											<li>Полотно 40 мм габаритами (600/700/800/900)х(2000/2100) мм</li>
											<li>Гладкий классический короб</li>
											<li>Комплект гладких классических наличников на обе стороны дери, ширина 75 мм</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					<? endif; ?>

					<div class="card__meta">
						<div class="card__meta_series"><?= $arResult['NAME']; ?></div>
						<? if (!empty($arResult['OFFERS'])) : ?>
							<div class="card__meta_sep"> - </div>
							<div class="card__meta_model">Модель: <?= $arResult['CURRENT_OFFER']['DETAIL_TEXT'] ?></div>
						<? endif; ?>
						<? if ($has_small) : ?>
							<div class="card__meta_small">Покрытие: шпон дуб</div>
						<? endif; ?>
					</div>

					<? if ($has_warranty) : ?>
						<a href="#card__warranty_popup" class="card__warranty open_card_popup _link">
							<div class="card__warranty_pic"><?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/warranty.svg'); ?></div>
							<div class="card__warranty_text">Гарантия<br>до 7 лет</div>
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
									<p>Мы предоставляем гарантию на межкомнатные двери, подтверждающую их высокое качество и соответствие заявленным характеристикам, в течение срока, указанного в договоре, и обязуемся устранить производственные дефекты, выявленные в процессе эксплуатации при соблюдении правил установки и использования.</p>
									<p>Гарантийные обязательства не распространяются на повреждения, возникшие вследствие  неправильной установки, небрежной эксплуатации, механических воздействий, воздействия влаги или химических веществ, а также на естественный износ и изменения цвета, связанные с воздействием солнечного света.</p>
									<p><a href="/services/guarantee/" target="_blank" class="btnSmall">Подробнее</a></p>
								</div>
							</div>
						</div>
					<? else : ?>
						<div class="card__title">
							<a href="/services/guarantee/">Гарантия до 7 лет</a>
							<p>Рассрочка от 3 до 36 месяцев</p>
							<p>Под заказ</p>
						</div>
					<? endif; ?>

					<? // Этот блок скрыт стилями ?>
					<? /*<div class="product-share">
						<div class="ya-share2" data-curtain data-services="messenger,vkontakte,odnoklassniki,telegram,whatsapp"></div>
					</div>*/ ?>

					<div class="card__order" data-popup-selector="order">Получить расчет</div>

					<? if (!$has_no_wa) : ?>
						<? if ($arResult['PROPERTIES']['CATALOG']['VALUE']) : ?>
							<a href="https://wa.me/79671098956?text=Здравствуйте! Пришлите, пожалуйста, полный каталог дверей<?//= CFile::GetPath($arResult['PROPERTIES']['CATALOG']['VALUE']) ?>" target="_blank" class="card__download">
								Получить каталог на WhatsApp<i class="fa fa-whatsapp" style="font-size:24px;margin-left:4px;position: relative;top: 4px;"></i>
							</a>
						<? endif; ?>
					<? endif; ?>

					<? if ($has_links) : ?>
						<div class="card__links">
							<a href="#card__furniture_popup" class="open_card_popup _link">
								<div class="_icon">
									<?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/furniture.svg'); ?>
								</div>
								<div class="_text">Необходимо<br>выбрать фурнитуру</div>
							</a>
							<a href="#card__place_popup" class="open_card_popup _link">
								<div class="_icon">
									<?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/place.svg'); ?>
								</div>
								<div class="_text">Где посмотреть?<br>Адреса салонов</div>
							</a>
						</div>

						<div class="card__popup" id="card__furniture_popup">
							<div class="card__popup_window">
								<div class="card__popup_head">
									<div class="card__popup_title">Выбор фурнитуры</div>
									<button type="button" class="card__popup_close">
										<?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/img/cross.svg'); ?>
									</button>
								</div>
								<div class="card__popup_body">
									<p>Выберите тип фурнитуры чтобы узнать полную стоимость комплекта без доборов:</p>
									<div class="furnitureList">
										<?php for ($i = 1; $i <= 3; $i++) : ?>
											<a href="#" class="furnitureList_item">
												<div class="_pic">
													<img src="https://placehold.co/60x60/" alt="">
												</div>
												<div class="_title">Комплект с карточными дверями</div>
												<div class="_desc">Комплект фурнитуры в заводской врезкой (карточные петли, магитный замок с ответной планкой</div>
											</a>
										<?php endfor; ?>
									</div>
									<p><a href="/catalog/" target="_blank" class="btnSmall">Весь ассортимент</a></p>
								</div>
							</div>
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
									<?$APPLICATION->IncludeComponent(
										"bitrix:catalog.section.list",
										"salons",
										Array(
											"ADD_SECTIONS_CHAIN" => "N",
											"CACHE_FILTER" => "N",
											"CACHE_GROUPS" => "Y",
											"CACHE_TIME" => "36000000",
											"CACHE_TYPE" => "A",
											"COUNT_ELEMENTS" => "N",
											"IBLOCK_ID" => 10,
											"IBLOCK_TYPE" => "content",
											"SECTION_CODE" => "",
											"SECTION_FIELDS" => array("",""),
											"SET_BROWSER_TITLE" => "N",
											"SET_META_DESCRIPTION" => "N",
											"SET_META_KEYWORDS" => "N",
											"SET_TITLE" => "N",
											"TOP_DEPTH" => "1"
										)
									);?>
									<p><a href="/contacts/" target="_blank" class="btnSmall">Подробнее</a></p>
								</div>
							</div>
						</div>

					<? endif; ?>

				</div>

			</div>

			<div class="card__main js-card-main">

				<? if ($arResult['PROPERTIES']['TOP_TEXT']['VALUE']) : ?>
					<div class="card__main-text">
						<?= html_entity_decode($arResult['PROPERTIES']['TOP_TEXT']['VALUE']['TEXT']); ?>
					</div>
				<? endif; ?>

				<? if (!empty($arResult['OFFERS'])) : ?>
					<div class="card__tools">
						<div class="tool1 card__tools-item card__tools-item-active">Модель</div>
						<div class="tool2 card__tools-item">Цвет</div>
						<div class="tool3 card__tools-item">Оформление</div>
					</div>

					<div class="card__content ">
						<div class="tool1-body card__tool-body card__tool-body-active">
							<div class="card__body">
								<? foreach ($arResult['OFFERS'] as $offer) : ?>
									<div class="card__model-help" <?= !$offer['ACTUAL'] ? 'style="display:none"' : '' ?>>
										<div class="card__model-border model-item <?= $offer['ID'] == $arResult['CURRENT_OFFER']['ID'] ? 'card__model-active' : '' ?>" data-id="<?= $offer['PROPERTIES']['MODEL']['VALUE'] ?>">
											<div class="card__model js-material-image" style="background-image: url(<?= $offer['DETAIL_PICTURE']['SRC'] ?>)"></div>
											<div class="card__model js-design-image" style="background-image: url(<?= $arResult['CURRENT_DESIGN']['PICTURE'] ?>)"></div>
										</div>
									</div>
								<? endforeach; ?>
							</div>

						</div>

						<div class="tool2-body card__material card__tool-body">
							<div class="card__material-block">
								<? foreach ($arResult['MATERIALS'] as $materialSection) : ?>
									<div class="card__material-head">
										<?= $materialSection['NAME'] ?>
									</div>
									<div class="card__material-body">
										<? foreach ($materialSection['CHILDS'] as $material) : ?>
											<div class="card__material-help">
												<div class="card__material-p material-item <?= $material['ID'] == $arResult['ACTUAL_MATERIAL'] ? 'card__material-p-active' : '' ?>" data-id="<?= $material['ID'] ?>">
													<div class="card__material-item" style="background-image: url(<?= $material['PICTURE'] ?>)"></div>
												</div>
												<div class="card__material-name"><?= $material['NAME'] ?></div>
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
									<? foreach ($arResult['DESIGN'] as $key => $design) : ?>
										<div class="card__material-help">
											<div class="card__material-p decor-item <?= $key == 0 ? 'card__material-p-active' : '' ?>" data-id="<?= $design['ID'] ?>">
												<div class="card__decor-item" style="background-image: url(<?= $design['PICTURE'] ?>)"></div>
											</div>
										</div>
									<? endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				<? endif; ?>
				<div class="card__text-for-pc" style="font-size:14px;margin:10px">
					Двери можно приобрести в готовом дизайне или <a href="#foot-form">заказать свой рисунок</a>.
				</div>
			</div>

		</div>
	</div>
</div>

<? if ($arResult['DETAIL_TEXT']) : ?>
	<div class="card-text">
		<div class="cont">
			<div class="card-text__cont">
				<div class="card-text__head">
					Общее описание коллекции
				</div>
				<div class="card-text__body">
					<?= $arResult['DETAIL_TEXT'] ?>
				</div>
			</div>
		</div>
	</div>
<? endif; ?>

<? if ($arResult['PROPERTIES']['VIDEO']['VALUE']) : ?>
	<div class="video">
		<div class="cont">
			<div class="video__cont">
				<?= html_entity_decode($arResult['PROPERTIES']['VIDEO']['VALUE']) ?>
			</div>
		</div>
	</div>
<? endif; ?>

<? if ($arResult['PROPERTIES']['SYSTEMS']['VALUE']) : ?>
	<?
	global $arrSystemsFilter;
	$arrSystemsFilter['ID'] = $arResult['PROPERTIES']['SYSTEMS']['VALUE'];
	$APPLICATION->IncludeComponent(
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
	); ?>
<? endif; ?>

<? $APPLICATION->IncludeComponent(
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
); ?>

<script type="text/javascript">
	var design = <?= json_encode($arResult['DESIGN_PHOTOS']) ?>;
	var offers = <?= json_encode($arResult['JSON_OFFERS']) ?>;
</script>