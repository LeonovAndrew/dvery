$( document ).ready(function() {

	 $('[data-popup-selector]').on('click', function(e) {
	 	e.preventDefault();
        var popupName = $(this).attr('data-popup-selector');
        var popupFormID = $(this).attr('data-popup-wfid');
        
        $('body').find('.'+popupName+'_frame').remove();
		$('body').append('<div class="'+popupName+'_frame popup" data-popup="'+popupName+'"></div>');
        
        var popup = $('[data-popup='+popupName+']');
        if(popup.length > 0) {
            popup.addClass('popup-active');
            $('body').addClass('no-scroll');
            
            $.ajax({
  				type: "GET",
  				url: '/ajax/form.php?form_id='+popupFormID,
  				success: function(msg){
  					popup.html(msg);
  					$(".tel").mask("+7-(999)-999-99-99");
  				}
			});

        }
    });
	
	$('body').on('click', '.popup', function(e) {
        $(this).removeClass('popup-active');
        $('body').addClass('no-scroll');
    });
    $('body').on('click', '.popup__close', function(e) {
        $('.popup').removeClass('popup-active');
        $('body').removeClass('no-scroll');
    });
    $('body').on('click', '.popup__cont', function(e) {
        
        e.stopPropagation();
    });
	
	$(".tel").mask("+7-(999)-999-99-99");
});