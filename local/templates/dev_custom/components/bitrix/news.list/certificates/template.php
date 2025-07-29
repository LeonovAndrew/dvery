<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>


<div class="certificate">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="certificate__cont">
					<div class="certificate__top">
						<h2>Сертификаты</h2>
						<div class="btn-arr-wrap js-certificate-slider-arr"></div>
					</div>

					<div class="certificate__body-help">
						
						<div class="certificate-slider js-certificate-slider">
							<? foreach($arResult['ITEMS'] as $item) :
							
							$image = CFile::ResizeImageGet($item['DETAIL_PICTURE']['ID'], array('height' => 300, 'width' => 213), BX_RESIZE_IMAGE_EXACT, false, false, false, 30);
							
							?>
								<div class="certificate__item-help">
									<span data-src="<?=$item['DETAIL_PICTURE']['SRC']?>" data-fancybox="certificate" class="certificate__item" style="background-image:url(<?=$image['src']?>)"></span>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>