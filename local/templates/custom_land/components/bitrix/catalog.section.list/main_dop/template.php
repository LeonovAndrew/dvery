<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult['SECTIONS'])) return; 
?>

<div class="block3">
    <div class="cont">
        <div class="block3__cont">
			<? foreach($arResult['SECTIONS'] as $arSection) :?>
			    <div class="block3__item-help">
			        <div class="block3__item-bg" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);">
			            <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="block3__item">
			            	<div class="block3__circle"></div>
		                    <div class="block3__block">
		                        <div class="block3__title">
		                            <?=$arSection['NAME']?>
		                        </div>
		                        <div class="block3__text">
		                            <?=$arSection['DESCRIPTION']?>
		                        </div>
		                    </div>
		                    <div class="block3__btn">
		                        <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                <path opacity="0.5" d="M15.1331 4.9999L11.0587 0.925537M15.1331 4.9999L11.0587 9.07427M15.1331 4.9999H-0.000299811" stroke="black" stroke-width="1.3432"/>
	                            </svg>
		                    </div>
			            </a>
			        </div>
			    </div>
		    <? endforeach; ?>
		</div>
	</div>
</div>