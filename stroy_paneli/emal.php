<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Стеновые панели в эмали: цены и варианты расцветок");
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
<div class="block_1 emal sten-inner">
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
                  <h1>Стеновые панели в эмали</h1>
                      <p>•	100% экологичный материал<br>
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
          <p>Эмаль</p>
        </div>
          
        <?php 
 

            $emal_arr = array(
                "белый.jpg"=>"Белый",
                "ral-9010.jpg"=>"RAL 9010",
                "ral-9001.jpg"=>" RAL 9001",
                 "ral-1013.jpg"=>"RAL 1013",                 
                "cs-006.jpg"=>"CS 006",
                "ral-7047.jpg"=>"RAL 7047",
                "cs-010.jpg"=>"CS 010",
                "аворио.jpg"=>"Аворио",
                "джеральдин.jpg"=>"Джеральдин",
                "каштан.jpg"=>"Каштан", 
                "ral-7036.jpg"=>" RAL 7036",
                 "ral-7040.jpg"=>"RAL 7040",                  
                "ral-7011.jpg"=>"RAL 7011",
                "антрацит.jpg"=>"Антрацит"
            );      
        
        
        ?>
        <div class="block_2_card_flex">
          <div class="block_2_card_flex_img">
              
             <?php $i=0; foreach($emal_arr as $key=>$img){ ?>
                <div class="block_2_card_flex_img_in" id="img_show<?=$i?>" <?php if($i==0){ ?>  style="display: block;" <?php } ?>>
                  <img src="https://dveri-provance.ru/stroy_paneli/img/emal/<?=$key?>" alt="">
                </div>    
            <?php $i++; } ?>

          
          </div>
          <div class="block_2_card_flex_txt">
            <div class="materials_btn">
              <p class="bt_chose bt_chose_act">Эмаль</p>    
                <a style="text-decoration:none;" href="shpon.php"><p class="bt_chose ">Натуральный шпон</p></a>
              
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
              <h4>12 видов в наличии:</h4>
              <div class="block_2_card_flex_txt_in2_in">
                  
                <?php $i=0; foreach($emal_arr as $key=>$img){ ?>  
                <div class="type_chose tooltip  <?php if($i==0){ ?> type_chose_act <?php } ?>" title="<?=$img?>" data-id="<?=$i?>">
                  <img src="https://dveri-provance.ru/stroy_paneli/img/emal/icon/<?=$key?>" alt="" style="border:1px solid #eee;">
                </div>
                <?php  $i++; } ?>
                
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
              <span class="inf_value">от 7 460 ₽/м<sup>2</sup></span>
              <input type="hidden" id="curr_price" value="7460" />
            </div>
            <div class="total_block_flex_left_in">
              <p>Общая площадь:</p>
                <span class="inf_value"> <span class="square">3.25</span> м<sup>2</sup></span>
            </div>
          </div>
          <div class="total_block_flex_right_flex">
            <div class="total_block_flex_right_flex_in1">
              <h3>от <span id="total_pirce">24 245</span> ₽ </h3>
              <p>Цены в регионах могут отличаться
                от цен, представленных на сайте</p>
            </div>
            <button
                    class="btn_send"
                    data-devbx-popup-form="order-form"
                    data-popup-params="<?=htmlspecialcharsbx(\Bitrix\Main\Web\Json::encode(array('FORM_TYPE'=>'ORDER_EMAL')))?>">
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
 
   
    
  
   <div class="block_6">
    <div class="container">
      <div class="block_6_in">
        <h2 class="heading">Готовые проекты</h2>
        <div class="block_6_slider">
 
            
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/port/emal_all.jpg" alt="Двери эмаль">
            </div>
          </div>
         
            
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/port/emal1.jpg" alt="Стеновые панели эмаль">
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
        "DEFAULT_FIELD_VALUE_UF_FORM_TYPE" => "FOOTER_CALC_EMAL"
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