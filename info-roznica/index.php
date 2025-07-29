<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация для розницы");
?><br>
 <script>
document.addEventListener("DOMContentLoaded", function() {
  const mcatElement = document.getElementById("mcat");
  mcatElement.innerHTML = mcatElement.innerHTML.replace(/&nbsp;/g, "");
});
</script> <style>

.container_door{
display: flex;
flex-wrap:wrap;
}

.card_door {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px; /* Ограничение ширины */
  margin: 20px auto;
  text-align: center;
  font-family: sans-serif;
  display: inline-block;
  border-radius:5px;
  height:100%;
  background:#fff;
}

.card_door:hover{
  -webkit-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
   -webkit-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
    -moz-transition-duration: 0.5s;
    transition-duration: 0.5s;
	
}

.card_door a
{
text-decoration:none;
}
.card_door img {
  width: 100%;
  border-radius:5px 5px  0 0;
}
.card_door h3 {
  color: #7c4dff;
}
 .card_door p {
  padding: 4px;
  font-size: 18px;
  color: #d32f2f;
}

.text_door
{
border-radius: 5px;
background: #F5F3F7;
padding: 15px;
margin: 10px;
font-size: 18px;
}
.text_door2
{
border-radius: 5px;
background: #F5F3F7;
padding: 15px;
font-size: 18px;
}

 
#mcat summary {
   border-bottom: 1px dotted #000;
    padding: 10px;
    color: #fff;
    cursor: pointer;
    display: inline-block; 
    width:95%;
  background:#7F949F;
  margin:auto;
  
}

#mcat details .mleft{
  margin-left:10px;
  
}
#mcat details a{
  display:block;
  padding:10px;
}

