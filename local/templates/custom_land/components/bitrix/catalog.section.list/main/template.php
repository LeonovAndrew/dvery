<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult['SECTIONS'])) return; 
?>

<div class="block1__body">
	<? foreach($arResult['SECTIONS'] as $arSection) :?>
	    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="block1__item-help">
	        <div class="block1__item" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);">
	            <div class="block1__item-bg">
	                <div class="block1__item-cont">
	                    <div class="block1__info">
	                        <div class="block1__info-title">
	                            <?=$arSection['NAME']?>
	                        </div>
	                        <div class="block1__info-text">
	                            <?=$arSection['DESCRIPTION']?>
	                        </div>
	                    </div>
	                    <div class="block1__btn">
	                        <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path opacity="0.5" d="M15.1331 4.9999L11.0587 0.925537M15.1331 4.9999L11.0587 9.07427M15.1331 4.9999H-0.000299811" stroke="black" stroke-width="1.3432"/>
	                        </svg>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </a>
    <? endforeach; ?>
    <?/* Костыльный костыль чтобы дизайн вел куда-то на лэндинг... я этого не хотел :( */?>
    <a href="/" class="block1__item-help">
        <div class="block1__item" style="background-image: url('/upload/iblock/feb/ab4xpycsycd22q6swb7nwgb4t2l50222.jpg');">
            <div class="block1__item-bg">
                <div class="block1__item-cont">
                    <div class="block1__info">
                        <div class="block1__info-title">
                            Дизайн
                        </div>
                        <div class="block1__info-text">
                            Смелые тенденции в оформлении вашего дома, для тех кто хочет что-то особенное. Изготовление дверей любой сложности и конструкции.
                        </div>
                    </div>
                    <div class="block1__btn">
                        <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M15.1331 4.9999L11.0587 0.925537M15.1331 4.9999L11.0587 9.07427M15.1331 4.9999H-0.000299811" stroke="black" stroke-width="1.3432"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>
	    
	    
</div>