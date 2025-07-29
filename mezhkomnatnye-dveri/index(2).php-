<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");
?>
<script>
$(document).ready(function () {
    $(".js-catalog-tags-show-all").click(function () {
    	e = 94;
    	var t = $(".js-catalog-tags-hidden").height();
    	var max_h = $(".js-catalog-tags-hidden").css({ maxHeight: e + "px" });
    
        $(this).hasClass("catalog-tags__show-all_opened")
            ? ($(this).removeClass("catalog-tags__show-all_opened"), $(this).html("Показать все"))
            : ($(this).addClass("catalog-tags__show-all_opened"), $(this).html("Cкрыть"), $(".js-catalog-tags-hidden").css({ maxHeight: 300 }));
    });

});
</script>
<link rel="stylesheet" href="/shop/style.css">

<div class="products-catalog__tags catalog-tags js-catalog-tags">
	<div class="catalog-tags__list">
		<div class="catalog-tags__list-inner js-catalog-tags-hidden" style="max-height: 94px;">
			<a href="/shop/interior-doors/" class="catalog-tags__btn catalog-tags__btn_current">Все двери</a>
			<a href="/shop/interior-doors/antracit/" class="catalog-tags__btn ">Антрацит</a>
			<a href="/shop/interior-doors/belaya-emal/" class="catalog-tags__btn ">Белая эмаль</a>
			<a href="/shop/interior-doors/belye/" class="catalog-tags__btn ">Белые двери</a>
			<a href="/shop/interior-doors/belie-matovie/" class="catalog-tags__btn ">Белые матовые</a>
			<a href="/shop/interior-doors/belie-so-steklom/" class="catalog-tags__btn ">Белые межкомнатные двери со стеклом</a>
			<a href="/shop/interior-doors/belie-s-chernim-steklom/" class="catalog-tags__btn ">Белые с черным стеклом</a>
			<a href="/shop/interior-doors/buk/" class="catalog-tags__btn ">Бук</a>
			<a href="/shop/interior-doors/buk-svetliy/" class="catalog-tags__btn ">Бук светлый</a>
			<a href="/shop/interior-doors/buk-slonovaya-kost/" class="catalog-tags__btn ">Бук слоновая кость</a>
			<a href="/shop/interior-doors/buk-temniy/" class="catalog-tags__btn ">Бук темный</a>
			<a href="/shop/interior-doors/iz-duba/" class="catalog-tags__btn ">Двери дуб</a>
			<a href="/shop/interior-doors/massive/" class="catalog-tags__btn ">Двери из массива</a>
			<a href="/shop/interior-doors/orekh/" class="catalog-tags__btn ">Двери орех</a>
			<a href="/shop/interior-doors/so-steklom/" class="catalog-tags__btn ">Двери со стеклом</a>
			<a href="/shop/interior-doors/dub-konyak/" class="catalog-tags__btn ">Дуб коньяк</a>
			<a href="/shop/interior-doors/dub-medoviy/" class="catalog-tags__btn ">Дуб медовый</a>
			<a href="/shop/interior-doors/dub-pepel/" class="catalog-tags__btn ">Дуб пепельный</a>
			<a href="/shop/interior-doors/dub-seriy/" class="catalog-tags__btn ">Дуб серый</a>
			<a href="/shop/interior-doors/temniy-dub/" class="catalog-tags__btn ">Дуб темный</a>
			<a href="/shop/interior-doors/konyak/" class="catalog-tags__btn ">Коньяк</a>
			<a href="/shop/interior-doors/laminatin/" class="catalog-tags__btn ">Ламинатин</a>
			<a href="/shop/interior-doors/latte/" class="catalog-tags__btn ">Латте</a>
			<a href="/shop/interior-doors/massiv-buk/" class="catalog-tags__btn ">Массив бука</a>
			<a href="/shop/interior-doors/massiv-klassika/" class="catalog-tags__btn ">Массив классический</a>
			<a href="/shop/interior-doors/massiv-so-steklom/" class="catalog-tags__btn ">Массив со стеклом</a>
			<a href="/shop/interior-doors/serie-matovie/" class="catalog-tags__btn ">Матовые серые</a>
			<a href="/shop/interior-doors/anegry/" class="catalog-tags__btn ">Межкомнатные двери Анегри</a>
			<a href="/shop/interior-doors/dymchatiy-dub/" class="catalog-tags__btn ">Межкомнатные двери дымчатый дуб</a>
			<a href="/shop/interior-doors/massiv-dub/" class="catalog-tags__btn ">Межкомнатные двери из массива дуба</a>
			<a href="/shop/interior-doors/cherry/" class="catalog-tags__btn ">Межкомнатные двери цвета Вишня</a>
			<a href="/shop/interior-doors/slonovaya-kost/" class="catalog-tags__btn ">Межкомнатные двери цвета слоновой кости</a>
			<a href="/shop/interior-doors/emal/" class="catalog-tags__btn ">Межкомнатные двери эмаль</a>
		</div>
	</div>
	<div class="catalog-tags__show-all-wrap js-catalog-tags-show-all-wrap" style="display: block;">
		<button class="catalog-tags__show-all js-catalog-tags-show-all" type="button">Показать ещё</button>
	</div>
