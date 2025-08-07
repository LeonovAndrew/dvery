$(function () {
    $("a.video__link").fancybox({
        type: 'swf'
    });

    $('.decor-item').on('click', function () {
        var materialId = $('.material-item.card__material-p-active').data('id');
        var designId = $(this).data('id');

        if (design[materialId][designId].NOT_OFORM === 'Y') {
            $('.js-loupe')
                .attr('src', '')
                .attr('data-result-id', design[materialId][designId].ID);
        } else {
            $('.js-loupe')
                .attr('src', design[materialId][designId].PICTURE)
                .attr('data-result-id', design[materialId][designId].ID);
        }

        $('.magnifier img:last-child').attr('src', design[materialId][designId].PICTURE);

        $('.js-design-image')
            .css('background-image', 'url(' + design[materialId][designId].PICTURE + ')')
            .attr('data-result-id', design[materialId][designId].ID);
    });

    $('.material-item').on('click', function () {
        var designId = $('.decor-item.card__material-p-active').data('id');
        var materialId = $(this).data('id');
        var actualModelId = $('.model-item.card__model-active').data('id');

        $('.js-loupe')
            .attr('data-result-id', design[materialId][designId].ID);

        // Меняем фото в слайдере
        if (document.querySelector('.card__result-pic')) {
            const slides = document.querySelectorAll('.card__result-pic');
            let arOffers = Object.values(offers[materialId]);
            let arDesign = Object.values(design[materialId]);

            slides.forEach(slide => {
                const rama = slide.querySelector('.js-loupe');
                const dver = slide.querySelector('.js-loupe2');

                arOffers.forEach((offer, i) => {
                    if (i == slide.dataset.key) {
                        dver.src = offer.PICTURE;
                    }
                });

                arDesign.forEach((design, i) => {
                    rama.style.display = 'block';
                    rama.src = design.PICTURE;
                });
            });
        }

        $('.js-design-image')
            .css('background-image', 'url(' + design[materialId][designId].PICTURE + ')')
            .attr('data-result-id', design[materialId][designId].ID);

        $('.magnifier img:last-child').attr('src', design[materialId][designId].PICTURE);

        $('.model-item').each(function () {
            var modelId = $(this).data('id');
            $(this).find('.js-material-image').css('background-image', 'url(' + offers[materialId][modelId].PICTURE + ')');
        });

        $('.magnifier .loupe2').attr('src', offers[materialId][actualModelId].PICTURE);

        $('.js-material-image-left')
            .css('background-image', 'url(' + offers[materialId][actualModelId].PICTURE + ')')
            .attr('data-result-id', offers[materialId][actualModelId].ID);


        $('.card__price_act span').html(prettify(offers[materialId][actualModelId].PRICE));
        $('.card__price_old span').html(prettify(offers[materialId][actualModelId].PRICE_OLD));
        // TODO разобраться
        // $('.card__price_parts span').html(prettify(offers[materialId][modelId].PRICE_PARTS));
        $('.card__meta_model span').html(prettify(offers[materialId][actualModelId].TEXT));
    });

    $('.model-item').on('click', function () {
        var materialId = $('.material-item.card__material-p-active').data('id');
        var modelId = $(this).data('id');

        if (offers[materialId][modelId].ID) {
            $('.js-loupe2')
                .attr('data-result-id', offers[materialId][modelId].ID);
        }

        if (document.querySelector('.card__result-pic')) {
            let items = [];
            if (window.innerWidth > 998) {
                items = document.querySelectorAll('.card__tool-body-active .model-item')
            } else {
                items = document.querySelectorAll('.card__tools-mobile-item .model-item')
            }
            let index = 0;
            let itemIndex = 0

            items.forEach(item => {
                if (item.parentElement.style.display != 'none') {
                    if (item.classList.contains('card__model-active')) {
                        index = itemIndex;
                    }

                    itemIndex++;
                }
            });

            window.cardSwiper.slideTo(index)
        }

        $('.magnifier .loupe2').attr('src', offers[materialId][modelId].PICTURE);

        $('.js-material-image-left')
            .css('background-image', 'url(' + offers[materialId][modelId].PICTURE + ')')
            .attr('data-result-id', offers[materialId][modelId].ID);


        $('.card__price_act span').html(prettify(offers[materialId][modelId].PRICE));
        $('.card__price_old span').html(prettify(offers[materialId][modelId].PRICE_OLD));
        $('.card__price_parts span').html(prettify(offers[materialId][modelId].PRICE_PARTS));
        $('.card__meta_model span').html(prettify(offers[materialId][modelId].TEXT));

        setComplectList(offers[materialId][modelId].ID);
    });

    $('.open_card_popup').on('click', function () {

        let $trig = $(this), $targ = $($trig.attr('href'));

        if ($targ.length) {
            $targ.addClass('shown');
            $('body').addClass('noscroll');
        }

        return false;
    });

    $('.card__popup_close').on('click', function (e) {

        let $trig = $(this), $targ = $trig.closest('.card__popup');

        if ($targ.length) {
            $targ.removeClass('shown');
            $('body').removeClass('noscroll');
        }

        return false;

    });

    $('.card__popup').on('click', function (e) {

        let $trig = $(e.target);

        if ($trig.hasClass('card__popup') && !$trig.closest('card__popup_window').length) {

            $trig.removeClass('shown');
            $('body').removeClass('noscroll');
            return false;

        }

    });

    $('.card-text__head').on('click', function () {

        if (window.innerWidth > 850) return false;

        let $head = $(this), $body = $head.siblings('.card-text__body');

        $head.toggleClass('opened');
        $body.slideToggle();

        return false;

    });
});

function prettify(num) {
    var n = num.toString();
    var separator = " ";
    return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + separator);
}

function setComplectList(offerID) {
    const complectList = document.querySelector('#complect-list');
    let string = '';

    if (complect[offerID]) {
        complect[offerID].forEach(item => {
            string += `<li>${item}</li>`;
        });

        complectList.innerHTML = string;
    }
}

window.addEventListener('DOMContentLoaded', () => {
    try {
        const btns = document.querySelectorAll('.card-tabs-btn');
        const tabs = document.querySelectorAll('.card-tabs-tab');

        btns[0].classList.add('active');
        tabs[0].classList.add('active');

        btns.forEach((btn, i) => {
            btn.addEventListener('click', () => {
                btns.forEach(btn2 => {
                    btn2.classList.remove('active');
                });

                tabs.forEach(tab => {
                    tab.classList.remove('active');
                });

                btn.classList.add('active');
                tabs[i].classList.add('active');
            });
        });
    } catch (error) {
        console.log(error);
    }

    try {
        $('.detail-text-wrap').on('click', 'img', function (e) {
            e.preventDefault();

            $.fancybox.open({
                href: $(this).attr('src'),
            });
        });
    } catch (error) {
        console.log(error);
    }
});