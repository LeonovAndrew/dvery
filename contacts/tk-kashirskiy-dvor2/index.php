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
	.how-go{display:block; justify-content:space-between; }
	.how-go>div{ width:100%; }
	.footer-form__cont{display:none;}
	h2{ margin-bottom:20px;}
	.page__head-cont-bottom,.contacts-list__block{ margin-bottom:40px;}
	.tour iframe{width:100%; height:400px; }
	.map, .sheme{ margin-bottom:40px; }
	@media (max-width:600px){
		.how-go>div{ width:100%; }
	}
</style>
<div class="contacts-list__block">
 
                    	                    <div class="contacts-list__block-text">
							  Москва, Каширское шоссе, 19к1, 4 этаж, пав. 4А-2<br>
 E-mail: <a href="mailto:tkkd2@dveri-provance.ru">tkkd@dveri-provance.ru</a>&nbsp;(пав. 4А-2)<br>
	                    </div>
                                        	                    <div class="contacts-list__block-time">
	                      Время работы: с 09 до 21 (пн-вс)	                    </div>
                                        	                    <a href="tel:+74999554312" class="contacts-list__block-call">
	                        +7 (499) 955 43-12	                    </a>
                                        <!-- <a href="#" class="contacts-list__block-link">
                        Виртуальный тур салона
                    </a> -->
                </div>

<div class="how-go">
	<div class="map">
<h2>На карте</h2>
	<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aae5998b41dd707487ff82490ad44e9f227201b8709771e9475c58415acd5dfbf&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>	</div>

	<div class="sheme">
		<h2>Схема проезда</h2>
		<img src="/contacts/sheme/каширский двор схема.png" />
	</div>

</div>


<div class="how-go" style="margin-bottom:40px; margin-top:-50px;">
	<div class="sheme">
		<h2>Как пройти</h2>
		<img src="/contacts/sheme/каширский двор ТЦ.png" />
	</div>

</div>

<div class="tour">
	<h2>3D-тур по салону</h2>
	<iframe src="https://foto-g.org/3d/doors/3kashir4a2/3kashir4a2.html"></iframe>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>