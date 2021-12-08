<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Iblock, Sotbit\Seometa\SeometaUrlTable;
CModule::IncludeModule('iblock');
$iblock_ids = array(2,3, 7, 27, 21, 23, 26, 5, 22); //Добавляем id инфоблоков
$exception_section_id = array(); //исключаем разделы инфоблока, берём только элементы
// $iblock_id_other = array('news'=>1, 'articles'=>17);
$sectionArr = [];
$productArr = [];
foreach ($iblock_ids as $key => $iblock_id) {
	$sectionArr[] = getSectionList($iblock_id,$exception_section_id);
	$productArr[] = getProductList($iblock_id);
}

$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https' ;
$mainlink = $protocol.'://'.$_SERVER['SERVER_NAME'];

//------------------------------------------------------------------------------------------------------------
//--------- ВЫБЕРИТЕ РЕЖИМ ОТОБРАЖЕНИЯ SITEMAP 	
$mod = 1;		// 1 - в одном сайтмапе,  0 - разделить на категории
//------------------------------------------------------------------------------------------------------------
$urls_catalog = array( // список статичных страниц, или страниц которые по какой то причине не попали в сайтмап
	$mainlink.'',
);

//------------------------------------------------------------------------------------------------------------

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';

if($mod == 0) {
	if (empty($_GET)) {
		echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		echo 	'<sitemap><loc>'.$mainlink.'/sitemap.xml?type=pages</loc></sitemap>';
		echo 	'<sitemap><loc>'.$mainlink.'/sitemap.xml?type=categories</loc></sitemap>';
		echo 	'<sitemap><loc>'.$mainlink.'/sitemap.xml?type=products</loc></sitemap>';
		echo '</sitemapindex>';
	} else {
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		if ($_GET['type'] == 'pages') {
			echo getStaticPageList($mainlink);
		} elseif ($_GET['type'] == 'categories') {
			echo getXMLtags($sectionArr, $mainlink);
		} elseif($_GET['type'] == 'products') {
			echo getXMLtags($productArr, $mainlink);
		} elseif($_GET['type'] == 'news'){
			echo getOtherList($mainlink, $iblock_id_other['news']);
		} elseif($_GET['type'] == 'articles'){
			echo getOtherList($mainlink, $iblock_id_other['articles']);
		} elseif($_GET['type'] == 'seometa') {
			echo getSeometaList($mainlink);
		}
		echo '</urlset>';
	}
} elseif($mod == 1) {
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	echo getStaticPageList($mainlink);
	echo getXMLtags($sectionArr, $mainlink);
	echo getXMLtags($productArr, $mainlink);
	echo '</urlset>';

}
// -------------------------------------------------------------------------------------------------------------
// ---------- FUNCTIONS ----------------------------------------------------------------------------------------

function getStaticPageList($link) {
	global $urls_catalog, $urls_main_section, $urls_uslugi;

	$pages_list =	'<url>';
	$pages_list.= 		'<loc>'.$link.'/</loc>';
	$pages_list.= 		'<priority>1</priority>';
	$pages_list.= 		'<lastmod>'.getDateFormat($date_).'</lastmod>';
	$pages_list.= 	'</url>';

	foreach ($urls_catalog as $value) {
		$pages_list.=	'<url>';
		$pages_list.= 		'<loc>'.$value.'</loc>';
		$pages_list.= 		'<priority>0.9</priority>';
		$pages_list.= 		'<lastmod>'.getDateFormat($date_).'</lastmod>';
		$pages_list.= 	'</url>';
	}

	return $pages_list;
}

function getSectionList($iblock_id_,$exception_section_id) {
	if(in_array($iblock_id_, $exception_section_id)){
		return false;
	}
	$arSelect = Array();
	$arFilter = Array('IBLOCK_ID'=>$iblock_id_, 'ACTIVE'=>'Y', 'DEPTH_LEVEL'=>'1', 'GLOBAL_ACTIVE'=>'Y');
	$res = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
	while($ob = $res->GetNext()) {
		$priority = 0.7;
		$changefreq = 'monthly';	//always, hourly, daily, weekly, monthly, yearly, never
		$output[] = array(
			'page_url' => $ob['SECTION_PAGE_URL'],
			'priority' => $priority,
			'changefreq' => $changefreq
		);
	}
	return $output;
}

function getProductList($iblock_id_) {
	$arSelect = Array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL", "TIMESTAMP_X");
	$arFilter = Array("IBLOCK_ID"=>$iblock_id_, "ACTIVE"=>"Y", "INCLUDE_SUBSECTIONS"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()){
		$lastmod = $ob->GetFields()['TIMESTAMP_X'];
		$priority = 0.5;
		$changefreq = 'weekly';	//always, hourly, daily, weekly, monthly, yearly, never
		$output[] = array(
			'page_url' => $ob->GetFields()['DETAIL_PAGE_URL'],
			'priority' => $priority,
			'changefreq' => $changefreq
		);
	}
	return $output;
}

function getXMLtags($array_, $link_) {
	foreach ($array_ as $iblock) {
		foreach ($iblock as $item) {
			$output .=	'<url>';
			$output .=		'<loc>'.$link_.$item['page_url'].'</loc>';
			$output .=		'<priority>'.$item['priority'].'</priority>';
			$output .=      '<lastmod>'.getDateFormat($date_).'</lastmod>';
			$output .=	'</url>';
		}
	}
	return $output;
}

function getOtherList($link, $iblock_id_) {
	$arSelect = Array("DETAIL_PAGE_URL", "TIMESTAMP_X");
	$arFilter = Array("IBLOCK_ID" => $iblock_id_, "ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
	while($ob = $res->GetNextElement()){
		$priority = 0.5;
		$changefreq = 'weekly';	//always, hourly, daily, weekly, monthly, yearly, never
		$output .=	'<url>';
		$output .=		'<loc>'.$link.$ob->GetFields()['DETAIL_PAGE_URL'].'</loc>';
		$output .=		'<priority>'.$priority.'</priority>';
		$output .=      '<lastmod>'.getDateFormat($date_).'</lastmod>';
		$output .=	'</url>';
	}
	return $output;
}

function getSeometaList($link) {
	$res=SeometaUrlTable::GetList(Array('select' => array('NEW_URL')));
	while($ob = $res->Fetch()){
		$output .= '<url><loc>'.$link.$ob['NEW_URL'].'</loc></url>';
	}
	return $output;
}

function getDateFormat($date_) {
	$date_=strtotime($date_);				// конвертация строки в дату (в секундах)
	$date_ = FormatDate("c", $date_);	// перевод даты в формат yyyy-mm-ddTH:M:S+04:00
	return $date_;
}

?>