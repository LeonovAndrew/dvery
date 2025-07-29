<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

require_once('const.php');
require_once('Mobile_Detect.php');  
$detect = new Mobile_Detect; 
$mob = 0;
if($detect->isMobile() && !$detect->isTablet()){ $mob = 1; }

if(preg_match('/^\/lp\/(.*)$/', $_SERVER['REQUEST_URI']))
{
    LocalRedirect("/", true, '301 Moved Permanently'); 
}

///Redirects catalog 29082023
$arr_redirects_ct = array(
    '/shop/' => '/mezhkomnatnye-dveri/',
    '/shop/dveri-zerkalo/' => '/mezhkomnatnye-dveri/s-zerkalom/',
    '/shop/emalirovannye-dveri/' => '/mezhkomnatnye-dveri/emalirovannye/',
    '/shop/dveri-v-shpone/' => '/mezhkomnatnye-dveri/shponirovannye/',
    '/shop/classic/' => '/mezhkomnatnye-dveri/classic/',
    '/shop/modern/' => '/mezhkomnatnye-dveri/modern/',
    '/shop/skrytye-dveri/' => '/mezhkomnatnye-dveri/skrytye/',
    '/shop/razdvizhnye-dveri/' => '/mezhkomnatnye-dveri/razdvijnye/',
    '/shop/belye-dveri/' => '/mezhkomnatnye-dveri/belye/'
);
if(array_key_exists($_SERVER['REQUEST_URI'], $arr_redirects_ct))
{
    LocalRedirect($arr_redirects_ct[$_SERVER['REQUEST_URI']], true, '301 Moved Permanently');
}
else 
{
    if(preg_match('/^\/shop\/(.*)$/', $_SERVER['REQUEST_URI']))
    {
        $red_url = str_replace('shop', 'mezhkomnatnye-dveri', $_SERVER['REQUEST_URI']);
        LocalRedirect($red_url, true, '301 Moved Permanently');
    }
}

//Автозагрузка классов
require dirname(__FILE__) . '/autoload.php';

//Обработка событий
require dirname(__FILE__) . '/event_handler.php';

require_once("logger.php");


function drawFormField($FIELD_SID, $arQuestion){
?>
<?$arQuestion["HTML_CODE"] = str_replace('name=', 'data-sid="'.$FIELD_SID.'" name=', $arQuestion["HTML_CODE"]);?>
<?$arQuestion["HTML_CODE"] = str_replace('left', '', $arQuestion["HTML_CODE"]);?>
<?$arQuestion["HTML_CODE"] = str_replace('size="0"', '', $arQuestion["HTML_CODE"]);?>
<?if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'):?>
	<?=$arQuestion["HTML_CODE"];?>
<?else:?>
		<?if(empty(!$arQuestion["CAPTION"]))
		{?>
		<label><span><?=$arQuestion["CAPTION"]?><?=($arQuestion["REQUIRED"] == "Y" ? '&nbsp;<sup class="star">*</sup>' : '')?></span></label>
		<?}
		if(is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS']))
			$arQuestion["HTML_CODE"] = str_replace('class="', 'class="error ', $arQuestion["HTML_CODE"]);

		if($arQuestion["REQUIRED"] == "Y")
			$arQuestion["HTML_CODE"] = str_replace('name=', 'required name=', $arQuestion["HTML_CODE"]);

		if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "email")
			$arQuestion["HTML_CODE"] = str_replace('type="text"', 'type="email" placeholder="mail@domen.com"', $arQuestion["HTML_CODE"]);

		if((strpos($arQuestion["HTML_CODE"], "phone") !== false) || (strpos(strToLower($FIELD_SID), "phone") !== false))
			$arQuestion["HTML_CODE"] = str_replace('type="text"', 'type="tel"', $arQuestion["HTML_CODE"]);
		if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'dropdown')
		{
			$arQuestion["HTML_CODE"] = str_replace('"><option', '"><option>Выбрать</option><option', $arQuestion["HTML_CODE"]);
		}?>
		
		<?=$arQuestion["HTML_CODE"]?>
<?endif;?>
<?
}

