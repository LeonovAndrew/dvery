<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $CONTACTS;

\Bitrix\Main\Loader::includeModule('local.lib');

?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <? /*?>
<!-- Bothelp.io widget -->
<script type="text/javascript">!function(){var e={"token":"79671098956","position":"left","bottomSpacing":"50","callToActionMessage":"Рассчитать стоимость дверей","displayOn":"everywhere","subtitle":"ведущий менеджер","message":{"name":"Денис","content":"Двери в эмали и шпоне на заказ по стоимости от 29 тыс. руб. за комплект. Срок от 17 дней. Сколько дверей и какого размера нужно?"}},t=document.location.protocol+"//bothelp.io",o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=t+"/widget-folder/widget-whatsapp-chat.js",o.onload=function(){BhWidgetWhatsappChat.init(e)};var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(o,n)}();</script>
<!-- /Bothelp.io widget -->
<?*/ ?>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
        <meta name="facebook-domain-verification" content="9l0r24u6hhiolqzziet28rkolk8wxt"/>

        <title><? $APPLICATION->ShowTitle() ?></title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="/bitrix/css/font-awesome.css"/>
        <script data-skip-moving="true" src="https://dmp.one/sync?stock_key=c6f2136531fd0b27f2eab3bf2d8912cc" async referrerpolicy="no-referrer-when-downgrade" charset="UTF-8"></script>
        <?php
        if ($APPLICATION->GetCurPage() == '/dealer/') {
            echo '<meta name="googlebot" content="noindex">';
        }
        ?>

        <? $APPLICATION->ShowHead() ?>

        <?




        //$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/colors.css');
        $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/fonts/Geometria/stylesheet.css');
        $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/slick-theme.css');

        $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/slick.css');
        $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/style.css?1');
        $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/media.css');

        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.min.js');
        if($APPLICATION->GetCurPage() != '/hidden_doors/'){
            $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.css');
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.js');
        }
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.maskedinput.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/slick.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js');

        CJSCore::Init(['local_lib']);

        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/custom.js');

        //if(!$USER->IsAdmin())$APPLICATION->GetCSS();
        ?>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <style>
            .contact span,
            .contact a {
                color: #fff;
            }

            .contact .fa {
                color: #fff;
                font-size: 24px;
            }

            .contact.bl span,
            .contact.bl a {
                color: #000;
            }

            .contact.bl .fa {
                color: #000;
                font-size: 24px;
            }

            .catalog-menu {
                position: relative;
            }

            .catalog-menu:hover .top-menu__sub {
                opacity: 1;
                transform: scaleY(1);
                z-index: 99999;

            }

            .amo-button {
                display: none;
            }

            .catalog-menu .top-menu__sub {
                left: 80px;
            }

            .menu__side .catalog-menu .top-menu__sub {
                left: 0px;
                top: 40px;
            }

            .header-type-2 .top-menu__sub {
                background: #FFF;
            }

            .top-menu__sub {
                background: #fff;
            }

            body .header-type-2 .top-menu__sub-item a {
                color: #000;
            }

            .card__result-pic img {
                max-height: initial;
                width: 100% !important;
                height: auto !important;
            }
        </style>


        <script>
            (function (w, d, t, u, n, a, m) {
                w['MauticTrackingObject'] = n;
                w[n] = w[n] || function () {
                    (w[n].q = w[n].q || []).push(arguments)
                }, a = d.createElement(t),
                    m = d.getElementsByTagName(t)[0];
                a.async = 1;
                a.src = u;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://m.dveri-provance.ru/mtc.js', 'mt');

            mt('send', 'pageview');
        </script>

        <script src="//m.dveri-provance.ru/focus/1.js" type="text/javascript" charset="utf-8" async="async"></script>
        <script src="https://yastatic.net/share2/share.js"></script>

        <!-- calltouch -->
        <script>
            (function (w, d, n, c) {
                w.CalltouchDataObject = n;
                w[n] = function () {
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
                    var a = d.getElementsByTagName("script")[0], s = d.createElement("script"), i = function () {
                        a.parentNode.insertBefore(s, a)
                    }, m = typeof Array.prototype.find === 'function', n = m ? "init-min.js" : "init.js";
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
        <!-- calltouch -->

        <? $APPLICATION->IncludeFile('/include/counter.php'); ?>
    </head>
<body>

    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

    <div class="menu">
        <div class="menu__dark">

        </div>
        <div class="menu__content">
            <div class="menu__bg" data-item="<?= SITE_TEMPLATE_PATH ?>/img/menu__bg.png">

            </div>
            <div class="menu__side">
                <div class="menu__close">
                    <div class="menu__close-item"></div>
                    <div class="menu__close-item"></div>
                </div>
                <? /*<!-- <div class="header__city menu__city">
					<div class="header__city-side text-type-1">
						Ваш город:
					</div>
					<div class="header__city-select select-block">
						<div class="header__city-select-head select-head">
							<div class="header__city-select-head-arrow"></div>
							<div class="header__city-select-side select-side">
								
								<div class="header__city-select-head-value text-type-1 select-value">
									Не выбрано
								</div>
							</div>
						</div>
						<div class="header__city-select-body select-body">
							<div class="header__city-select-option-none text-type-1 select-none">
								Не выбрано
							</div>
							<div class="header__city-select-option select-option">
								<input id="option1" name="citySelect" type="radio" class="header__city-select-option-input">
								<label for="option1" class="header__city-select-option-text text-type-1">Москва и МО</label>
							</div>
							<div class="header__city-select-option select-option">
								<input id="option10" name="citySelect" type="radio" class="header__city-select-option-input">
								<label for="option10" class="header__city-select-option-text text-type-1">Санкт-Петербург</label>
							</div>
							<div class="header__city-select-option select-option">
								<input id="option101" name="citySelect" type="radio" class="header__city-select-option-input">
								<label for="option101" class="header__city-select-option-text text-type-1">Владимир</label>
							</div>
							<div class="header__city-select-option select-option">
								<input id="option1010" name="citySelect" type="radio" class="header__city-select-option-input">
								<label for="option1010" class="header__city-select-option-text text-type-1">Сочи</label>
							</div>
						</div>
					</div>
				</div> -->*/ ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "burger",
                    [
                        "ROOT_MENU_TYPE" => "burger",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => [],
                        "MAX_LEVEL" => "1",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                    ],
                    false
                ); ?>

                <div class="menu__info">
                    <? if ($CONTACTS['PROPERTIES']['PHONE']['VALUE']) : ?>
                        <a href="tel:<?= $CONTACTS['PROPERTIES']['PHONE']['VALUE'] ?>"
                           class="menu__call"><?= $CONTACTS['PROPERTIES']['PHONE']['VALUE'] ?></a>
                    <? endif; ?>

                    <div class="menu__popup" data-popup-selector="callback">Заказать звонок</div>

                    <? /* if ($CONTACTS['PROPERTIES']['EMAIL']['VALUE']) :?>
					<a href="mailto:<?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?>" class="menu__mail"><?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?></a>
<? endif; */ ?>
                    <a href="mailto:production@dveri-provance.ru" class="menu__mail">production@dveri-provance.ru</a>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "menu_socv",
                        [
                            "COMPONENT_TEMPLATE" => "menu_socv",
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
                        ],
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </div>

    <header itemscope itemtype="https://schema.org/Organization"
            class="<? if ($APPLICATION->GetCurDir() != '/' && !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/articles\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) || preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())) : ?>header-type-2<? else : ?>color-white<? endif; ?>">
        <div class="cont">
            <div class="header">
                <div class="header__top">
                    <div class="header__left">
                        <a href="/" class="header__logo">
                            <? if ($APPLICATION->GetCurDir() != '/' && !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/articles\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) || preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())) : ?>
                                <img class="header-logo" src="<?= SITE_TEMPLATE_PATH ?>/img/page-logo-black.png"
                                     width="162" height="49" alt="page-logo-black" itemprop="logo">
                            <? else : ?>
                                <img class="header-logo" src="<?= SITE_TEMPLATE_PATH ?>/img/page-logo-white.png"
                                     width="162" height="49" alt="page-logo-white" itemprop="logo">
                            <? endif; ?>
                        </a>
                        <div class="catalog-menu">
                            <a href="/catalog/" class="header__list-item text-type-1 header__left-item">Каталог</a>
                            <ul class="top-menu__sub">
                                <li class="top-menu__sub-item"><a href="/catalog/">Межкомнатные двери</a></li>
                                <li class="top-menu__sub-item">
                                    <a href="/stroy_paneli/">Стеновые панели</a>
                                </li>
                                <li class="top-menu__sub-item"><a href="/peregorodki/">Межкомнатные перегородки</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="header__right">
                        <? /*$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top",
							array(
								"ROOT_MENU_TYPE" => "top",
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
						);*/ ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "top_lvl",
                            [
                                "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                                "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                                "MAX_LEVEL" => "2",    // Уровень вложенности меню
                                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                                "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                                "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            ],
                            false
                        ); ?>
                        <? /*if($USER->IsAdmin()){ */ ?>

                        <a href="/personal/cart/" class="basket_link">
                            <div>
								<span class="sale-basket-small-tab-wrapper" data-entity="basket-counter">
									<i class="sale-basket-small-tab-icon glyph-icon-cart"></i>
								</span>
                                <span style="font-size:12px;">Корзина</span>
                            </div>
                        </a>

                        <a href="/favorites/" class="favorites_link">
                            <div>
								<span class="sale-basket-small-tab-wrapper">
									<? $arFavorite = json_decode($_COOKIE['favorites'], 1); ?>
									<div class="fav_star_icon <?= count($arFavorite) > 0 ? 'seected' : '' ?>"></div>
									<? /*<i class="sale-basket-small-tab-icon glyph-icon-cart"></i>*/ ?>

									<span class="sale-basket-small-tab-counter intec-cl-background-dark favorite_cnt <?= (count($arFavorite > 0) ? '' : 'hide') ?>"><?= count($arFavorite) ?></span>
								</span>
                                <span style="font-size:12px;">Избранное</span>
                            </div>
                        </a>
                        <? /* } */ ?>
                        <div class="search-mobile">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8225 13.9646L11.3442 10.4864C11.1072 10.2493 10.7234 10.2493 10.4864 10.4864C10.2493 10.7232 10.2493 11.1074 10.4864 11.3442L13.9646 14.8225C14.0831 14.941 14.2383 15.0002 14.3936 15.0002C14.5487 15.0002 14.704 14.941 14.8225 14.8225C15.0595 14.5857 15.0595 14.2014 14.8225 13.9646Z"
                                      fill="white"/>
                                <path d="M6.64839 0.0761719C3.02457 0.0761719 0.0761719 3.0246 0.0761719 6.64847C0.0761719 10.2725 3.02457 13.2208 6.64839 13.2208C10.2724 13.2208 13.2206 10.2725 13.2206 6.64847C13.2206 3.0246 10.2724 0.0761719 6.64839 0.0761719ZM6.64839 12.0075C3.69352 12.0075 1.2895 9.60341 1.2895 6.6485C1.2895 3.6936 3.69352 1.28952 6.64839 1.28952C9.60325 1.28952 12.0073 3.69357 12.0073 6.64847C12.0073 9.60338 9.60325 12.0075 6.64839 12.0075Z"
                                      fill="white"/>
                            </svg>
                        </div>
                        <div class="menu-toggle">
                            <div class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="cross">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__bottom">
                    <div class="header__bottom-side">
                        <div class="header__search">
                            <div class="header__search-logo">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.8225 13.9646L11.3442 10.4864C11.1072 10.2493 10.7234 10.2493 10.4864 10.4864C10.2493 10.7232 10.2493 11.1074 10.4864 11.3442L13.9646 14.8225C14.0831 14.941 14.2383 15.0002 14.3936 15.0002C14.5487 15.0002 14.704 14.941 14.8225 14.8225C15.0595 14.5857 15.0595 14.2014 14.8225 13.9646Z"
                                          fill="white"/>
                                    <path d="M6.64839 0.0761719C3.02457 0.0761719 0.0761719 3.0246 0.0761719 6.64847C0.0761719 10.2725 3.02457 13.2208 6.64839 13.2208C10.2724 13.2208 13.2206 10.2725 13.2206 6.64847C13.2206 3.0246 10.2724 0.0761719 6.64839 0.0761719ZM6.64839 12.0075C3.69352 12.0075 1.2895 9.60341 1.2895 6.6485C1.2895 3.6936 3.69352 1.28952 6.64839 1.28952C9.60325 1.28952 12.0073 3.69357 12.0073 6.64847C12.0073 9.60338 9.60325 12.0075 6.64839 12.0075Z"
                                          fill="white"/>
                                </svg>
                            </div>
                            <form action="/search/" class="header__search-block">
                                <input class="header__search-input text-type-1" placeholder="Что вы ищете?" name="q">
                                <button class="header__search-btn" type="submit">
                                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.1333 5.07437L11.0589 1M15.1333 5.07437L11.0589 9.14873M15.1333 5.07437H-5.56707e-05"
                                              stroke="white" stroke-width="1.3432"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            [
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header-social.php",
                            ]
                        ); ?>

                        <? /*<!-- <div class="header__city">
							<div class="header__city-side text-type-1">
								Ваш город:
							</div>
							<div class="header__city-select select-block">
								<div class="header__city-select-head select-head">
									<div class="header__city-select-head-arrow"></div>
									<div class="header__city-select-side select-side">
										
										<div class="header__city-select-head-value text-type-1 select-value">
											Не выбрано
										</div>
									</div>
								</div>
								<div class="header__city-select-body select-body">
									<div class="header__city-select-option-none text-type-1 select-none">
										Не выбрано
									</div>
									<div class="header__city-select-option select-option">
										<input id="option1" name="citySelect" type="radio" class="header__city-select-option-input">
										<label for="option1" class="header__city-select-option-text text-type-1">Москва и МО</label>
									</div>
									<div class="header__city-select-option select-option">
										<input id="option10" name="citySelect" type="radio" class="header__city-select-option-input">
										<label for="option10" class="header__city-select-option-text text-type-1">Санкт-Петербург</label>
									</div>
									<div class="header__city-select-option select-option">
										<input id="option101" name="citySelect" type="radio" class="header__city-select-option-input">
										<label for="option101" class="header__city-select-option-text text-type-1">Владимир</label>
									</div>
									<div class="header__city-select-option select-option">
										<input id="option1010" name="citySelect" type="radio" class="header__city-select-option-input">
										<label for="option1010" class="header__city-select-option-text text-type-1">Сочи</label>
									</div>
								</div>
							</div>
						</div> -->*/ ?>
                    </div>

                    <div class="header__popups">
                        <div type="button" class="header__call text-type-4  text-bold" data-popup-selector="callback">
                            Заказать звонок
                        </div>
                        <? if ($CONTACTS['PROPERTIES']['PHONE']['VALUE']) : ?>
                            <a href="tel:<?= $CONTACTS['PROPERTIES']['PHONE']['VALUE'] ?>"
                               class="header__phone text-type-4 text-bold" itemprop="telephone">
                                <?= $CONTACTS['PROPERTIES']['PHONE']['VALUE'] ?>
                            </a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div itemprop="address" class="header__bottom__address">Москва, Рублевское шоссе 14, корп. 1 <a
                        href="/contacts/">все салоны</a></div>
            <span style="display: none;" itemprop="name">Provance Фабрика Дверей</span>

        </div>
    </header>

