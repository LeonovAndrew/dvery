$( document ).ready(function() {
/* Добавление в избранное*/
	$('body').on('click','.fav_star', function(e){
		//e.preventDefault();
		var $button = $(this);
		var ID = $(this).attr('data-id');
		var action = 'add';
		if($button.hasClass('selected')) action = 'del';
	
		if(action == 'add')
		{
			$.ajax({
			  type: "POST",
			  dataType: 'json',
			  url: "/ajax/add_favorite.php",
			  data: "ID="+ID,
			  headers: {
            'Cookie': document.cookie
        },
			  success: function(data){
			    if(data.STATUS == true)
			    {
			    	$button.addClass('selected');
   			    	$('.favorite_cnt').text(data.CNT).removeClass('hide');
   			    	$('.fav_star_icon').addClass('selected');
			    }
			  }
			});
		}
		
		if(action == 'del')
		{
			
			$fav_action = $button.children('.fav_action');
			$fav_action.show();
		}	
	});

	$('body').on('click','.fav_delete', function (e)
	{
		e.preventDefault();
		if(confirm('Удалить из избранного?'))
		{
			$button = $(this).closest('.fav_star');
			var ID = $button.attr('data-id');
			
			$.ajax({
			  type: "POST",
			  dataType: 'json',
			  url: "/ajax/del_favorite.php",
			  data: "ID="+ID,
			  headers: {
		            'Cookie': document.cookie
		        },
			  success: function(data){
			    if(data.STATUS == true)
			    {
			    	$button.removeClass('selected');
				    	$('.favorite_cnt').text(data.CNT).removeClass('hide');
				    	if(data.CNT == 0) $('.fav_star_icon').removeClass('selected');
				    	$('.fav_action').hide();
				    	if($button.closest('.favorites_list .product').length > 0)
				    	{
				    		$button.closest('.favorites_list .product').remove();
				    	}
				    	
			    }
			  }
			});
		}
	});

	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".fav_action"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			div.hide(); // скрываем его
		}
	});
	
	var fav_cookie = getCookie('favorites');
	if(typeof fav_cookie != 'undefined')
	{
		var favorites = JSON.parse(unescape(fav_cookie));
		$.each(favorites, function(data){
			if($('span[data-id="'+data+'"]').length)
			{
				$('span[data-id="'+data+'"]').addClass('selected');
				$('span[data-id="'+data+'"]').find('.text').text('В избранном');
				$('span[data-id="'+data+'"]').find('img').attr('src', '/images/favorite_star_full.svg');
			}
			
			if($('.fav_star[data-id="'+data+'"]').length)
			{
				$('.fav_star[data-id="'+data+'"]').addClass('selected');
			}
		});
	}

});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
