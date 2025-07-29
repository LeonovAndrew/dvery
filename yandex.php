<?php
header("Content-type: text/xml; charset=utf-8");
$root = $_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__).'/';
define('LANG', 's1');
define('SITE_ID', 's1');
define("NO_KEEP_STATISTIC", true);

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('main');

@set_time_limit(30000);
ini_set('max_execution_time', 30000);
ob_start();
echo '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE yml_catalog SYSTEM "shops.dtd">';
echo '
<yml_catalog date="'.date('Y-m-d H:i').'"><shop><name>Фабрика дверей Прованс</name><company>Фабрика дверей Прованс</company><url>https://dveri-provance.ru/</url><platform>BSM/Yandex/Market</platform><version>2.5.0</version><currencies><currency id="RUR" rate="1"/></currencies>
<categories>';


$db_list = CIBlockSection::GetList( [], ['IBLOCK_ID'=>2], true);
while($ar_result = $db_list->GetNext())
  {
	$parent = ($ar_result['IBLOCK_SECTION_ID'])?' parentId="'.$ar_result['IBLOCK_SECTION_ID'].'"' : '';
    echo '<category id="' .$ar_result['ID'].'"'. $parent. '>' .$ar_result['NAME']. '</category>';
  }
?>
</categories>
<offers>
<?php

$res = CIBlockElement::GetList( [], ["IBLOCK_ID"=>3, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y"], false, [], ['ID', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'PREVIEW_TEXT', 'catalog_PRICE_1', 'catalog_PRICE_4', 'CATALOG_STORE_AMOUNT_1'] );
$excludeProps = ['OZON_STOCK', 'PROD_PRICE_FALSE', 'MORE_PHOTO', 'vote_count', 'vote_sum', 'rating', 'BLOG_POST_ID'];
while($ob = $res->GetNextElement()){ 
	$r = $ob->GetFields();
	$old = 0;
	$pr = ( $r['CATALOG_PRICE_3']>0 ) ? $r['CATALOG_PRICE_3'] : $r['CATALOG_PRICE_1'];
	if( $r['CATALOG_PRICE_3'] > 0 && $r['CATALOG_PRICE_3'] < $r['CATALOG_PRICE_1'] ) { $pr = $r['CATALOG_PRICE_3']; $old = $r['CATALOG_PRICE_1']; }

	echo '	<offer id="'.$r['ID'].'" type="vendor.model"><currencyId>RUR</currencyId><categoryId>'.$r['IBLOCK_SECTION_ID'].'</categoryId>
		<price>'.$pr.'</price>'."\n";
	if($old) echo '<oldprice>'.$old.'</oldprice>'."\n";
	echo '		<picture>http://s-centreonline.ru', CFile::GetPath($r["PREVIEW_PICTURE"]), '</picture>'."\n";
	echo '		<url>http://s-centreonline.ru', $r['DETAIL_PAGE_URL'], '</url>'."\n";
	echo '		<delivery>true</delivery><pickup>true</pickup>'."\n";
	echo '		<description>', trim( str_replace( ['&nbsp;'], ' ', strip_tags($r['PREVIEW_TEXT']) ) ), '</description>'."\n";
	#echo '<outlets><outlet instock="'.$r['CATALOG_QUANTITY'].'" warehouse_name="'.$wh.'"></outlet></outlets>';
	$db_props = CIBlockElement::GetProperty(45, $r['ID']);
	while($p = $db_props->Fetch()) {
		if( in_array($p['CODE'], $excludeProps) ) continue;
		if( 'PROIZVODITEL'==$p['CODE'] ) echo '		<vendor>' .$p['VALUE']. '</vendor>'."\n";
		elseif( 'CML2_BARCODE'==$p['CODE'] ) { if($p['VALUE']) echo '		<barcode>' .$p['VALUE']. '</barcode>'."\n"; }
		elseif( 'vendorCode'==$p['CODE'] )	 { if($p['VALUE']) echo '		<vendorCode>' .$p['VALUE']. '</vendorCode>'."\n"; }
		elseif( 'sales_notes'==$p['CODE'] )  { if($p['VALUE']) echo '		<sales_notes>' .$p['VALUE']. '</sales_notes>'."\n"; }
		elseif (!empty($p['VALUE'])) echo '		<param name="' .$p['NAME']. '">' .$p['VALUE']. '</param>'."\n";
		#elseif (!empty($p['VALUE'])) echo '		<param name="' .$p['NAME']. '" code="' .$p['CODE']. '">' .$p['VALUE']. '</param>'."\n";
	}
	
	echo '	</offer>'."\n";
    #if(6632==$r['ID']) {print_r($r); exit;}
} ?>

</offers>
</shop>
</yml_catalog>
<?php
#file_put_contents($root . 'ozon.yml', ob_get_contents());
exit;