</div>


<div class="products-catalog__row" data-parent="true">
	<div class="products-catalog__filters-wrapper js-catalog-filter-wrapper">
		<div class="products-catalog__filters js-catalog-filter">
			<button class="products-catalog__filters-close js-catalog-filter-close">
				<svg class="icon"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-close"></use></svg>
			</button>
			<div class="products-catalog__filters-inner">
				<div class="products-catalog__filters-name">Фильтр</div>
					<form action="/catalog/search/" name="catalog_filter" id="catalog_filter" class="products-catalog__form js-catalog-form">
						<div class="products-catalog__filters-list">
							<fieldset class="products-catalog__fieldset js-filter-accordeon">
								<legend class="products-catalog__legend js-filter-accordeon-btn"><span class="products-catalog__filter-name">Цена</span></legend>
								<div class="js-filter-accordeon-content">
									<div class="products-catalog__fields">
										<div class="products-catalog__field">
											<input type="radio" class="products-catalog__radio" name="price" value="" id="price" checked="checked">
											<label for="price" class="products-catalog__radio-label">Все двери</label>
										</div>
										<div class="products-catalog__field">
											<input type="radio" class="products-catalog__radio" name="price" value="to_15599" id="priceto_15599">
											<label for="priceto_15599" class="products-catalog__radio-label">До 15 599 ₽</label>
										</div>
										<div class="products-catalog__field">
											<input type="radio" class="products-catalog__radio" name="price" value="to_25000" id="priceto_25000">
											<label for="priceto_25000" class="products-catalog__radio-label">До 25000</label>
										</div>
										<div class="products-catalog__field">
											<input type="radio" class="products-catalog__radio" name="price" value="to_35000" id="priceto_35000">
											<label for="priceto_35000" class="products-catalog__radio-label">До 35000</label>
										</div>
	
										<div class="products-catalog__field">
											<input type="radio" class="products-catalog__radio" name="price" value="from_55000" id="pricefrom_55000">
											<label for="pricefrom_55000" class="products-catalog__radio-label">От 55000</label>
										</div>
									</div>
								</div>
							</fieldset>
							
							<fieldset class="products-catalog__fieldset js-filter-accordeon">
								<legend class="products-catalog__legend js-filter-accordeon-btn"><span class="products-catalog__filter-name">Коллекция</span></legend>
								<div class="products-catalog__fields js-filter-accordeon-content">
									<div class="products-catalog__fields-item ">
										<input type="checkbox" class="products-catalog__checkbox " name="collection-1531" value="1" id="collection-1531">
										<label for="collection-1531" class="products-catalog__label products-catalog__label--colors">
											Neo<svg class="products-catalog__svg" width="20" height="20"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-checked"></use></svg>
										</label>
									</div>
									<div class="products-catalog__fields-item ">
										<input type="checkbox" class="products-catalog__checkbox " name="collection-1131" value="1" id="collection-1131">
										<label for="collection-1131" class="products-catalog__label products-catalog__label--colors">
											Toscana Plano<svg class="products-catalog__svg" width="20" height="20"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-checked"></use></svg>
										</label>
									</div>
									<div class="products-catalog__fields-item ">
										<input type="checkbox" class="products-catalog__checkbox " name="collection-1152" value="1" id="collection-1152">
										<label for="collection-1152" class="products-catalog__label products-catalog__label--colors">
											Toscana Grigliato<svg class="products-catalog__svg" width="20" height="20"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-checked"></use></svg>
										</label>
									</div>
									<button type="button" class="products-catalog__more-btn js-spoiler-more-btn">Показать все</button>
								</div>
							</fieldset>
						</div>
		
						<div class="products-catalog__buttons">
							<button class="products-catalog__submit-btn" type="submit">Показать <span class="products-catalog__span js-count-products"></span></button>
							<a href="/shop/interior-doors/" class="products-catalog__reset-btn js-catalog-reset-btn disabled">Очистить </a>
							<!-- <a href="/catalog/search/" class="products-catalog__reset-btn disabled">Очистить </a> -->
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="products-catalog__col">
			<div class="js-catalog-items">
				<h3 class="products-catalog__subtitle">Выбранный товар</h3>
					<div class="js-products-catalog-mobile-panel">
						<div class="products-catalog__mobile-panel" style="">
							<div class="products-sort products-sort_mobile js-mobile-sort">
								<div class="products-sort__head">
									<button type="button" class="products-sort__value js-mobile-sort-btn">Популярности</button>
								</div>
								<div class="products-sort__content js-mobile-sort-content">
									<a class="products-sort__value  products-sort__value_current" href="/shop/interior-doors/?sort=sort_asc">Популярности</a>
									<a class="products-sort__value " href="/shop/interior-doors/?sort=price_asc">По убыванию цены</a>
									<a class="products-sort__value " href="/shop/interior-doors/?sort=price_desc">По возрастанию цены</a>
								</div>
							</div>
							<button type="button" class="products-catalog__filter-btn js-open-mobile-filter"><svg class="icon" width="18" height="18"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-filter"></use></svg>Фильтр</button></div>
						</div>

						<div class="products-catalog__panel">
							<div class="products-catalog__panel-sort products-sort">
								<span class="products-sort__name">Сортировать по:</span>
								<a class="products-sort__value  products-sort__value_current" href="/shop/interior-doors/?sort=sort_asc">Популярности</a>
								<a class="products-sort__value " href="/shop/interior-doors/?sort=price_asc">Цене<img src="/local/templates/volhovec/_frontend/src/sprites/vector/filter_increase.svg" alt="по возрастанию"></a>
								<a class="products-sort__value " href="/shop/interior-doors/?sort=price_desc">Цене<img src="/local/templates/volhovec/_frontend/src/sprites/vector/filter_decrease.svg" alt="по убыванию"></a>
							</div>
							<div class="products-catalog__panel-value products-value">Найдено товаров: 5751</div>
						</div>
						
						<div class="products-catalog__list js-catalog-list">
							<a class="product-card" href="/shop/interior-doors/58527/">
								<div class="product-card__image-wrap">
									<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
										<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
											<div class="swiper-slide swiper-slide-active" style="width: 241px;">
												<img src="/upload/merged_picture/a7d95f15d3310fddc8f6f7cd6d4338ed/image.png" title="Межкомнатная дверь Neo 0010 neo g Леон бежево-серый" alt="Серия 0010 neo g - Межкомнатная дверь Neo 0010 neo g Леон бежево-серый">
											</div>
										</div>
										<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock">
											<span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
										</div>
										<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
									</div>
									<div class="product-card__buttons">
										<span class="product-card__mobile-more" href="/shop/interior-doors/58527/">Подробнее</span>
										<button class="product-card__add-to-favorites js-favorite" data-id="58527" data-portal="58075"><svg width="20px" height="18px" aria-hidden="true"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use></svg><span>Добавить в избранное</span></button>
									</div>
								</div>

								<div class="product-card__desc">
									<div class="product-card__desc-block">
										<div class="product-card__row">
											<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
												<div class="product-card__tag product-card__tag_tooltip">
													<div class="product-card__tag-content">Под заказ</div>
												</div>
											</div>
										</div>
										<div class="product-card__row">
											<h4 class="product-card__title">Neo</h4>
											<div class="product-card__color">Отделка:Леон бежево-серый</div>
											<div class="product-card__color">Материал:Teknofoil Ламинатин</div>
										</div>
									</div>
									<div class="product-card__footer">
										<div class="product-card__price-wrap">
											<div class="product-card__price product-card__price_actual">19 699 ₽</div>
										</div>
										<div class="product-card__btn">
											<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
										</div>
									</div>
									<div class="product-card__buttons product-card__buttons_mobile">
										<span class="product-card__mobile-more" href="/shop/interior-doors/58527/">Подробнее</span>
										<button class="product-card__add-to-favorites js-favorite" data-id="58527" data-portal="58075"><svg width="20px" height="18px" aria-hidden="true"><use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use></svg><span>Добавить в избранное</span></button>
									</div>
								</div>
							</a>

