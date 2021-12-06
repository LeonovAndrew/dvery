<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="main-banner" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>);">
    <div class="main-banner__bg">
        <div class="cont">
            <div class="main-banner__cont">
                <div class="main-banner__block">
                    <h1 class="main-banner__head">
                        <?=$arResult['NAME']?>
                    </h1>
                    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0",
						),
						false
					);?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="news-detail">
    <div class="cont">
        <div class="news-detail__cont">
        	<? foreach($arResult['PROPERTIES']['BLOCKS']['VALUE'] as $key => $value) :?>
	            <div class="news-detail__block">
	                <div class="news-detail__title">
	                    <?=$arResult['PROPERTIES']['BLOCKS']['DESCRIPTION'][$key]?>
	                </div>
	                <div class="news-detail__side">
	                    <div class="news-detail__text">
	                        <?=html_entity_decode($value['TEXT'])?>
	                    </div>
	                </div>
	            </div>
            <? endforeach; ?>
            <div class="news-detail__block">
                <div class="news-detail__title">

                </div>
                <div class="news-detail__side">
                    <a href="<?=$arResult['LIST_PAGE_URL']?>" class="news-detail__link">
                        <div class="news-detail__link-img">
                            
                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.86719 4.9999L5.94155 0.925537M1.86719 4.9999L5.94155 9.07427M1.86719 4.9999H17.0005" stroke="white" stroke-width="1.3432"/>
                            </svg>

                        </div>
                        <div class="news-detail__link-text">
                            Вернуться к списку статей
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?


$arSchemaOrg = array(
'@context' => "https://schema.org",
'@type' => "Article",
'mainEntityOfPage' => $_SERVER['HTTP_X_FORWARDED_PROTO'].'://'.SITE_SERVER_NAME.$arResult['DETAIL_PAGE_URL'],
'name' => $arResult['NAME'],
'image' => $_SERVER['HTTP_X_FORWARDED_PROTO'].'://'.SITE_SERVER_NAME.$arResult['PREVIEW_PICTURE']['SRC'],
'description' => $arResult['PREVIEW_TEXT'],
);
 foreach($arResult['PROPERTIES']['BLOCKS']['VALUE'] as $key => $value)
 {
 	$arSchemaOrg['articleBody'] .= '<div class="news-detail__block">
	                <div class="news-detail__title">
	                    '.$arResult['PROPERTIES']['BLOCKS']['DESCRIPTION'][$key].'
	                </div>
	                <div class="news-detail__side">
	                    <div class="news-detail__text">
	                        '.html_entity_decode($value['TEXT']).'
	                    </div>
	                </div>
	            </div>';
 }
?>
<script type="application/ld+json">
<?=json_encode($arSchemaOrg);?>
</script>