function debug($arr){
	global $USER;
	if($USER->IsAdmin())
	{
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

}

//AddEventHandler('main', 'OnEpilog', 'setCanonical', 1);
function setCanonical()
{
    global $APPLICATION;

    if (strpos($APPLICATION->GetCurPageParam(), '?') !== false) {
        if ($APPLICATION->GetPageProperty('canonical') == '') {
            CMain::IsHTTPS() ? $s = 's' : $s = '';
            $url = 'http' . $s . '://' . SITE_SERVER_NAME . $APPLICATION->GetCurPage();
            $APPLICATION->SetPageProperty("canonical", $url);   
        }
    }
}

/* агенты генерации yml фида */
function GenFeedByInfoblockCatalog()
{
    CModule::IncludeModule("catalog");

    $date_update = date("Y-m-d H:i");

    $arSort= Array("ID"=>"DESC");
    $arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CATALOG_PRICE_1", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => 2);
    $res =  CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){

        $elements_feed[] = $ob;
        
    }

    /*получаем список разделов*/
    $res = CIBlockSection::GetList(Array(), Array("IBLOCK_ID"=>2), Array("ID", "NAME", "SECTION_PAGE_URL", "DESCRIPTION"), false);
    while($ob = $res->GetNext()){
        $arSct111[] = $ob;
    }

    $feed  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    <!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">
    <yml_catalog date=\"$date_update\">
        <shop>
            <name>
                Фабрика дверей Прованс
            </name>
            <company>
            </company>
            <url>
                http://dveri-provance.ru
            </url>
            <platform>
                1C-Bitrix
            </platform>
            <currencies>
                <currency id=\"RUB\" rate=\"1\" />
                <currency id=\"USD\" rate=\"68.79\" />
                <currency id=\"EUR\" rate=\"78.32\" />
                <currency id=\"UAH\" rate=\"2.511\" />
                <currency id=\"BYN\" rate=\"32.2\" />
            </currencies>
            <categories>";
            foreach($arSct111 as $setc):
                $feed .= "<category id=\"$setc[ID]\">".
                $setc['NAME'].'</category>'.PHP_EOL;
            endforeach;
            $feed .= "</categories>
            <offers>";
            foreach($elements_feed as $feed_el):
                $feed .= "<offer id=\"$feed_el[ID]\" available=\"true\">".PHP_EOL.
                "<url>"."https://dveri-provance.ru".$feed_el[DETAIL_PAGE_URL]."</url>".PHP_EOL.
                "<price>$feed_el[CATALOG_PRICE_1]</price>".PHP_EOL.
                "<currencyId>$feed_el[CATALOG_CURRENCY_1]</currencyId>".PHP_EOL.
                "<categoryId>$feed_el[IBLOCK_SECTION_ID]</categoryId>".PHP_EOL.
                "<picture>"."https://dveri-provance.ru".CFile::GetPath($feed_el[PREVIEW_PICTURE])."</picture>".PHP_EOL.
                "<name>$feed_el[NAME]</name>".PHP_EOL.
                "<description>$feed_el[PREVIEW_TEXT]</description>".PHP_EOL."</offer>".PHP_EOL;
            endforeach;
            $feed .= "</offers>
        </shop>
    </yml_catalog>";


    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/tst_gen_feed_catalog.xml', $feed);

    return "GenFeedByInfoblockCatalog();";
}

function GenFeedByInfoblockShop()
{
    CModule::IncludeModule("catalog");

    $date_update = date("Y-m-d H:i");

    $arSort= Array("ID"=>"DESC");
    $arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CATALOG_PRICE_1", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL", "PROPERTY_STYLE", "PROPERTY_MATERIAL", "PROPERTY_COLOR");
    $arFilter = Array("IBLOCK_ID" => 22);
    $res =  CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){

        $elements_feed[] = $ob;
        
    }

    /*получаем список разделов*/
    $res = CIBlockSection::GetList(Array(), Array("IBLOCK_ID"=>22), Array("ID", "NAME", "SECTION_PAGE_URL", "DESCRIPTION"), false);
    while($ob = $res->GetNext()){
        $arSct111[] = $ob;
    }

    $feed  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    <!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">
    <yml_catalog date=\"$date_update\">
        <shop>
            <name>
                Фабрика дверей Прованс
            </name>
            <company>
            </company>
            <url>
                http://dveri-provance.ru
            </url>
            <platform>
                1C-Bitrix
            </platform>
            <currencies>
                <currency id=\"RUB\" rate=\"1\" />
                <currency id=\"USD\" rate=\"68.79\" />
                <currency id=\"EUR\" rate=\"78.32\" />
                <currency id=\"UAH\" rate=\"2.511\" />
                <currency id=\"BYN\" rate=\"32.2\" />
            </currencies>
            <categories>";
            foreach($arSct111 as $setc):
                $feed .= "<category id=\"$setc[ID]\">".
                $setc['NAME'].'</category>'.PHP_EOL;
            endforeach;
            $feed .= "</categories>
            <offers>";
            foreach($elements_feed as $feed_el):
                $feed .= "<offer id=\"$feed_el[ID]\" available=\"true\">".PHP_EOL.
                "<url>"."https://dveri-provance.ru".$feed_el[DETAIL_PAGE_URL]."</url>".PHP_EOL.
                "<price>$feed_el[CATALOG_PRICE_1]</price>".PHP_EOL.
                "<currencyId>$feed_el[CATALOG_CURRENCY_1]</currencyId>".PHP_EOL.
                "<categoryId>$feed_el[IBLOCK_SECTION_ID]</categoryId>".PHP_EOL.
                "<picture>"."https://dveri-provance.ru".CFile::GetPath($feed_el[DETAIL_PICTURE])."</picture>".PHP_EOL.
                "<name>$feed_el[NAME]</name>".PHP_EOL.
                "<description>$feed_el[PREVIEW_TEXT]</description>".PHP_EOL.
                "<param name=\"Стилистика\">$feed_el[PROPERTY_STYLE_VALUE]</param>".PHP_EOL.
                "<param name=\"Материал\">$feed_el[PROPERTY_MATERIAL_VALUE]</param>".PHP_EOL.
                "<param name=\"Цвет\">$feed_el[PROPERTY_COLOR_VALUE]</param>".PHP_EOL.
                "</offer>";
            endforeach;
            $feed .= "</offers>
        </shop>
    </yml_catalog>";

    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/tst_gen_feed_shop.xml', $feed);

    return "GenFeedByInfoblockShop();";
}
/* /// агенты генерации yml фида */

