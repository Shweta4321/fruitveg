(function($){
"use strict"; // Start of use strict
//Tag Toggle
function toggle_tab(){
	if($('.toggle-tab').length>0){
		$('.toggle-tab').each(function(){
			/* $(this).find('.item-toggle-tab').first().find('.toggle-tab-content').show(); */
			$('.toggle-tab-title').on('click',function(){
				$(this).parent().siblings().removeClass('active');
				$(this).parent().toggleClass('active');
				$(this).parents('.toggle-tab').find('.toggle-tab-content').slideUp();
				$(this).next().stop(true,false).slideToggle();
			});
		});
	}
}	
//Popup Wishlist
function popup_wishlist(){
	$('.wishlist-link').on('click',function(event){
		event.preventDefault();
		$('.wishlist-mask').fadeIn();
		var counter = 5;
		var popup;
		popup = setInterval(function() {
			counter--;
			if(counter < 0) {
				clearInterval(popup);
				$('.wishlist-mask').hide();
			} else {
				$(".wishlist-countdown").text(counter.toString());
			}
		}, 1000);
	});
}
//Menu Responsive
function rep_menu(){
	$('.toggle-mobile-menu').on('click',function(event){
		event.preventDefault();
		$(this).parents('.main-nav').toggleClass('active');
		if($(window).width()<768){
			$('.main-nav li.menu-item-has-children').append('<span class="btn-toggle-mobile-menu"></span>');
			$('.main-nav li.menu-item-has-children>.btn-toggle-mobile-menu').on('click',function(event){
				$(this).toggleClass('active');
				$(this).prev().stop(true,false).slideToggle();
			});
		}
	});
}
//Custom ScrollBar
function custom_scroll(){
	if($('.custom-scroll').length>0){
		$('.custom-scroll').each(function(){
			$(this).mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
		});
	}
}
//Offset Menu
function offset_menu(){
	if($(window).width()>767){
		$('.main-nav .sub-menu').each(function(){
			var wdm = $(window).width();
			var wde = $(this).width();
			var offset = $(this).offset().left;
			var tw = offset+wde;
			if(tw>wdm){
				$(this).addClass('offset-right');
			}
		});
	}else{
		return false;
	}
}
//Fixed Header
function fixed_header(){
	if($('.header-ontop').length>0){
		if($(window).width()>1023){
			var ht = $('#header').height();
			var st = $(window).scrollTop();
			if(st>ht){
				$('.header-ontop').addClass('fixed-ontop');
			}else{
				$('.header-ontop').removeClass('fixed-ontop');
			}
		}else{
			$('.header-ontop').removeClass('fixed-ontop');
		}
	}
} 
//Slider Background
function background(){
	$('.bg-slider .item-slider').each(function(){
		var src=$(this).find('.banner-thumb a img').attr('src');
		$(this).css('background-image','url("'+src+'")');
	});	
}
function animated(){
	$('.banner-slider .owl-item').each(function(){
		var check = $(this).hasClass('active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
}
function slick_animated(){
	$('.banner-slider .item-slider').each(function(){
		var check = $(this).hasClass('slick-active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
}
function slick_control(){
	$('.slick-slider').each(function(){
		$(this).find('.slick-prev').html($('.slick-active').prev().find('.client-thumb a').html());
		$(this).find('.slick-next').html($('.slick-active').next().find('.client-thumb a').html());
	});
}
//Detail Gallery
function detail_gallery(){
	if($('.detail-gallery').length>0){
		$('.detail-gallery').each(function(){
			$(this).find(".carousel").jCarouselLite({
				btnNext: $(this).find(".gallery-control .next"),
				btnPrev: $(this).find(".gallery-control .prev"),
				speed: 800,
				visible:4
			});
			//Elevate Zoom
			$('.detail-gallery').find('.mid img').elevateZoom({
				zoomType: "inner",
				cursor: "crosshair",
				zoomWindowFadeIn: 500,
				zoomWindowFadeOut: 750
			});
			$(this).find(".carousel a").on('click',function(event) {
				event.preventDefault();
				$(this).parents('.detail-gallery').find(".carousel a").removeClass('active');
				$(this).addClass('active');
				var z_url =  $(this).find('img').attr("src");
				$(this).parents('.detail-gallery').find(".mid img").attr("src", z_url);
				$('.zoomWindow').css('background-image','url("'+z_url+'")');
			});
		});
	}
}
//Background Image
function background_image(){
	if($('.banner-background').length>0){
		$('.banner-background').each(function(){
			var i_url = $(this).find('.image-background').attr("src");
			$(this).css('background-image','url("'+i_url+'")');	
		});
	}
}
//Document Ready
jQuery(document).ready(function(){
	//Full Mega Menu
	if($('.main-nav').length>0){
		$('.main-nav').each(function(){
			var nav_os = $(this).offset().left;
			var par_os = $(this).parents('.container').offset().left;
			var nav_left = nav_os - par_os - 15;
			$(this).find('.has-mega-menu > .sub-menu').css('margin-left','-'+nav_left+'px');
		});
	}
	//Vegetable Hover
	if($('.fruit-list-cat').length>0){
		$('.fruit-list-cat').each(function(){
			$(this).find('.item-fruit-cat1').on('mouseover',function(){
				$(this).parents('.fruit-list-cat').find('.item-fruit-cat1').removeClass('item-center');
				$(this).addClass('item-center');
			});
			$(this).on('mouseout',function(){
				$(this).find('.item-fruit-cat1').removeClass('item-center');
				$(this).find('.item-active').addClass('item-center');
			});
		});
	}
	//Filter Price
	if($('.range-filter').length>0){
		$('.range-filter').each(function(){
			$(this).find( ".slider-range" ).slider({
				range: true,
				min: 0,
				max: 800,
				values: [ 50, 545 ],
				slide: function( event, ui ) {
					$(this).parents('.range-filter').find( ".amount" ).html( '<span>' + 'Price: $' +ui.values[ 0 ]+'</span>' + '<span>' + ' - $' + ui.values[ 1 ]+'</span>');
				}
			});
			$(this).find( ".amount" ).html('<span>' + 'Price: $' +$(this).find( ".slider-range" ).slider( "values", 0 )+'</span>' + '<span>'+ ' - $' +$(this).find( ".slider-range" ).slider( "values", 1 )+'</span>');
		});
	}
	//Qty Up-Down
	$('.detail-qty').each(function(){
		var qtyval = parseInt($(this).find('.qty-val').text(),10);
		$(this).find('.qty-up').on('click',function(event){
			event.preventDefault();
			qtyval=qtyval+1;
			$('.qty-val').text(qtyval);
		});
		$(this).find('.qty-down').on('click',function(event){
			event.preventDefault();
			qtyval=qtyval-1;
			if(qtyval>1){
				$('.qty-val').text(qtyval);
			}else{
				qtyval=1;
				$('.qty-val').text(qtyval);
			}
		});
	});
	//Custom Scroll
	custom_scroll();
	//Detail Gallery
	detail_gallery();
	//Wishlist Popup
	popup_wishlist();
	//Menu Responsive 
	rep_menu();
	//Offset Menu
	offset_menu();
	//Toggle Tab
	toggle_tab();
	//Background Image
	background_image();
	//Animate
	if($('.wow').length>0){
		new WOW().init();
	}
	//Video Light Box
	if($('.btn-video').length>0){
		$('.btn-video').fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',

			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});	
	}
	//Light Box
	if($('.fancybox').length>0){
		$('.fancybox').fancybox();	
	}
	//Back To Top
	$('.scroll-top').on('click',function(event){
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});
	//Shop The Look
	$('.box-hover-dir').each( function() {
		$(this).hoverdir(); 
	});
});
//Window Load
jQuery(window).on('load',function(){ 
	//Pre Load
	$('body').removeClass('preload'); 
	//Owl Carousel
	if($('.wrap-item').length>0){
		$('.wrap-item').each(function(){
			var data = $(this).data();
			$(this).owlCarousel({
				addClassActive:true,
				stopOnHover:true,
				lazyLoad:true,
				itemsCustom:data.itemscustom,
				autoPlay:data.autoplay,
				transitionStyle:data.transition, 
				paginationNumbers:data.paginumber,
				beforeInit:background,
				afterAction:animated,
				navigationText:['<i class="icon ion-ios-arrow-thin-left"></i>','<i class="icon ion-ios-arrow-thin-right"></i>'],
			});
		});
	}
	//Parallax Slider
	if($('.parallax-slider').length>0){
		$(window).scroll(function() {
			var ot = $('.parallax-slider').offset().top;
			var sh = $('.parallax-slider').height();
			var st = $(window).scrollTop();
			var top = (($(window).scrollTop() - ot) * 0.5) + 'px';
			if(st>ot&&st<ot+sh){
				$('.parallax-slider .item-slider').css({
					'background-position': 'center ' + top
				});
			}
			if(st<ot){
				$('.parallax-slider .item-slider').css({
					'background-position': 'center 0'
				});
			}else{
				return false;
			}
		});
	}
	//Slick Slider
	if($('.client-slider .slick').length>0){
		$('.client-slider .slick').each(function(){
			$(this).slick({
				fade: true,
				infinite: true,
				initialSlide:1,
				slidesToShow: 1,
				prevArrow:'<div class="slick-prev slick-nav"></div>',
				nextArrow:'<div class="slick-next slick-nav"></div>',
			});
			slick_control();
			$('.slick').on('afterChange', function(event){
				slick_control();
			});
		});
	}	
	//Day Countdown
	if($('.days-countdown').length>0){
		$(".days-countdown").TimeCircles({
			fg_width: 0.05,
			bg_width: 0,
			text_size: 0,
			circle_bg_color: "transparent",
			time: {
				Days: {
					show: true,
					text: "Days",
					color: "#fff"
				},
				Hours: {
					show: true,
					text: "Hours",
					color: "#fff"
				},
				Minutes: {
					show: true,
					text: "Mins",
					color: "#fff"
				},
				Seconds: {
					show: true,
					text: "Secs",
					color: "#fff"
				}
			}
		}); 
	}
	//Day Countdown
	if($('.deal-timer').length>0){
		$(".deal-timer").TimeCircles({
			fg_width: 0.05,
			bg_width: 0,
			text_size: 0,
			circle_bg_color: "transparent",
			time: {
				Days: {
					show: true,
					text: "",
					color: "#fff"
				},
				Hours: {
					show: true,
					text: "",
					color: "#fff"
				},
				Minutes: {
					show: true,
					text: "",
					color: "#fff"
				},
				Seconds: {
					show: true,
					text: "",
					color: "#fff"
				}
			}
		}); 
	}
	//Count Down Master
	if($('.countdown-master').length>0){
		$('.countdown-master').each(function(){
			$(this).FlipClock(65100,{
		        clockFace: 'HourlyCounter',
		        countdown: true,
		        autoStart: true,
		    });
		});
	}
	//Blog Masonry 
	if($('.masonry-list-post').length>0){
		$('.masonry-list-post').masonry({
			// options
			itemSelector: '.item-post-masonry',
		});
	}
});
//Window Resize
jQuery(window).on('resize',function(){
	offset_menu();
	fixed_header();
	detail_gallery();
	// rep_menu();
});
//Window Scroll
jQuery(window).on('scroll',function(){
	//Scroll Top
	if($(this).scrollTop()>$(this).height()){
		$('.scroll-top').addClass('active');
	}else{
		$('.scroll-top').removeClass('active');
	}
	//Fixed Header
	fixed_header();
	//Rotate Number
	if($('.list-statistic').length>0){
		var hT = $('.list-statistic').offset().top;
		var	hH = $('.list-statistic').outerHeight();
		var	wH = $(window).height();
		var	wS = $(this).scrollTop();
		if (wS > (hT + hH - wH)) {
			$('.numscroller').each(function() {
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					duration: 1000,
					easing: 'swing',
					step: function() {
						$(this).text(Math.ceil(this.Counter));
					}
				});
			}); {
				$('.rotate-number').removeClass('numscroller');
			};
		}
	}
});
})(jQuery); // End of use strict