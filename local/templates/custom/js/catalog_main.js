$( document ).ready(function() {
    // Новое js

    //Ползунки
    $priceRange = $(".filter #price_range").ionRangeSlider({
        type     : 'double',
        min      : 0,
        max      : 50000,
        from     : 2990,
        to       : 40000,
        step     : 10,
        onChange : function (data) {
            $('.filter .price_range input.ot').val( data.from.toLocaleString() )
            $('.filter .price_range input.do').val( data.to.toLocaleString() )
        }
    }).data("ionRangeSlider")

    $('.filter .price_range .input').keyup(function() {
        $priceRange.update({
            from : parseInt( $('.filter .price_range input.ot').val() ),
            to : parseInt( $('.filter .price_range input.do').val() )
        })
    })


    // Открытие пунктов фильтра
    $('body').on('click', '.filter .item .open_btn', function(e) {
        e.preventDefault()

        let parent = $(this).closest('.item')

        if( parent.hasClass('active') ) {
            parent.removeClass('active')
            parent.find('.data').slideUp(300)
        } else {
            parent.addClass('active')
            parent.find('.data').slideDown(300)
        }
    })

    $('body').on('click', '.open_filter', function(e) {
        e.preventDefault()

        if( $(this).hasClass('active') ) {
            $(this).removeClass('active')
            $(this).next().slideUp(300)
        } else {
            $(this).addClass('active')
            $(this).next().slideDown(300)
        }
    })


    // Аккордион
    $('body').on('click', '.accordion .item .open_btn', function(e) {
        e.preventDefault()

        let parent = $(this).closest('.item')
        let accordion = $(this).closest('.accordion')

        if( parent.hasClass('active') ) {
            parent.removeClass('active')
            parent.find('.data').slideUp(300)
        } else {
            accordion.find('.item').removeClass('active')
            accordion.find('.data').slideUp(300)

            parent.addClass('active')
            parent.find('.data').slideDown(300)
        }
    })


    // Кастомный select
    $('.select_text select').niceSelect();

    $('.sort_select').on('change', function(){
    	console.log($(this));
    	window.location.href="?sort="+$('.sort_select option:selected').data('sort')+"&order="+$('.sort_select option:selected').data('order');
    	//console.log($('.sort_select option:selected').data('sort'));
    });


    $('.slider_img').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $('.product_info .images .thumbs .img').removeClass('active')
        $('.product_info .images .thumbs .item:eq('+ nextSlide +') .img').addClass('active')
    })

    $('.slider_img').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        infinite: false,
        adaptiveHeight: true
    })

    $('.product_info .images .thumbs .img').click(function(e) {
        e.preventDefault()

        $('.product_info .images .thumbs .img').removeClass('active')

        $('.slider_img').slick('slickGoTo', $(this).data('slide-index') )

        $(this).addClass('active')
    })


    // Увеличение картинки
    $('.fancy_img').fancybox()
 


    $('.accessories .slider').slick({
        dots: false,
        infinite: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="prevArrow"><svg viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.6426 4.9198L10.8942 1.17139M14.6426 4.9198L10.8942 8.66822M14.6426 4.9198H0.71989" stroke-width="1.3432"></path></svg></button>',
        nextArrow: '<button type="button" class="nextArrow"><svg viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.6426 4.9198L10.8942 1.17139M14.6426 4.9198L10.8942 8.66822M14.6426 4.9198H0.71989" stroke-width="1.3432"></path></svg></button>',
        responsive: [
          {
            breakpoint: 1281,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          },
        ]
    })
    // End Новое js



    $(document).on('click', function(e) {
        $('*').removeClass("tlc-active");
        $('*').removeClass("search-active");
        $('*').removeClass("tlc__clicked");
        $('*').removeClass("select-active");
        $('*').removeClass("menu-select-active");
        $('.header__menu-select-body').slideUp("");

    });

    $(document).ready(function(){
        $('.menu-toggle').on('click',function(){
          $('.menu-toggle').toggleClass('active');
          $('.menu').addClass('menu-active');
          $('body').addClass('no-scroll');
        });
    });


    $('.select-block').on('click', function(e) {
        $('*').removeClass("tlc-active");

        $('*').removeClass("tlc__clicked");
        $('.select-body').not($(this).children('.select-body')).removeClass('select-active');
        $(this).children('.select-body').toggleClass('select-active');

        $(this).children('.select-body').children(".select-none").on('click', function () {
            $('.select-body').removeClass('select-active');
            $(this).parent('.select-body').siblings('.select-head').children('.select-side').children(".select-value").text('Не выбрано');
        });

        $(this).children('.select-body').children(".select-option").on('click', function() {
            $(this).parent().removeClass("select-active");

            if ($(this).parent('.select-body').siblings('.select-head').children('.select-side').find(".select-value span").length > 0) {
                var optionValue = $(this).find('label span').text();
                var optionImage = $(this).find('label img').attr('src');

                $(this).parent('.select-body').siblings('.select-head').children('.select-side').find(".select-value span").text(optionValue);
                $(this).parent('.select-body').siblings('.select-head').children('.select-side').find(".select-value img").attr('src', optionImage);
            } else {
                var optionValue = $(this).children('label').text();

                $(this).parent('.select-body').siblings('.select-head').children('.select-side').children(".select-value").text(optionValue);
            }

        });
        e.stopPropagation();
    });
    $('.select-option').on('click', function(e) {
        $('.select-body').removeClass('select-active');
        e.stopPropagation();
    });
    $('.header__search').on('click', function(e) {

        e.stopPropagation();
    });
    $('.header__menu-select-head').on('click', function(e) {
        $(this).parent().toggleClass('menu-select-active');
        $(this).siblings('.header__menu-select-body').slideToggle();
        e.stopPropagation();
    });
    $('.header__menu-select-body').on('click', function(e) {
        e.stopPropagation();
    });

    $('[data-popup-selector]').on('click', function() {
        var popupName = $(this).attr('data-popup-selector');
        var popup = $('[data-popup='+popupName+']');
        if(popup.length > 0) {
            popup.addClass('popup-active');
            $('body').addClass('no-scroll');
        }
    });


    $('.popup').on('click', function(e) {
        $(this).removeClass('popup-active');
        $('body').addClass('no-scroll');
    });
    $('.popup__close').on('click', function(e) {
        $('.popup').removeClass('popup-active');
        $('body').removeClass('no-scroll');
    });
    $('.popup__cont').on('click', function(e) {

        e.stopPropagation();
    });
    $('.header__burger').on('click', function(e) {
        $('.menu').addClass('menu-active');
        $('body').addClass('no-scroll');
    });
    $('.menu__close').on('click', function(e) {
        $('.menu').removeClass('menu-active');
        $('body').removeClass('no-scroll');
    });
    $('.menu').on('click', function(e) {
        $(this).removeClass('menu-active');
        $('body').removeClass('no-scroll');
    });
    $('.menu__side').on('click', function(e) {
        $('*').removeClass("select-active");

        e.stopPropagation();
    });
    $('.menu__popup').on('click', function(e) {
        $('*').removeClass("select-active");
        $('*').removeClass('menu-active');
        e.stopPropagation();
    });

    $('.contacts-list__head').on('click', function() {
        $(this).siblings().slideToggle();
        $(this).toggleClass('contacts-list__head-active');
    });

    $('.card__tools-head').on('click', function() {
        var toolM = $('.card__tools-head').not($(this)).siblings();
        var toolC = $('.card__tools-head').not($(this));
        toolM.slideUp();
        toolC.removeClass('card__tools-head-active');
        $(this).siblings().slideDown();
        $(this).addClass('card__tools-head-active');

    });

    $('.main-slider').slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        speed: 500,
        fade: true,
        arrows: false,
        slidesToShow: 1,
        draggable: false,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 850,
            settings: {
              dots: false
            }
          }
        ]
      });
      $('.adventages__body').slick({
          dots: false,
          autoplay: true,
          autoplaySpeed: 1000,
          infinite: true,
          speed: 500,
          variableWidth: true,
          arrows: false,
          slidesToShow: 1,
          draggable: true,
          centerMode: true,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 600,
              settings: "unslick"
            }
          ]
        });
        $('.certificate__body').slick({
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            speed: 700,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 1280,
                  settings: {
                    slidesToShow: 3
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2
                  }
                },
            ]
        });
        $('.certificate__prev').click(function(){
            $('.certificate__body').slick('slickPrev');
        })
        $('.certificate__next').click(function(){
            $('.certificate__body').slick('slickNext');
        })

        $('.same__body').slick({
                lazyLoad: 'ondemand',
              dots: false,
              autoplay: true,
              autoplaySpeed: 3000,
              infinite: true,
              speed: 700,
              arrows: false,
              slidesToShow: 4,
              slidesToScroll: 1,
              responsive: [
                  {
                    breakpoint: 1280,
                    settings: {
                      slidesToShow: 3
                    }
                  },
                  {
                    breakpoint: 850,
                    settings: {
                      slidesToShow: 2
                    }
                  },
              ]
        });

        $('.same__prev').click(function(){
            $('.same__body').slick('slickPrev');
        })
        $('.same__next').click(function(){
            $('.same__body').slick('slickNext');
        })

    if($( window ).width() < 850) {
        var link = $('.block3__item')
        var width = link.width();
        link.height(width);

        var link2 = $('.block1__item-bg')
        var width2 = link2.width();
        link2.height(width2);

        var link7 = $('.certificate__item')
        var width7 = link7.width();
        link7.height(width7 / 0.705);

        var link10 = $('.systems__img')
        var width10 = link10.width();
        link10.height(width10);

        // var link12 = $('.card__show')
        // var width12 = link12.width();
        // link12.height(width12 / 0.42);

        var link8 = $('.video__bg')
        var width8 = link8.width();
        link8.height(width8 / 2.201);

        // var link13 = $('.card__model-mob')
        // var width13 = link13.width();
        // link13.height(width13 / 0.4);


        $( window ).resize(function() {

            var link = $('.block3__item')
            var width = link.width();
            link.height(width);

            var link10 = $('.systems__img')
            var width10 = link10.width();
            link10.height(width10);

            var link2 = $('.block1__item-bg')
            var width2 = link2.width();
            link2.height(width2);

            var link7 = $('.certificate__item')
            var width7 = link7.width();
            link7.height(width7 / 0.705);

            var link8 = $('.video__bg')
            var width8 = link8.width();
            link8.height(width8 / 2.201);
        });
    }else if($( window ).width() < 600) {
        var link6 = $('.banner-2')
        var width6 = link6.width();
        link6.height(width6 / 1.30);

        var link8 = $('.video__bg')
        var width8 = link8.width();
        link8.height(width8 / 1.801);

        var link9 = $('.news-detail__img')
        var width9 = link9.width();
        link9.height(width9 / 1.5);
        $( window ).resize(function() {

            var link8 = $('.video__bg')
            var width8 = link8.width();
            link8.height(width8 / 1.801);

            var link9 = $('.news-detail__img')
            var width9 = link9.width();
            link9.height(width9 / 1.5);
        });
    }else {

        var link14 = $('.card__material-item')
        var width14 = link14.width();
        link14.height(width14);

        var link6 = $('.banner-2')
        var width6 = link6.width();
        link6.height(width6 / 2.362);

        var link8 = $('.video__bg')
        var width8 = link8.width();
        link8.height(width8 / 2.201);

        var link9 = $('.news-detail__img')
        var width9 = link9.width();
        link9.height(width9 / 2.23);

        var link10 = $('.systems__img')
        var width10 = link10.width();
        link10.height((width10 - 85) / 1.91);



        $( window ).resize(function() {

            var link14 = $('.card__material-item')
            var width14 = link14.width();
            link14.height(width14);

            var link8 = $('.video__bg')
            var width8 = link8.width();
            link8.height(width8 / 2.201);

            var link9 = $('.news-detail__img')
            var width9 = link9.width();
            link9.height(width9 / 2.23);

            var link10 = $('.systems__img')
            var width10 = link10.width();
            link10.height((width10 - 85) / 1.91);


        })
    }
    var link4 = $('.catalog__img')
    var width4 = link4.width();
    link4.height(width4);
    var link5 = $('.news__img')
    var width5 = link5.width();
    link5.height(width5 / 1.456);
    var link3 = $('.adventages__img')
    var width3 = link3.width();
    link3.height(width3);


    $( window ).resize(function() {

        var link4 = $('.catalog__img')
        var width4 = link4.width();
        link4.height(width4);


        var link5 = $('.news__img')
        var width5 = link5.width();
        link5.height(width5 / 1.456);
        if($( window ).width() <= 850) {
            $('.card__content').css('display', 'none');
        }else {
            $('.card__content').css('display', 'block');
        }


        if($( window ).width() < 600) {
            var link6 = $('.banner-2')
            var width6 = link6.width();
            link6.height(width6 / 1.30);

            var link3 = $('.adventages__img')
            var width3 = link3.width();
            link3.height(width3);

        }else {
            var link6 = $('.banner-2')
            var width6 = link6.width();
            link6.height(width6 / 2.362);
        }

    });
    $('.card__model-border').on('click', function() {
        $('.card__model-border').removeClass('card__model-active');
        $(this).addClass('card__model-active');
    });
    $('.decor-item').on('click', function() {
        $('.decor-item').removeClass('card__material-p-active');
        $(this).addClass('card__material-p-active');
    });
    $('.material-item').on('click', function() {
        $('.material-item').removeClass('card__material-p-active');
        $(this).addClass('card__material-p-active');
    });
    $('.tool1').on('click', function() {
        $('.card__tools-item').removeClass('card__tools-item-active');
        $(this).addClass('card__tools-item-active');
        $('.card__tool-body').removeClass('card__tool-body-active');
        $('.tool1-body').addClass('card__tool-body-active');

        // var link11 = $('.card__model-help:visible .card__model');
        // var height11 = link11.parent().find('img').height();
        // link11.height(height11);

    });
    $('.tool2').on('click', function() {
        $('.card__tools-item').removeClass('card__tools-item-active');
        $(this).addClass('card__tools-item-active');
        $('.card__tool-body').removeClass('card__tool-body-active');
        $('.tool2-body').addClass('card__tool-body-active');

        var link14 = $('.tool2-body .card__material-item')
        var width14 = link14.width();
        link14.height(width14);
        $( window ).resize(function() {
            var link14 = $('.tool2-body .card__material-item')
            var width14 = link14.width();
            link14.height(width14);
        });
    });
    $('.tool3').on('click', function() {
        $('.card__tools-item').removeClass('card__tools-item-active');
        $(this).addClass('card__tools-item-active');
        $('.card__tool-body').removeClass('card__tool-body-active');
        $('.tool3-body').addClass('card__tool-body-active');

        // var link15 = $('.tool3-body .card__decor-item')
        // var width15 = link15.width();
        // link15.height(width15);
    });

    $(".tel").mask("8-(999)-999-99-99");

    var timer;

    $('.js-form-ajax').on('submit', function(e) {
    	e.preventDefault();

    	var _this = this;
    	var error = false;
    	var formMessage = $(_this).find('.form__message');

    	if (formMessage.length == 0) {
    		formMessage = $(_this).parent().find('.form__message');
    	}

    	clearTimeout(timer);

    	formMessage.removeClass('success', 'error');

    	if ($(_this).find('input[name="NAME"]').val().length == 0) {
    		$(_this).find('input[name="NAME"]').addClass('error');
    		error = true;
    	} else {
    		$(_this).find('input[name="NAME"]').removeClass('error');
    	}

    	if ($(_this).find('input[name="PHONE"]').val().replace(/\D+/g,"").length < 11) {
    		$(_this).find('input[name="PHONE"]').addClass('error');
    		error = true;
    	} else {
    		$(_this).find('input[name="PHONE"]').removeClass('error');
    	}

    	if (!error) {
	        $.ajax({
	            url: '/ajax/addRequest.php',
	            type: 'POST',
	            dataType: 'json',
	            data: $(this).serialize(),
	            success: function(result) {
	            	if (result.success) {
	            		formMessage.addClass('success');

	            		$(_this).find('input').each(function() {
	            			if ($(this).attr('type') != 'hidden') {
	            				$(this).val('');
	            			}
	            		});

	            		timer = setTimeout(function() {
	            			formMessage.html('');
	            		}, 5000);
	            	} else {
	            		formMessage.addClass('error');
	            	}

	            	formMessage.html(result.message);
					ym(64922065,'reachGoal','send_all_forms');
					console.log('vizvat zamershika 111');
                    ym(64922065,'reachGoal','zakazzvonotprav');
                    console.log('цель отправлена');
                }
	        });
	    }
    });

    $('.js-form-ajax-order').on('submit', function(e) {
    	e.preventDefault();

    	var _this = this;
    	var error = false;
    	var formMessage = $(_this).find('.form__message');

    	if (formMessage.length == 0) {
    		formMessage = $(_this).parent().find('.form__message');
    	}

    	clearTimeout(timer);

    	formMessage.removeClass('success', 'error');

    	if ($(_this).find('input[name="NAME"]').val().length == 0) {
    		$(_this).find('input[name="NAME"]').addClass('error');
    		error = true;
    	} else {
    		$(_this).find('input[name="NAME"]').removeClass('error');
    	}

    	if ($(_this).find('input[name="PHONE"]').val().replace(/\D+/g,"").length < 11) {
    		$(_this).find('input[name="PHONE"]').addClass('error');
    		error = true;
    	} else {
    		$(_this).find('input[name="PHONE"]').removeClass('error');
    	}

    	if (!error) {
	        $.ajax({
	            url: '/ajax/addOrder.php',
	            type: 'POST',
	            dataType: 'json',
	            data: $(this).serialize() + "&PRODUCT=" + $('.js-material-image-left').data('result-id') + "&DESIGN=" + $('.js-design-image').data('result-id'),
	            success: function(result) {
	            	if (result.success) {
	            		formMessage.addClass('success');

	            		$(_this).find('input').each(function() {
	            			if ($(this).attr('type') != 'hidden') {
	            				$(this).val('');
	            			}
	            		});

	            		timer = setTimeout(function() {
	            			formMessage.html('');
	            		}, 5000);
	            	} else {
	            		formMessage.addClass('error');
	            	}

	            	formMessage.html(result.message);
	            }
	        });
	    }
    });

    $('.js-filter-material').on('change', function() {
        $('.js-filter-color-parent').hide().find('input').removeAttr('checked');
        $('.js-filter-color-parent[data-material='+ $(this).val() + ']').show();

        var element = $($('.js-filter-color-parent[data-material='+ $(this).val() + ']')[0]);
        var optionValue = element.find('label span').text();
        var optionImage = element.find('label img').attr('src');

        element.parent('.select-body').siblings('.select-head').children('.select-side').find(".select-value span").text(optionValue);
        element.parent('.select-body').siblings('.select-head').children('.select-side').find(".select-value img").attr('src', optionImage);
        element.find('input').attr('checked', 'checked').change();
    });

    $('.js-filter-input').on('change', function() {
        if ($('.js-filter-section:checked').length > 0 && $('.js-filter-material:checked').length > 0 && $('.js-filter-color:checked').length > 0) {
            $.ajax({
                url: '/ajax/filter.php',
                type: 'POST',
                dataType: 'json',
                data: "section=" + $('.js-filter-section:checked').val() + "&material=" + $('.js-filter-material:checked').val() + "&color=" + $('.js-filter-color:checked').val(),
                success: function(result) {
                    $('.js-filter-button').show().attr('href', result.url);
                    $('.js-filter-count').html(result.count);
                }
            });
        }
    });

    $('.js-filter-button').on('click', function(e) {
        e.preventDefault();

        if ($(this).attr('href') != '#') {
            location.href = $(this).attr('href');
        }
    });
});