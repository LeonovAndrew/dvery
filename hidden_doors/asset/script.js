document.addEventListener("DOMContentLoaded", function () {

    // Переключение вкладок
    document.querySelectorAll('.tab-wrap').forEach(tab => {
        tab.addEventListener('click', () => {
            const tabId = tab.getAttribute('data-tab');

            // Снимаем активный класс со всех
            document.querySelectorAll('.tab-wrap').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            // Устанавливаем активный
            tab.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });


    const slider = new Swiper('.swiper-cards-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.component-button-left',
            prevEl: '.component-button-right',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 5,
            }
        }
    });
});

