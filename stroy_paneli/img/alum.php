<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

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
<div class="block_1 alum emal sten-inner">
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
                  <h4>Стеновые панели на алюминиевом профиле</h4>
                      <p>• Самый надежный тип конструкции<br>
•	Прочность и долговечность материалов и технологии<br>
•	Легко реализовать в любом дизайне интерьера! 			</p>                   
                </div>
               
              </div>
            </div>
            <div class="for_bg"></div>
            
          </div>
        </div>
        </div>
    </div>
  </div>
    
<div class="block_2_card  shpon_culc">
    <div class="container">
      <div class="block_2_card_in">
        <div class="kroshki">
          <a href="">Главная</a>
          <span>/</span>
          <a href="">Каталог</a>
          <span>/</span>
          <a href="">Стеновые панели</a>
          <span>/</span>
          <p>На алюминиевом профиле</p>
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
            <div class="materials_btn emal-culc-btn">
				<a><p class="bt_chose bt_chose_act" data-id="shpon">Натуральный шпон</p> </a>  
              <a style="text-decoration:none;" data-id="emal"><p class="bt_chose">Эмаль</p></a>
              
              
            </div>
            <div class="block_2_card_flex_txt_in1">
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
            </div>
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
              <h4>Размер <b>панели:</b> <span class="square">3.25 </span>м<sup>2</sup></h4>
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


<div class="block_2_card  emal_culc" style="display:none;">
    <div class="container">
      <div class="block_2_card_in">
        <div class="kroshki">
          <a href="">Главная</a>
          <span>/</span>
          <a href="">Каталог</a>
          <span>/</span>
          <a href="">Стеновые панели</a>
          <span>/</span>
          <p>На алюминиевом профиле</p>
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
            <div class="materials_btn emal-culc-btn">

                <a style="text-decoration:none;" data-id="shpon"><p class="bt_chose ">Натуральный шпон</p></a>
              	<a><p class="bt_chose curr bt_chose_act" data-id="emal">Эмаль</p>  </a>
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
              <h4>Размер <b>панели:</b> <span class="square">3.25 </span>м<sup>2</sup></h4>
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

  <div class="block_2">
    <div class="container">
<h2 class="heading">Декоративные панели в эмали на алюминиевом профиле </h2>   
      <div class="block_2_in img_text_block">
         
              


		  <img src="img/alum1.jpg?v=234" />
<p class="text">&bull; Панели разных размеров, фактур и форм: гладкие или с рельефной фрезеровкой, матовые и глянцевые. <br />&bull; Полностью готовые к монтажу стеновые панели с глянцем можно с легкостью установить на стены с чистовой или черновой обработкой. <br />&bull; МДФ стабилен и в отличие от массива дерева, не рассыхается и сохраняет свой первозданный вид. <br />&bull; Внешняя составляющая панельной облицовки разнообразна: фрезерока, багет, гладкие всех цветов по каталогам RAL, CS и NCS. <br />&bull; Панели просты в обработке: их легко резать, сверлить и монтировать различными способами. <br />&bull; Этот вид облицовки обойдется дешевле, чем обшивка стены цельным массивом, но не уступит дереву по эстетике и долговечности. Если купить стеновые панели МДФ и выполнить облицовку, много лет не придется думать о новом ремонте. Поверхность плит устойчива к царапинам, трению, загрязнениям. По текстуре и внешнему виду материал схож с натуральной древесиной, но превосходит деревянную обшивку по вариантам дизайна и стоимости. <br />&bull; Панельное покрытие МДФ эффектно выглядит в квартирах и загородных домах, украшает гостиные, гардеробные, холлы, утепленные лоджии. </p>        
          

 
          
          
        
      </div>
        
        <p style="margin-top:20px;">Светлая облицовка из плит зрительно расширяет пространство, темные тона дают иллюзию глубины, контрастные цвета используются в зонировании помещений. Панельный декор выполняется во всем помещении или фрагментарно: на стене у изголовья кровати, в нише, в рабочей зоне у письменного стола. Благородная отделка из МДФ подходит для интерьеров, выдержанных в разном стиле &ndash; от классики до техно и лофта. <br />&bull; МДФ-плиты экологичны: на изготовление древесноволокнистых листов идет мелкодисперсная фракция, склеивание частиц происходит за счет безвредных карбамидных смол. <br />&bull; Придайте помещению новый аккуратный вид благодаря стеновым панелям из МДФ, при этом не нужно выравнивать стены и ждать, пока высохнут слои штукатурки или краски. <br />&bull; Применение современных лакокрасочных составов RAL поверх выравнивающего слоя грунтовки позволяет делать из сероватых листов МДФ сверкающие зеркально-глянцевые или благородные матовые стеновые панели. <br />Выберите стеновые панели из МДФ с покраской по RAL &ndash; и интерьер заиграет новыми цветами, добавит изюминку в Ваш дизайн! <br />&bull; Использование глянцевых стеновых панелей помогает зрительно увеличить пространство, придать ему особый шик и роскошь.</p>
    </div>
  </div> 

  <div class="block_2">
    <div class="container">
<h2 class="heading">Декоративные панели в шпоне на алюминиевом профиле</h2>   
      <div class="block_2_in img_text_block" >
         
              



		  <p class="text" style="line-height:30px;">&bull; Элегантный &laquo;дорогой&raquo; внешний вид <br />&bull; Не требуют тщательной подготовки стен можно выровнять и декорировать стену без лишних усилий <br />&bull; Рисунок шпона на панелях возможно подобрать в зависимости от дизайна помещения <br />&bull; При помощи стеновых панелей можно создавать акценты или зонировать помещение <br />&bull; Долговечный материал &ndash; установив один раз шпонированные панели и Вы надолго забудете о ремонте и обновлении помещения <br />&bull; Повышенная шумоизоляция &ndash; панели дополнительно защищают от шума и сохраняют тепло <br />&bull; Тренд &ndash; стеновые панели в TV-зоне или у изголовья кровати. <br />&bull; Изготавливаем шпонированные панели по индивидуальным проектам. Остается только выбрать понравившуюся визуализацию, а наши специалисты изготовят и предоставят макеты в масштабе.</p>
    <img class="w35" src="img/alum2.jpg" />

 
          
          
        
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
              <img src="img/port/1.jpeg" alt="">
            </div>
          </div>
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="iimg/port/2.jpeg" alt="">
            </div>
          </div>
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/port/3.jpeg" alt="">
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
