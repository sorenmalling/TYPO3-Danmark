function setup_nav()
{
	// elements
	var nav = $('div.menu');
	var nav_ul = $('div.menu ul.menu-header');
	var fake_nav = $('ul.menu-items');
	var nav_orig_y = nav.position().top;

	// vars
	var window_y = 0;
	var nav_ul_visible = false;

	$(window).scroll(function(eventObject){

		window_y = $(window).scrollTop();
		
		if(window_y > nav_orig_y) {
			fake_nav.fadeOut();
			$('.header').animate({'height' : '25px'}, 90);
			$('.header').removeClass('header-logo-full');
			$('.header').addClass('header-logo-mini');
		} else {
			$('.header').animate({'height' : '125px'}, 90);
			fake_nav.fadeIn();
			$('.header').addClass('header-logo-full');
			$('.header').removeClass('header-logo-mini');
		}
		// fake nav
		/*if(window_y >= (nav_orig_y - 120))
		{

			if(!nav_ul_visible)
			{
				nav_ul_visible = true;

				nav.find('h2').animate({'margin-left' : '95px', 'opacity' : 0.5}, 500, function(){
					if(nav_ul_visible)
					{
						nav.find('h3').animate({'opacity' : '1'}, 500);
					}
				});

				fake_nav.css({'display' : 'none'});
				nav_ul.animate({'opacity' : 1}, 300);
			}
		}
		else if(window_y < (nav_orig_y - 40))
		{
			

			if(nav_ul_visible)
			{
				nav_ul_visible = false;

				nav.find('h3').stop().animate({'opacity' : '0'}, 300);
				nav.find('h2').animate({'margin-left' : '0px', 'opacity' : 1}, 500);

				fake_nav.css({'display' : 'block'});
				nav_ul.animate({'opacity' : 0}, 300);
			}
		}*/

		// nav
		/*if(window_y >= nav_orig_y)
		{
			$('.header').animate({'height' : '15px'}, 300);
			//nav.css({'position' : 'fixed', 'top' : 0});
		}
		else if(window_y < nav_orig_y)
		{
			$('.header').animate({'height' : '120px'}, 300);
			//nav.css({'position' : 'absolute', 'top' : 'auto'});
		}*/

		// nav ul
		/*if(window_y < (nav_orig_y - 36))
		{
			nav_ul.css({'margin-top' : '-' + ((nav_orig_y - 36) - window_y) + 'px'});
		}*/


	}).trigger('scroll');
}

$(document).ready(function() {

	$(window).scroll(function(eventObject){
//		console.log($(window).position());
		//console.log($("div.content").offset());
	});
	
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop != 0) {
			$('div.header').removeClass('header-logo-full');
			$('div.header').stop().animate({'height':'25'},400, function() {
				$('div.header').addClass('header-logo-mini');
			});
			
			
		} else {
			$('div.header').removeClass('header-logo-mini');
			$('div.header').stop().animate({'height':'125'},400, function() {
				$('div.header').addClass('header-logo-full');
			});
		}
	});
	

	//setup_nav();
	
	/*$(window).bind('scroll', function(){
		if($(this).height() > 120) {
			$('div.menu ul.menu-items').fadeOut();
			$('.header').animate({'height' : '25px'}, 90);
			$('.header').removeClass('header-logo-full');
			$('.header').addClass('header-logo-mini');
		} else {
			$('.header').animate({'height' : '125px'}, 90);
			$('div.menu ul.menu-items').fadeIn();
			$('.header').removeClass('header-logo-mini');
			$('.header').addClass('header-logo-full');
		}
	});*/
	
	/*jQuery(document).ready(function() {
    jQuery('#news-items').jCarouselLite({
		//vertical: true,
		horizontal: true,
		hoverPause:true,
		visible: 1,
		auto:5000,
		speed:2000
    });
});*/

	
});
