$( document ).ready(function() {

    setTimeout(function(){
        

        $('.main-slider__item').each(function() {
            let item = $(this);

            item.attr({
                'data-src' : item.attr('data-item'),
            }).removeAttr('data-item');
        });

        $('.sect-list__img').each(function() {
            let item = $(this);

            item.attr({
                'data-src' : item.attr('data-item'),
            }).removeAttr('data-item');
        });

        $('.main-slider__item').Lazy({});
        $('.sect-list__img').Lazy({});

        $('.main-slider__item-preloader').each(function() {
            let item = $(this);

            item.css('display','none');
        });
        
        

    }, 2500)

    $('.select-color').on('click', function(){
        $('.sort-img__item').each(function() {
            let item = $(this);

            item.attr({
                    'data-src' : item.attr('data-item'),
                }).removeAttr('data-item');
        });

        $('.sort-img__item').Lazy({});
    })

    $('.menu-toggle').click(function(){
        let item = $('.menu__bg');
        item.attr({
                    'data-src' : item.attr('data-item'),
                }).removeAttr('data-item');
       

        $('.menu__bg').Lazy({});
    })

    
   

    // jQuery Lazy

    $('.sect-list__img, .banner-type-1, .block3__item-bg, .js-loupe2, .js-loupe').Lazy({});
    $('.main-banner, .catalog__img, .js-material-image, .js-design-image ').Lazy({});
    $('.systems__item_img, .sale__img, .instagram-feed-item-image,.header-logo ').Lazy({});

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