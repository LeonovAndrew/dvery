<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>
<section class="cond-slider-wrap">
	<div class="cond-slider-wrap__content">

		<div class="container">
			<div class="row">
				<div class="col-3 d-none d-xl-block">
					<div class="cond-slider-wrap__img">
						<img src="/upload/main/woman2.png" loading="lazy" alt="Девушка">
					</div>
				</div>

				<div class="col-xl-9">
					<div class="cond-slider js-cond-slider">
					
						<? foreach($arResult['ITEMS'] as $item) :
						$img = CFile::GetFileArray($item['PROPERTIES']['ICON']['VALUE']);
						?>

					
							<div class="cond-slider__item">
								<div class="cond-slider__main">
									<div class="cond-slider__title"><?=$item['NAME']?></div>
									<div class="cond-slider__icon">
										<img src="<?=$img['SRC']?>" alt="">
									</div>
								</div>
		
								<div class="cond-slider__text"><?=$item['PREVIEW_TEXT']?></div>
							</div>
					<? endforeach; ?>

						<div class="cond-slider__item">
							<div class="cond-slider__main">
								<div class="cond-slider__title">покрытие полотна Изолянт</div>
								<div class="cond-slider__icon">
									<img src="/upload/main/icon-umbrella.svg" alt="">
								</div>
							</div>
	
							<div class="cond-slider__text">Предотвращает впитывание влаги и поднятие ворса</div>
						</div>
	
						<div class="cond-slider__item">
							<div class="cond-slider__main">
								<div class="cond-slider__title">Заполнение полотна сотопаком</div>
								<div class="cond-slider__icon">
									<img src="/upload/main/icon-rocket.svg" alt="">
								</div>
							</div>
	
							<div class="cond-slider__text">Облегчает вес полотна, увеличивает срок эксплуатации петель.</div>
						</div>
	
						<div class="cond-slider__item">
							<div class="cond-slider__main">
								<div class="cond-slider__title">Многослойное ЛКМ покрытие</div>
								<div class="cond-slider__icon">
									<img src="/upload/main/icon-layers.svg" alt="">
								</div>
							</div>
	
							<div class="cond-slider__text">Антиаллергическую / антибактерицидную пропитку</div>
						</div>
	
						<div class="cond-slider__item">
							<div class="cond-slider__main">
								<div class="cond-slider__title">покрытие полотна Изолянт</div>
								<div class="cond-slider__icon">
									<img src="/upload/main/icon-umbrella.svg" alt="">
								</div>
							</div>
	
							<div class="cond-slider__text">Предотвращает впитывание влаги и поднятие ворса</div>
						</div>
	
						<div class="cond-slider__item">
							<div class="cond-slider__main">
								<div class="cond-slider__title">Заполнение полотна сотопаком</div>
								<div class="cond-slider__icon">
									<img src="/upload/main/icon-rocket.svg" alt="">
								</div>
							</div>
	
							<div class="cond-slider__text">Облегчает вес полотна, увеличивает срок эксплуатации петель.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>