<a class="product-card" href="/shop/interior-doors/38730/">
<div class="product-card__image-wrap">
<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 241px;">
<img src="/upload/merged_picture/d6c6aa2e1da19f88385a93739555b434/image.png" title="Межкомнатная дверь Royal 6231 Бук молочно-белый с серебром" alt="Серия 6231 - Межкомнатная дверь Royal 6231 Бук молочно-белый с серебром">
</div>
</div>
<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<div class="product-card__buttons">
<span class="product-card__mobile-more" href="/shop/interior-doors/38730/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="38730" data-portal="38473">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>

<div class="product-card__desc">
<div class="product-card__desc-block">
<div class="product-card__row">
<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
<div class="product-card__tag product-card__tag_tooltip">
<div class="product-card__tag-content">Под заказ</div>
</div>
<div class="product-card__tag">
<div class="product-card__tag-content">акция</div>
</div>
</div>
</div>
<div class="product-card__row">
<h4 class="product-card__title">
Royal</h4>
<div class="product-card__color">
Отделка:
Бук молочно-белый с серебром</div>
<div class="product-card__color">
Материал:
Массив бука эмаль с патиной</div>
</div>
</div>
<div class="product-card__footer">
<div class="product-card__price-wrap">
<div class="product-card__price product-card__price_actual">
52 599 ₽</div>
<div class="product-card__price product-card__price_old">
62 799 ₽    </div>
</div>
<div class="product-card__btn">
<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
</div>
</div>
<div class="product-card__buttons product-card__buttons_mobile">
<span class="product-card__mobile-more" href="/shop/interior-doors/38730/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="38730" data-portal="38473">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>
</a>




