/* -----------------------------------------------------------------------------



File:           JS Core
Version:        1.0
Last change:    00/00/00 
Author:         HTMLMATE Team

-------------------------------------------------------------------------------- */
(function() {

	"use strict";

	var Genius = {
		init: function() {
			this.Basic.init();  
		},

		Basic: {
			init: function() {

				this.preloader();
				this.menuBar();
				this.counterUp();
				this.courseSlide();
				this.datePicker();
				this.bannerParalax();
				this.serviceSlide();
				this.testimonialSlide();
				this.videoPopup();
				this.sponsorSlide();
				this.bestproductSlide();
				this.faqTAB();
				this.contactMAP();
				this.rateReview();
				this.categorySlide();
				this.testi_2Slide();
				this.teacher2SLIDE();
				this.teacher3SLIDE();
				this.buttonSlide();
				this.testimonialSlide_3();
				this.categorySlide_3();
				this.advance3SLIDE();
				this.productRange();
				this.searchBAR();
				this.animationItem();
				this.mobileMenu();
				this.mainSlide();
				this.countDown();
				this.switchOpen();
				this.quickScroll();
			},




/* Start Of Preloader
================================================*/
preloader: function (){
	jQuery(window).on('load', function(){
		jQuery('#preloader').fadeOut('slow',function(){jQuery(this).remove();});
	});
},
/* End  Of Preloader
================================================*/


/* - Start of menu bar
================================================*/
menuBar: function (){
	jQuery(window).on('scroll', function() {
		if (jQuery(window).scrollTop() > 50) {
			jQuery('.main-menu-container').addClass('menu-bg-overlay')
		} else {
			jQuery('.main-menu-container').removeClass('menu-bg-overlay')
		}
	})

},


/* - End of menu bar
================================================*/




/* Start Of counter-up
================================================*/
counterUp: function (){
	$('.counter-count').counterUp({
		delay: 50,
		time: 2000,
	});

},
/* - End Of counter-up
================================================*/



/* Start Of course slide
================================================*/
mainSlide: function (){
	$('#slider-item').owlCarousel({
		margin:0,
		responsiveClass:true,
		nav: true,
		dots: true,
		rtl: true,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:1,
			},
			700:{
				items:1,
			},
			800:{
				items:1,
			},
			1000:{
				items:1,

			}
		},
	})
},
/* End Of course slide
================================================*/




/* Start Of course slide
================================================*/
courseSlide: function (){
	$('#course-slide-item').owlCarousel({
		margin:30,
		responsiveClass:true,
		nav: true,
		dots: false,
		rtl: true,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:1,
			},
			700:{
				items:2,
			},
			800:{
				items:3,
			},
			1000:{
				items:3,

			}
		},
	})
},
/* End Of course slide
================================================*/



/* Start Of Date picker
================================================*/
datePicker: function (){
	$( "#datepicker" ).datepicker();
},
/* - End Start Of Date picker
================================================*/


/* Start Of parallax
================================================*/
bannerParalax: function (){
	jQuery('.jarallax').jarallax({
		speed: 0.5,
	});
},
/* End Of Preloader
================================================*/



/* Start Of service slide
================================================*/
serviceSlide: function (){
	$('#service-slide-item').owlCarousel({
		margin:85,
		responsiveClass:true,
		nav: false,
		rtl: true,
		autoplay: false,
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:1,
			},
			700:{
				items:2,
			},
			1000:{
				items:3,

			}
		},
	})
},
/* End Of service slide
================================================*/


/* Start Of service slide
================================================*/
testimonialSlide: function (){
	$('#testimonial-slide-item').owlCarousel({
		margin:85,
		responsiveClass:true,
		nav: true,
		rtl: true,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		autoplay: false,
		dots: false,
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:1,
			},
			700:{
				items:1,
			},
			1000:{
				items:2,

			}
		},
	})
},
/* End Of service slide
================================================*/


