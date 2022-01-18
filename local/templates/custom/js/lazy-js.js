$( document ).ready(function() {

    setTimeout(function(){
        $('.main-slider__item').each(function() {
            var $t = $(this);
            $t
                .attr({
                    'data-src' : $t.attr('data-lol'),
                })
                .removeAttr('data-lol')
            ;
        });
    }, 2500)
   

    // jQuery Lazy

    $('.sect-list__img, .banner-type-1, .block3__item-bg, .js-loupe2, .js-loupe').Lazy({});
    $('.main-slider__item, .main-banner, .catalog__img, .js-material-image, .js-design-image, .sort-img__item').Lazy({});
    $('.systems__item_img, .sale__img, .menu__bg ').Lazy({});

    let sliderCatalogImg = $('.catalog__img__slider').Lazy({}),
        sliderAdventagesImg = $('.adventages__img').Lazy({}),
        newsImg = $('.news__img').Lazy({}),
        usefulKnow= $('.useful-know').Lazy({}),
        sertificateItem = $('.certificate__item').Lazy({});

    // jQuery Lazy & slick slider

    sameBodySlider.on('afterChange', sliderCatalogImg.revalidate);
    adventagesBody.on('afterChange', sliderAdventagesImg.revalidate);
    newsSlider.on('afterChange', newsImg.revalidate);
    articleSlide.on('afterChange', usefulKnow.revalidate);
    certificateSlider.on('afterChange', sertificateItem.revalidate);


})