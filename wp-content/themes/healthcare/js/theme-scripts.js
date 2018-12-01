jQuery(document).ready(function() {
	if( jQuery(window).width() > 768) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   jQuery('.nav li.dropdown-menu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	
	jQuery('li.dropdown').find('.fa-plus').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 767) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
});
 
			jQuery(document).ready(function(){
				jQuery("area[rel^='prettyPhoto']").prettyPhoto();
				
				jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				jQuery("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				jQuery("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});


	jQuery(document).ready(function () {	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 150) {
				jQuery('.enigma_scrollup').fadeIn();
				jQuery('.menu').addClass('sticky-header');
			} else {
				jQuery('.enigma_scrollup').fadeOut();
				jQuery('.menu').removeClass('sticky-header');
			}
		});
	
		jQuery('.enigma_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	
	});	

	
	jQuery.browser = {};
			(function () {
				jQuery.browser.msie = false;
				jQuery.browser.version = 0;
				if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
					jQuery.browser.msie = true;
					jQuery.browser.version = RegExp.$1;
				}
			})();
			
//owl 
 jQuery(document).ready(function() {
      jQuery("#owl-demo").owlCarousel({
	   slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
	   autoplay:true,
		navigation: true,
		navigationText: [
      "<span class='fa fa-angle-left  icon-white'></span>",
      "<span class='fa fa-angle-right icon-white'></span>"
      ],
	});
  });
  
   jQuery(document).ready(function() {
      jQuery("#owl-demo1").owlCarousel({ 
		ltr:true,
		 loop:true,
		items :4,
		 nav:true,
		autoplay:true,
		navigation: true,
	    navigationText: [
      "<span class='fa fa-angle-left  icon-white'></span>",
      "<span class='fa fa-angle-right icon-white'></span>"
      ],
	});
  });
  
   jQuery(document).ready(function() {
      jQuery("#owl-demo2").owlCarousel({
	  ltr:true,
	   loop:true,
	   items :4,
	    nav:true,
	   	autoplay:true,
		navigation: true,
	    navigationText: [
   
      ],
	});
  });
  
  jQuery(document).ready(function() {
	   new WOW().init();
      jQuery("#owl-demo").owlCarousel({
    navigation: true,
    navigationText: [
      "<i class='icon-chevron-left icon-white'></i>",
      "<i class='icon-chevron-right icon-white'></i>"
      ],
   });
  });