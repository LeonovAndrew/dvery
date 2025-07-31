document.addEventListener("DOMContentLoaded", function () {
    const tabWraps = document.querySelectorAll(".tab-wrap");
    const tabContents = document.querySelectorAll(".tab-content");

    tabWraps.forEach(tab => {
        tab.addEventListener("click", function (e) {
            e.preventDefault();

            const uid = tab.dataset.tabUid;

            // Деактивация всех табов
            tabWraps.forEach(t => {
                t.classList.remove("active");
                t.setAttribute("aria-selected", "false");
                t.setAttribute("tabindex", "-1");
            });

            // Деактивация всех контентов
            tabContents.forEach(c => {
                c.classList.remove("active");
                c.setAttribute("tabindex", "-1");
                c.setAttribute("hidden", ""); // Добавляем hidden
            });

            // Активация текущего таба
            tab.classList.add("active");
            tab.setAttribute("aria-selected", "true");
            tab.setAttribute("tabindex", "0");

            // Активация соответствующего контента
            const content = document.querySelector(`.tab-content[data-tab-uid="${uid}"]`);
            if (content) {
                content.classList.add("active");
                content.setAttribute("tabindex", "0");
                content.removeAttribute("hidden"); // Удаляем hidden
            }

            // Обновляем URL-хэш
            history.replaceState(null, '', `#tab${uid}`);
        });
    });

    // Автооткрытие таба по хэшу при загрузке страницы
    const hash = window.location.hash;
    if (hash.startsWith('#tab')) {
        const uid = hash.replace('#tab', '');
        const targetTab = document.querySelector(`.tab-wrap[data-tab-uid="${uid}"]`);
        if (targetTab) {
            targetTab.click(); // имитируем клик
        }
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const lazyImages = document.querySelectorAll(
        ".component-image__image.component-image__bg.component-image__bg--cover"
    );

    lazyImages.forEach(el => {
        const url = el.getAttribute("data-original");
        if (url) {
            el.style.backgroundImage = `url('${url}')`;
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;

    // Очищаем все классы (опционально)
    body.className = '';

    if (screen.width > 768) {
        // Для экранов >= 768px
        body.classList.add(
            'is-view',
            'is-chrome',
            'DOMContentLoaded',
            'is-desktop',
            'is-pointer',
            'adaptive-desktop'
        );
    } else {
        // Для экранов < 768px
        body.classList.add(
            'is-view',
            'adaptive-mobile',
            'is-mobile',
            'is-touch',
            'is-android',
            'is-chrome',
            'DOMContentLoaded'
        );
    }

    // Добавляем обработчик изменения размера окна (опционально)
    window.addEventListener('resize', function() {
        console.log(screen.width);
        if (screen.width > 768) {
            // Удаляем мобильные классы и добавляем десктопные
            body.classList.remove(
                'adaptive-mobile',
                'is-mobile',
                'is-touch',
                'is-android'
            );
            body.classList.add(
                'is-desktop',
                'is-pointer',
                'adaptive-desktop'
            );
        } else {
            // Удаляем десктопные классы и добавляем мобильные
            body.classList.remove(
                'is-desktop',
                'is-pointer',
                'adaptive-desktop'
            );
            body.classList.add(
                'adaptive-mobile',
                'is-mobile',
                'is-touch',
                'is-android'
            );
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const videoComponents = document.querySelectorAll('.component-video');

    videoComponents.forEach(component => {
        const iframe = component.querySelector('iframe');
        const preview = component.querySelector('.component-video__preview');

        if (preview) {
            preview.addEventListener('click', function() {
                // Удаляем атрибут data-src и вставляем src напрямую
                const videoSrc = iframe.getAttribute('data-src');
                iframe.setAttribute('src', videoSrc);

                // Скрываем превью после клика (опционально)
                preview.style.display = 'none';
            });
        }
    });
});