<a class="product-card" href="/shop/interior-doors/33981/">
<div class="product-card__image-wrap">
<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 241px;">
<img src="/upload/merged_picture/ec805d6153085a92ba64da300cbf5d9c/image.png" title="Межкомнатная дверь Avant 4030 Таеда Чёрный" alt="Серия 4030 - Межкомнатная дверь Avant 4030 Таеда Чёрный">
</div>
</div>
<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<div class="product-card__buttons">
<span class="product-card__mobile-more" href="/shop/interior-doors/33981/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="33981" data-portal="33959">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>

<div class="product-card__desc">
<div class="product-card__desc-block">
<div class="product-card__row">
<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
<div class="product-card__tag product-card__tag_tooltip">
<div class="product-card__tag-content">Под заказ</div>
</div>
</div>
</div>
<div class="product-card__row">
<h4 class="product-card__title">
Avant</h4>
<div class="product-card__color">
Отделка:
Таеда Чёрный</div>
<div class="product-card__color">
Материал:
Таеда эмаль</div>
</div>
</div>
<div class="product-card__footer">
<div class="product-card__price-wrap">
<div class="product-card__price product-card__price_actual">
31 699 ₽</div>
</div>
<div class="product-card__btn">
<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
</div>
</div>
<div class="product-card__buttons product-card__buttons_mobile">
<span class="product-card__mobile-more" href="/shop/interior-doors/33981/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="33981" data-portal="33959">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>
</a>
<a class="product-card" href="/shop/interior-doors/34236/">
<div class="product-card__image-wrap">
<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 241px;">
<img src="/upload/merged_picture/57b2a878938d2ba9d0d8d31e1fcfee69/image.png" title="Межкомнатная дверь Deco 8021 Ясень белоснежный" alt="Серия 8021 - Межкомнатная дверь Deco 8021 Ясень белоснежный">
</div>
</div>
<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<div class="product-card__buttons">
<span class="product-card__mobile-more" href="/shop/interior-doors/34236/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="34236" data-portal="34761">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>

