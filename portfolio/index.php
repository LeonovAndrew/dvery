<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Портфолио работ фабрики дверей Ргоvаncе наши работы фото");
//$APPLICATION->SetPageProperty("FOOTER-FORM", "signup");
$APPLICATION->SetTitle("Портфолио фабрики Ргоvаncе");
$APPLICATION->SetPageProperty("title", "Портфолио работ фабрики дверей Ргоvаncе");
$APPLICATION->SetPageProperty("description", "Наши работы: двери от фабрики Ргоvаncе. Знакомьтесь с фотографиями установленных моделей в интерьере в разделе Портфолио на сайте. Галерея регулярно обновляется!");
?>

<style>
	.port-btn{
			display: block;
			position: relative;
			font-size: 14px;
			font-weight: 500;
			line-height: 1.7;
			color: #fff;
			cursor: pointer;
			overflow: hidden;
			padding-bottom: 1px;
			background: #000;
			padding: 10px 20px;
			border-radius: 30px;
			text-transform: uppercase;
			margin: 30px auto;
		max-width:300px;
	 }
    .port{ text-align: center; }
	.port .img{ background-repeat: no-repeat; cursor:pointer; background-color: #eee; background-size: cover; width: 200px; height: 200px; background-position: center center; display: inline-block; vertical-align: top; margin: 10px; } 
</style>
<div class="port">
	<input type="hidden" id="port-cnt" value="20" />

	<div class="port-in">
	<?php for($i=1; $i<=10; $i++){ ?>
	<a data-fancybox="gal" data-src="/upload/port/<?=$i?>.webp"><div class="img" style="background-image:url(/upload/port/<?=$i?>.webp);"></div></a>
	<?php } ?>
	</div>
	<a class="port-btn">Показать еще</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<script>
$(document).ready(function(){

	$(".port-btn").click(function(){

		var cnt = parseInt($('#port-cnt').val());
		console.log('port - '+cnt);
		$.ajax({
		
			type: "POST",
			url: "next.php",
			cache: false,   
			data: ({
				cnt:  cnt
			}),
	   
	
			success: function(html){
				$('.port-in').append(html);
				var new_cnt = cnt+10;
				$('#port-cnt').val(new_cnt);

				if(new_cnt==70){ $('.port-btn').hide(); }
			}
			
					
			
		});

	});
});


</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

