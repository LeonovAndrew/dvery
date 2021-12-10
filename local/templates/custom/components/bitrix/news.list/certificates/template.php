<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>


<div class="certificate">
    <div class="cont">
        <div class="certificate__cont">
            <div class="certificate__head">
                Сертификаты
            </div>
            <div class="certificate__body-help">
                <div class="certificate__next">
                    
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.6426 4.9198L10.8942 1.17139M14.6426 4.9198L10.8942 8.66822M14.6426 4.9198H0.71989" stroke="white" stroke-width="1.3432"/>
                    </svg>

                </div>
                <div class="certificate__prev">
                    
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.35742 4.9198L5.10584 1.17139M1.35742 4.9198L5.10584 8.66822M1.35742 4.9198H15.2801" stroke="black" stroke-width="1.3432"/>
                    </svg>
                
                </div>
                <div class="certificate__body">
                    <? foreach($arResult['ITEMS'] as $item) :?>
                        <div class="certificate__item-help">
                            <a href="<?=$item['DETAIL_PICTURE']['SRC']?>" class="certificate__item" data-src="<?=$item['DETAIL_PICTURE']['SRC']?>"></a>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>