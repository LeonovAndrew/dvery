<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult['SECTIONS'])) return;
?>

<div class="sect-list">
	<div class="row">
		<? foreach($arResult['SECTIONS'] as $arSection) :
		
			$img = CFile::ResizeImageGet($arSection['PICTURE']['ID'], array('height' => 375, 'width' => 570 ), BX_RESIZE_IMAGE_EXACT, false, false, false, 60);
			$arSection['PICTURE']['SRC'] = $img['src'];
		?>
			<div class="col-6">
				<div class="sect-list__item">
					
					<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="sect-list__img-wrap">
						<div class="sect-list__img" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);"></div>
						<div class="sect-list__img" data-item ="<?=$arSection['PICTURE']['SRC']?>"></div>
					</a>
	
					<div class="sect-list__content">
						<div class="sect-list__info">
							<div class="sect-list__title">
								<?=$arSection['NAME']?>
							</div>
	
							<div class="sect-list__text">
								<?=$arSection['UF_META_DESCRIPTION']?>
							</div>
						</div>
						
						<div class="sect-list__btn">
							<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="sect-list__more">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
		<? endforeach; ?>

		<?/* Костыльный костыль чтобы дизайн вел куда-то на лэндинг... я этого не хотел :( */?>
		<div class="col-6">
			<div class="sect-list__item">
				<a href="/" class="sect-list__img-wrap">
					<div class="sect-list__img" style="background-image:url('/upload/images/cat-fix.jpg')"></div>
				</a>

				<div class="sect-list__content">
					<div class="sect-list__info">
						<div class="sect-list__title">
							Дизайн
						</div>

						<div class="sect-list__text">
						Авторский дизайн от опытных экспертов
						</div>
					</div>
					
					<div class="sect-list__btn">
						<a href="/services/dveri-po-vashemu-dizaynu/" class="sect-list__more">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>