//\Bitrix\Main\Loader::includeModule('shestpa.lastmodified');


$eventManager = \Bitrix\Main\EventManager::getInstance();
//$eventManager->addEventHandler('main', 'OnEndBufferContent',  'deleteKernelScripts');

  function deleteKernelScripts(&$content)
  {
    global $USER;

    if (defined("ADMIN_SECTION")) {
      return;
    }

    if (is_object($USER) && $USER->IsAuthorized()) {
      $arPatternsToRemove = [
        '/<script[^>]+?>var _ba = _ba[^<]+<\/script>/',
      ];
    } else {
      $arPatternsToRemove = [
        '/<script.+?src=".+?js\/main\/core\/.+?(\.min|)\.js\?\d+"><\/script\>/',
        '/<script.+?src="\/bitrix\/js\/.+?(\.min|)\.js\?\d+"><\/script\>/',
        '/<link.+?href="\/bitrix\/js\/.+?(\.min|)\.css\?\d+".+?>/',
        '/<link.+?href="\/bitrix\/components\/.+?(\.min|)\.css\?\d+".+?>/',
        '/<script.+?src="\/bitrix\/.+?kernel_main.+?(\.min|)\.js\?\d+"><\/script\>/',
        '/<link.+?href=".+?kernel_main\/kernel_main(\.min|)\.css\?\d+"[^>]+>/',
        '/<link.+?href=".+?main\/popup(\.min|)\.css\?\d+"[^>]+>/',
        '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',
        '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
        '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
        '/<script[^>]+?>var _ba = _ba[^<]+<\/script>/',
        '/<script[^>]+?>.+?bx-core.*?<\/script>/'
      ];
    }

    $content = preg_replace($arPatternsToRemove, "", $content);
    $content = preg_replace("/\n{2,}/", "\n", $content);
  }


  AddEventHandler("main", "OnEndBufferContent", "ChangeMyContent");
  function ChangeMyContent(&$content)
  {
      global $APPLICATION;
      if(substr_count($APPLICATION->GetCurPage(false),'/bitrix/') == 0){
  
          $content = preg_replace('#http://www.dveri-provance.ru#s','',$content);
  
      }
  }

$eventManager->addEventHandler('devbx.forms', 'BEFORE_FORM_SEND_EVENT_RESULT', function(\Bitrix\Main\Event $event) {
    $parameters = $event->getParameters();
    unset($parameters['entity']);
    unset($parameters['form']);

    $result = [
        'fields' => $parameters['fields'],
    ];

    if ($parameters['fields']['UF_FORM_TYPE'])
    {
        $eventName = 'DEVBX_FORM_RESULT_'.strip_tags($parameters['fields']['UF_FORM_TYPE']);

        $dbEvent = \Bitrix\Main\Mail\Internal\EventTypeTable::getList([
            'filter' => [
                '=EVENT_NAME' => $eventName
            ],
        ])->fetch();

        if ($dbEvent)
        {
            $result['eventName'] = $eventName;
        } else {
            DevBxLogger::log('event not found: '.$eventName);
        }
    }

    if ($parameters['files'])
    {
        foreach ($parameters['files'] as $fileId)
        {
            $arFile = CFile::GetFileArray($fileId);
            if (is_array($arFile))
            {
                $arSite = \CSite::GetDefList()->Fetch();
                if ($arSite)
                {
                    $result['fields']['UF_FILE_SRC'] = 'https://'.$arSite['SERVER_NAME'].$arFile['SRC'];
                }
            }
        }
    }

    return new \Bitrix\Main\EventResult(\Bitrix\Main\EventResult::SUCCESS, $result);
});

function custom_mail($to, $subject, $message, $additional_headers = "", $additional_parameters = "")
{
    if ($additional_parameters != "")
        $result = @mail($to, $subject, $message, $additional_headers, $additional_parameters);
    else
        $result = @mail($to, $subject, $message, $additional_headers);

    $mailPoolPath = $_SERVER['DOCUMENT_ROOT'].'/bitrix/mail.pool/';

    while (true)
    {
        $mailfile = 'mail-'.date('Y-m-d H-i-s').' '.time().'.msg';
        if (!file_exists($mailPoolPath.$mailfile))
            break;
    }

    CheckDirPath($mailPoolPath.$mailfile);

    $mailMsg = 'To:'.$to."\nSubject:".$subject."\n".$additional_headers."\n\n".$message;

    file_put_contents($mailPoolPath.$mailfile, $mailMsg);

    return $result;
}

$eventManager->addEventHandler('main', 'OnBeforeEventAdd', function() {
    \DevBxLogger::log(func_get_args());
});

//AddEventHandler("main", "OnBeforeProlog", "ConvertCanonicalToLower");


