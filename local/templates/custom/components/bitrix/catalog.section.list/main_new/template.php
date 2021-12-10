<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult['SECTIONS'])) return; 
?>

<div class="sect-list">
	<? foreach($arResult['SECTIONS'] as $arSection) :?>
		<div class="sect-list__item">
			<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="sect-list__img-wrap">
				<!-- <div class="sect-list__img" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);"></div> -->
				<div class="sect-list__img" data-src ="<?=$arSection['PICTURE']['SRC']?>"></div>
			</a>

			<div class="sect-list__content">
				<div class="sect-list__info">
					<div class="sect-list__title">
						<?=$arSection['NAME']?>
					</div>

					<div class="sect-list__text">
						<?=$arSection['DESCRIPTION']?>
					</div>
				</div>
				
				<div class="sect-list__btn">
					<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="sect-list__more">Подробнее</a>
				</div>
			</div>
		</div>
	<? endforeach; ?>

	<?/* Костыльный костыль чтобы дизайн вел куда-то на лэндинг... я этого не хотел :( */?>
	<div class="sect-list__item">
		<a href="/lp/nestandart/" class="sect-list__img-wrap">
			<div class="sect-list__img" data-src ="/upload/iblock/678/cy6vxhjwqfs2glzb80fjpb7812ne16s6.jpg"></div>
		</a>

		<div class="sect-list__content">
			<div class="sect-list__info">
				<div class="sect-list__title">
					Дизайн
				</div>

				<div class="sect-list__text">
				Смелые тенденции в оформлении вашего дома, для тех кто хочет что-то особенное. Изготовление дверей любой сложности и конструкции.
				</div>
			</div>
			
			<div class="sect-list__btn">
				<a href="/lp/nestandart/" class="sect-list__more">Подробнее</a>
			</div>
		</div>
	</div>
</div>