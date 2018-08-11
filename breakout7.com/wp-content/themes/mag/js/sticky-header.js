jQuery(document).ready(function($) {
	'use strict'; 
	
	// Sticky header
	$(window).scroll(function() {
		var scrolled = $(this).scrollTop(),
		wrapper = $('#header-wrapper'),
		headerOffset = $('#site-header').offset().top;
				
		if(scrolled > headerOffset) {
			wrapper.addClass('header-sticky');
			wrapper.css({ 'top' : '0px' });
		} else {
			wrapper.removeClass('header-sticky');
			wrapper.css({ 'top' : '' });
		}
		
	});
	
	
	// Trigger scroll
	setTimeout( function(){ 
		$(window).scroll();
	}, 500 );
	
});