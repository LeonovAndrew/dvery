<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("FOOTER-FORM", "signup");
$APPLICATION->SetTitle('Портфолио');
$APPLICATION->SetPageProperty("title", "Портфолио работ фабрики дверей Ргоvаncе");
$APPLICATION->SetPageProperty("description", "Наши работы: двери от фабрики Ргоvаncе. Знакомьтесь с фотографиями установленных моделей в интерьере в разделе Портфолио на сайте. Галерея регулярно обновляется!");
?>

<style>
    .port{ text-align: center; }
	.port .img{ background-repeat: no-repeat; background-size: cover; width: 200px; height: 200px; background-position: center center; display: inline-block; vertical-align: top; margin: 20px; } 
</style>
<div class="port">
	<?php for($i=1; $i<20; $i++){ ?>
	<a data-fancybox="gal" data-src="/upload/port/<?=$i?>.jpeg"><div class="img" style="background-image:url(/upload/port/<?=$i?>.jpeg);"></div></a>
	<?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
