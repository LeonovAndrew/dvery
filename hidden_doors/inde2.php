<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Стеновые панели — это материал для отделки квартиры/дома/офиса/лофта и других помещений. Он универсален и отлично вписывается в любой интерьер, смотрится по-настоящему дизайнерски и богато.");
$APPLICATION->SetPageProperty("keywords", "Стеновые панели каталог продукции материалы купить каталог цены");
$APPLICATION->SetPageProperty("title", "Стеновые панели от производителя");
$APPLICATION->SetTitle("Стеновые панели - каталог");

\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/fonts/font.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/font-awesome.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/slick.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/slick-theme.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/fancybox.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/reset.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/style.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/media.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/hidden_doors/asset/style.css');
?>

<section class="first">
    <div class="container">
        <div class="first-left">
            <h1 class="hidden-doors-h1">СКРЫТЫЕ ДВЕРИ<br>
                ПОД ОТДЕЛКУ</h1>
            <div class="first-subtitle">
                ОТ ПРОИЗВОДИТЕЛЯ
            </div>
            <div class="first-img-wrap">
                <img src="/hidden_doors/img/40621716.png"" alt="first">
            </div>
            <div class="first-sub-white">
                СО СКЛАДА В МОСКВЕ
                <span>по оптовым ценам от 1 шт.</span>
            </div>
            <div class="first-cta">
                Получите расчет стоимости дверей <br>
                по оптовым ценам в WhatsApp
            </div>
            <div class="first-btn-wrap">
                <a class="hidden-doors-btn" data-action="link" href="https://wa.me/79671098956?text=Здравствуйте! Пришлите, пожалуйста, расчет стоимости по оптовым ценам." target="_blank" tabindex="-1">
                    Получить расчет стоимости в WhatsApp
                    <span><i class="fa fa-whatsapp"></i></span>
                </a>
                <div class="first-price-wrap">
                    <div class="price">19 990₽</div>
                    <div class="old-price">32 000 ₽</div>
                </div>
            </div>
        </div>
        <div class="first-right">

        </div>
    </div>

</section>


<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>