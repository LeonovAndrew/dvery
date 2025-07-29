<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $CONTACTS;

$curPage = $APPLICATION->GetCurPage(false);
?>


<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "article_slick",
    array(
        "COMPONENT_TEMPLATE" => "news_slick",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "21",
        "NEWS_COUNT" => "6",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "BLOCKS",
            1 => "",
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => ""
    ),
    false,
    array(
        "ACTIVE_COMPONENT" => "Y"
    )
); ?>
<?
if ($APPLICATION->GetCurDir() == '/') { ?>
    <div class="repometr-widget-container" style="height: 100%; width: 100%; position: relative; overflow: hidden;">
        <link rel="stylesheet" type="text/css" href="https://repometr.com/static/styles/reviews-widget-frame.css">
        <div class="repometr-widget-logo"></div>

        <iframe id="repometr_widget_1683" src="https://repometr.com/widgets/1683/" style="display: block; width: 100% !important; min-height: 350px; visibility: hidden;"></iframe>
        <script>
            const repometrReviewsWidgetId = '1683';
        </script>
        <script src="https://repometr.com/jsi18n/"></script>
        <script src="https://en.repometr.com/jsi18n/"></script>
        <script src="https://alfatest.repometr.com/jsi18n/"></script>
        <!-- <script src="/jsi18n/"></script> -->
        <script src="https://repometr.com/static/scripts/reviews-widget-frame.js"></script>
    </div>
<? }
?>

<? if ($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != '/about/' && !preg_match("/\/news\/([a-z]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([a-z]+)\/([a-z]+)/", $APPLICATION->GetCurDir()) ||  preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())) : ?>
    </div>
    </div>
    </div>
<? endif; ?>
<?
if ($APPLICATION->GetProperty('FOOTER-FORM') == 'signup') : ?>
    <? $APPLICATION->IncludeComponent(
        "devbx:form",
        "footer-signup",
        array(
            "ACTION_VARIABLE" => "form-action",    // Название переменной, в которой передается действие
            "AJAX_LOAD_FORM" => "Y",    // Загружать шаблон формы через Ajax
            "AJAX_MODE" => "Y",    // Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
            "DEFAULT_FIELDS" => array(    // Установить значения по умолчанию для полей
                0 => "",
                1 => "",
            ),
            "FORM_ID" => "2",    // Форма
            "READ_ONLY_FIELDS" => array(    // Запретить изменения полей
                0 => "",
                1 => "",
            ),
            "SUBMIT_BUTTON_NAME" => "Отправить",    // Название кнопки отправить
            "FORM_TITLE" => ($curPage == '/portfolio/' ? 'Написать директору' : 'Получите консультацию специалиста'),
        ),
        false
    ); ?>
<? else : ?>
    <? $APPLICATION->IncludeComponent(
        "devbx:form",
        "footer-form",
        array(
            "ACTION_VARIABLE" => "form-action",    // Название переменной, в которой передается действие
            "AJAX_LOAD_FORM" => "Y",    // Загружать шаблон формы через Ajax
            "AJAX_MODE" => "Y",    // Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
            "DEFAULT_FIELDS" => array(    // Установить значения по умолчанию для полей
                0 => "",
                1 => "",
            ),
            "FORM_ID" => "1",    // Форма
            "READ_ONLY_FIELDS" => array(    // Запретить изменения полей
                0 => "",
                1 => "",
            ),
            "SUBMIT_BUTTON_NAME" => "Отправить",    // Название кнопки отправить
            "FORM_TITLE" => ($curPage == '/about/' ? 'Написать директору' : 'Получите консультацию специалиста'),
        ),
        false
    ); ?>
<? endif ?>

<? if ($APPLICATION->GetCurPage(false) === '/contacts/') : ?>
    <div class="map">
        <?= html_entity_decode($CONTACTS['PREVIEW_TEXT']) ?>
    </div>
<? endif; ?>



