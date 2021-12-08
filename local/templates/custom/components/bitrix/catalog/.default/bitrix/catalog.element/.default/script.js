$(function() {
	$("a.video__link").fancybox({
       type:'swf'
    });

    $('.decor-item').on('click', function() {
    	var materialId = $('.material-item.card__material-p-active').data('id');
    	var designId = $(this).data('id');

		$('.js-loupe')
		.attr('src', design[materialId][designId].PICTURE)
		.attr('data-result-id', design[materialId][designId].ID);

		$('.magnifier img:last-child').attr('src', design[materialId][designId].PICTURE);

    	$('.js-design-image')
		.css('background-image', 'url(' + design[materialId][designId].PICTURE + ')')
		.attr('data-result-id', design[materialId][designId].ID);
    });

    $('.material-item').on('click', function() {
    	var designId = $('.decor-item.card__material-p-active').data('id');
    	var materialId = $(this).data('id');
    	var actualModelId = $('.model-item.card__model-active').data('id');

    	$('.js-loupe')
		.attr('src', design[materialId][designId].PICTURE)
		.attr('data-result-id', design[materialId][designId].ID);

    	$('.js-design-image')
		.css('background-image', 'url(' + design[materialId][designId].PICTURE + ')')
		.attr('data-result-id', design[materialId][designId].ID);

		$('.magnifier img:last-child').attr('src', design[materialId][designId].PICTURE);

    	$('.model-item').each(function() {
    		var modelId = $(this).data('id');
    		$(this).find('.js-material-image').css('background-image', 'url(' + offers[materialId][modelId].PICTURE + ')');
    	});

    	$('.js-loupe2')
		.attr('src', offers[materialId][actualModelId].PICTURE)
		.attr('data-result-id', offers[materialId][actualModelId].ID);

		$('.magnifier .loupe2').attr('src', offers[materialId][actualModelId].PICTURE);
		

    	$('.js-material-image-left')
		.css('background-image', 'url(' + offers[materialId][actualModelId].PICTURE + ')')
		.attr('data-result-id', offers[materialId][actualModelId].ID);
		

    	$('.card__price span').html(prettify(offers[materialId][actualModelId].PRICE));
    	$('.card__text').html('Модель: '+prettify(offers[materialId][actualModelId].TEXT));
    });

    $('.model-item').on('click', function() {
    	var materialId = $('.material-item.card__material-p-active').data('id');
    	var modelId = $(this).data('id');

    	$('.js-loupe2')
		.attr('src', offers[materialId][modelId].PICTURE)
		.attr('data-result-id', offers[materialId][modelId].ID);

    	$('.magnifier .loupe2').attr('src', offers[materialId][modelId].PICTURE);

    	$('.js-material-image-left')
		.css('background-image', 'url(' + offers[materialId][modelId].PICTURE + ')')
		.attr('data-result-id', offers[materialId][modelId].ID);
		

    	$('.card__price span').html(prettify(offers[materialId][modelId].PRICE));
    	$('.card__text').html('Модель: '+prettify(offers[materialId][modelId].TEXT));
    });    
});

function prettify (num) {
    var n = num.toString();
    var separator = " ";
    return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + separator);
}