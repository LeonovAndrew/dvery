<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?><div class="page">
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
					 Основа двери — брус хвойных пород и подслой из МДФ высокого качества. Это важно для последующей обработки и шлифовки поверхности для достижения гладкого покрытия на финишном этапе. Чтобы добиться правильной геометрии каркаса, мы используем специальный многослойный брус (LVL), который разработан в США для деревянного домостроения. Поэтому дверь способна сохранять ровные прямоугольные формы длительное время, в отличие от изделий из массива дерева, у которых могут быть отклонения и трещины. Из материалов, сделанных по подобной технологии строят стены домов. Для которых даже малейший перекос в результате иссыхания, или разбухания может привести к разрушению всей конструкции. Именно поэтому, наши двери служат многие годы и сохраняют форму на протяжении всего срока их службы.
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
					 По всей Росси можно найти официального представителя и заказать двери без лишних хлопот и уверенностью в качестве поставляемой продукции
				</div>
			</div>
		</div>
	</div>
</div>
<div class="adventages ad-about">
	<div class="adventages__head">
		<div class="cont">
			<div class="adventages__cont">
				 Преимущества работы с нами
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

<? echo '<div class="banner-2" style="background-image: url('.SITE_TEMPLATE_PATH.'/img/banner2.png);">';?>

</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"certificates",
	Array(
		"AJAX_MODE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "certificates",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "20",
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