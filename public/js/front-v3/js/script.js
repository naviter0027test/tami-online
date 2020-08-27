// JavaScript Document

window.onload = function(){
	FastClick.attach(document.body);
	set_slider();
	toggle_contact_form();
	set_scrollbar();
	toggle_home_popup();
	set_home_animate();
	detect_mobile_landscape();
	$(window).on("resize orientationchange",function(){		
		detect_mobile_landscape();		
	});
	change_small_big_img();
	set_product_detail_version();
	set_drop_down_menu('#drop_down_position');
};
function set_product_detail_version(){
	if($('.product_detail').length>0){
		$('.version').insertBefore('.product_detail');
	}
}
function detect_mobile_landscape(){	
	// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
		|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
		$('body').addClass('body_mobile');
		
		if(window.innerHeight > window.innerWidth){
			//portrait
			$('.mobile_rotate').addClass('active');
			$('body').addClass('mobile_active');
		}
		if(window.innerWidth > window.innerHeight){
			//landscape
			$('.mobile_rotate').removeClass('active');
			$('body').removeClass('mobile_active');
		}
		
		
	}
}

function set_home_animate(){	
	if($('.block01_animate').length>0){
		loop_animate("block01_animate",200);
		loop_animate("block02_animate",100);
		loop_animate("block03_animate",250);		
	}
}
function loop_animate(element,time){
	var slideIndex = 0;
	showSlides(element,time);
	
	function showSlides(element,time) {
	  var i;
	  var slides = document.getElementsByClassName(element);
	 
	  for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	  }
	  slideIndex++;
	  if (slideIndex > slides.length) {slideIndex = 1}
	  slides[slideIndex-1].style.display = "block";  	  
	  setTimeout(showSlides, time,element,time); 
	}
}
//slider
function set_slider(){
	if($( ".info_slider" ).length>0){
		$( ".info_slider" ).owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			items:1,
			scrollbarType: "scroll"
		})
	}
	if($( ".detail_slider" ).length>0){
		$( ".detail_slider" ).owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			items:1,
			mouseDrag:false,
			scrollbarType: "scroll"
		})
	}	
	
	
}
function toggle_contact_form(){
	$('.btn_contact').click(function(){
		$('#contact_form').toggleClass('active');
	});
	$('.close_div .btn_close').click(function(){
		$('#contact_form').toggleClass('active');
	});
}
function set_scrollbar(){
	if($('.scrollbar').length>0){		
		$(".scrollbar").mCustomScrollbar({
				theme:"rounded-dots",
				scrollInertia:400
			});	
	}
}
function toggle_home_popup(){
	$('.block_img').click(function(event){
		event.preventDefault();
		$(this).addClass('active');
		$('body').addClass('body_popup_active');
		var popup_id = '#'+$(this).attr('data-id');
		$('.popup_block').removeClass('active');
		$(popup_id).addClass('active');
		$('.overly,.btn_back img').click(function(){
			$('body').removeClass('body_popup_active');
			$('.popup_block').removeClass('active');
			$('.block_img').removeClass('active');
		});
		$("html, body").animate({ scrollTop: 0 }, 100);
	});
}
function change_small_big_img(){
	if($('.product_detail .detail_slider .item .box .col01 .thumbnail .sub_item img').length>0){
		var big_img_src = '';
		var small_img_src = '';
		$('.product_detail .detail_slider .item .box .col01 .thumbnail .sub_item').click(function(){
			small_img_src = $(this).find('img').attr('src');
			big_img_src = $(this).parent().parent().parent().parent().find('.big').attr('src');
			$(this).find('img').attr('src',big_img_src);
			$(this).parent().parent().parent().parent().find('.big').attr('src',small_img_src);
			$(this).parent().parent().parent().parent().find('.zoom').attr('href',small_img_src);
		});
		
		
	}
}
function share_url(msg){
	
	var inputDump = document.createElement('input'),
	hrefText = window.location.href;
	document.body.appendChild(inputDump);	
	inputDump.value = hrefText;
	inputDump.select();
	$('input').on('focus', function() { $(this).blur(); });
	document.execCommand('copy');
	alert(msg + location.href);
	
	
}
function set_drop_down_menu(id){
	
	$(id +' .item').click(function(event){
		var val = $(this).find('.checkmark').html();
		$(id).find('button span:first-child').html(val);
		//$(this).parent().hide();			
		
	});
	$(id +' button').click(function(){
		$(id).find('.list_item').show();
		
                return false;
	});
	$(id +' .item').click(function(event){
		event.stopPropagation();	
		$(id).find('.list_item').hide();
		
	});
	$(id +' .list_item').mouseleave(function () {
		$(id).find('.list_item').hide();
	}); 
}