/* Start of popup
================================================*/
videoPopup: function (){
	jQuery('.popup-with-zoom-anim').magnificPopup({
		disableOn: 200,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
	
},
/* End of popup
================================================*/

/* Start Of service slide
================================================*/
sponsorSlide: function (){
	$('.sponsor-item').owlCarousel({
		margin: 2,
		responsiveClass:true,
		loop:true,
		nav: true,
		rtl: true,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		autoplay: true,
		dots: true,
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:2,
			},
			600:{
				items:3,
			},
			700:{
				items:4,
			},
			1000:{
				items:6,

			}
		},
	})
},
/* End Of service slide
================================================*/


/* Start Of best product
================================================*/
bestproductSlide: function (){
	$('#best-product-slide-item').owlCarousel({
		margin:25,
		responsiveClass:true,
		nav: true,
		rtl: true,
		dots: false,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:2,
			},
			700:{
				items:2,
			},
			800:{
				items:2,
			},
			1000:{
				items:4,

			}
		},
	})
},
/* End Of best product
================================================*/


/* Start Of best product
================================================*/
faqTAB: function (){
	$(".tab-content-1").hide();
	$(".tab-content-1:first").show();

	/* if in tab mode */
	$("ul.product-tab li").on("click", function() {
		
		$(".tab-content-1").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn();    
		
		$("ul.product-tab li").removeClass("active");
		$(this).addClass("active");

		$(".tab_drawer_heading").removeClass("d_active");
		$(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
		
	});
	/* if in drawer mode */
	$(".tab_drawer_heading").on("click", function() {
		
		$(".tab-content-1").hide();
		var d_activeTab = $(this).attr("rel"); 
		$("#"+d_activeTab).fadeIn();
		
		$(".tab_drawer_heading").removeClass("d_active");
		$(this).addClass("d_active");
		
		$("ul.product-tab li").removeClass("active");
		$("ul.product-tab li[rel^='"+d_activeTab+"']").addClass("active");
	});
	
	
  /* Extra class "tab_last" 
     to add border to right side
     of last tab */
     $('ul.product-tab li').last().addClass("tab_last");
 },
/* End Of best product
================================================*/


/* Start  Contact Map section
================================================*/
contactMAP: function (){
	function isMobile() { 
		return ('ontouchstart' in document.documentElement);
	}

	function init_gmap() {
		if ( typeof google == 'undefined' ) return;
		var options = {
			center: [40.712775, -74.005973],
			zoom: 14,
			styles: [
			{elementType: 'geometry', stylers: [{color: '#eeeeee'}]},
			{elementType: 'labels.text.stroke', stylers: [{color: '#eeeeee'}]},
			{elementType: 'labels.text.fill', stylers: [{color: '#eeeeee'}]},
			{
				featureType: 'administrative.locality',
				elementType: 'labels.text.fill',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'poi',
				elementType: 'labels.text.fill',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'poi.park',
				elementType: 'geometry',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'poi.park',
				elementType: 'labels.text.fill',
				stylers: [{color: '#c6c9c3'}]
			},
			{
				featureType: 'road',
				elementType: 'geometry',
				stylers: [{color: '#c6c9c3'}]
			},
			{
				featureType: 'road',
				elementType: 'geometry.stroke',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'road',
				elementType: 'labels.text.fill',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'geometry',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'geometry.stroke',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'labels.text.fill',
				stylers: [{color: '#cdc9c2'}]
			},
			{
				featureType: 'transit',
				elementType: 'geometry',
				stylers: [{color: '#e4e4e3'}]
			},
			{
				featureType: 'transit.station',
				elementType: 'labels.text.fill',
				stylers: [{color: '#e4e4e3'}]
			},
			{
				featureType: 'water',
				elementType: 'geometry',
				stylers: [{color: '#c3c7cc'}]
			},
			{
				featureType: 'water',
				elementType: 'labels.text.fill',
				stylers: [{color: '#c3c7cc'}]
			},
			{
				featureType: 'water',
				elementType: 'labels.text.stroke',
				stylers: [{color: '#c3c7cc'}]
			}
			],
			mapTypeControl: true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			navigationControl: true,
			scrollwheel: false,
			streetViewControl: true,
		}

		if (isMobile()) {
			options.draggable = false;
		}

		$('#googleMaps').gmap3({
			map: {
				options: options
			},
			marker: {
				latLng: [40.712775, -74.005973],
				options: { icon: 'assets/img/map.png' }

			}
		});
	}
	init_gmap();
	
},

/* End Contact Map section
================================================*/


/* - Start of faq accordion
================================================*/
rateReview: function (){
	$(':radio').change(function() {
		console.log('New star rating: ' + this.value);
	});

},
/* - End of faq accordion
================================================*/



/* Start Of best product
================================================*/
categorySlide: function (){
	$('.category-slide-item').owlCarousel({
		margin:25,
		responsiveClass:true,
		nav: true,
		rtl: true,
		dots: false,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:2,
			},
			700:{
				items:3,
			},
			1000:{
				items:4,

			}
		},
	})
},
/* End Of best product
================================================*/


