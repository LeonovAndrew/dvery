<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return;?>

<div class="contacts-list__main" itemscope itemtype="https://schema.org/Organization">
    <div class="contacts-list__body">
    <?echo $arResult['SECTION']['PATH'][0]['DESCRIPTION'];?>
    	<? foreach($arResult['ITEMS'] as $item) :?>

		<?php
			$link = '';
			if($item['ID']==434){$link = '/contacts/ofis-prodazh/';}
			if($item['ID']==338){$link = '/contacts/tk-kashirskiy-dvor2/';}
			if($item['ID']==6879){$link = '/contacts/tk-kashirskiy-dvor1/';}
			if($item['ID']==7613){$link = '/contacts/ekspostroy1/';}
			if($item['ID']==339){$link = '/contacts/ekspostroy2/';}
			if($item['ID']==435){$link = '/contacts/lefortovo/';} 
			if($item['ID']==436){$link = '/contacts/rumyan/';} 
			if($item['ID']==6878){$link = '/contacts/rumyan2/';} 
		?>
		<div data-id="<?=$item['ID']?>" onClick="location.href='<?=$link?>';"  class="contacts-list__block-help" style="cursor:pointer;">
                <div class="contacts-list__block">
                    <div class="contacts-list__block-name" itemprop="name">
                        <?=$item['NAME']?>
                    </div>
                    <? if ($item['DETAIL_TEXT']) :?>
	                    <div class="contacts-list__block-text" itemprop="address">
							  <?=$item['DETAIL_TEXT']?>
	                    </div>
                    <? endif; ?>
                    <? if ($item['PREVIEW_TEXT']) :?>
	                    <div class="contacts-list__block-time" itemprop="department">
	                      Время работы: <?=$item['PREVIEW_TEXT']?>
	                    </div>
                    <? endif; ?>
                    <? if ($item['DETAIL_TEXT']) :?>
	                    <a href="tel:<?=str_replace(array('-','(',')', ' '), '',$item['CODE'])?>" class="contacts-list__block-call" itemprop="telephone">
	                        <?=$item['CODE']?>
	                    </a>
                    <? endif; ?>

					<?php if(!empty($link)){ ?>
                    <a  class="contacts-list__block-link">
                        Подробнее
                    </a>  

					<?php } ?>
                </div>
            </div>
        <? $link = ''; endforeach; ?>
    </div>
</div>