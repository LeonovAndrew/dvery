<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Стеновые панели в шпоне: цены и варианты расцветок");
$APPLICATION->SetTitle("");

\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/fonts/font.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/font-awesome.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/slick.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/slick-theme.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/fancybox.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/reset.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/style.css');
\Bitrix\Main\Page\Asset::getInstance()->addCss('/stroy_paneli/css/media.css');

\Bitrix\Main\Page\Asset::getInstance()->addJs('/stroy_paneli/js/fancybox.js');
\Bitrix\Main\Page\Asset::getInstance()->addJs('/stroy_paneli/js/slick.min.js');
\Bitrix\Main\Page\Asset::getInstance()->addJs('/stroy_paneli/js/jquery.maskedinput.min.js');
\Bitrix\Main\Page\Asset::getInstance()->addJs('/stroy_paneli/js/jquery.validate.min.js');
\Bitrix\Main\Page\Asset::getInstance()->addJs('/stroy_paneli/js/main.js');
?>
<div class="block_1 shpon sten-inner">
    <div class="container">
      <div class="block_1_in">
        <div class="block_1_top">
          <div class="block_1_top_flex">
            <div class="block_1_top_flex_left">
    
              <div class="social">
                <a href="https://vk.com/dveri_provance" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
                <a href="https://t.me/provance_dveri" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="block_1_top_flex_right">
              <a href="" class="call_back" data-devbx-popup-form="header-callback">Заказать звонок</a>
              <a href="tel:+74996817167" class="numcall">+7 (499) 681-71-67</a>
              <p><a target="_blank"
                  href="https://www.google.com/maps?q=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D0%A0%D1%83%D0%B1%D0%BB%D0%B5%D0%B2%D1%81%D0%BA%D0%BE%D0%B5+%D1%88%D0%BE%D1%81%D1%81%D0%B5+14,+%D0%BA%D0%BE%D1%80%D0%BF.+1&um=1&ie=UTF-8&sa=X&ved=2ahUKEwj77O3ux4L6AhWS-ioKHT4WB0EQ_AUoAXoECAEQAw">Москва,
                  Рублевское шоссе 14, корп. 1 </a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block_1_bot">
      <div class="block_1_bot_slider">
        <div class="block_1_bot_slider_inner">
          <div class="block_1_bot_slider_inner_in">
            <div class="container">
              <div class="block_1_bot_slider_inner_in_txt">
                <div class="block_1_bot_slider_inner_in_txt_in">
                  <h1>Стеновые панели в шпоне</h1>
                      <p>•	100% экологичный и благородный материал<br>
•	Простой и чистый монтаж без забот<br>
•	Любые размеры<br>
•	Индивидуальное исполнение с учетом всех пожеланий<br>
•	Неповторимый дизайн <br>
•	Безупречное качество изготовления<br>
•	Более 1 000 вариантов фактур и цветов</p>                   
                </div>
               
              </div>
            </div>
            <div class="for_bg"></div>
            
          </div>
        </div>
        </div>
    </div>
  </div>
    
