<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?$APPLICATION->ShowTitle()?></title>
		<?$APPLICATION->ShowHead()?>
		<?$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/assets/css/custom.css');

		?>

	<link href="<?=SITE_TEMPLATE_PATH?>/assets/css/vendors.css" rel="stylesheet"><link href="<?=SITE_TEMPLATE_PATH?>/assets/css/app.css" rel="stylesheet"></head>
	<body>
	<?$APPLICATION->IncludeFile('/include/counter.php')?>
	
<script>
window.onload = function(){
 setTimeout(function(){
   document.getElementById('repometr_widget_1683').src = 'https://repometr.com/widgets/1683/';
 },5000);
};
 </script>
		<div class="wrapper">
			<header class="header">
				<div class="header__content">
					<div class="header__info">
						<div class="header__logo"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt=""></div>
						<div class="header__slogan">Дизайнерские двери любой конструкции и сложности готовые и под заказ</div>
						<div class="header-advant">
							<div class="header-advant__item"><a href="/contacts/">7 салонов</a></div>
							<div class="header-advant__item"><a href="/about/proizvodstvo.php">Своё производство</a></div>
							<div class="header-advant__item">
								<div class="header-quality">
									<div class="header-quality__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/italy-flag.svg" alt=""></div>
									<div class="header-quality__text">Итальянское<br>качество</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header__slogan">Дизайнерские двери любой конструкции и сложности готовые и под заказ</div>
					<div class="header__contacts-wrap">
						<div class="header__contacts">
							<div class="header__mail"><a href="mailto:design@dveri-provance.ru">design@dveri-provance.ru</a></div>
							<div class="header__tel">
								<div class="msg"><a class="msg__item" href="#">
										<svg class="icon ic-telegram" width="26" height="22">
											<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-telegram"></use>
										</svg></a><a class="msg__item" href="#">
										<svg class="icon ic-whatchapp" width="30" height="30">
											<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-whatchapp"></use>
										</svg></a></div><a href="tel:+74992836062">+7-499-283-60-62</a>
							</div>
						</div><a class="btn btn_small" href="#" data-popup-selector="callback" data-popup-wfid="1">
							<svg class="icon ic-call" width="24" height="24">
								<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-call"></use>
							</svg>Перезвоните мне</a>
					</div>
				</div>
			</header>
			<main>