<div class="product-card__desc">
<div class="product-card__desc-block">
<div class="product-card__row">
<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
<div class="product-card__tag product-card__tag_tooltip">
<div class="product-card__tag-content">Под заказ</div>
</div>
</div>
</div>
<div class="product-card__row">
<h4 class="product-card__title">
Deco</h4>
<div class="product-card__color">
Отделка:
Ясень белоснежный</div>
<div class="product-card__color">
Материал:
Структурная эмаль</div>
</div>
</div>
<div class="product-card__footer">
<div class="product-card__price-wrap">
<div class="product-card__price product-card__price_actual">
39 399 ₽</div>
</div>
<div class="product-card__btn">
<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
</div>
</div>
<div class="product-card__buttons product-card__buttons_mobile">
<span class="product-card__mobile-more" href="/shop/interior-doors/34236/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="34236" data-portal="34761">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>
</a>
<a class="product-card" href="/shop/interior-doors/42067/">
<div class="product-card__image-wrap">
<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 241px;">
<img src="/upload/merged_picture/297a1720c3d1599bf38483651cc2cd17/image.png" title="Межкомнатная дверь Quadro 4117 Матовый жемчужный" alt="Серия 4117 - Межкомнатная дверь Quadro 4117 Матовый жемчужный">
</div>
</div>
<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<div class="product-card__buttons">
<span class="product-card__mobile-more" href="/shop/interior-doors/42067/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="42067" data-portal="41690">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>

<div class="product-card__desc">
<div class="product-card__desc-block">
<div class="product-card__row">
<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
<div class="product-card__tag product-card__tag_tooltip">
<div class="product-card__tag-content">Под заказ</div>
</div>
</div>
</div>
<div class="product-card__row">
<h4 class="product-card__title">
Quadro</h4>
<div class="product-card__color">
Отделка:
Матовый жемчужный</div>
<div class="product-card__color">
Материал:
Гладкая эмаль</div>
</div>
</div>
<div class="product-card__footer">
<div class="product-card__price-wrap">
<div class="product-card__price product-card__price_actual">
33 099 ₽</div>
</div>
<div class="product-card__btn">
<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
</div>
</div>
<div class="product-card__buttons product-card__buttons_mobile">
<span class="product-card__mobile-more" href="/shop/interior-doors/42067/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="42067" data-portal="41690">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>
</a>
<a class="product-card" href="/shop/interior-doors/58106/">
<div class="product-card__image-wrap">
<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 241px;">
<img src="/upload/merged_picture/80969b32001f99df16e2cd6aab5728df/image.png" title="Межкомнатная дверь Neo 0010 neo v Леон бежево-серый" alt="Серия 0010 neo v - Межкомнатная дверь Neo 0010 neo v Леон бежево-серый">
</div>
</div>
<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<div class="product-card__buttons">
<span class="product-card__mobile-more" href="/shop/interior-doors/58106/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="58106" data-portal="58075">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>