<div class="block_2_card">
    <div class="container">
      <div class="block_2_card_in">
        <div class="kroshki">
          <a href="">Главная</a>
          <span>/</span>
          <a href="">Каталог</a>
          <span>/</span>
          <a href="">Стеновые панели</a>
          <span>/</span>
          <p>"Натуральный шпон"</p>
        </div>
          
        <?php 
 
        $shpon_arr = array(
            "1_0001_Ясень-белый.jpg"=>"Ясень белый",
            "1_0019_Декапе.jpg"=>"Декапе",
            "1_0025_Smoke.jpg"=>"Smoke",
            "1_0026_Natural.jpg"=>"Natural",   
            "1_0024_Super-White.jpg"=>"Super White",
            "1_0023_White.jpg"=>"White",
            "1_0028_Cotton-White.jpg"=>"Cotton White",
            "1_0022_Винтаж.jpg"=>"Винтаж",
            "1_0018_Дуб-натуральный.jpg"=>"Дуб натуральныи",
            "1_0016_Карамель.jpg"=>"Карамель",
            "1_0029_Bourbon.jpg"=>"Bourbon",
            "1_0027_Mud-light.jpg"=>"Mud light",        
            "1_0006_Перец.jpg"=>"Перец",
            "1_0021_Гречка.jpg"=>"Гречка",        
            "1_0008_Орех-натуральный.jpg"=>"Орех натуральныи",
            "1_0030_asg-grey.jpg"=>"Asg grey",
            "yasen_black.jpg"=>"Ясень черный",
            "1_0007_Перец-чёрный.jpg"=>"Перец чёрный"
        );
        
        
        ?>
        <div class="block_2_card_flex">
          <div class="block_2_card_flex_img">
              
           <?php $i=0; foreach($shpon_arr as $key=>$img){ ?>
                <div class="block_2_card_flex_img_in" id="img_show<?=$i?>" <?php if($i==0){ ?>  style="display: block;" <?php } ?>>
                  <img src="https://dveri-provance.ru/stroy_paneli/img/shpon/<?=$key?>" alt="">
                </div>    
            <?php $i++; } ?>


          </div>
          <div class="block_2_card_flex_txt">
            <div class="materials_btn">
              <p class="bt_chose bt_chose_act">Натуральный шпон</p>   
              <a style="text-decoration:none;" href="emal.php"><p class="bt_chose">Эмаль</p></a>
              
              
            </div>
           <!-- <div class="block_2_card_flex_txt_in1">
              <p>Варианты отделок:</p>
              <div class="block_2_card_flex_txt_in1_inner">
                <div class="for_radio">
                  <input type="radio" id="for_radio_in1" name="for_radio_in" checked>
                  <label for="for_radio_in1">Вертикальный</label>
                </div>
                <div class="for_radio">
                  <input type="radio" id="for_radio_in2" name="for_radio_in">
                  <label for="for_radio_in2">Горизонтальный</label>
                </div>
              </div>
            </div> -->
            <div class="block_2_card_flex_txt_in2">
              <h4>18 видов в наличии:</h4>
              <div class="block_2_card_flex_txt_in2_in">
                  
               <?php $i=0; foreach($shpon_arr as $key=>$img){ ?>
                <div class="type_chose tooltip  <?php if($i==0){ ?> type_chose_act <?php } ?>" title="<?=$img?>" data-id="<?=$i?>">
                  <img src="https://dveri-provance.ru/stroy_paneli/img/shpon/icon/<?=$key?>" alt="" style="border:1px solid #eee;">
                </div>
                <?php $i++;  } ?>
                
              </div>
            </div>
            <div class="block_2_card_flex_txt_in3">
              <h4>Размер <span style="font-weight: bold;">панели:</span> <span class="square">3.25 </span>м<sup>2</sup></h4>
              <div class="block_2_card_flex_txt_in3_in_flex">
                <div class="block_2_card_flex_txt_in3_in">
                  <p>Ширина</p>
                  <div class="inpt">
                    <input min="900" step="100" max="5000" id="width" class="culc_input" type="number" placeholder="1300" autocomplete="off">
                  </div>
                  <span>от 900 до 5000 мм</span>
                </div>
                <div class="block_2_card_flex_txt_in3_in">
                  <p>Высота</p>
                  <div class="inpt">
                    <input min="2400" step="100" max="3010" id="height" class="culc_input" type="number" placeholder="2500" autocomplete="off">
                  </div>
                  <span>от 2400 до 3010 мм</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="total_block">
      <div class="container">
        <div class="total_block_flex">
          <div class="total_block_flex_left">
            <div class="total_block_flex_left_in">
              <p>Цена:</p>
              <span class="inf_value">от 9 190 ₽/м<sup>2</sup></span>
              <input type="hidden" id="curr_price" value="9190" />    
            </div>
            <div class="total_block_flex_left_in">
              <p>Общая площадь:</p>
                <span class="inf_value"><span class="square">3.25</span> м<sup>2</sup></span>
            </div>
          </div>
          <div class="total_block_flex_right_flex">
            <div class="total_block_flex_right_flex_in1">
                <h3>от <span id="total_pirce">29 867</span> ₽ </h3>
              <p>Цены в регионах могут отличаться
                от цен, представленных на сайте</p>
            </div>
              <button
                      class="btn_send"
                      data-devbx-popup-form="order-form"
                      data-popup-params="<?=htmlspecialcharsbx(\Bitrix\Main\Web\Json::encode(array('FORM_TYPE'=>'ORDER_SHPON')))?>">
                  Заказать
              </button>
            <div class="total_block_flex_right_flex_in2">
              <a href=""><i class="fa fa-heart" aria-hidden="true"></i>
                В избранное
              </a>
              <a href=""><i class="fa fa-google-wallet" aria-hidden="true"></i>
                Заказать замер
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <div class="block_3_card">
    <div class="container">
      <div class="block_3_card_in">
        <h2 class="heading">Подходящая фурнитура</h2>
        <h4>Рекомендуемая ручка</h4>
        <div class="block_3_card_slider">
          <div class="block_3_card_slider_inner">
            <div class="block_3_card_slider_inner_in">
              <div class="block_3_card_slider_inner_in_img">
                <a href=""></a>
                <img src="https://dveri-provance.ru/upload/iblock/0a3/zwde270281u9demop1emwhyh1wqe2sm7.jpg" alt="Дверная ручка золото">
              </div>
              <div class="block_3_card_slider_inner_in_txt">
                <p>Дверная ручка золото (составная) </p>
                <span>от 3 500 ₽ </span>
              </div>
            </div>
          </div>
          <div class="block_3_card_slider_inner">
            <div class="block_3_card_slider_inner_in">
              <div class="block_3_card_slider_inner_in_img">
                <a href=""></a>
                <img src="https://dveri-provance.ru/upload/iblock/139/2502jxr3zw8ppp9l0h7lo8mil7b9g07b.jpg" alt="Дверная ручка Модерн">
              </div>
              <div class="block_3_card_slider_inner_in_txt">
                <p>Дверная ручка Модерн </p>
                <span>от 4 200 ₽ </span>
              </div>
            </div>
          </div>
          <div class="block_3_card_slider_inner">
            <div class="block_3_card_slider_inner_in">
              <div class="block_3_card_slider_inner_in_img">
                <a href=""></a>
                <img src="https://dveri-provance.ru/upload/iblock/47f/ct4qmgyy11dnu4s4ig0imbrn5hd1jc8y.jpg" alt="Ручка золото">
              </div>
              <div class="block_3_card_slider_inner_in_txt">
                <p>Дверная ручка золото </p>
                <span>от 4 500 ₽ </span>
              </div>
            </div>
          </div>
          <div class="block_3_card_slider_inner">
            <div class="block_3_card_slider_inner_in">
              <div class="block_3_card_slider_inner_in_img">
                <a href=""></a>
                <img src="https://dveri-provance.ru/upload/iblock/358/tf83pq0htr8kvf5qk37m2wtf6qlzu1cx.jpg" alt="Ручка матовая сталь">
              </div>
              <div class="block_3_card_slider_inner_in_txt">
                <p>Дверная ручка матовая сталь </p>
                <span>от 5 000 ₽ </span>
              </div>
            </div>
          </div>
          <div class="block_3_card_slider_inner">
            <div class="block_3_card_slider_inner_in">
              <div class="block_3_card_slider_inner_in_img">
                <a href=""></a>
                <img src="https://dveri-provance.ru/upload/iblock/802/6yatiylz93u1vq8ibden7fbb0hpt3wij.jpg" alt="Ручка бронза ">
              </div>
              <div class="block_3_card_slider_inner_in_txt">
                <p>Дверная ручка Бронза </p>
                <span>от 3 500 ₽ </span>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>    
    
  <div class="block_2">
    <div class="container">
      <div class="block_2_in">
         
