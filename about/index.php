<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Фабрика завод межкомнатные двери Provance производство Прованс");
$APPLICATION->SetPageProperty("description", "Фабрика дверей Provance предлагает широкий выбор межкомнатных дверей и перегородок. Собственное производство. Гарантия качества. Более 50 салонов по всей России.");
$APPLICATION->SetPageProperty("title", "Фабрика дверей Provance (Прованс)");
$APPLICATION->SetTitle("Фабрика межкомнатных дверей Provance");
?><style>
    
        #team{
            text-align: center;
    margin: 80px auto;
    max-width:1200px;
    
        }
        #team .elem{
            display: inline-block;
            vertical-align: top;
            max-width: 215px;
            text-align: center;
            margin: 0 10px;
        }
        
        #team .elem img{
            display: block;
            width: 100%;
            filter: grayscale(100%);
        }
        
        #team .elem:hover img{
            filter: none;
        }
        
        #team .elem .name{
            margin:10px 0;
            font-size: 15px;
            text-align: center;
        }
        
        #team .elem .text{
            margin: 0;
            color: #999999;
            font-size: 13px;
        }
        
        #team .title{
            width: 100%;
            font-style: normal;
            font-weight: 500;
            font-size: 32px;
            line-height: 150%;
            color: #000000;
            text-align: left;
            margin-bottom: 30px;
        }
    </style>
<div class="page">
	<div class="page__head">
		<div class="cont">
			<div class="page__head-cont">
				<h1 class="page__title">
				<?=$APPLICATION->GetTitle();?> </h1>
				 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	".default",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>
			</div>
		</div>
	</div>
</div>
<div class="about-text">
	<div class="cont">
		<div class="about-text__cont">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/about1.php"
	)
);?>
		</div>
	</div>
	 <style>
        
        #egg,#add{
            margin: 80px auto;
            max-width:1200px;        
        }
        
        #egg .wrap,#add .wrap{
           display: flex;
           justify-content: space-between;   
        }
        #egg .elem{
            display: flex;
            max-width: 500px;
            align-items: center;
            justify-content: start;
            margin: 0 20px 20px;
        }
        
        #egg .elem img {
            width: 100px;
            border-radius: 24px;
            margin-right: 25px;
        }
     
        #egg .elem .text{
            margin: 0;
            font-size: 21px;
        }
        
        #egg .title,#add .title{
            width: 100%;
            font-style: normal;
            font-weight: 500;
            font-size: 32px;
            line-height: 150%;
            color: #000000;
            text-align: left;
            margin-bottom: 30px;
        }    
         
        
        #add .elem {
            max-width: 18%;
            background: #eee;
            text-align: center;
        }
        
        #add .elem img{
            width: 100%;
        }
        
        #add .elem .text{
            padding: 20px 10px;
            font-size: 15px; 
        }
        
        @media (max-width:600px){
            #egg .wrap,#add .wrap{
                display: block;
            }
            
            p.title {
                font-size: 22px !important;
                text-align: center;
                padding: 0 11px;
            }  
            
            #add .elem {
                vertical-align: top;
                max-width: 49%;
                background: #eee;
                text-align: center;
                display: inline-block;
                height: 428px;
                margin-bottom: 20px;
            }        
        }
         
    </style>
	<div id="egg">
		<p class="title">
			 Наши преимущества
		</p>
		<div class="wrap">
			<div class="col">
				<div class="elem">
 <img alt=" 24 года на рынке" src="/upload/medialibrary/52e/jc8ptba3w4cuapase0s0nqu9yldkehws.png" title=" 24 года на рынке">
					<p class="text">
						 24 лет на рынке
					</p>
				</div>
				 <!-- elem -->
				<div class="elem">
 <img src="/upload/icons/2.png">
					<p class="text">
						 Собственное производство
					</p>
				</div>
				 <!-- elem -->
				<div class="elem">
 <img src="/upload/icons/3.png">
					<p class="text">
						 Лидер в области по нестандартным и индивидуальным решениям
					</p>
				</div>
				 <!-- elem -->
			</div>
			<div class="col">
				<div class="elem">
 <img src="/upload/icons/4.png">
					<p class="text">
						 Более 50 салонов по всей России
					</p>
				</div>
				 <!-- elem -->
				<div class="elem">
 <img src="/upload/icons/5.png">
					<p class="text">
						 Богатый ассортимент
					</p>
				</div>
				 <!-- elem -->
				<div class="elem">
 <img src="/upload/icons/6.png">
					<p class="text">
						 Выдержанные сроки
					</p>
				</div>
				 <!-- elem -->
			</div>
		</div>
		 <!-- wrap -->
	</div>
	 <!--egg -->
	<div id="add">
		<p class="title">
			 Мы делаем не только двери — мы работаем комплексно!
		</p>
		<div class="wrap">
			<div class="elem">
 <img src="/upload/add/1.jpg">
				<p class="text">
 <span style="font-weight: bold;">Стеновые панели</span> всех стилей
				</p>
			</div>
			 <!-- elem -->
			<div class="elem">
 <img src="/upload/add/2.jpg">
				<p class="text">
 <span style="font-weight: bold;">Накладки на входные двери </span> не отличить от дверей
				</p>
			</div>
			 <!-- elem -->
			<div class="elem">
 <img src="/upload/add/3.jpg">
				<p class="text">
 <span style="font-weight: bold;">Плинтусы</span> (15 профилей) абсолютно гармоничны и оптимизированы
				</p>
			</div>
			 <!-- elem -->
			<div class="elem">
 <img src="/upload/add/4.jpg">
				<p class="text">
 <span style="font-weight: bold;">Ограничители дверей</span>
				</p>
			</div>
			 <!-- elem -->
			<div class="elem">
 <img src="/upload/add/5.jpg">
				<p class="text">
 <span style="font-weight: bold;">Мебельные фасады</span>
				</p>
			</div>
			 <!-- elem -->
		</div>
		 <!--wrap -->
	</div>
	 <!-- add -->
	<div id="team">
		<p class="title">
			 Наша команда
		</p>
		<div class="elem">
 <img src="/upload/team/10.jpg">
			<p class="name">
				 Александр Радыгин
			</p>
			<p class="text">
				 начальник производства
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/2.jpg">
			<p class="name">
				 Сергей Рокин
			</p>
			<p class="text">
				 мастер столярного участка производства дверных полотен
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/3.jpg">
			<p class="name">
				 Илья Кропотов
			</p>
			<p class="text">
				 мастер столярного и подготовительно участка производства погонажных изделий
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/4.jpg">
			<p class="name">
				 Светлана Корчемкина
			</p>
			<p class="text">
				 мастер участка технического контроля и участка отделки погонажных изделий
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/5.jpg">
			<p class="name">
				 Александр Лепёшкин
			</p>
			<p class="text">
				 главный технолог
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/6.jpg">
			<p class="name">
				 Александр Цуркан
			</p>
			<p class="text">
				 Специалист по обучению персонала и партнёров
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/7.jpg">
			<p class="name">
				 Лев Ковалевский
			</p>
			<p class="text">
				 мастер производства шпонированных дверей
			</p>
		</div>
		 <!-- elem -->
		<div class="elem">
 <img src="/upload/team/8.jpg">
			<p class="name">
				 Ярослав Егошин
			</p>
			<p class="text">
				 мастер участка технического контроля полотен
			</p>
		</div>
	</div>
	 <!-- team -->
