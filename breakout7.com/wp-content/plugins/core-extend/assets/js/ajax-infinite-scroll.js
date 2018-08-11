jQuery(document).ready(function($) {
	'use strict';

	$('.mnky-posts.ajax-infinite-scroll').each(function() {
			
		var wrapper = $(this),
			id = wrapper.data('id'),
			variableName = eval('mnky_is_' + id),
			pageNum = parseInt(variableName.startPage) + 1,
			max = parseInt(variableName.maxPages),
			button = wrapper.find('.mp-load-posts');
		
		
		// Add post wrapper
		if(pageNum <= max) {
			button.before('<div class="mp-ajax-placeholder mp-ajax-placeholder-'+ pageNum +' clearfix" style="width:100%; height:0px; overflow:hidden;"></div>');
		} else {
			button.find('span').hide();
			button.find('.mp-all-loaded').show();
			return;
		}
		
		// The link of the next/previous page of posts.
		var nextLink = variableName.nextLink;	
			nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);
		

		$(window).scroll(function() {
			if( $(window).scrollTop() >= wrapper.offset().top + wrapper.outerHeight() - window.innerHeight && ! wrapper.hasClass('loading-posts') ) {		

				if(pageNum <= max) {
					
					var placeholder = wrapper.find('.mp-ajax-placeholder-'+ pageNum);
					
					button.find('span').hide();
					button.find('.mp-loading').show();
					wrapper.addClass('loading-posts');
					
					placeholder.fadeTo(1, 0).load(nextLink + ' .mnky-posts[data-id="' + id + '"] .mp-container', function() {
					
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
									placeholder.css('height', '').css('overflow', '').fadeTo(800, 1);
									wrapper.removeClass('loading-posts');
									
									// Update the button message.
									if(pageNum <= max) {
										button.find('span').hide();
										button.find('.mp-load').show();
									} else {
										button.find('span').hide();
										button.find('.mp-all-loaded').show();
									}
								}
							});
						} else {
							// Display content
							placeholder.css('height', '').css('overflow', '').fadeTo(800, 1);
							wrapper.removeClass('loading-posts');
		
							// Update the button message.
							if(pageNum <= max) {
								button.find('span').hide();
								button.find('.mp-load').show();
							} else {
								button.find('span').hide();
								button.find('.mp-all-loaded').show();
							}
						}
				
							
						// Add a new placeholder, for when user clicks again.
						button.before('<div class="mp-ajax-placeholder mp-ajax-placeholder-'+ pageNum +' clearfix" style="width:100%; height:0px; overflow:hidden;"></div>');
													
					});
					
				} else {
					button.find('span').hide();
					button.find('.mp-all-loaded').show();
				}	
			
				return false;
			}
		});
	});	
});