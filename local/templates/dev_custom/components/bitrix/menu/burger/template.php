<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if (empty($arResult)) return; ?>

<div class="menu__list">
	<? foreach ($arResult as $arItem): ?>

			<?php if($arItem["TEXT"]=='Каталог'){ ?>
<div class="catalog-menu">
	<a  class="menu__list-item"> <?=$arItem["TEXT"]?>  </a> 
<ul class="top-menu__sub"> 
    <li class="top-menu__sub-item"><a href="https://dveri-provance.ru/catalog/">Межкомнатные двери</a></li>  
<li class="top-menu__sub-item"><a href=" https://dveri-provance.ru/stroy_paneli/">Стеновые панели</a></li> 
    <li class="top-menu__sub-item"><a href=" https://dveri-provance.ru/peregorodki/">Межкомнатные перегородки</a></li> 
</ul>
</div>
			<?php }else{ ?>
			<a href="<?=$arItem["LINK"]?>" class="menu__list-item"> <?=$arItem["TEXT"]?> </a>
			<?php } ?>

	<? endforeach; ?>
</div>

<div class="menu__stripe"></div>