/* Start Of service slide
================================================*/
testi_2Slide: function (){
	$('.testimonial-secound-slide-area').owlCarousel({
		margin:10,
		responsiveClass:true,
		nav: false,
		rtl: true,
		autoplay: false,
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:1,
			},
			700:{
				items:1,
			},
			1000:{
				items:1,

			}
		},
	})
},
/* End Of service slide
================================================*/



/* Start Of teacher secoud Slide
================================================*/
teacher2SLIDE: function (){
	$('.teacher-secound-slide').owlCarousel({
		margin:25,
		responsiveClass:true,
		nav: true,
		rtl: true,
		dots: false,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:2,
			},
			700:{
				items:2,
			},
			1000:{
				items:4,

			}
		},
	})
},
/* End Of teacher secoud Slide
================================================*/


/* Start Of teacher thired Slide
================================================*/
teacher3SLIDE: function (){
	$('.teacher-third-slide').owlCarousel({
		margin:10,
		responsiveClass:true,
		nav: true,
		rtl: true,
		dots: false,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>",
		"<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:2,
			},
			700:{
				items:3,
			},
			1000:{
				items:5,

			}
		},
	})
},
/* End Of teacher thired Slide
================================================*/



/* Start Of best product
================================================*/
buttonSlide: function (){
	$('.button-tab').owlCarousel({
		margin:0,
		responsiveClass:true,
		nav: true,
		rtl: true,
		dots: false,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:2,
			},
			600:{
				items:4,
			},
			700:{
				items:5,
			},
			1000:{
				items:6,

			}
		},
	})
},
/* End Of best product
================================================*/


/* Start Of service slide
================================================*/
testimonialSlide_3: function (){
	$('.testimonial-secound-slide-area_3').owlCarousel({
		margin:85,
		responsiveClass:true,
		nav: true,
		rtl: true,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		autoplay: false,
		dots: false,
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:1,
			},
			700:{
				items:1,
			},
			1000:{
				items:1,

			}
		},
	})
},
/* End Of service slide
================================================*/



/* Start Of category slide
================================================*/
categorySlide_3: function (){
	$('.category-slide').owlCarousel({
		margin:0,
		responsiveClass:true,
		nav: true,
		navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
		autoplay: false,
		dots: false,
		rtl: true,
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:2,
			},
			600:{
				items:3,
			},
			700:{
				items:4,
			},
			1000:{
				items:5,

			}
		},
	})
},
/* End Of  category slide
================================================*/


/* Start Of teacher thired Slide
================================================*/
advance3SLIDE: function (){
	$('.service-slide_3').owlCarousel({
		margin:10,
		responsiveClass:true,
		nav: true,
		dots: false,
		autoplay: false,
		navText:["<i class='fas fa-chevron-right'></i>",
		"<i class='fas fa-chevron-left'></i>"],
		smartSpeed: 1000,
		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:2,
			},
			700:{
				items:2,
			},
			1000:{
				items:3,

			}
		},
	})
},
/* End Of teacher thired Slide
================================================*/


