<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $CONTACTS;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-336CKNVP68"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'G-336CKNVP68');
	</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MS52FDQ');</script>
	<!-- End Google Tag Manager -->

	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<meta name="facebook-domain-verification" content="9l0r24u6hhiolqzziet28rkolk8wxt" />

	<title><?$APPLICATION->ShowTitle()?></title>

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


	<?$APPLICATION->ShowHead()?>

	<?
		$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/colors.css');
		$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/fonts/Geometria/stylesheet.css');
		$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/slick-theme.css');
        $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.css');
		$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/slick.css');
		$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/style.css?1');
		$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/media.css');

		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.min.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.maskedinput.min.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/slick.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js');
	?>
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MS52FDQ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<?$APPLICATION->IncludeFile('/include/counter.php')?>
	
    <div class="menu">
        <div class="menu__dark">

        </div>
        <div class="menu__content">
            <div class="menu__bg" data-item="<?=SITE_TEMPLATE_PATH?>/img/menu__bg.png">

            </div>
            <div class="menu__side">
                <div class="menu__close">
                    <div class="menu__close-item"></div>
                    <div class="menu__close-item"></div>
                </div>
                <!-- <div class="header__city menu__city">
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
                </div> -->
                <?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"burger",
				array(
					"ROOT_MENU_TYPE" => "burger",
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
			);?>
			
                <div class="menu__info">
            	<? if ($CONTACTS['PROPERTIES']['PHONE']['VALUE']) :?>
                	<a href="tel:<?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?>" class="menu__call"><?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?></a>
            	<? endif; ?>

                <div class="menu__popup" data-popup-selector="callback">Заказать звонок</div>

                <? if ($CONTACTS['PROPERTIES']['EMAIL']['VALUE']) :?>
                	<a href="mailto:<?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?>" class="menu__mail"><?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?></a>
            	<? endif; ?>

            	<?$APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"menu_socv", 
					array(
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
					),
					false
				);?>
            </div>
            </div>
        </div>
    </div>

    <header class="<?if($APPLICATION->GetCurDir() != '/' && !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/articles\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) ||  preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())):?>header-type-2<?else:?>color-white<?endif;?>">
        <div class="cont">
            <div class="header">
                <div class="header__top">
                    <div class="header__left">
                        <a href="/" class="header__logo">
                            <?if($APPLICATION->GetCurDir() != '/' && !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/articles\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) ||  preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())):?>
                                <img class="header-logo" data-src="<?=SITE_TEMPLATE_PATH?>/img/page-logo-black.png" alt="page-logo-black">
                            <? else :?>
                                <img class="header-logo" data-src="<?=SITE_TEMPLATE_PATH?>/img/page-logo-white.png" alt="page-logo-white">
                            <? endif; ?>
                        </a>
                        
                        <a href="/catalog/" class="header__list-item text-type-1 header__left-item">Каталог</a>

                    </div>   
                    <div class="header__right">
                        <?$APPLICATION->IncludeComponent(
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
						);?>
						<?if($USER->IsAdmin()){?>
							<a href="/favorites/" class="favorites_link">
								<div>
						            <span class="sale-basket-small-tab-wrapper">
						            <?$arFavorite = json_decode($_COOKIE['favorites'],1);?>
						            	<div class="fav_star_icon <?=count($arFavorite) > 0 ? 'seected' : ''?>"></div>
						                <?/*<i class="sale-basket-small-tab-icon glyph-icon-cart"></i>*/?>
						                
						                    <span class="sale-basket-small-tab-counter intec-cl-background-dark favorite_cnt <?=(count($arFavorite > 0) ? '' : 'hide')?>"><?=count($arFavorite)?></span>
						            </span>
						            <span style="font-size:12px;">Избранное</span>
					            </div>
							</a>
						<?}?>
                        <div class="search-mobile">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8225 13.9646L11.3442 10.4864C11.1072 10.2493 10.7234 10.2493 10.4864 10.4864C10.2493 10.7232 10.2493 11.1074 10.4864 11.3442L13.9646 14.8225C14.0831 14.941 14.2383 15.0002 14.3936 15.0002C14.5487 15.0002 14.704 14.941 14.8225 14.8225C15.0595 14.5857 15.0595 14.2014 14.8225 13.9646Z" fill="white"/>
                                <path d="M6.64839 0.0761719C3.02457 0.0761719 0.0761719 3.0246 0.0761719 6.64847C0.0761719 10.2725 3.02457 13.2208 6.64839 13.2208C10.2724 13.2208 13.2206 10.2725 13.2206 6.64847C13.2206 3.0246 10.2724 0.0761719 6.64839 0.0761719ZM6.64839 12.0075C3.69352 12.0075 1.2895 9.60341 1.2895 6.6485C1.2895 3.6936 3.69352 1.28952 6.64839 1.28952C9.60325 1.28952 12.0073 3.69357 12.0073 6.64847C12.0073 9.60338 9.60325 12.0075 6.64839 12.0075Z" fill="white"/>
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
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.8225 13.9646L11.3442 10.4864C11.1072 10.2493 10.7234 10.2493 10.4864 10.4864C10.2493 10.7232 10.2493 11.1074 10.4864 11.3442L13.9646 14.8225C14.0831 14.941 14.2383 15.0002 14.3936 15.0002C14.5487 15.0002 14.704 14.941 14.8225 14.8225C15.0595 14.5857 15.0595 14.2014 14.8225 13.9646Z" fill="white"/>
                                    <path d="M6.64839 0.0761719C3.02457 0.0761719 0.0761719 3.0246 0.0761719 6.64847C0.0761719 10.2725 3.02457 13.2208 6.64839 13.2208C10.2724 13.2208 13.2206 10.2725 13.2206 6.64847C13.2206 3.0246 10.2724 0.0761719 6.64839 0.0761719ZM6.64839 12.0075C3.69352 12.0075 1.2895 9.60341 1.2895 6.6485C1.2895 3.6936 3.69352 1.28952 6.64839 1.28952C9.60325 1.28952 12.0073 3.69357 12.0073 6.64847C12.0073 9.60338 9.60325 12.0075 6.64839 12.0075Z" fill="white"/>
                                </svg>
                            </div>
                            <form action="/search/" class="header__search-block">
                                <input class="header__search-input text-type-1" placeholder="Что вы ищете?" name="q">
                                <button class="header__search-btn" type="submit">
                                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.1333 5.07437L11.0589 1M15.1333 5.07437L11.0589 9.14873M15.1333 5.07437H-5.56707e-05" stroke="white" stroke-width="1.3432"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <!-- <div class="header__city">
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
                        </div> -->
                    </div>

                    <div class="header__popups">
                        <div class="header__call text-type-1" data-popup-selector="callback">
                            Заказать звонок
                        </div>
                        <? if ($CONTACTS['PROPERTIES']['PHONE']['VALUE']) :?>
	                        <a href="tel:<?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?>" class="header__phone text-type-3">
	                            <?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?>
	                        </a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="header__bottom__address">Москва, Рублевское шоссе 14, корп. 1 <a href="/contacts/">все салоны</a></div>
            
        </div>
    </header>

    <? if ($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != '/about/' && !preg_match("/\/news\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/articles\/([-_a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([-_a-zA-Z0-9]+)\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir()) || preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())) :?>
    	<div class="page">
	        <div class="page__head">
	            <div class="cont">
	            	<div class="page__head-cont page__head-cont-bottom">
	                    <h1>
	                        <?=$APPLICATION->ShowTitle(false)?>
                        </h1>
	                    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
							"PATH" => "",
							"SITE_ID" => "s1",
							"START_FROM" => "0",
							),
							false
						);?>
	                </div>
	<? endif; ?>