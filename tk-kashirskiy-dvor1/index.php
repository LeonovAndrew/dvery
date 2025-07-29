<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("FOOTER-FORM", "signup");
$APPLICATION->SetTitle('ТК "Каширский двор - 1" №2');
?>

<style>
	.footer-form{padding-top:0;}
	.news{display:none;}
	.contacts-list__block{padding:0; background:none; }
	.map iframe{width:100%; }
	.contacts-list__block{min-height:inherit; margin-bottom:20px;}
	.sheme img{ width:100%; }
	.how-go{display:flex; justify-content:space-between; }
	.how-go>div{ width:45%; }
	h2{ margin-bottom:20px;}
	.page__head-cont-bottom,.contacts-list__block{ margin-bottom:40px;}
	.tour iframe{width:100%; height:400px; }
</style>
<div class="contacts-list__block">

      <div class="contacts-list__block-text">
							  Москва, Каширское шоссе, 19к1, 4 этаж, пав. 4В-74<br>
 E-mail: <a href="mailto:tkkd@dveri-provance.ru">tkkd2@dveri-provance.ru</a>&nbsp;(пав. 4В-74)<br>
	                    </div>
                                        	                    <div class="contacts-list__block-time">
	                      Время работы: с 09 до 20 (пн-вс)	                    </div>
                                        	                    <a href="tel:+74999554312" class="contacts-list__block-call">
	                        +7 (499) 955 43-12	                    </a>
                                        <!-- <a href="#" class="contacts-list__block-link">
                        Виртуальный тур салона
                    </a> -->
                </div>

<div class="how-go">
	<div class="map">
<h2>Как проехать?</h2>
	<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aae5998b41dd707487ff82490ad44e9f227201b8709771e9475c58415acd5dfbf&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>	</div>

	<div class="sheme">
		<h2>Как пройти?</h2>
		<img src="/contacts/sheme/каширский двор ТЦ.png" />
	</div>

</div>

<div class="tour">
	<h2>3D-тур по салону</h2>
	<iframe src="https://foto-g.org/3d/doors/2kashir4b74/2kashir4b74.html"></iframe>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>