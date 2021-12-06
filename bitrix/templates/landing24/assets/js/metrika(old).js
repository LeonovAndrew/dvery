$(document).ready(function($) {
    console.log('run');
});
$(document).on('click', 'a', function(e) {
	//Общая цель на клик по телефону в шапке
	if ($(this).is('[href*="tel:+7499"]')) {
		jQuery(document).on('yacounter64922065inited', function () {
			ym(64922065,'reachGoal','nestand_phone');
		});
		ym(64922065,'reachGoal','nestand_phone');
		gtag('event', 'nestand_phone', {
			'event_category': 'nestand_phone',
			'event_action': 'click',
		});
		console.log('телефон клик');
		return true;
	}
	//Клик по почте в шапке
	if ($(this).is('a[href="mailto:office@dveri-provance.ru"]')) {
		jQuery(document).on('yacounter64922065inited', function () {
			ym(64922065,'reachGoal','nestand_mail');
		});
		ym(64922065,'reachGoal','nestand_mail');
		gtag('event', 'nestand_mail', {
			  'event_category': 'nestand_mail',
			  'event_action': 'click',
		});
		console.log('Клик по почте в шапке');
		return true;
	}
	//Клик на кнопку Оставить заявку
	if ($(this).is('a[href="#b39"]')) {
		jQuery(document).on('yacounter64922065inited', function () {
			ym(64922065,'reachGoal','nestand_ostzayavku');
		});
		ym(64922065,'reachGoal','nestand_ostzayavku');
		gtag('event', 'nestand_ostzayavku', {
			  'event_category': 'nestand_ostzayavku',
			  'event_action': 'click',
		});
		console.log('Клик на кнопку Оставить заявку');
		return true;
	}
	//Клик по кнопке Задать вопрос
	if ($(this).is('[href="https://dveri-provance.ru/lp/nestandart/#b39"][class*="g-btn-primary"]')) {
		jQuery(document).on('yacounter64922065inited', function () {
			ym(64922065,'reachGoal','nestand_askquestion');
		});
		ym(64922065,'reachGoal','nestand_askquestion');
		gtag('event', 'nestand_askquestion', {
			  'event_category': 'nestand_askquestion',
			  'event_action': 'click',
		});
		console.log('Клик по кнопке Задать вопрос');
		return true;
	}
	//Кнопка Связаться
	if ($(this).is('[href="https://dveri-provance.ru/lp/nestandart/#b39"][class*="g-btn-type-outline"]')) {
		jQuery(document).on('yacounter64922065inited', function () {
			ym(64922065,'reachGoal','nestand_svyazatca');
		});
		ym(64922065,'reachGoal','nestand_svyazatca');
		gtag('event', 'nestand_svyazatca', {
			  'event_category': 'nestand_svyazatca',
			  'event_action': 'click',
		});
		console.log('Клик по кнопке Связаться');
		return true;
	}
});
//Кнопка отправить формы АМО
$(document).on('click', "#button_submit", function(e) {
	jQuery(document).on('yacounter64922065inited', function () {
		ym(64922065,'reachGoal','nestand_formsubmit');
	});
	ym(64922065,'reachGoal','nestand_formsubmit');
	gtag('event', 'nestand_formsubmit', {
		  'event_category': 'nestand_formsubmit',
		  'event_action': 'click',
	});
	console.log('Отправка формы');
	return true;
});
//Кнопка Whatsapp формы АМО
$(document).on('click', "#button_messenger_submit", function(e) {
	jQuery(document).on('yacounter64922065inited', function () {
		ym(64922065,'reachGoal','nestand_formsubmit');
	});
	ym(64922065,'reachGoal','nestand_formsubmit');
	gtag('event', 'nestand_formsubmit', {
		  'event_category': 'nestand_formsubmit',
		  'event_action': 'click',
	});
	console.log('Отправка формы1');
	return true;
});
//Отправка формы
jQuery('#amoforms_form').on('submit', function($) { 
    jQuery(document).on('yacounter64922065inited', function () {
		ym(64922065,'reachGoal','nestand_formsubmit');
	});
	ym(64922065,'reachGoal','nestand_formsubmit');
	gtag('event', 'nestand_formsubmit', {
		  'event_category': 'nestand_formsubmit',
		  'event_action': 'click',
	});
	console.log('Отправка формы2');
	return true;
});