<footer>
    <div class="btn-up btn-up_hide" title="Вернуться к началу страницы"></div>
    <div class=" cont">
        <div class="footer__cont">
            <div class="footer__top">
                <a href="#" class="footer__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/page-logo-white.png" width="170" height="51" alt="page-logo-white">
                    <!-- <img src="<?= SITE_TEMPLATE_PATH ?>/img/page-logo-black.png" alt=""> -->
                </a>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    array(
                        "ROOT_MENU_TYPE" => "footer",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom",
                    array(
                        "ROOT_MENU_TYPE" => "bottom",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
                <div class="footer__info">
                    <? if ($CONTACTS['PROPERTIES']['PHONE']['VALUE']) : ?>
                        <a href="tel:<?= $CONTACTS['PROPERTIES']['PHONE']['VALUE'] ?>" class="footer__call"><?= $CONTACTS['PROPERTIES']['PHONE']['VALUE'] ?></a>
                    <? endif; ?>

                    <? /* if ($CONTACTS['PROPERTIES']['EMAIL']['VALUE']) :?>
                    	<a href="mailto:<?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?>" class="footer__mail"><?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?></a>
<? endif; */ ?>
                    <div class="working-mode" style="color: #fff; margin-bottom:10px;">
                        с 9:00 до 18:00 (пн-пт) <br>
                        с 10:00 до 18:00 (сб) <br>
                        с 10:00 до 17:00 (вс) <br>
                    </div>
                    <div class="contact">
                        <span>Производство:</span> <a href="mailto:production@dveri-provance.ru" class="footer__mail">production@dveri-provance.ru</a><br>
                        <span>Консультация или заказ:</span> <a href="https://t.me/provance_dveri"><i class="fa fa-telegram"></i></a> <a href="https://wa.me/79671098956"><i class="fa fa-whatsapp"></i></a>

                    </div>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "socv",
                        array(
                            "COMPONENT_TEMPLATE" => "socv",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "4",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "ID",
                            "SORT_ORDER2" => "DESC",
                            "AJAX_MODE" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        ),
                        false
                    ); ?>
                    <div class="copy">
                        *Пользователь данного интернет-ресурса, обратившийся через специальные формы связи, размещённые на данном сайте, а также по средствам телефонного звонка, выражает свое безусловное согласие продолжить устную или письменную коммуникацию с помощью электронных средств связи, в т.ч.: sms-информирование, e-mail-рассылка , мессенджеры и т.п.
                    </div>
                    <div class="footer-icon" style="display:flex; margin-top:20px; gap:10px;">
                        <img src="/upload/payment_icons/mir.png" alt="мир" height="17">
                        <img src="/upload/payment_icons/mastercard.png" alt="mastercard" height="17">
                        <img src="/upload/payment_icons/maestro.png" alt="maestro" height="17">
                        <img src="/upload/payment_icons/visa.png" alt="visa" height="17">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        © <?= date('Y') ?> — Все права защищены
    </div>
</footer>


<div class="popup" data-popup="callback">
    <form class="popup__cont js-form-ajax">
        <div class="popup__close">
            <div class="popup__close-item"></div>
            <div class="popup__close-item"></div>
        </div>
        <div class="popup__title">
            Заказать звонок
        </div>
        <div class="popup__list">
            <input type="hidden" name="IBLOCK_ID" value="8">

            <input type="text" name="NAME" placeholder="Имя" class="popup__list-item">
            <input type="text" name="PHONE" autocomplete="off" placeholder="Телефон" class="popup__list-item tel">
            <input type="text" name="EMAIL" autocomplete="off" placeholder="E-mail" class="popup__list-item">
        </div>
        <div class="popup__text">
            Нажимая кнопку «Отправить», Вы принимаете условия обработки Ваших персональных данных
        </div>
        <button type="submit" class="form_callback popup__btn">Отправить</button>
        <p class="form__message"></p>
    </form>
</div>

<div class="popup" data-popup="order">
    <form class="popup__cont js-form-ajax-order goal-ym-detail">
        <div class="popup__close">
            <div class="popup__close-item"></div>
            <div class="popup__close-item"></div>
        </div>
        <div class="popup__title">
            Оформить заказ
        </div>
        <div class="popup__list">
            <input type="hidden" name="IBLOCK_ID" value="18">

            <input type="text" name="NAME" placeholder="Введите ваше имя" class="popup__list-item">
            <input type="text" name="PHONE" autocomplete="off" placeholder="Введите ваш телефон" class="popup__list-item tel">
            <input type="text" name="EMAIL" autocomplete="off" placeholder="E-mail (не обязательно)" class="popup__list-item">
        </div>
        <div class="popup__text">
            Нажимая кнопку «Оформить», Вы принимаете условия обработки Ваших персональных данных
        </div>
        <button type="submit" class="form_order popup__btn">Оформить</button>
        <p class="form__message"></p>
    </form>
</div>

<script>
    document.querySelector('.goal-ym-detail').addEventListener('submit', function() {
        ym(64922065, 'reachGoal', 'send_all_forms');
        console.log('form on popup');
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({
            type: 'reachGoal',
            id: 3339490,
            goal: 'send_form'
        });
    });
    /*document.querySelector('.popup__cont').addEventListener('submit', function() {
        ym(64922065, 'reachGoal', 'send_all_forms');
        console.log('form on popup');
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({ type: 'reachGoal', id: 3339490, goal: 'send_form' });
    });*/
</script>


<script>
    (function($) {
        $(document).ready(function() {

            if (location.href.indexOf('/about/') != (-1)) {
                $('.footer-form__body [name="UF_NAME"]').attr('placeholder', 'Имя');
                $('.footer-form__body [name="UF_PHONE"]').attr('placeholder', 'Телефон');
                $('.footer-form__body [name="UF_COMMENT"]').attr('placeholder', 'Ваш вопрос');
            }
            var $header = $("header"),
                $clone = $header.before($header.clone().addClass("clone"));

            $(window).on("scroll", function() {
                var fromTop = $(document).scrollTop();
                $("body").toggleClass("down", (fromTop > 200));
            });
        });


        //console.log('web page uploaded jjjjjj');
    })(jQuery);
</script>
<script type="text/javascript" src="/local/templates/custom/js/zoomsl.js"></script>


<?
if ($APPLICATION->GetCurDir() != '/') { ?>

    <script type="text/javascript" src="/local/templates/custom/js/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="/local/templates/custom/js/lazy-js.js"></script>
<? } ?>

<?/*
	<!-- jsDeliver -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
	*/ ?>
<?
if ($APPLICATION->GetCurDir() != '/') { ?>
    <!-- jsDeliver -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/dkern/jquery.lazy@1.7.10/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/dkern/jquery.lazy@1.7.10/jquery.lazy.plugins.min.js"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.plugins.min.js"></script>
<?
} ?>
<script async>
    (function(a, m, o, c, r, m) {
        a[m] = {
            id: "53446",
            hash: "927bee0a9948b591de52ca348d3603c6df122bd498b31268cd858a36f1e4ced4",
            locale: "ru",
            inline: false,
            setMeta: function(p) {
                this.params = (this.params || []).concat([p])
            }
        };
        a[o] = a[o] || function() {
            (a[o].q = a[o].q || []).push(arguments)
        };
        var d = a.document,
            s = d.createElement('script');
        s.async = true;
        s.id = m + '_script';
        s.src = 'https://gso.amocrm.ru/js/button.js?1632391558';
        d.head && d.head.appendChild(s)
    }(window, 0, 'amoSocialButton', 0, 0, 'amo_social_button'));
</script>

<!-- calltouch -->
<script>
    (function(w, d, n, c) {
        w.CalltouchDataObject = n;
        w[n] = function() {
            w[n]["callbacks"].push(arguments)
        };
        if (!w[n]["callbacks"]) {
            w[n]["callbacks"] = []
        }
        w[n]["loaded"] = false;
        if (typeof c !== "object") {
            c = [c]
        }
        w[n]["counters"] = c;
        for (var i = 0; i < c.length; i += 1) {
            p(c[i])
        }

        function p(cId) {
            var a = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                i = function() {
                    a.parentNode.insertBefore(s, a)
                },
                m = typeof Array.prototype.find === 'function',
                n = m ? "init-min.js" : "init.js";
            s.async = true;
            s.src = "https://mod.calltouch.ru/" + n + "?id=" + cId;
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", i, false)
            } else {
                i()
            }
        }
    })(window, document, "ct", "k7nka0rk");
