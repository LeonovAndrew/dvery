<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <title>Главная</title>
  <link rel="stylesheet" href="fonts/font.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/slick-theme.css">
  <link rel="stylesheet" href="css/fancybox.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css?v=<?=time()?>">
  <link rel="stylesheet" href="css/media.css?v=<?=time()?>">
  <link rel="shortcut icon" href="img/logo.png">
    
  <style>
      .block_1_bot_slider_inner_in:after {
        background-image: url(img/block_3_flex_in1.jpg);
          
      }
      
      h2.heading{
        text-align: left;
        margin-bottom: 20px;
        margin-top: 20px;      
      }
      
      .block_1_bot_slider_inner_in:after,.for_bg,.block_1{ height: 600px;}
      
      @media (max-width:600px){
          .block_1_bot_slider_inner_in:after,.for_bg,.block_1{ height: 430px;}
      }
    </style>
</head>

<body>
  <div class="block_1">
    <div class="container">
      <div class="block_1_in">
        <div class="block_1_top">
          <div class="block_1_top_flex">
            <div class="block_1_top_flex_left">
              <div class="block_1_top_flex_left_search">
                <span class="sch_ic"></span>
                <div class="block_1_top_flex_left_search_form_main">
                  <form action="" class="block_1_top_flex_left_search_form">
                    <input type="text" placeholder="Что вы ищете?">
                    <button><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                  </form>
                </div>
              </div>
              <div class="social">
                <a href=""><i class="fa fa-vk" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="block_1_top_flex_right">
              <a href="" class="call_back">Заказать звонок</a>
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
                  <h4>Стеновые панели в эмали</h4>
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
            $emal_arr = array();
        
            $directory = "./img/emal/icon";    // Папка с изображениями
            $allowed_types=array("jpg", "png", "gif");  //разрешеные типы изображений
            $file_parts = array();
              $ext="";
              $title="";
              $i=0;
            //пробуем открыть папку
              $dir_handle = @opendir($directory) or die("Ошибка при открытии папки !!!");
                while ($file = readdir($dir_handle)){
                  if($file=="." || $file == "..") continue;  //пропустить ссылки на другие папки
                  $file_parts = explode(".",$file);          //разделить имя файла и поместить его в массив
                  $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение


                  if(in_array($ext,$allowed_types)){
                    $emal_arr[]  = $file;
                    $i++;
                  }

                }
            closedir($dir_handle);  //закрыть папку
        
        
        ?>
        <div class="block_2_card_flex">
          <div class="block_2_card_flex_img">
              
            <?php foreach($emal_arr as $key=>$img){ ?>
                <div class="block_2_card_flex_img_in" id="img_show<?=$key?>" <?php if($key==0){ ?>  style="display: block;" <?php } ?>>
                  <img src="https://dveri-provance.ru/stroy_paneli/img/emal/<?=$img?>" alt="">
                </div>    
            <?php } ?>

          
          </div>
          <div class="block_2_card_flex_txt">
            <div class="materials_btn">
              <p class="bt_chose bt_chose_act">Эмаль</p>    
                <a style="text-decoration:none;" href="shpon.php"><p class="bt_chose ">Натуральный шпон</p></a>
              
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
              <h4>12 видов в наличии:</h4>
              <div class="block_2_card_flex_txt_in2_in">
                  
                <?php foreach($emal_arr as $key=>$img){ ?>  
                <div class="type_chose  <?php if($key==0){ ?> type_chose_act <?php } ?>" data-id="<?=$key?>">
                  <img src="https://dveri-provance.ru/stroy_paneli/img/emal/icon/<?=$img?>" alt="" style="border:1px solid #eee;">
                </div>
                <?php } ?>
                
              </div>
            </div>
            <div class="block_2_card_flex_txt_in3">
              <h4>Размер <b>панели:</b> <span class="square">3.25 </span>м<sup>2</sup></h4>
              <div class="block_2_card_flex_txt_in3_in_flex">
                <div class="block_2_card_flex_txt_in3_in">
                  <p>Ширина</p>
                  <div class="inpt">
                    <input min="900" step="100" max="5000" id="width" class="culc_input" type="number" placeholder="1300">
                  </div>
                  <span>от 900 до 5000 мм</span>
                </div>
                <div class="block_2_card_flex_txt_in3_in">
                  <p>Высота</p>
                  <div class="inpt">
                    <input min="2400" step="100" max="3010" id="height" class="culc_input" type="number" placeholder="2500">
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
            <button class="btn_send">Заказать</button>
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
        <h2 class="heading">Подходящая гарнитура</h2>
        <h4>Рекомендуемая ручка</h4>
        <div class="block_3_card_slider">
          <div class="block_3_card_slider_inner">
            <div class="block_3_card_slider_inner_in">
              <div class="block_3_card_slider_inner_in_img">
                <a href=""></a>
                <img src="https://dveri-provance.ru/upload/iblock/0a3/zwde270281u9demop1emwhyh1wqe2sm7.jpg" alt="">
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
                <img src="https://dveri-provance.ru/upload/iblock/139/2502jxr3zw8ppp9l0h7lo8mil7b9g07b.jpg" alt="">
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
                <img src="https://dveri-provance.ru/upload/iblock/47f/ct4qmgyy11dnu4s4ig0imbrn5hd1jc8y.jpg" alt="">
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
                <img src="https://dveri-provance.ru/upload/iblock/358/tf83pq0htr8kvf5qk37m2wtf6qlzu1cx.jpg" alt="">
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
                <img src="https://dveri-provance.ru/upload/iblock/802/6yatiylz93u1vq8ibden7fbb0hpt3wij.jpg" alt="">
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
         
              
<h2 class="heading">На алюминиевом профиле </h2>            
 

