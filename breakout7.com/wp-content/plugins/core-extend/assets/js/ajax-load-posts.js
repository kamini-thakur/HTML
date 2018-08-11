jQuery(document).ready(function($) {
	'use strict';

	$('.mnky-posts.ajax-load-posts').each(function() {
			
		var wrapper = $(this),
			id = wrapper.data('id'),
			variableName = eval('mnky_lp_' + id),
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

			
		button.click(function() {
		
			if(pageNum <= max) {
				
				var placeholder = wrapper.find('.mp-ajax-placeholder-'+ pageNum);
				
				button.find('span').hide();
				button.find('.mp-loading').show();

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
							
						// Update the button message.
						if(pageNum <= max) {
							button.find('span').hide();
							button.find('.mp-load').show();
						} else {
							button.find('span').hide();
							button.find('.mp-all-loaded').show();
						}
					}
			
					button.before('<div class="mp-ajax-placeholder mp-ajax-placeholder-'+ pageNum +' clearfix" style="width:100%; height:0px; overflow:hidden;"></div>');
						
				});
				
			} else {
				button.find('span').hide();
				button.find('.mp-all-loaded').show();
			}	
			
			return false;
		});
	});	
});