</script>

<script type="text/javascript">
    jQuery(document).on("mousedown touchstart", 'form button', function() {
        var m = jQuery(this).closest('form');
        var fio = m.find('input[name*="NAME"], input[data-sid*="FIO"]').val();
        var phone = m.find('input[type="tel"], input[name*="PHONE"], input[data-sid*="PHONE"]').val();
        var mail = m.find('input[type*="email"], input[name*="EMAIL"]').val();
        var comment = m.find('input[name*="COMMENT"]').val();

        var sub = 'Заявка с ' + location.hostname;
        if (m.attr('class') === 'popup__cont js-form-ajax') {
            sub = 'Заказать звонок';
        }
        if (m.attr('class') === 'popup__cont js-form-ajax-promokod') {
            sub = 'Получить промокод на скидку 2%';
        }
        if (m.attr('name') === 'SIGNUP') {
            sub = 'Записаться в салон';
        }
        if (m.attr('name') === 'MEASURE') {
            sub = 'Вызвать замерщика';
        }
        if (/form on sotrudn/gi.test(m.attr('onsubmit'))) {
            sub = 'Получите консультацию специалиста';
        }
        var ct_site_id = '59381';
        var ct_data = {
            fio: fio,
            phoneNumber: phone,
            email: mail,
            comment: comment,
            subject: sub,
            requestUrl: location.href,
            sessionId: window.call_value
        };
        var ct_valid = !!phone || !!mail;
        console.log(ct_data, ct_valid);
        if (!!ct_valid && window.ct_snd_flag != 1) {
            window.ct_snd_flag = 1;
            setTimeout(function() {
                window.ct_snd_flag = 0;
            }, 20000);
            jQuery.ajax({
                url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/' + ct_site_id + '/register/',
                dataType: 'json',
                type: 'POST',
                data: ct_data,
                async: false,
                success: function(result) {
                    ym(64922065, 'reachGoal', 'zaproskonsultaciiotprav');
                    console.log('цель форма мк');
                }
            });
        }
    });
</script>


<!-- calltouch -->
</body>

</html>