/* Start Of category slide
================================================*/
productRange: function (){

	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 800,
		values: [ 175, 500 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		" - $" + $( "#slider-range" ).slider( "values", 1 ) );
},
/* End Of  category slide
================================================*/



/* - Start of search bar
================================================*/
searchBAR: function (){
	$('.toggle-overlay').on('click', function() {
		$('.search-body').toggleClass('search-open');
	});

},
/* - End of search bar
================================================*/

animationItem: function (){

	function ckScrollInit(items, trigger) {
		items.each(function() {
			var ckElement = $(this),
			AnimationClass = ckElement.attr('data-animation'),
			AnimationDelay = ckElement.attr('data-animation-delay');

			ckElement.css({
				'-webkit-animation-delay': AnimationDelay,
				'-moz-animation-delay': AnimationDelay,
				'animation-delay': AnimationDelay
			});

			var ckTrigger = (trigger) ? trigger : ckElement;

			ckTrigger.waypoint(function() {
				ckElement.addClass("animated").css("visibility", "visible");
				ckElement.addClass('animated').addClass(AnimationClass);
			}, {
				triggerOnce: true,
				offset: '90%'
			});
		});
	}
	
	ckScrollInit($('.animation'));
	ckScrollInit($('.staggered-animation'), $('.staggered-animation-wrap'));
	

},


mobileMenu: function (){
	jQuery('.mobile-menu nav').meanmenu();
	function slideMenu() {
		var activeState = jQuery('#menu-container .menu-list').hasClass('active');
		jQuery('#menu-container .menu-list').animate({
			right: activeState ? '0%' : '-100%'
		}, 400);
	}
	jQuery('.alt-menu-btn').on ("click" , function(event) {
		event.stopPropagation();
		jQuery('.hamburger-menu').toggleClass('open');
		jQuery('.menu-list').toggleClass('active');
		slideMenu();

		jQuery('body').toggleClass('overflow-hidden');
	});
},



switchOpen: function (){
	$('.color-switcher .open').on("click", function() {
		$('.color-switcher').toggleClass("open-switcher");
	});
},


countDown:  function (){
	$('.coming-countdown').each(function() {
        let date = $(this).data('date');
    
        let countDone = false;
        let countdown = { days: '00', hours: '00', mintues: '00', seconds: '00' };
        let countInterval = null;
        
        let countdownDays = $(this).find('.days .number');
        let countdownHours = $(this).find('.hours .number');
        let countdownMinutes = $(this).find('.minutes .number');
        let countdownSeconds = $(this).find('.seconds .number');
    
        const updateTime = () => {
            if (countDone) clearInterval(countInterval);
        
            // Set the date we're counting down to
            let countDownDate = new Date(date).getTime();
        
            // Get today's date and time
            let now = new Date().getTime();
        
            // Find the distance between now and the count down date
            let distance = countDownDate - now;
        
            if (distance < 0) {
                countDone = true;
                countdown.days = countdown.hours = countdown.minutes = countdown.seconds = '00';
            } else {
                // Time calculations for days, hours, minutes and seconds
                countdown.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                countdown.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                countdown.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                countdown.seconds = Math.floor((distance % (1000 * 60)) / 1000);
            }
            
            countdownDays.html(countdown.days);
            countdownHours.html(countdown.hours);
            countdownMinutes.html(countdown.minutes);
            countdownSeconds.html(countdown.seconds);
            
        }
        
        //Start Coutndown
        updateTime();
    
        countInterval = setInterval(() => {
            updateTime()
        }, 1000);
    })

},

quickScroll: function (){
	$(window).on("scroll", function() {
		if ($(this).scrollTop() > 200) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	$('.scrollup').on("click", function()  {
		$("html, body").animate({
			scrollTop: 0
		}, 800);
		return false;
	});
},



}
}
jQuery(document).ready(function (){
	Genius.init();
});

})();
