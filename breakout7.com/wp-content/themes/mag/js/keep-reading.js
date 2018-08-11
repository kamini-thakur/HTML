jQuery(document).ready(function($) {
	'use strict';

	var wrapper = $('.keep-reading-wrapper');
	
	$(window).scroll(function() {
		if( $(this).scrollTop() >= wrapper.offset().top + wrapper.outerHeight() - window.innerHeight ) {	

			if( wrapper.find('article').hasClass('keep-reading-post') ){	
				wrapper.find('.keep-reading-post').first().css( 'opacity', 0 ).show().animate({ opacity: 1 }, 800).removeClass('keep-reading-post');
			}
			
		}
	});
});