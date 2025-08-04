<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация для дилера");
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
 <details> <summary>Информация по продукту</summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Объединенная%20техтетрадь%2004.07.25.pdf" rel="noopener noreferrer" target="_blank">Объединенная техтетрадь 04.07.25.pdf</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Тех%20тетрадь%20по%20алюминиевым%20перегородкам%2029.07.25.pdf" target="_blank">Тех тетрадь по алюминиевым перегородкам 29.07.25.pdf</a><details style="margin-left: 20px;"><summary class="mleft">Эмаль</summary> <details style="margin-left: 20px;"> <summary>Фото плинтусов</summary> <br>
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
 </details> </details> <details style="margin-left: 20px;"> <summary class="mleft">Инженерные системы </summary> <details style="margin-left: 20px;"> <summary class="mleft">Invisible </summary> <a href="/upload/mdocuments/Инженерные системы/Invisible/INVISIBLE 2 - инструкция по установке.pdf" rel="noopener noreferrer">INVISIBLE 2 - инструкция по установке.pdf </a> <a href="/upload/mdocuments/Инженерные системы/Invisible/Инструкция INVISIBLE.pdf" rel="noopener noreferrer">Инструкция INVISIBLE.pdf </a> </details> </details> <details style="margin-left: 20px;"> <summary class="mleft">Дополнительные бланки, технички, сертификаты </summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Бланк для дверей внутреннего открывания.pdf" rel="noopener noreferrer">Бланк для дверей внутреннего открывания.pdf&nbsp;</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Рекомендации%20по%20петлям%20и%20цилиндрам%2022.04.25.pdf" rel="noopener noreferrer">Рекомендации по петлям и цилиндрам 22.04.25.pdf</a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Изменения пропорций.pdf" rel="noopener noreferrer">Изменения пропорций.pdf </a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/ТЗ на типовую накладку 17.11.20.JPG" rel="noopener noreferrer">ТЗ на типовую накладку 17.11.20.JPG </a> <details style="margin-left: 20px;"> <summary class="mleft">Сертификаты </summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Свидетельство%20на%20товарный%20знак.pdf" rel="noopener noreferrer">Свидетельство на товарный знак.pdf</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Противопожарный%20сертификат.pdf">Противопожарный сертификат грунт.pdf</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Противопожарный%20сертификат%20общий.pdf">Противопожарный сертификат общий.pdf</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Сертификат%20на%20звукоизоляцию%20стр%201.jpg">Сертификат на звукоизоляцию стр 1.jpg</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Сертификат%20на%20звукоизоляцию%20стр%202.jpg">Сертификат на звукоизоляцию стр 2.jpg</a>&nbsp;<a href="/upload/mdocuments/Бланки_шаблоны_методички/Сертификаты/Сертификат%20на%20звукоизоляцию%20стр%203.jpg">Сертификат на звукоизоляцию стр 3.jpg</a> </details> </details> </details> <details> <summary>Основные документы и полезная информация</summary> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Бланк рекламации.pdf" target="_blank" rel="noopener noreferrer">Бланк рекламации.pdf</a> <a href="/upload/mdocuments/Бланки_шаблоны_методички/Бланк%20заявки%20на%20доставку%2029.05.23.docx" rel="noopener noreferrer" target="_blank">Бланк заявки на доставку.xlsx</a>&nbsp;<a href="/upload/mdocuments/Контакты/Схема%20проезда%20на%20склад.pdf">Схема проезда на склад.pdf</a>&nbsp;<a href="https://docs.google.com/document/d/1x3pyGVCRmAzZYrBPTeAlUpJmFyfgmmBSsKC-ZAyWQus/edit?usp=sharing">Регламент ОПТ</a> </details> <details> <summary>Прайсы</summary><details style="margin-left: 20px;"> <summary class="mleft">Прайсы на фурнитуру</summary>&nbsp;<a href="/upload/mdocuments/Фурнитура/APRILE%2012.02.25.xlsx">APRILE 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/EXTREZA%2012.02.25.xlsx">EXTREZA 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/MORELLI%20INNOVATION%2012.02.25.xlsx">MORELLI INNOVATION 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/PENALBOX%2012.02.25%20.xlsx">PENALBOX 12.02.25 .xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/ARCHIE%20VERGE%20GENESIS%20SILLUR%20Antibacterial%2006.03.25.xls">ARCHIE VERGE GENESIS SILLUR Antibacterial 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/CEBI%20CROMA%2006.03.25.xls">CEBI CROMA 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/SYSTEM%2006.03.25.xls">SYSTEM 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/TUPAI%2006.03.25.xls">TUPAI 06.03.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/APRILE%2012.02.25.xlsx">APRILE 12.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/ARMADILLO%2006.03.25.xlsx">ARMADILLO 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/BUSSARE,%20ADDEN%20BAU,%20SPACEINNOVATION%2006.03.25.xlsx">BUSSARE, ADDEN BAU, SPACEINNOVATION 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/CLASS%2006.03.25.xlsx">CLASS 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/COLOMBO%2006.03.25.xlsx">COLOMBO 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/FORME%2006.03.25.xlsx">FORME 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/FUARO%2006.03.25.xlsx">FUARO 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/MELODIA%2006.03.25.xlsx">MELODIA 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/MORELLI%2006.03.25.xlsx">MORELLI 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/NUDA%2006.03.25.xlsx">NUDA 06.03.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/LOCKSTYLE%2003.04.25.xls">LOCKSTYLE 03.04.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/Противопожарные%20ручки%20FUARO%2003.04.25.xlsx">Противопожарные ручки FUARO 03.04.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/Bonaiti%2003.04.25.xls">Bonaiti 03.04.25.xls</a>&nbsp;<a href="/upload/mdocuments/Фурнитура/K.Sistem%2003.04.25.xlsx">K.Sistem 03.04.25.xlsx</a> </details> <details style="margin-left: 20px;"><summary class="mleft">Прайсы по продукту и услугам</summary> &nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20Шпон%2015.07.25.xlsx">Прайс Шпон 15.07.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20Алюминий%2015.07.25.xlsx">Прайс Алюминий 15.07.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20Эмаль%2015.07.25%20V2.xlsx">Прайс Эмаль 15.07.25 V2.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Прайс%20доставка%20опт%2007.02.25.xlsx">Прайс доставка опт 07.02.25.xlsx</a>&nbsp;<a href="/upload/mdocuments/Прайсы/Инструменты%2001.01.25.pdf">Инструменты 01.01.25.pdf</a> </details> </details> <details> <summary>Каталоги</summary> <a href="/upload/mdocuments/Каталоги/Основной%20каталог%202024%20V2.pdf">Основной каталог 2024 V2.pdf</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Каталог Стеновые панели 06.10.22.pdf" target="_blank" rel="noopener noreferrer">Каталог Стеновые панели 06.10.22.pdf</a> <a href="/upload/mdocuments/Каталоги/Каталог Стеновые панели (мобильная версия) 06.10.22.pdf" target="_blank" rel="noopener noreferrer">Каталог Стеновые панели (мобильная версия) 06.10.22.pdf</a> <a href="/upload/mdocuments/Каталоги/Каталог Скрытые Двери (c УТП)d.pdf" target="_blank" rel="noopener noreferrer">Каталог скрытые двери (c УТП).pdf</a> <a href="/upload/mdocuments/Каталоги/Каталог алмазной гравировки.pdf" target="_blank" rel="noopener noreferrer">Каталог алмазной гравировки.pdf</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Модельный%20ряд%202025%20V6.pdf">Модельный ряд 2025 V6.pdf</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Алюминиевые%20перегородки%2010.06.25.pdf">Алюминиевые перегородки 10.06.25.pdf</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Фасады%20Provance.pdf">Фасады Provance</a>&nbsp;<a href="/upload/mdocuments/Каталоги/Cписок%20ручек%20для%20Glass%2008.07.25.pdf">Cписок ручек для Glass 08.07.25.pdf</a> </details> <details> <summary>Презентации</summary> <details style="margin-left: 20px;"> <summary class="mleft">Презентации по сериям Эмаль</summary> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия NeoClassic Эмаль.pdf" rel="noopener noreferrer">Презентация серия NeoClassic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Original Эмаль.pdf" rel="noopener noreferrer">Презентация серия Original Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Line Novara Эмаль.pdf" rel="noopener noreferrer">Презентация серия Line Novara Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Griglia Эмаль.pdf" rel="noopener noreferrer">Презентация серия Griglia Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Grand Эмаль.pdf" rel="noopener noreferrer">Презентация серия Grand Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Ggirlia Classic Эмаль.pdf" rel="noopener noreferrer">Презентация серия Ggirlia Classic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Edge Эмаль.pdf" rel="noopener noreferrer">Презентация серия Edge Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Classic Эмаль.pdf" rel="noopener noreferrer">Презентация серия Classic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Atlantic Эмаль.pdf" rel="noopener noreferrer">Презентация серия Atlantic Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Vision Эмаль.pdf" rel="noopener noreferrer">Презентация серия Vision Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Modern Эмаль.pdf" rel="noopener noreferrer">Презентация серия Modern Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Line Эмаль.pdf" rel="noopener noreferrer">Презентация серия Line Эмаль.pdf </a> <a href="/upload/mdocuments/Презентации/по сериям/эмаль/Презентация серия Ampir Эмаль.pdf" rel="noopener noreferrer">Презентация серия Ampir Эмаль.pdf </a> </details> <a href="/upload/mdocuments/Презентации/Презентация%20Стеновые%20панели%20(мобильная%20версия)%2002.08.23.pdf" rel="noopener noreferrer">Презентация Стеновые панели (мобильная версия) 02.08.23.pdf </a><a href="/upload/mdocuments/Презентации/Презентация%20о%20скрытых%20дверях%20(мобильная%20версия)%2012.02.24.pdf" rel="noopener noreferrer">Презентация о скрытых дверях (мобильная версия) 12.02.24.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация Двери в Эмали (моб версия) 06.10.22.pdf" rel="noopener noreferrer">Презентация Двери в Эмали (моб версия) 06.10.22.pdf </a> <a href="/upload/mdocuments/Презентации/Презентация Двери в Шпоне (моб версия) 06.10.22.pdf" rel="noopener noreferrer">Презентация Двери в Шпоне (моб версия) 06.10.22.pdf</a>&nbsp;<a href="/upload/mdocuments/Презентации/дилерам/Презентация%205%20преимуществ%2012.07.23.pdf">Презентация 5 преимуществ 12.07.23.pdf</a>&nbsp;<a href="/upload/mdocuments/Презентации/дилерам/Презентация%20о%20компании%202023.pdf">Презентация о компании 2023.pdf</a>&nbsp;<a href="/upload/mdocuments/Презентации/дилерам/Презентация%20УТП%2005.07.23.pdf">Презентация УТП 05.07.23.pdf</a> </details> <details><summary>Мерчандайзинг</summary> <a href="/upload/mdocuments/Мерч/МЕРЧБУК%202024%20V0.pdf" rel="noopener noreferrer" target="_blank">Мерчбук 2024 V0.pdf</a>&nbsp;<a href="/upload/mdocuments/Мерч/Матрица%20образцов%202024.pdf">Матрица образцов 2024.pdf</a> </details> <details> <summary>Фото, визуализации и 3d-модели</summary> <details style="margin-left: 20px;"> <summary class="mleft">Визуализации дверей</summary> <a href="https://disk.yandex.ru/d/-JCNSj-qEYQmYQ" rel="noopener noreferrer" target="_blank">Визуализации дверей</a> </details> <details style="margin-left: 20px;"> <summary class="mleft">3д-модели дверей</summary> <a href="https://disk.yandex.ru/d/UgfHqk0vJUDeTw" rel="noopener noreferrer" target="_blank">Скачать 3д-модели дверей</a> </details> <details style="margin-left: 20px;"> <summary class="mleft">Фотографии</summary> <a href="https://disk.yandex.ru/d/eXoH4_Us6Q3wWA" target="_blank" rel="noopener noreferrer">Фотографии в облаке</a> </details> </details> <details> <summary>Сайты, контакты и соц-сети</summary> <strong class="mleft">Сайты</strong> <a href="http://dveri-provance.ru/" target="_blank" rel="noopener noreferrer">Основной сайт</a> <strong class="mleft">Социальные сети</strong> <a href="https://vk.com/dveri_provance" target="_blank" rel="noopener noreferrer">Официальная группа в ВК</a> <a href="https://t.me/provance_dveri" target="_blank" rel="noopener noreferrer">Официальный Telegram-канал</a> <a href="https://www.instagram.com/provance_doors_official/" target="_blank" rel="noopener noreferrer">Официальный Instagram-канал</a>&nbsp;<a href="https://docs.google.com/spreadsheets/d/1Zi9prbdMR2NML9LEXie-buRD2JepBVFuxoFrk7DZNa4/edit?usp=sharing">Контакты и коммуникации</a> </details> <details> <summary>Материалы для обучения</summary> <details style="margin-left: 20px;"> <summary class="mleft">Видео материалы</summary> <a href="https://disk.yandex.ru/d/btWSRPDiGMHwKQ">Видео-уроки</a>&nbsp; </details> </details>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>