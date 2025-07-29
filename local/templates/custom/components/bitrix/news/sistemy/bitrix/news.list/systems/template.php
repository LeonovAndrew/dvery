<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if (empty($arResult['ITEMS'])) return; ?>


<div class="systems">
    <div class="cont">
        <div class="systems__body">
            <? foreach($arResult['ITEMS'] as $item) :?>
            		<div class="systems__item-help">
	                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="systems__item">
	                        <div class="systems__img">
	                            <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['PREVIEW_PICTURE']['DESCRIPTION']?>">
							</div>
	                        <div href="#" class="systems__title">
	                            <?=$item['NAME']?>
	                        </div>
	                    </a>
					</div>
				<? endforeach; ?>
			</div>
		</div>
</div>


