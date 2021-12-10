<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Iblock, Sotbit\Seometa\SeometaUrlTable;
CModule::IncludeModule('iblock');

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
		$output .=	'</url>';
		?><pre><?print_r($ob->GetFields())?></pre><?
        // var_dump();
	}
	return $output;
}

function getSectionList($iblock_id_,$exception_section_id) {
	if(in_array($iblock_id_, $exception_section_id)){
		return false;
	}
	$arSelect = Array();
	$arFilter = Array('IBLOCK_ID'=>$iblock_id_, 'ACTIVE'=>'Y', 'DEPTH_LEVEL'=>'1', 'GLOBAL_ACTIVE'=>'Y');
	$res = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
	while($ob = $res->GetNext()) {
		?><pre><?print_r($ob)?></pre><?
	}
	return $output;
}

// getSectionList(2, array());
getOtherList($link, 3);