Number.prototype.roundTo = function(num) {
    var resto = this%num;
    if (resto <= (num/2)) { 
        return this-resto;
    } else {
        return this+num-resto;
    }
}


function round_up_to_even(n){
   return n.roundTo(2);
}

$(document).ready(function(){

	$('#menu-btn').click(function(){
   $('.menu').slideToggle(300);
   if ($(this).hasClass('not-active')) {
    $(this).addClass('is-active').removeClass('not-active');
  }else{
    setTimeout(function(){
     $('.is-active').addClass('not-active').removeClass('is-active')
   },250)
  }
});
    
$('#inpt_file').change(function(){
  
    $('#inpt_file').parent().find('label').html('Файл загружен <i class="fa fa-upload" aria-hidden="true"></i>');
});

$('.emal-culc-btn a').click(function(){
    var id = $(this).data('id');
    $('.emal_culc,.shpon_culc').hide();
	$('.'+id+'_culc').show();
    
    $('.'+id+'_culc').find('.type_chose').eq(0).click();  
    
    
         
});



  $('.culc_input').keyup(function() {
        var width = $('#width').val();
        var height = $('#height').val();
      
        var s = (width*height)/1000000;
        var price = s * $('#curr_price').val();
        $('.square').text(s.toFixed(2));
        
        $('#total_pirce').text(Math.ceil(price).toLocaleString('ru-RU'));
        
        
  });
    
  $('.culc_input').change(function() {
        var width = $('#width').val();
        var height = $('#height').val();
      
        var s = (width*height)/1000000;
        var price = s * $('#curr_price').val();
        $('.square').text(s.toFixed(2));
        
        $('#total_pirce').text(Math.ceil(price).toLocaleString('ru-RU'));
        
        
  });    

/*==============*/
$('.sch_ic').click(function () {
  $(this).toggleClass('sch_ic_click').next().slideToggle('fast');
  $('.sch_ic').not(this).removeClass('sch_ic_click').next().slideUp('fast');
});
/*==============*/
$('.block_4_in_txt_in_top').click(function () {
  $(this).toggleClass('block_4_in_txt_in_top_click').next().slideToggle('fast');
  $('.block_4_in_txt_in_top').not(this).removeClass('block_4_in_txt_in_top_click').next().slideUp('fast');
});
/*===================*/
 
/*===================*/
    
    
    
$('.block_5_slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 1,
        infinite: true,
      }
    },

  ]
});
    
$('.block_6_slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 1,
        infinite: true,
      }
    },

  ]
});
$('.block_3_card_slider').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
   
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        infinite: true,
      }
    },

    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2,
        infinite: true,
      }
    },
    {
      breakpoint: 501,
      settings: {
        slidesToShow: 1,
        infinite: true,
      }
    },

  ]
});
    
  $(window).scroll(function() { 
      
     var lim1 = 400;
     var lim2 = 1200;
    if ($(this).scrollTop() > lim1 && $(this).scrollTop()< lim2){
      $('.total_block').show();
    }
    else{
      $('.total_block').hide();
    }
  });
    
  /*=====================*/
  $('.bt_chose').click(function() {
    $('.bt_chose_act').removeClass('bt_chose_act');
    $(this).addClass('bt_chose_act');
  });
   /*=====================*/
   $('.type_chose').click(function() {
    $('.type_chose_act').removeClass('type_chose_act');
    $(this).addClass('type_chose_act');
  });
  /*====================*/
$('.type_chose').click(function(){
  var id = $(this).data('id');
  $('.type_chose').removeAttr('id');
  $(this).attr('id','border');
  $('.block_2_card_flex_img_in').hide();
  $(this).parents('.block_2_card_flex').find('#img_show'+id).fadeIn();
});
/*===================*/
$('input,textarea').focus(function () {
  $(this).data('placeholder', $(this).attr('placeholder'))
  $(this).attr('placeholder', '');
});
$('input,textarea').blur(function () {
  $(this).attr('placeholder', $(this).data('placeholder'));
});
  /*==============*/
  $(".mask_tel").mask("+0 (000) 000-00-00", {
        clearIfNotMatch: true
    });
  $('.mask_email').mask("A", {
  translation: {
    "A": { pattern: /[\w@\-.+]/, recursive: true }
  }
});
});/*$(document).ready(function()*/