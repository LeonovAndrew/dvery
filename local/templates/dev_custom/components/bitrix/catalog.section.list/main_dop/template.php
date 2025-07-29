<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult['SECTIONS'])) return; 
?>

<div class="sect-main">
	<div class="container">
		<div class="row">
			<? foreach($arResult['SECTIONS'] as $arSection) :?>
				<div class="col-md-6">
					<div class="sect-main-item">
						<div class="sect-main-item__bg" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);">
							<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="sect-main-item__content">
								<div class="sect-main-item__circle"></div>
								<div class="sect-main-item__info">
									<div class="sect-main-item__title">
										<?=$arSection['NAME']?>
									</div>
									<div class="sect-main-item__text">
										<?=$arSection['DESCRIPTION']?>
									</div>
								</div>
								<div class="sect-main-item__btn">
									<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.5" d="M15.1331 4.9999L11.0587 0.925537M15.1331 4.9999L11.0587 9.07427M15.1331 4.9999H-0.000299811" stroke="black" stroke-width="1.3432"/>
									</svg>
								</div>
							</a>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
</div>