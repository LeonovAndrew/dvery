<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return;?>

<div class="contacts-list__main">
    <div class="contacts-list__body">
    <?echo $arResult['SECTION']['PATH'][0]['DESCRIPTION'];?>
    	<? foreach($arResult['ITEMS'] as $item) :?>


            <div data-id="<?=$item['ID']?>" class="contacts-list__block-help">
                <div class="contacts-list__block">
                    <div class="contacts-list__block-name">
                        <?=$item['NAME']?>
                    </div>
                    <? if ($item['DETAIL_TEXT']) :?>
	                    <div class="contacts-list__block-text">
							  <?=$item['DETAIL_TEXT']?>
	                    </div>
                    <? endif; ?>
                    <? if ($item['PREVIEW_TEXT']) :?>
	                    <div class="contacts-list__block-time">
	                      Время работы: <?=$item['PREVIEW_TEXT']?>
	                    </div>
                    <? endif; ?>
                    <? if ($item['DETAIL_TEXT']) :?>
	                    <a href="tel:<?=str_replace(array('-','(',')', ' '), '',$item['CODE'])?>" class="contacts-list__block-call">
	                        <?=$item['CODE']?>
	                    </a>
                    <? endif; ?>
                    <!-- <a href="#" class="contacts-list__block-link">
                        Виртуальный тур салона
                    </a>  -->
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>