<div class="product-card__desc">
<div class="product-card__desc-block">
<div class="product-card__row">
<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
<div class="product-card__tag product-card__tag_tooltip">
<div class="product-card__tag-content">Под заказ</div>
</div>
</div>
</div>
<div class="product-card__row">
<h4 class="product-card__title">
Neo</h4>
<div class="product-card__color">
Отделка:
Леон бежево-серый</div>
<div class="product-card__color">
Материал:
Teknofoil Ламинатин</div>
</div>
</div>
<div class="product-card__footer">
<div class="product-card__price-wrap">
<div class="product-card__price product-card__price_actual">
19 699 ₽</div>
</div>
<div class="product-card__btn">
<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
</div>
</div>
<div class="product-card__buttons product-card__buttons_mobile">
<span class="product-card__mobile-more" href="/shop/interior-doors/58106/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="58106" data-portal="58075">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>
</a>
<a class="product-card" href="/shop/interior-doors/38568/">
<div class="product-card__image-wrap">
<div class="product-card__slider slider js-product-card-slider swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 241px;">
<img src="/upload/merged_picture/98ad08c852bb8406842057cecb3891f7/image.png" title="Межкомнатная дверь Toscana Plano 6303 Бук тёмный с патиной" alt="Серия 6303 - Межкомнатная дверь Toscana Plano 6303 Бук тёмный с патиной">
</div>
</div>
<div class="js-product-card-slider-pagination slider__pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<div class="product-card__buttons">
<span class="product-card__mobile-more" href="/shop/interior-doors/38568/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="38568" data-portal="37574">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>

<div class="product-card__desc">
<div class="product-card__desc-block">
<div class="product-card__row">
<div class="product-card__tags js-product-card-tags" style="min-height: 24.8px;">
<div class="product-card__tag product-card__tag_tooltip">
<div class="product-card__tag-content">Под заказ</div>
</div>
</div>
</div>
<div class="product-card__row">
<h4 class="product-card__title">
Toscana Plano</h4>
<div class="product-card__color">
Отделка:
Бук тёмный с патиной</div>
<div class="product-card__color">
Материал:
Массив бука с патиной</div>
</div>
</div>
<div class="product-card__footer">
<div class="product-card__price-wrap">
<div class="product-card__price product-card__price_actual">
55 499 ₽</div>
</div>
<div class="product-card__btn">
<img src="/local/templates/volhovec/_frontend/src/sprites/vector/arrow.svg">
</div>
</div>
<div class="product-card__buttons product-card__buttons_mobile">
<span class="product-card__mobile-more" href="/shop/interior-doors/38568/">Подробнее</span>
<button class="product-card__add-to-favorites js-favorite" data-id="38568" data-portal="37574">
<svg width="20px" height="18px" aria-hidden="true">
<use xlink:href="/local/templates/volhovec/images/symbol-sprite.svg#icon-fav"></use>
</svg>
<span>Добавить в избранное</span>
</button></div>
</div>
</a>
</div>
<div class="product-card__pagination js-catalog-pagination">
<a href="#" data-target="/api/catalog-filter/?sort=sort_asc&amp;catalog_index_page=page-2" class="product-card__show-more js-catalog-showmore">Показать еще</a>
<div class="pagination pagination_round">
<span class="pagination__link pagination__link_current">1</span>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-2" class="pagination__link">2</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-3" class="pagination__link">3</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-4" class="pagination__link">4</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-5" class="pagination__link">5</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-6" class="pagination__link">6</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-7" class="pagination__link">7</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-8" class="pagination__link">8</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-9" class="pagination__link">9</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-10" class="pagination__link">10</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-125" class="pagination__link">...</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-240" class="pagination__link">240</a>
<a href="/shop/interior-doors/?sort=sort_asc&amp;catalog_index_page=page-2" class="pagination__link pagination__link_next">
</a>
</div>
</div>
</div>                </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>