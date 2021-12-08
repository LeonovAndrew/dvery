<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $CONTACTS;
?>
<?$APPLICATION->IncludeComponent(
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
	false
);?>

<?
if($APPLICATION->GetCurDir() == '/')
{?>
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
<?}
?>

<? if ($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != '/about/' && !preg_match("/\/news\/([a-z]+)/", $APPLICATION->GetCurDir()) && !preg_match("/\/catalog\/([a-z]+)\/([a-z]+)/", $APPLICATION->GetCurDir()) ||  preg_match("/\/catalog\/sistemy\/([a-zA-Z0-9]+)/", $APPLICATION->GetCurDir())) :?>
            </div>
        </div>
    </div>
<? endif; ?>
<div class="footer-form">
    <div class="cont">
        <div class="footer-form__cont">
            <div class="footer-form__head">
                Получите консультацию специалиста
            </div>
            <form class="footer-form__body js-form-ajax">
                <input type="hidden" name="IBLOCK_ID" value="7">

                <input type="text" name="NAME" class="footer-form__input" placeholder="Введите ваше имя">
                <input type="text" name="PHONE" class="footer-form__input tel" placeholder="Введите ваш номер телефона">

                <button type="submit" class="footer-form__btn">Получить консультацию</button>
            </form>
            <p class="form__message"></p>
        </div>
    </div>
</div>

<footer>
    <div class="cont">
        <div class="footer__cont">
            <div class="footer__top">
                <a href="#" class="footer__logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/page-logo-white.png" alt="page-logo-white">
                    <!-- <img src="<?=SITE_TEMPLATE_PATH?>/img/page-logo-black.png" alt=""> -->
                </a>
                <?$APPLICATION->IncludeComponent(
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
                );?>
                <?$APPLICATION->IncludeComponent(
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
				);?>
                <div class="footer__info">
                	<? if ($CONTACTS['PROPERTIES']['PHONE']['VALUE']) :?>
                    	<a href="tel:<?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?>" class="footer__call"><?=$CONTACTS['PROPERTIES']['PHONE']['VALUE']?></a>
                	<? endif; ?>

                	<? if ($CONTACTS['PROPERTIES']['EMAIL']['VALUE']) :?>
                    	<a href="mailto:<?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?>" class="footer__mail"><?=$CONTACTS['PROPERTIES']['EMAIL']['VALUE']?></a>
                	<? endif; ?>

                    <?$APPLICATION->IncludeComponent(
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
					);?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer__bottom">
        © <?=date('Y')?> — Все права защищены
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

            <input type="text" name="NAME" placeholder="Введите ваше имя" class="popup__list-item">
            <input type="text" name="PHONE" placeholder="Введите ваш телефон" class="popup__list-item tel">
        </div>
        <div class="popup__text">
            Нажимая кнопку «Заказать обратный звонок», вы принимаете условия обработки ваших персональных данных
        </div>
        <button type="submit" class="popup__btn">Заказать обратный звонок</button>
        <p class="form__message"></p>
    </form>
</div>

<div class="popup" data-popup="order">
    <form class="popup__cont js-form-ajax-order">
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
            <input type="text" name="PHONE" placeholder="Введите ваш телефон" class="popup__list-item tel">
        </div>
        <div class="popup__text">
            Нажимая кнопку «Оформить», вы принимаете условия обработки ваших персональных данных
        </div>
        <button type="submit" class="popup__btn">Оформить</button>
        <p class="form__message"></p>
    </form>
</div>

	<script>
		(function($) {
			$(document).ready(function() {
				var $header = $("header"),
					$clone = $header.before($header.clone().addClass("clone"));
			   
				$(window).on("scroll", function() {
					var fromTop = $(document).scrollTop();
					$("body").toggleClass("down", (fromTop > 200));
				});
			});
		})(jQuery);
	</script>

	<script type="text/javascript" src="/local/templates/custom/js/jquery.lazy.min.js"></script>

	<!-- jsDeliver -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

</body>
</html>