<p class="p1">• При помощи панелей легко скрыть двери в интерьере, разместив их среди стеновых панелей благодаря чему двери в интерьере смотрятся легче.</p>
<p class="p1">• Установка в единую плоскость - рисунок шпона перетекает с панелей на полотно, сглаживая пространство в единую плоскость.</p> 
<p class="p1">• Быстрый, нетрудоемкий, чистый монтаж. Готовые шпонированные панели для стен крепятся на предварительно выровненную стену с помощью жидких гвоздей!</p>
<p class="p1">• Полностью готовые к монтажу стеновые панели с глянцем можно с легкостью установить на стены с чистовой или черновой обработкой. Использование глянцевых стеновых панелей помогает зрительно увеличить пространство, придать ему особый шик и роскошь.</p>
<p class="p1">• Шпон дает иллюзию дорогой деревянной облицовки, при этом обходится гораздо дешевле массива и не требует сложного тщательного ухода<span class="s1">.</span></p>
<p class="p1">• Покрытые шпоном из разных пород дерева<span class="s1">.</span></p>
<p class="p1">• В ассортименте представлены разнообразные цвета, оттенки, фактуры.</p>          


 
          
          
        
      </div>
    </div>
  </div> 
    
  
   <div class="block_6">
    <div class="container">
      <div class="block_6_in">
        <h2 class="heading">Готовые проекты</h2>
        <div class="block_6_slider">
         

            
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/img3.png" alt="">
            </div>
          </div>
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/img4.jpg" alt="">
            </div>
          </div>
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/img5.jpeg" alt="">
            </div>
          </div>
            
          <div class="block_6_slider_inner" >
            <div class="block_6_slider_inner_in">
              <img src="img/port/shpon1.jpg" alt="Панель шпон" style="margin-left:137px;">
            </div>
          </div>            

        </div>
      </div>
    </div>
  </div>
<?$APPLICATION->IncludeComponent(
    "devbx:form",
    "footer-calc",
    Array(
        "ACTION_VARIABLE" => "form-action",
        "AJAX_LOAD_FORM" => "Y",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "DEFAULT_FIELDS" => array("UF_FORM_TYPE", ""),
        "FORM_ID" => "1",
        "READ_ONLY_FIELDS" => array("UF_FORM_TYPE", ""),
        "SUBMIT_BUTTON_NAME" => "Отправить",
        "DEFAULT_FIELD_VALUE_UF_FORM_TYPE" => "FOOTER_CALC_SHPON"
    )
);?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js" integrity="sha256-lenj6loHcdfu6tFQPUHN6S2O7G2gv7yX/P9OnRc8lno=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css" integrity="sha256-pH1rXnKT93pKrqWn3yDTgwsQrK/M4sVMFL774/pfaas=" crossorigin="anonymous" />
<script>
	$(document).ready(function() {  $('.tooltip').tooltipster(); });
</script>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>