jQuery(document).ready(function($) {
	'use strict';

	
	var pageNum = parseInt(mnky_load_post.startPage) + 1,
		max = parseInt(mnky_load_post.maxPages),
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
	var nextLink = mnky_load_post.nextLink;	
		nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);


	
	button.click(function() {

		if(pageNum <= max) {
			
			var placeholder = $('#content .ajax-placeholder-'+ pageNum);
			
			button.find('span').hide();
			button.find('.bttn-loading').show();
			
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
							placeholder.css('height', '').css('overflow', '').fadeTo(800, 1);
							
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
					placeholder.css('height', '').css('overflow', '').fadeTo(800, 1);
					
					// Update the button message.
					if(pageNum <= max) {
						$button.find('span').hide();
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
	});

});