<p><br />&bull; МДФ стабилен и&nbsp;в отличие от массива дерева, не рассыхается и сохраняет&nbsp;свой первозданный вид.<br /><br />&bull; Внешняя составляющая панельной облицовки разнообразна: фрезерока, багет, гладкие всех цветов по каталогам RAL, CS и NCS.<br /><br />&bull; Панели просты в обработке: их легко резать, сверлить и монтировать различными способами.<br /><br />Этот вид облицовки обойдется дешевле, чем обшивка стены цельным массивом, но не уступит дереву по эстетике и долговечности. Если купить стеновые панели МДФ и выполнить облицовку, много лет не придется думать о новом ремонте. Поверхность плит устойчива к царапинам, трению, загрязнениям. По текстуре и внешнему виду материал схож с натуральной древесиной, но превосходит деревянную обшивку по вариантам дизайна и стоимости.<br /><br />Панельное покрытие МДФ эффектно выглядит в квартирах и загородных домах, украшает гостиные, гардеробные, холлы, утепленные лоджии. Светлая облицовка из плит зрительно расширяет пространство, темные тона дают иллюзию глубины, контрастные цвета используются в зонировании помещений. Панельный декор выполняется во всем помещении или фрагментарно: на стене у изголовья кровати, в нише, в рабочей зоне у письменного стола. Благородная отделка из МДФ подходит для интерьеров, выдержанных в разном стиле &ndash; от классики до техно и лофта.&nbsp;<br /><br />Мы изготавливаем панели разных размеров, фактур и форм; гладкие или с рельефной фрезеровкой, матовые и глянцевые.<br /><br />МДФ-плиты экологичны: на изготовление древесноволокнистых листов идет мелкодисперсная фракция, склеивание частиц происходит за счет безвредных карбамидных смол.<br /><br />Придайте помещению новый аккуратный вид благодаря стеновым панелям из МДФ. При этом не нужно выравнивать стены и ждать, пока высохнут слои штукатурки или краски.<br /><br />Применение современных лакокрасочных составов RAL поверх выравнивающего слоя грунтовки позволяет делать из сероватых листов МДФ сверкающие зеркально-глянцевые или благородные матовые стеновые панели.<br /><br />Стеновые панели из МДФ с покраской по RAL &ndash; и интерьер заиграет новыми цветами, добавит изюминку Ваш дизайн!<br /><br />Полностью готовые к монтажу стеновые панели с глянцем можно с легкостью установить на стены с чистовой или черновой обработкой. <br /><br />Использование глянцевых стеновых панелей помогает зрительно увеличить пространство, придать ему особый шик и роскошь.</p>

    
 
          
          
        
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
              <img src="img/img1.jpg" alt="">
            </div>
          </div>
          <div class="block_6_slider_inner">
            <div class="block_6_slider_inner_in">
              <img src="img/img2.jpg" alt="">
            </div>
          </div>
          

        </div>
      </div>
    </div>
  </div>
  <div class="block_7">
    <div class="container">
      <div class="block_7_in">
        <div class="block_7_in_flex_txt">
          <h2 class="heading">Бесплатная консультация</h2>
          <p>Выберите лучший вариант под свой интерьер</p>
        </div>
        <div class="block_7_in_flex">
          <div class="block_7_in_flex_left">
            <div class="inpt">
              <input type="text" placeholder="Имя*">
            </div>
            <div class="inpt">
              <input type="email" placeholder="E-mail (не обязательно)">
            </div>
            <div class="inpt">
              <input type="tel" placeholder="Телефон*">
            </div>
            <div class="inpt inpt_file">
              <input type="file" id="inpt_file">
              <label for="inpt_file">Загрузить проект (если есть) <i class="fa fa-upload" aria-hidden="true"></i></label>
            </div>
          </div>
          <button class="btn_send">отправить</button>
        </div>
      </div>
    </div>
  </div>









  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="js/fancybox.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js?v=<?=time()?>"></script>


</body>

</html>