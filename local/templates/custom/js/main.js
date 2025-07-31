$(document).ready(function () {
    $(document).on("click", function (e) {
        $("*").removeClass("tlc-active");
        $("*").removeClass("search-active");
        $("*").removeClass("tlc__clicked");
        $("*").removeClass("select-active");
        $("*").removeClass("menu-select-active");
        $(".header__menu-select-body").slideUp("");
    });
    
     $(".mob-base-button").on("click", function (e) {
         $('.card__tools-mobile').slideToggle();
     });
    
    
// Увеличение картинки в разделе О нас
    $('a.certificate-fancy').fancybox()

    $(document).ready(function () {
        $(".menu-toggle").on("click", function () {
            $(".menu-toggle").toggleClass("active");
            $(".menu").addClass("menu-active");
            $("body").addClass("no-scroll");
        });
    });

    // активный пункт каталога

    let url = document.location.href;
	$.each($(".catalog-menu a"), function() {
	if (this.href == url) {
	$(this).addClass('current').parent().addClass('current');
		}
	});


    $(".select-block").on("click", function (e) {
        $("*").removeClass("tlc-active");

        $("*").removeClass("tlc__clicked");
        $(".select-body").not($(this).children(".select-body")).removeClass("select-active");
        $(this).children(".select-body").toggleClass("select-active");

        $(this)
            .children(".select-body")
            .children(".select-none")
            .on("click", function () {
                $(".select-body").removeClass("select-active");
                $(this)
                    .parent(".select-body")
                    .siblings(".select-head")
                    .children(".select-side")
                    .children(".select-value")
                    .text("Не выбрано");
            });

        $(this)
            .children(".select-body")
            .children(".select-option")
            .on("click", function () {
                $(this).parent().removeClass("select-active");

                if (
                    $(this).parent(".select-body").siblings(".select-head").children(".select-side").find(".select-value span")
                        .length > 0
                ) {
                    var optionValue = $(this).find("label span").text();
                    var optionImage = $(this).find("label img").attr("src");

                    $(this)
                        .parent(".select-body")
                        .siblings(".select-head")
                        .children(".select-side")
                        .find(".select-value span")
                        .text(optionValue);
                    $(this)
                        .parent(".select-body")
                        .siblings(".select-head")
                        .children(".select-side")
                        .find(".select-value img")
                        .attr("src", optionImage);
                } else {
                    var optionValue = $(this).children("label").text();

                    $(this)
                        .parent(".select-body")
                        .siblings(".select-head")
                        .children(".select-side")
                        .children(".select-value")
                        .text(optionValue);
                }
            });
        e.stopPropagation();
    });
    $(".select-option").on("click", function (e) {
        $(".select-body").removeClass("select-active");
        e.stopPropagation();
    });
    $(".header__search").on("click", function (e) {
        e.stopPropagation();
    });
    $(".header__search-logo").on("click", function (e) {
        $(this).parent().toggleClass("search-active");
        $(this).parent().siblings().toggleClass("search-active");
        e.stopPropagation();
    });
    $(".header__menu-select-head").on("click", function (e) {
        $(this).parent().toggleClass("menu-select-active");
        $(this).siblings(".header__menu-select-body").slideToggle();
        e.stopPropagation();
    });
    $(".header__menu-select-body").on("click", function (e) {
        e.stopPropagation();
    });
    $("[data-popup-selector]").on("click", function (e) {
        e.preventDefault();
        var popupName = $(this).attr("data-popup-selector");
        var popup = $("[data-popup=" + popupName + "]");
        if (popup.length > 0) {
            popup.addClass("popup-active");
            $("body").addClass("no-scroll");
        }
    });

    $(".popup").on("click", function (e) {
        $(this).removeClass("popup-active");
        $("body").removeClass("no-scroll");
    });

    $(".popup__close").on("click", function (e) {
        $(".popup").removeClass("popup-active");
        $("body").removeClass("no-scroll");
    });

    $(document).on("click", ".popup__close", function (e) {
        $(".popup").removeClass("popup-active");
        $("body").removeClass("no-scroll");
    });
    $(".popup__cont").on("click", function (e) {
        e.stopPropagation();
    });
    $(".header__burger").on("click", function (e) {
        $(".menu").addClass("menu-active");
        $("body").addClass("no-scroll");
    });
    $(".menu__close").on("click", function (e) {
        $(".menu").removeClass("menu-active");
        $("body").removeClass("no-scroll");
    });
    $(".menu").on("click", function (e) {
        $(this).removeClass("menu-active");
        $("body").removeClass("no-scroll");
    });
    $(".menu__side").on("click", function (e) {
        $("*").removeClass("select-active");

        e.stopPropagation();
    });
    $(".menu__popup").on("click", function (e) {
        $("*").removeClass("select-active");
        $("*").removeClass("menu-active");
        e.stopPropagation();
    });

    $(".contacts-list__head").on("click", function () {
        $(this).siblings().slideToggle();
        $(this).toggleClass("contacts-list__head-active");
    });

    $(".card__tools-head-active").on("click", function (e) {});

    $(".card__tools-head").on("click", function () {
        if ($(this).hasClass("card__tools-head-active")) {
            $(this).siblings().slideUp();
            $(this).removeClass("card__tools-head-active");
            return;
        }

        var toolM = $(".card__tools-head").not($(this)).siblings();
        var toolC = $(".card__tools-head").not($(this));
        toolM.slideUp();
        toolC.removeClass("card__tools-head-active");
        $(this).siblings().slideDown();
        $(this).addClass("card__tools-head-active");
    });

    $(".main-slider").slick({
        lazyLoad: "ondemand",
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
                    dots: false,
                },
            },
        ],
    });
    let adventagesBody = $(".adventages__body").slick({
        lazyLoad: "ondemand",
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
                settings: "unslick",
            },
        ],
    });

    let newsSlider = $(".news__slide").slick({
        lazyLoad: "ondemand",
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        speed: 500,
        variableWidth: false,
        arrows: true,
        slidesToShow: 2,
        draggable: true,
        centerMode: false,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 600,
                settings: "unslick",
            },
        ],
    });

   setTimeout(() => {
       let articleSlide = $(".article__slide").slick({
           lazyLoad: "ondemand",
           dots: false,
           autoplay: true,
           autoplaySpeed: 5000,
           infinite: true,
           speed: 500,
           variableWidth: false,
           arrows: false,
           slidesToShow: 3,
           draggable: true,
           centerMode: false,
           slidesToScroll: 1,
           responsive: [
               {
                   breakpoint: 600,
                   settings: "unslick",
               },
           ],
       });
   }, 1000);

    let certificateSlider = $(".certificate__body").slick({
        lazyLoad: "ondemand",
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
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });

    $(".work_gallery").slick({
        lazyLoad: "ondemand",
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        speed: 500,
        variableWidth: false,
        arrows: true,
        slidesToShow: 3,
        draggable: true,
        adaptiveHeight: true,
        centerMode: false,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 381,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
    $(".certificate__prev").click(function () {
        $(".certificate__body").slick("slickPrev");
    });
    $(".certificate__next").click(function () {
        $(".certificate__body").slick("slickNext");
    });

    let sameBodySlider = $(".same__body").slick({
        lazyLoad: "ondemand",
        dots: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        speed: 700,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 850,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });

    $(".same__prev").click(function () {
        $(".same__body").slick("slickPrev");
    });
    $(".same__next").click(function () {
        $(".same__body").slick("slickNext");
    });

    if ($(window).width() < 850) {
        var link = $(".block3__item");
        var width = link.width();
        link.height(width);

        var link2 = $(".block1__item-bg");
        var width2 = link2.width();
        link2.height(width2);

        var link7 = $(".certificate__item");
        var width7 = link7.width();
        link7.height(width7 / 0.705);

        var link10 = $(".systems__img");
        var width10 = link10.width();
        link10.height(width10);

        // var link12 = $('.card__show')
        // var width12 = link12.width();
        // link12.height(width12 / 0.42);

        var link8 = $(".video__bg");
        var width8 = link8.width();
        link8.height(width8 / 2.201);

        // var link13 = $('.card__model-mob')
        // var width13 = link13.width();
        // link13.height(width13 / 0.4);

        $(window).resize(function () {
            var link = $(".block3__item");
            var width = link.width();
            link.height(width);

            var link10 = $(".systems__img");
            var width10 = link10.width();
            link10.height(width10);

            var link2 = $(".block1__item-bg");
            var width2 = link2.width();
            link2.height(width2);

            var link7 = $(".certificate__item");
            var width7 = link7.width();
            link7.height(width7 / 0.705);

            var link8 = $(".video__bg");
            var width8 = link8.width();
            link8.height(width8 / 2.201);
        });
    } else if ($(window).width() < 600) {
        var link6 = $(".banner-2");
        var width6 = link6.width();
        link6.height(width6 / 1.3);

        var link8 = $(".video__bg");
        var width8 = link8.width();
        link8.height(width8 / 1.801);

        var link9 = $(".news-detail__img");
        var width9 = link9.width();
        link9.height(width9 / 1.5);
        $(window).resize(function () {
            var link8 = $(".video__bg");
            var width8 = link8.width();
            link8.height(width8 / 1.801);

            var link9 = $(".news-detail__img");
            var width9 = link9.width();
            link9.height(width9 / 1.5);
        });
    } else {
        var link14 = $(".card__material-item");
        var width14 = link14.width();
        link14.height(width14);

        var link6 = $(".banner-2");
        var width6 = link6.width();
        link6.height(width6 / 2.362);

        var link8 = $(".video__bg");
        var width8 = link8.width();
        link8.height(width8 / 2.201);

        var link9 = $(".news-detail__img");
        var width9 = link9.width();
        link9.height(width9 / 2.23);

        var link10 = $(".systems__img");
        var width10 = link10.width();
        link10.height((width10 - 85) / 1.91);

        $(window).resize(function () {
            var link14 = $(".card__material-item");
            var width14 = link14.width();
            link14.height(width14);

            var link8 = $(".video__bg");
            var width8 = link8.width();
            link8.height(width8 / 2.201);

            var link9 = $(".news-detail__img");
            var width9 = link9.width();
            link9.height(width9 / 2.23);

            var link10 = $(".systems__img");
            var width10 = link10.width();
            link10.height((width10 - 85) / 1.91);
        });
    }
    var link4 = $(".catalog__img");
    var width4 = link4.width();
    link4.height(width4 * 1.2);

    var link14 = $(".service__img");
    var width14 = link14.width();
    link14.height(width14 * 1.2);

    var link4_slider = $(".catalog__img__slider");
    var width4_slider = link4_slider.width();
    link4_slider.height(width4_slider * 1.8);

    var link5 = $(".news__img");
    var width5 = link5.width();
    link5.height(width5 / 1.456);

    var link16 = $(".sale__img");
    var width16 = link16.width();
    link16.height(width16 / 0.7);

    var link3 = $(".adventages__img");
    var width3 = link3.width();
    link3.height(width3);

    $(window).resize(function () {
        var link16 = $(".sale_img");
        var width16 = link16.width();
        link16.height(width16 * 2);

        var link4 = $(".catalog__img");
        var width4 = link4.width();
        link4.height(width4 * 1.2);

        var link14 = $(".service__img");
        var width14 = link14.width();
        link14.height(width14 * 1.2);

        var link4_slider = $(".catalog__img__slider");
        var width4_slider = link4_slider.width();
        link4_slider.height(width4 * 1.8);

        var link5 = $(".news__img");
        var width5 = link5.width();
        link5.height(width5 / 1.456);
       /* if ($(window).width() <= 850) {
            $(".card__content").css("display", "none");
        } else {
            $(".card__content").css("display", "block");
        }*/

        if ($(window).width() < 600) {
            var link6 = $(".banner-2");
            var width6 = link6.width();
            link6.height(width6 / 1.3);

            var link3 = $(".adventages__img");
            var width3 = link3.width();
            link3.height(width3);
        } else {
            var link6 = $(".banner-2");
            var width6 = link6.width();
            link6.height(width6 / 2.362);
        }
    });
    $(".card__model-border").on("click", function () {
        $(".card__model-border").removeClass("card__model-active");
        $(this).addClass("card__model-active");
    });
    $(".decor-item").on("click", function () {
        $(".decor-item").removeClass("card__material-p-active");
        $(this).addClass("card__material-p-active");
    });
    $(".material-item").on("click", function () {
        $(".material-item").removeClass("card__material-p-active");
        $(this).addClass("card__material-p-active");
    });
    $(".tool1").on("click", function () {
        $(".card__tools-item").removeClass("card__tools-item-active");
        $(this).addClass("card__tools-item-active");
        $(".card__tool-body").removeClass("card__tool-body-active");
        $(".tool1-body").addClass("card__tool-body-active");

        // var link11 = $('.card__model-help:visible .card__model');
        // var height11 = link11.parent().find('img').height();
        // link11.height(height11);
    });
    $(".tool2").on("click", function () {
        $(".card__tools-item").removeClass("card__tools-item-active");
        $(this).addClass("card__tools-item-active");
        $(".card__tool-body").removeClass("card__tool-body-active");
        $(".tool2-body").addClass("card__tool-body-active");

        var link14 = $(".tool2-body .card__material-item");
        var width14 = link14.width();
        link14.height(width14);
        $(window).resize(function () {
            var link14 = $(".tool2-body .card__material-item");
            var width14 = link14.width();
            link14.height(width14);
        });
    });
    $(".tool3").on("click", function () {
        $(".card__tools-item").removeClass("card__tools-item-active");
        $(this).addClass("card__tools-item-active");
        $(".card__tool-body").removeClass("card__tool-body-active");
        $(".tool3-body").addClass("card__tool-body-active");

        // var link15 = $('.tool3-body .card__decor-item')
        // var width15 = link15.width();
        // link15.height(width15);
    });

    $(".tel").mask("+7 999 999-99-99");

    var timer;

    $(".js-form-ajax").on("submit", function (e) {
        e.preventDefault();

        var _this = this;
        var error = false;
        var formMessage = $(_this).find(".form__message");
        var button = $(_this).find("button");

        if (formMessage.length == 0) {
            formMessage = $(_this).parent().find(".form__message");
        }

        button.prop("disabled", true);

        clearTimeout(timer);

        formMessage.removeClass("success", "error");
        /*
        if ($(_this).find('input[name="NAME"]').length > 0) {
            if ($(_this).find('input[name="NAME"]').val().length == 0) {
                $(_this).find('input[name="NAME"]').addClass("error");
                error = true;
            } else {
                $(_this).find('input[name="NAME"]').removeClass("error");
            }
        }*/

        if ($(_this).find('input[name="PHONE"]').length > 0) {
            if ($(_this).find('input[name="PHONE"]').val().replace(/\D+/g, "").length < 11) {
                $(_this).find('input[name="PHONE"]').addClass("error");
                error = true;
            } else {
                $(_this).find('input[name="PHONE"]').removeClass("error");
            }
        }

        if (!error) {
            $.ajax({
                url: "/ajax/addRequest.php",
                type: "POST",
                dataType: "json",
                data: $(this).serialize(),
                success: function (result) {
                    if (result.success) {
                        formMessage.addClass("success");

                        $(_this)
                            .find("input")
                            .each(function () {
                                if ($(this).attr("type") != "hidden") {
                                    $(this).val("");
                                }
                            });

                        timer = setTimeout(function () {
                            formMessage.html("");
                        }, 5000);
                    } else {
                        formMessage.addClass("error");
                        button.prop("disabled", false);
                    }
                    
                    formMessage.html(result.message);
					ym(64922065,'reachGoal','callback2');
       				console.log('заказ звонка с внутренней стр');

                },
            });
        }
    });

    $(".js-form-ajax-order").on("submit", function (e) {
        e.preventDefault();

        var _this = this;
        var error = false;
        var formMessage = $(_this).find(".form__message");

        if (formMessage.length == 0) {
            formMessage = $(_this).parent().find(".form__message");
        }

        clearTimeout(timer);

        formMessage.removeClass("success", "error");
        /*
        if ($(_this).find('input[name="NAME"]').val().length == 0) {
            $(_this).find('input[name="NAME"]').addClass("error");
            error = true;
        } else {
            $(_this).find('input[name="NAME"]').removeClass("error");
        }*/

        if ($(_this).find('input[name="PHONE"]').val().replace(/\D+/g, "").length < 11) {
            $(_this).find('input[name="PHONE"]').addClass("error");
            error = true;
        } else {
            $(_this).find('input[name="PHONE"]').removeClass("error");
        }

        if (!error) {
            $.ajax({
                url: "/ajax/addOrder.php",
                type: "POST",
                dataType: "json",
                data:
                    $(this).serialize() +
                    "&PRODUCT=" +
                    $(".js-material-image-left").data("result-id") +
                    "&DESIGN=" +
                    $(".js-design-image").data("result-id"),
                success: function (result) {
                    if (result.success) {
                        formMessage.addClass("success");

                        $(_this)
                            .find("input")
                            .each(function () {
                                if ($(this).attr("type") != "hidden") {
                                    $(this).val("");
                                }
                            });

                        timer = setTimeout(function () {
                            formMessage.html("");
                        }, 5000);
                    } else {
                        formMessage.addClass("error");
                    }

                    formMessage.html(result.message);
					ym(64922065,'reachGoal','form_order');
       				console.log('форма заказа на внутренней стр');					
                },
            });
        }
    });

    $(".js-filter-material").on("change", function () {
        $(".js-filter-color-parent").hide().find("input").removeAttr("checked");
        $(".js-filter-color-parent[data-material=" + $(this).val() + "]").show();

        var element = $($(".js-filter-color-parent[data-material=" + $(this).val() + "]")[0]);
        var optionValue = element.find("label span").text();
        var optionImage = element.find("label img").attr("src");

        element
            .parent(".select-body")
            .siblings(".select-head")
            .children(".select-side")
            .find(".select-value span")
            .text(optionValue);
        element
            .parent(".select-body")
            .siblings(".select-head")
            .children(".select-side")
            .find(".select-value img")
            .attr("src", optionImage);
        element.find("input").attr("checked", "checked").change();
    });

    $(".js-filter-input").on("change", function () {
        if (
            $(".js-filter-section:checked").length > 0 &&
            $(".js-filter-material:checked").length > 0 &&
            $(".js-filter-color:checked").length > 0
        ) {
            $.ajax({
                url: "/ajax/filter.php",
                type: "POST",
                dataType: "json",
                data:
                    "section=" +
                    $(".js-filter-section:checked").val() +
                    "&material=" +
                    $(".js-filter-material:checked").val() +
                    "&color=" +
                    $(".js-filter-color:checked").val(),
                success: function (result) {
                    $(".js-filter-button").show().attr("href", result.url);
                    $(".js-filter-count").html(result.count);
                },
            });
        }
    });

    $(".js-filter-button").on("click", function (e) {
        e.preventDefault();

        if ($(this).attr("href") != "#") {
            location.href = $(this).attr("href");
        }
    });
    // Перемещение карточки с дверью при скролле
    if ($(".js-card-side").length) {
        var heightCatInfo = $(".js-card-main").outerHeight();
        var heightCatMain = $(".js-card-side").outerHeight();
        var topCatInfo = $(".js-card-main").offset().top - $("header").outerHeight();

        $(window).on("resize", function () {
            heightCatInfo = $(".js-card-main").outerHeight();
            heightCatMain = $(".js-card-side").outerHeight();
            topCatInfo = $(".js-card-main").offset().top - $("header").outerHeight();
        });

        if (heightCatInfo > heightCatMain) {
            $(window).on("scroll", function () {
                if ($(this).scrollTop() > topCatInfo && $(this).scrollTop() < topCatInfo + heightCatInfo) {
                    $(".js-card-side").addClass("fixed");
                } else {
                    $(".js-card-side").removeClass("fixed");
                }
            });
        }
    }

    if (!(('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0))) {
        $(".js-loupe").imagezoomsl({ zoomrange: [3, 3] });
    }

    $("[data-devbx-popup-form]").on("click", function (e) {
        e.preventDefault();

        let params;

        try {
            params = JSON.parse(this.dataset.popupParams);
        } catch (e) {}

        if (typeof params !== "object") params = {};

        $.ajax({
            url: "/ajax/devbxform.php",
            method: "POST",
            context: this,
            data: Object.assign(params, {
                sessid: BX.bitrix_sessid(),
                action: this.dataset.devbxPopupForm,
            }),
            success: function (result) {
                let node, obHtml;

                obHtml = BX.processHTML(result, false);

                node = document.querySelector('.popup[data-devbx-form="' + this.dataset.devbxPopupForm + '"]');
                if (!node) {
                    node = document.createElement("DIV");
                    node.classList.add("popup");
                    node.dataset["devbxForm"] = this.dataset.devbxPopupForm;
                    document.body.appendChild(node);
                } else {
                    console.log("node exists", node);
                }

                node.innerHTML = obHtml.HTML;
                node.classList.add("popup-active");
                node.style.zIndex = 1000;

                BX.ajax.processScripts(obHtml.SCRIPT, false);

                document.body.classList.add("no-scroll");
            },
        });
    });
        // Получаем все теги link с атрибутом rel="canonical"
    let canonicalLinks = document.querySelectorAll('link[rel="canonical"]');

// Проходим по каждому тегу link и преобразуем буквы в атрибуте href в нижний регистр
for (let i = 0; i < canonicalLinks.length; i++) {
    let href = canonicalLinks[i].getAttribute('href');
    if (href) {
        canonicalLinks[i].setAttribute('href', href.toLowerCase());
    }
};

 // кнопка Наверх
 const btnUp = {
    el: document.querySelector('.btn-up'),
    show() {
        this.el.classList.remove('btn-up_hide');
    },
    hide() {
        this.el.classList.add('btn-up_hide');
    },
    addEventListener() {
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY || document.documentElement.scrollTop;
            // если страница прокручена больше чем на 10px, то делаем кнопку видимой, иначе скрываем
            scrollY > 10 ? this.show() : this.hide();
        });
        document.querySelector('.btn-up').onclick = () => {
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }
    }
}

btnUp.addEventListener();

    // Слайдер фото в карточке
    (function(){

        let $slider = $('.card__result-pics');

        if (!$slider.length) return;

        $slider.slick({
            // lazyLoad: "ondemand",
            dots: true,
            autoplay: false,
            infinite: true,
            speed: 900,
            variableWidth: false,
            arrows: true,
            slidesToShow: 1,
            draggable: true,
            adaptiveHeight: true,
            centerMode: false,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"><svg width="28" height="9" viewBox="0 0 28 9" fill="none"><path d="M1.091 4.27609C0.895739 4.47135 0.895739 4.78793 1.091 4.98319L4.27298 8.16517C4.46824 8.36044 4.78482 8.36044 4.98009 8.16517C5.17535 7.96991 5.17535 7.65333 4.98009 7.45807L2.15166 4.62964L4.98009 1.80121C5.17535 1.60595 5.17535 1.28937 4.98009 1.09411C4.78482 0.898845 4.46824 0.898845 4.27298 1.09411L1.091 4.27609ZM27.5557 4.12964L1.44455 4.12964L1.44455 5.12964L27.5557 5.12964L27.5557 4.12964Z"></path></svg></button>',
            nextArrow: '<button type="button" class="slick-next"><svg width="28" height="9" viewBox="0 0 28 9" fill="none"><path d="M26.909 4.72391C27.1043 4.52865 27.1043 4.21207 26.909 4.0168L23.727 0.834823C23.5318 0.639561 23.2152 0.639561 23.0199 0.834823C22.8246 1.03009 22.8246 1.34667 23.0199 1.54193L25.8483 4.37036L23.0199 7.19878C22.8247 7.39405 22.8247 7.71063 23.0199 7.90589C23.2152 8.10115 23.5318 8.10115 23.727 7.90589L26.909 4.72391ZM0.444336 4.87036L26.5554 4.87036L26.5554 3.87036L0.444336 3.87036L0.444336 4.87036Z"></path></svg></button>',
            /*afterChange: function(){
                $slider.find(".js-loupe").imagezoomsl({ zoomrange: [3, 3] });
            }*/
        });

    })();

   
});