<? /* if ($APPLICATION->GetCurDir() != '/'
	&& $APPLICATION->GetCurDir() != '/about/' 
	// редактировано 14.06.2023
	&& !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) 
	&& !preg_match("/\/articles\/([-_a-zA-Z0-9]+)\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) 
	&& !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) || preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) 
	// добавлено 14.06.2023
	|| preg_match("/\/catalog\/sovremennyy-stil\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())
	|| preg_match("/\/catalog\/klassika\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())
	|| preg_match("/\/catalog\/neoklassika\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())) :*/ ?>
<? if (
    $APPLICATION->GetCurDir() != '/'
    && $APPLICATION->GetCurDir() != '/about/'
    && !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())
    && !preg_match("/\/articles\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())
    && !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) || preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())
) : ?>
    <div class="page" itemscope itemtype="https://schema.org/Product">
    <div class="page__head">
    <div class="cont">
    <div class="page__head-cont page__head-cont-bottom">
        <? if ($APPLICATION->GetCurPage() == '/mezhkomnatnye-dveri/'): ?>
            <h1 itemprop="name">
                <?= $APPLICATION->ShowTitle(false) ?>
            </h1>
        <? else: ?>
            <h1>
                <?= $APPLICATION->ShowTitle(false) ?>
            </h1>
        <? endif; ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            ".default",
            [
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0",
            ],
            false
        ); ?>
    </div>
<? endif; ?>