</style>
<div id="mcat">
 <details> <summary>Информация по продукту</summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Объединенная%20техтетрадь%2004.07.25.pdf" rel="noopener noreferrer" target="_blank">Объединенная техтетрадь 04.07.25.pdf</a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Тех%20тетрадь%20по%20алюминиевым%20перегородкам%2029.04.25.pdf" target="_blank">Тех тетрадь по алюминиевым перегородкам 29.04.25.pdf</a><details style="margin-left: 20px;"> <summary class="mleft">Эмаль</summary> <details style="margin-left: 20px;"> <summary>Фото плинтусов</summary> <br>
	<div class="container_door">
		<div class="card_door">
 <a href="/upload/mdocuments/Погонаж/Плинтусы/Фото/1.jpg"> <img alt="01" src="/upload/mdocuments/Погонаж/Плинтусы/Фото/1.jpg"> </a>
			<p>
				 01
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Погонаж/Плинтусы/Фото/04.jpg"> <img alt="04" src="/upload/mdocuments/Погонаж/Плинтусы/Фото/4.jpg"> </a>
			<p>
				 04
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Погонаж/Плинтусы/Фото/5.jpg"> <img alt="05" src="/upload/mdocuments/Погонаж/Плинтусы/Фото/5.jpg"> </a>
			<p>
				 05
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Погонаж/Плинтусы/Фото/6.jpg"> <img alt="06" src="/upload/mdocuments/Погонаж/Плинтусы/Фото/6.jpg"> </a>
			<p>
				 06
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Погонаж/Плинтусы/Фото/A.jpg"> <img src="/upload/mdocuments/Погонаж/Плинтусы/Фото/A.jpg" alt="А"> </a>
			<p>
				 А
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Погонаж/Плинтусы/Фото/B.jpg"> <img src="/upload/mdocuments/Погонаж/Плинтусы/Фото/B.jpg" alt="Б"> </a>
			<p>
				 Б
			</p>
		</div>
	</div>
 </details> </details> <details style="margin-left: 20px;"> <summary class="mleft">Шпон </summary> <details style="margin-left: 20px;"> <summary>Цвета в шпоне </summary> <a href="/upload/mdocuments/Цвета в шпоне/Цвета в шпоне.7z" rel="noopener noreferrer">Скачать все "Цвета в шпоне" </a>
	<div class="container_door">
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/ASH grey.jpg"> <img alt="ASH grey" src="/upload/mdocuments/Цвета в шпоне/mini/ASH grey.jpg"> </a>
			<p>
				 ASH grey
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Bourbon.jpg"> <img alt="Bourbon" src="/upload/mdocuments/Цвета в шпоне/mini/Bourbon.jpg"> </a>
			<p>
				 Bourbon
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Cotton White.jpg"> <img alt="Cotton White" src="/upload/mdocuments/Цвета в шпоне/mini/Cotton White.jpg"> </a>
			<p>
				 Cotton White
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Mud light.jpg"> <img alt="Mud light" src="/upload/mdocuments/Цвета в шпоне/mini/Mud light.jpg"> </a>
			<p>
				 Mud light
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Natural.jpg"> <img alt="Natural" src="/upload/mdocuments/Цвета в шпоне/mini/Natural.jpg"> </a>
			<p>
				 Natural
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Smoke.jpg"> <img alt="Smoke" src="/upload/mdocuments/Цвета в шпоне/mini/Smoke.jpg"> </a>
			<p>
				 Smoke
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Super White.jpg"> <img alt="Super White" src="/upload/mdocuments/Цвета в шпоне/mini/Super White.jpg"> </a>
			<p>
				 Super White
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/White.jpg"> <img alt="White" src="/upload/mdocuments/Цвета в шпоне/mini/White.jpg"> </a>
			<p>
				 White
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Винтаж.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Винтаж.jpg" alt="Винтаж"> </a>
			<p>
				 Винтаж
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Гречка.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Гречка.jpg" alt="Гречка"> </a>
			<p>
				 Гречка
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Гриджио.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Гриджио.jpg" alt="Гриджио"> </a>
			<p>
				 Гриджио
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Декапе.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Декапе.jpg" alt="Декапе"> </a>
			<p>
				 Декапе
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Дуб натуральный.jpg"> <img alt="Дуб натуральный" src="/upload/mdocuments/Цвета в шпоне/mini/Дуб натуральный.jpg"> </a>
			<p>
				 Дуб натуральный
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Карамель с патиной.jpg"> <img alt="Карамель с патиной" src="/upload/mdocuments/Цвета в шпоне/mini/Карамель с патиной.jpg"> </a>
			<p>
				 Карамель с патиной
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Карамель.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Карамель.jpg" alt="Карамель"> </a>
			<p>
				 Карамель
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Коньяк.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Коньяк.jpg" alt="Коньяк"> </a>
			<p>
				 Коньяк
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Корица.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Корица.jpg" alt="Корица"> </a>
			<p>
				 Корица
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Кофе.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Кофе.jpg" alt="Кофе"> </a>
			<p>
				 Кофе
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Кумин.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Кумин.jpg" alt="Кумин"> </a>
			<p>
				 Кумин
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Лаванда.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Лаванда.jpg" alt="Лаванда"> </a>
			<p>
				 Лаванда
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Нордик.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Нордик.jpg" alt="Нордик"> </a>
			<p>
				 Нордик
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Орех дымчато-серый.jpg"> <img alt="Орех дымчато-серый" src="/upload/mdocuments/Цвета в шпоне/mini/Орех дымчато-серый.jpg"> </a>
			<p>
				 Орех дымчато-серый
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Орех натуральный.jpg"> <img alt="Орех натуральный" src="/upload/mdocuments/Цвета в шпоне/mini/Орех натуральный.jpg"> </a>
			<p>
				 Орех натуральный
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Перец чёрный.jpg"> <img alt="Перец чёрный" src="/upload/mdocuments/Цвета в шпоне/mini/Перец чёрный.jpg"> </a>
			<p>
				 Перец чёрный
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Перец.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Перец.jpg" alt="Перец"> </a>
			<p>
				 Перец
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Серый дуб.jpg"> <img alt="Серый дуб" src="/upload/mdocuments/Цвета в шпоне/mini/Серый дуб.jpg"> </a>
			<p>
				 Серый дуб
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Слоновая кость.jpg"> <img alt="Слоновая кость" src="/upload/mdocuments/Цвета в шпоне/mini/Слоновая кость.jpg"> </a>
			<p>
				 Слоновая кость
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Тобако.jpg"> <img src="/upload/mdocuments/Цвета в шпоне/mini/Тобако.jpg" alt="Тобако"> </a>
			<p>
				 Тобако
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Ясень белый с серебром.jpg"> <img alt="Ясень белый с серебром" src="/upload/mdocuments/Цвета в шпоне/mini/Ясень белый с серебром.jpg"> </a>
			<p>
				 Ясень белый с серебром
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Ясень белый.jpg"> <img alt="Ясень белый" src="/upload/mdocuments/Цвета в шпоне/mini/Ясень белый.jpg"> </a>
			<p>
				 Ясень белый
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Цвета в шпоне/Ясень чёрный.jpg"> <img alt="Ясень чёрный" src="/upload/mdocuments/Цвета в шпоне/mini/Ясень чёрный.jpg"> </a>
			<p>
				 Ясень чёрный
			</p>
		</div>
	</div>
 </details> </details> <details style="margin-left: 20px;"> <summary class="mleft">Инженерные системы </summary> <a href="https://disk.yandex.ru/d/VWDrJsvQLSPd7g" rel="noopener noreferrer">Инженерные системы </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Дополнительные бланки, технички, сертификаты </summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Бланк для дверей внутреннего открывания.pdf" rel="noopener noreferrer">Бланк для дверей внутреннего открывания.pdf&nbsp;</a>&nbsp; <a href="/upload/mdocuments/Бланки_шаблоны_методички/Рекомендации%20по%20петлям%20и%20цилиндрам%2022.04.25.pdf" rel="noopener noreferrer">Рекомендации по петлям и цилиндрам 22.04.25.pdf</a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Изменения пропорций.pdf" rel="noopener noreferrer">Изменения пропорций.pdf </a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/ТЗ на типовую накладку 17.11.20.JPG" rel="noopener noreferrer">ТЗ на типовую накладку 17.11.20.JPG </a> <details style="margin-left: 20px;"> <summary class="mleft">Сертификаты </summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Свидетельство%20на%20товарный%20знак.pdf" rel="noopener noreferrer">Свидетельство на товарный знак.pdf</a>&nbsp; <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Противопожарный%20сертификат.pdf">Противопожарный сертификат грунт.pdf</a>&nbsp; <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Противопожарный%20сертификат%20общий.pdf">Противопожарный сертификат общий.pdf</a>&nbsp; <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Сертификат%20на%20звукоизоляцию%20стр%201.jpg">Сертификат на звукоизоляцию стр 1.jpg</a>&nbsp; <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Сертификат%20на%20звукоизоляцию%20стр%202.jpg">Сертификат на звукоизоляцию стр 2.jpg</a>&nbsp; <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Сертификат%20на%20звукоизоляцию%20стр%203.jpg">Сертификат на звукоизоляцию стр 3.jpg</a> </details> </details> </details> <details> <summary>Документы для оформления заказа</summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Приложение%20№2%2007.03.25.pdf" rel="noopener noreferrer">Приложение №2 07.03.25.pdf</a>&nbsp; &nbsp;&nbsp; <details style="margin-left: 20px;"> <summary class="mleft">Доп. договоры </summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Договора/Договор%20на%20монтаж%20ИП%20Соломин%20А.А.docx">Договор на монтаж ИП Соломин А.А.docx</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Договора/Заявление на передачу скидки.pdf" rel="noopener noreferrer">Заявление на передачу скидки.pdf </a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Письмо при оплате за третье лицо.docx" rel="noopener noreferrer">Письмо при оплате за третье лицо.docx </a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Договора/Договор на двусторонюю покраску.docx" rel="noopener noreferrer">Договор на двусторонюю покраску.docx</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Заявление%20на%20возврат%20ДС.pdf">Заявление на возврат ДС.pdf</a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Замерные листы и бланк заявки на замер</summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Замер/Замерный лист 1.pdf" rel="noopener noreferrer">Замерный лист 1.pdf </a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Замер/Замерный%20лист%202.pdf" rel="noopener noreferrer">Замерный лист 2.pdf</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Заявка%20на%20замер%2014.10.22.xlsx">Заявка на замер 14.10.22.xlsx</a> </details> </details> <details> <summary>О продажах</summary> <details style="margin-left: 20px;"> <summary class="mleft">Наши УТП </summary> <a href="/upload/mdocuments/Презентации/презентация%20о%20компании%2002.08.23.pdf" rel="noopener noreferrer">Презентация о компании 02.08.23.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация%20УТП%2003.08.23.pdf" rel="noopener noreferrer">Презентация УТП 02.08.23.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация%20о%20скрытых%20дверях%2002.08.23.pdf" rel="noopener noreferrer">Презентация о скрытых дверях 02.08.23.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация%20Стеновые%20панели%2002.08.23.pdf" rel="noopener noreferrer">Презентация Стеновые панели 02.08.23.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация Двери в Эмали 06.10.22.pdf" rel="noopener noreferrer">Презентация Двери в Эмали 06.10.22.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация Двери в Шпоне 06.10.22.pdf" rel="noopener noreferrer">Презентация Двери в Шпоне 06.10.22.pdf</a></details> <details style="margin-left: 20px;"> <summary class="mleft">Курс для менеджеров от Уколовой </summary> <details style="margin-left: 20px;"> <summary class="mleft">5 этапов продаж </summary> <a href="https://disk.yandex.ru/i/gZWr7DVtNM6xKw" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/I249S_jpi4gorA" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">СПИН продажи </summary> <a href="https://disk.yandex.ru/i/3WH5s6fbGZbhuA" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/UBrt6UDSlVd9Ug" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Мастерство презентации </summary> <a href="https://disk.yandex.ru/i/c6PaFbaqz0wRuA" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/bTLHzjkIPyF1jQ" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Работа с возражениями </summary> <a href="https://disk.yandex.ru/i/6sVAReyEmWgG7Q" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/Qv_tFMFt4Z1bYg" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Переговорные навыки </summary> <a href="https://disk.yandex.ru/i/onheLPveMHBBOA" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/IcDV8KmZJxzjkQ" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Манипуляции и контр-манипуляции </summary> <a href="https://disk.yandex.ru/i/hhl1aBnGN4XLIw" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/MAon1FrjN7eaWw" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">НЛП в продажах </summary> <a href="https://disk.yandex.ru/i/So6gq79bbbSPGw" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/M5tvZse1IUez5A" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Психотипы клиентов </summary> <a href="https://disk.yandex.ru/i/HHP73LoNVBlTTw" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/d/_cOaodmJP2TKtw" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Нетворкинг </summary> <a href="https://disk.yandex.ru/i/JoubSm3kfs9O-A" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/EPk2mbN8AY9jXg" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Скрипты </summary> <a href="https://disk.yandex.ru/i/6nFhS3YK6-A7ag" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/PZsixfmvmXba0w" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Цели по SMART </summary> <a href="https://disk.yandex.ru/i/Tl-lLv_teTWnCA" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/hn7pjNMtGSXeHA" rel="noopener noreferrer">Презентация </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Холодные звонки </summary> <a href="https://disk.yandex.ru/i/xKowgjcyzN9iMw" rel="noopener noreferrer">Видео </a> <a href="https://disk.yandex.ru/i/IJ2cHlScTZkOXQ" rel="noopener noreferrer">Презентация </a> </details> </details> </details> <details> <summary>Прайсы </summary> <details style="margin-left: 20px;"> <summary class="mleft">Прайсы на фурнитуру</summary> <a href="/upload/mdocuments/Фурнитура/MORELLI%20INNOVATION%2012.02.25.xlsx" rel="noopener noreferrer">MORELLI INNOVATION 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/PENALBOX%2012.02.25%20.xlsx">PENALBOX 12.02.25.xlsx</a>&nbsp;&nbsp;<a href="/upload/mdocuments/Фурнитура/APRILE%2012.02.25.xlsx">APRILE 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/EXTREZA%2012.02.25.xlsx">EXTREZA 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/FUARO%2006.03.25.xlsx">FUARO 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/ARMADILLO%2006.03.25.xlsx">ARMADILLO 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/CEBI%20CROMA%2006.03.25.xls">CEBI CROMA 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/SYSTEM%2006.03.25.xls">SYSTEM 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/TUPAI%2006.03.25.xls">TUPAI 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/COLOMBO%2006.03.25.xlsx">COLOMBO 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/BUSSARE,%20ADDEN%20BAU,%20SPACEINNOVATION%2006.03.25.xlsx">BUSSARE, ADDEN BAU, SPACEINNOVATION 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/NUDA%2006.03.25.xlsx">NUDA 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/ARCHIE%20VERGE%20GENESIS%20SILLUR%20Antibacterial%2006.03.25.xls">ARCHIE VERGE GENESIS SILLUR Antibacterial 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/MELODIA%2006.03.25.xlsx">MELODIA 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/FORME%2006.03.25.xlsx">FORME 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/CLASS%2006.03.25.xlsx">CLASS 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/MORELLI%2006.03.25.xlsx">MORELLI 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/LOCKSTYLE%2003.04.25.xls">LOCKSTYLE 03.04.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/Противопожарные%20ручки%20FUARO%2003.04.25.xlsx">Противопожарные ручки FUARO 03.04.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/Bonaiti%2003.04.25.xls">Bonaiti 03.04.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/K.Sistem%2003.04.25.xlsx">K.Sistem 03.04.25.xlsx</a>&nbsp;</details> <details style="margin-left: 20px;" open=""> <summary class="mleft">Прайсы по продукту и услугам</summary><a href="/upload/mdocuments/Прайсы/Прайс%20на%20Услуги%2002.04.25.xlsx">Прайс на Услуги 02.04.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20Шпон%2015.07.25.xlsx">Прайс Шпон 15.07.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20Алюминий%2015.07.25.xlsx">Прайс Алюминий 15.07.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20Эмаль%2015.07.25%20V2.xlsx">Прайс Эмаль 15.07.25 V2.xlsx</a> </details> </details> <details> <summary>Каталоги</summary> <a href="/upload/mdocuments/Каталоги/Основной%20каталог%202024%20V2.pdf">Основной каталог 2024 V2.pdf</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Каталог Стеновые панели (мобильная версия) 06.10.22.pdf" rel="noopener noreferrer">Каталог Стеновые панели (мобильная версия) 02.08.23.pdf </a><a href="/upload/mdocuments/Каталоги/Каталог Стеновые панели 06.10.22.pdf" rel="noopener noreferrer">Каталог Стеновые панели 06.10.22.pdf </a><a href="/upload/mdocuments/Каталоги/Каталог скрытые двери (c УТП) 06.10.22.pdf" rel="noopener noreferrer">Каталог скрытые двери (c УТП) 06.10.22.pdf </a><a href="/upload/mdocuments/Каталоги/Каталог скрытые двери (c УТП) (мобильная версия) 06.10.22.pdf" rel="noopener noreferrer">Каталог скрытые двери (c УТП) (мобильная версия) 06.10.22.pdf </a> <a href="/upload/mdocuments/Каталоги/Каталог алмазной гравировки.pdf" rel="noopener noreferrer">Каталог алмазной гравировки.pdf </a>&nbsp;<a href="/upload/mdocuments/Каталоги/Модельный%20ряд%202025%20V6.pdf">Модельный ряд 2025 V6.pdf</a> <a href="/upload/mdocuments/Каталоги/Алюминиевые%20перегородки%2010.06.25.pdf">Алюминиевые перегородки 10.06.25.pdf</a>&nbsp;<a href="https://dveri-provance.ru/upload/mdocuments/%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3%D0%B8/%D0%A4%D0%B0%D1%81%D0%B0%D0%B4%D1%8B%20Provance.pdf">Фасады Provance</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Cписок%20ручек%20для%20Glass%2008.07.25.pdf">Cписок ручек для Glass 08.07.25.pdf</a></details> <details> <summary>Презентации клиентам </summary> <details style="margin-left: 20px;"> <summary class="mleft">Презентации к КП </summary> <a href="/upload/mdocuments/Презентации/КП/Приложение к КП (эмаль).pdf" rel="noopener noreferrer">Приложение к КП (эмаль).pdf </a> <a href="/upload/mdocuments/Презентации/КП/Приложение к КП (шпон).pdf" rel="noopener noreferrer">Приложение к КП (шпон).pdf </a> <a href="/upload/mdocuments/Презентации/КП/Приложение к КП (грунт).pdf" rel="noopener noreferrer">Приложение к КП (грунт).pdf </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Презентации по сериям Эмаль </summary> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия NeoClassic Эмаль.pdf" rel="noopener noreferrer">Презентация серия NeoClassic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Original Эмаль.pdf" rel="noopener noreferrer">Презентация серия Original Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Line Novara Эмаль.pdf" rel="noopener noreferrer">Презентация серия Line Novara Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Griglia Эмаль.pdf" rel="noopener noreferrer">Презентация серия Griglia Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Grand Эмаль.pdf" rel="noopener noreferrer">Презентация серия Grand Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Ggirlia Classic Эмаль.pdf" rel="noopener noreferrer">Презентация серия Ggirlia Classic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Edge Эмаль.pdf" rel="noopener noreferrer">Презентация серия Edge Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Classic Эмаль.pdf" rel="noopener noreferrer">Презентация серия Classic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Atlantic Эмаль.pdf" rel="noopener noreferrer">Презентация серия Atlantic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Vision Эмаль.pdf" rel="noopener noreferrer">Презентация серия Vision Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Modern Эмаль.pdf" rel="noopener noreferrer">Презентация серия Modern Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Line Эмаль.pdf" rel="noopener noreferrer">Презентация серия Line Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Ampir Эмаль.pdf" rel="noopener noreferrer">Презентация серия Ampir Эмаль.pdf </a> </details> <a href="/upload/mdocuments/Презентации/Презентация Дизайнерам.pdf" rel="noopener noreferrer">Презентация Дизайнерам.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация%20Стеновые%20панели%20(мобильная%20версия)%2002.08.23.pdf" rel="noopener noreferrer">Презентация Стеновые панели (мобильная версия) 02.08.23.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация%20о%20компании%20(мобильная%20версия)%2002.08.23.pdf" rel="noopener noreferrer">Презентация о компании (мобильная версия) 02.08.23.pdf </a> &nbsp;<a href="/upload/mdocuments/Презентации/Презентация%20о%20скрытых%20дверях%20(мобильная%20версия)%2012.02.24.pdf" rel="noopener noreferrer">Презентация о скрытых дверях (мобильная версия) 12.02.24.pdf</a> <a href="/upload/mdocuments/Презентации/Презентация Двери в Эмали (моб версия) 06.10.22.pdf" rel="noopener noreferrer">Презентация Двери в Эмали (моб версия) 06.10.22.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация Двери в Шпоне (моб версия) 06.10.22.pdf" rel="noopener noreferrer">Презентация Двери в Шпоне (моб версия) 06.10.22.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация Застройщикам.pdf" rel="noopener noreferrer">Презентация Застройщикам.pdf</a>&nbsp; </details> <details> <summary>Мерчандайзинг </summary> <a href="/upload/mdocuments/Мерч/МЕРЧБУК%202024%20V0.pdf" rel="noopener noreferrer">Мерчбук 2024 V0.pdf</a>&nbsp;<a href="/upload/mdocuments/Мерч/Матрица%20образцов%202024.pdf">Матрица образцов 2024.pdf</a> </details> <details> <summary>Фото, визуализации и 3d-модели </summary> <details style="margin-left: 20px;"> <summary class="mleft">Визуализации дверей </summary> <a href="https://disk.yandex.ru/d/-JCNSj-qEYQmYQ" rel="noopener noreferrer">Визуализации дверей </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">3д-модели дверей </summary> <a href="https://disk.yandex.ru/d/UgfHqk0vJUDeTw" rel="noopener noreferrer">Скачать 3д-модели дверей</a>&nbsp; </details> <details style="margin-left: 20px;"> <summary class="mleft">Фотографии </summary> <a href="https://disk.yandex.ru/d/eXoH4_Us6Q3wWA" rel="noopener noreferrer">Фотографии в облаке</a>&nbsp;<a href="https://disk.yandex.ru/d/PYabxFblhLJMyA">Фото производства</a> </details> </details> <details> <details style="margin-left: 20px;"> <summary>Схемы проезда </summary>
	<div class="container_door">
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/Рублевское шоссе схема.png"> <img alt="Рублёвка проезд к офису" src="/upload/mdocuments/Схемы проезда/mini/Рублевское шоссе схема.png"> </a>
			<p>
				 Рублёвка проезд к офису
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/БП Румянцево схема.png"> <img alt="Румянцево проезд к БП" src="/upload/mdocuments/Схемы проезда/mini/БП Румянцево схема.png"> </a>
			<p>
				 Румянцево проезд к БП
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/БП Румянцево ТЦ.png"> <img alt="Румянцево проход к ТТ" src="/upload/mdocuments/Схемы проезда/mini/БП Румянцево ТЦ.png"> </a>
			<p>
				 Румянцево проход к ТТ
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/Экспострой на Нахимовском схема.png"> <img alt="Экспо проезд к ТЦ" src="/upload/mdocuments/Схемы проезда/mini/Экспострой на Нахимовском схема.png"> </a>
			<p>
				 Экспо проезд к ТЦ
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/Экспострой на Нахимовском ТЦ.png"> <img alt="Экспо проход к ТТ" src="/upload/mdocuments/Схемы проезда/mini/Экспострой на Нахимовском ТЦ.png"> </a>
			<p>
				 Экспо проход к ТТ
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/каширский двор схема.png"> <img alt="Каширка проезд к ТЦ" src="/upload/mdocuments/Схемы проезда/mini/каширский двор схема.png"> </a>
			<p>
				 Каширка проезд к ТЦ
			</p>
		</div>
		<div class="card_door">
 <a href="/upload/mdocuments/Схемы проезда/каширский двор ТЦ.png"> <img alt="Каширка проход к ТТ" src="/upload/mdocuments/Схемы проезда/mini/каширский двор ТЦ.png"> </a>
			<p>
				 Каширка проход к ТТ
			</p>
		</div>
	</div>
 </details> <summary>Контакты, адреса, соц-сети </summary> <a href="https://docs.google.com/spreadsheets/d/1-wgBMQBfX7-iPAEnu7jzgJ3GiEfbXoMb8pexT7dAj3k/edit?usp=sharing" rel="noopener noreferrer">Контакты и коммуникации </a> <strong class="mleft">Сайты </strong> <a href="http://dveri-provance.ru/" rel="noopener noreferrer">Основной сайт </a><a href="https://xn--b1adccph6becm2hb.xn--p1ai/" rel="noopener noreferrer">&nbsp;</a> <strong class="mleft">Социальные сети </strong> <a href="https://vk.com/dveri_provance" rel="noopener noreferrer">Официальная группа в ВК </a> <a href="https://t.me/provance_dveri" rel="noopener noreferrer">Официальный Telegram-канал </a> <a href="https://www.instagram.com/provance_doors_official/" rel="noopener noreferrer">Официальный Instagram-канал </a> </details> <details> <summary>График работы магазинов </summary> <a href="https://drive.google.com/drive/folders/14OkxovKUR9W8Uag3X_LdYHuxTbp2ShiU?usp=sharing" rel="noopener noreferrer">График работы магазинов </a> </details> <details> <summary>Работа с дизайнерами </summary><a href="/upload/mdocuments/Книга%20по%20продажам/VIP-дизайнеры%2015.png">Дизайнеры со скидкой 15%</a>&nbsp;<a href="/upload/mdocuments/Книга%20по%20продажам/VIP-дизайнеры%2020-30.jpg">Дизайнеры со скидкой 20-30%</a>&nbsp;<a href="/upload/mdocuments/Книга%20по%20продажам/VIP-дизайнеры%2020-30%20стр%202.jpg">Дизайнеры со скидкой 30% стр 2</a> &nbsp;</details> <details> <summary>Обучение, инструкции, сценарии </summary> <a href="https://docs.google.com/document/d/13i5e_Av12RQGVY2-53yeNdmfTO7MxKpP_uN4Vpb6aVI/edit?usp=sharing" rel="noopener noreferrer">&nbsp;Правила работы менеджера</a> <a href="/upload/mdocuments/Обучение/Welcome Book 26.08.22.pdf" rel="noopener noreferrer">Welcome Book 26.08.22.pdf</a> <a href="https://disk.yandex.ru/i/j-x3kaJyfUgQ9Q" rel="noopener noreferrer">Памятка при звонке клиенту</a>&nbsp;<a href="/upload/mdocuments/Обучение/Инструкция%20к%20кассам%2016.08.23.pdf">Инструкция к кассам 16.08.23.pdf</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Разнесение%20платежей%20в%201С.pdf">Разнесение платежей в 1С.pdf</a>&nbsp;<details style="margin-left: 20px;"> <summary class="mleft">Сценарии </summary> <a href="/upload/mdocuments/Сценарии/Сценарий на входящие звонки.htm" rel="noopener noreferrer">Сценарий на входящие звонки.htm </a> <a href="/upload/mdocuments/Сценарии/Сценарий на исходящие звонки КВИЗ.htm" rel="noopener noreferrer">Сценарий на исходящие звонки КВИЗ.htm </a> <a href="/upload/mdocuments/Сценарии/Сценарий для обзвона V7.htm" rel="noopener noreferrer">Сценарий для обзвона V7.htm </a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Видео материалы</summary> <a href="https://disk.yandex.ru/d/btWSRPDiGMHwKQ">Видео-уроки</a>&nbsp; </details> </details>
</div>
 <br>