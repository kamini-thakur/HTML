jQuery(document).ready(function($) {
	'use strict';

	
	var pageNum = parseInt(mnky_infinite_scroll.startPage) + 1,
		max = parseInt(mnky_infinite_scroll.maxPages),
		wrapper = $('#content'),
		button = $('#load-posts');

	// Add post wrapper
	if(pageNum <= max) {
		button.before('<div class="ajax-placeholder-'+ pageNum +' clearfix" style="width:100%; height:0px; overflow:hidden;"></div>');
	} else {
		button.find('span').hide();
		button.find('.bttn-no-posts').show();
		return;
	}	
	
	// The link of the next/previous page of posts.
	var nextLink = mnky_infinite_scroll.nextLink;	
		nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);

		
	
	$(window).scroll(function() {
		if( $(this).scrollTop() >= wrapper.offset().top + wrapper.outerHeight() - window.innerHeight && ! wrapper.hasClass('loading-posts') ) {	

			if(pageNum <= max) {

				var placeholder = wrapper.find('.ajax-placeholder-'+ pageNum);
				
				button.find('span').hide();
				button.find('.bttn-loading').show();
				wrapper.addClass('loading-posts');
				
				placeholder.fadeTo(1, 0).load(nextLink + ' article.archive-layout', function() {
					
					// Update page number and nextLink.
					pageNum++;					
					nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);

					// Wait for images
					var images = placeholder.find('img').length;
					if( images != 0 ) {
						placeholder.find('img').load(function() {
							images--;
							if( images == 0 ) {
								// Display content
								placeholder.css('height', 'auto').css('overflow', '').fadeTo(800, 1);
								wrapper.removeClass('loading-posts');
												
								// Update the button message.
								if(pageNum <= max) {
									button.find('span').hide();
									button.find('.bttn-load').show();
								} else {
									button.find('span').hide();
									button.find('.bttn-no-posts').show();
								}
							}
						});
					} else {
						// Display content
						placeholder.css('height', 'auto').css('overflow', '').fadeTo(800, 1);
						wrapper.removeClass('loading-posts');
										
						// Update the button message.
						if(pageNum <= max) {
							button.find('span').hide();
							button.find('.bttn-load').show();
						} else {
							button.find('span').hide();
							button.find('.bttn-no-posts').show();
						}					
					}					
									
					// Add a new placeholder, for when user clicks again.
					button.before('<div class="ajax-placeholder-'+ pageNum +' clearfix" style="width:100%; height:0px; overflow:hidden;"></div>');							
				});
				
			} else {
				button.find('span').hide();
				button.find('.bttn-no-posts').show();
			}	
			
			return false;
		}
	});
});