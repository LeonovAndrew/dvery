<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>

<div class="news">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Новости фабрики</h2>

				<div class="news__cont news__slide">
					<? foreach($arResult['ITEMS'] as $arItem) :
					$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('height' => 393, 'width' => 573 ), BX_RESIZE_IMAGE_EXACT, false, false, false, 70);
					$arItem['PREVIEW_PICTURE']['SRC'] = $img['src'];
				
						$date = empty($arItem['ACTIVE_FROM']) ? $arItem['DATE_CREATE'] : $arItem['ACTIVE_FROM'];?>
						<div class="news__item-help">
							<div class="news__item">
								<div class="news__img" style="background-image:url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
								<?/*<div class="news__img" data-src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"></div>*/?>
								<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__title">
									<?=$arItem['NAME']?>
								</a>
								<div class="news__text">
									<?=$arItem['PREVIEW_TEXT']?>
								</div>
								<div class="news__bottom">
									<div class="news__date">
										<?=FormatDate('d F Y г.', strtotime($date))?>
									</div>
									<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__link">
										<div class="news__link-text">
											Читать далее
										</div>
										<div class="news__link-img">
											<svg width="28" height="9" viewBox="0 0 28 9" fill="none"><path d="M26.909 4.72391C27.1043 4.52865 27.1043 4.21207 26.909 4.0168L23.727 0.834823C23.5318 0.639561 23.2152 0.639561 23.0199 0.834823C22.8246 1.03009 22.8246 1.34667 23.0199 1.54193L25.8483 4.37036L23.0199 7.19878C22.8247 7.39405 22.8247 7.71063 23.0199 7.90589C23.2152 8.10115 23.5318 8.10115 23.727 7.90589L26.909 4.72391ZM0.444336 4.87036L26.5554 4.87036L26.5554 3.87036L0.444336 3.87036L0.444336 4.87036Z"/></svg>
										</div>
									</a>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>