</div>
<div class="video">
	<div class="cont">
		<div class="video__cont">
			 <!-- <div class="video__bg" style="background-image: url(../img/video.png);">
                        <a href="#" class="video__link">
                            
                            <svg width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 13.5L0.250001 26.0574L0.250002 0.942631L22 13.5Z" fill="white"/>
                            </svg>
        
                        </a>
                    </div> --> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/about_video.php"
	)
);?>
		</div>
	</div>
</div>
<div class="about-fact">
	<div class="cont">
		<div class="about-fact__cont">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/about2.php"
	)
);?>
		</div>
	</div>
</div>
<div class="info-list">
	<div class="cont">
		<div class="info-list__cont">
			<div class="info-list__item">
				<div class="info-list__name">
					 Сборка и фрезеровка
				</div>
				<div class="info-list__text">
					 Основа двери — брус хвойных пород и подслой из МДФ высокого качества. Это важно для последующей обработки и шлифовки поверхности для достижения гладкого покрытия на финишном этапе. Чтобы добиться правильной геометрии каркаса, мы используем специальный многослойный брус (LVL), который разработан в США для деревянного домостроения. Поэтому дверь способна сохранять ровные прямоугольные формы длительное время, в отличие от изделий из массива дерева, у которых могут быть отклонения и трещины. Из материалов, сделанных по подобной технологии строят стены домов. Для которых даже малейший перекос в результате иссыхания, или разбухания может привести к разрушению всей конструкции. Именно поэтому, наши двери служат многие годы и сохраняют форму на протяжении всего срока их службы.
				</div>
			</div>
			<div class="info-list__item">
				<div class="info-list__name">
					 Цех финишной отделки
				</div>
				<div class="info-list__text">
					 После сборки и фрезеровки каждое полотно проходит контроль по качеству и правильности исполнения технического задания. Используя высокотехнологичные немецкие станки, мы начинаем шлифовку и последующую подготовку. На финишном этапе японский станок-робот покрывает изделие первоклассной итальянской эмалью Renner. Мы действительно стараемся использовать лучшие материалы и делать это без брака. Каждая дверь и деталь обрамления проходит 4-5 этапов покрытия. В итоге мы получаем изделие, покрытое эмалью с 4 сторон. Оно не боится влаги и служит долго.
				</div>
			</div>
			<div class="info-list__item">
				<div class="info-list__name">
					 Большая сеть салонов и представителей
				</div>
				<div class="info-list__text">
					 По всей России можно найти официального представителя и заказать двери без лишних хлопот и уверенностью в качестве поставляемой продукции
				</div>
			</div>
		</div>
	</div>
</div>
<div class="adventages ad-about">
	<div class="adventages__head">
		<div class="cont">
			<div class="adventages__cont">
				 Почему выбирают нас?
			</div>
		</div>
	</div>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"advantages",
	Array(
		"AJAX_MODE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "advantages",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "10",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC"
	)
);?>
</div>
 <? echo '<div class="banner-2" style="background-image: url('.SITE_TEMPLATE_PATH.'/img/banner2.png);">';?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"certificates",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "certificates",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
<div class="footer-text">
	<div class="cont">
		<div class="footer-text__cont">
			<div class="footer-text-1">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/about3.php"
	)
);?>
			</div>
			<div class="footer-text-2">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/about4.php"
	)
);?>
			</div>
 <a href="#" class="catalog-info__link">
			Читать подробнее </a>
		</div>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>