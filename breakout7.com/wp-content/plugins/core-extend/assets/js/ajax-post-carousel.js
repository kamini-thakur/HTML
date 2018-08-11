jQuery(document).ready(function($) {
	'use strict';
	
	$('.mnky-posts.ajax-post-carousel').each(function() {
		
		var wrapper = $(this),
			id = wrapper.data('id'),
			variableName = eval('mnky_pc_' + id),
			pageNum = parseInt(variableName.startPage) + 1,
			pageNumBack = parseInt(variableName.startPage) - 1,
			max = parseInt(variableName.maxPages),
			button_back = wrapper.find('.mp-load-posts a.mp-load-back'),
			button_next = wrapper.find('.mp-load-posts a.mp-load-next'),
			loader = wrapper.find('.mp-ajax-loader');
		
		// Wrap all post containers
		wrapper.find('.mp-container').wrapAll( '<div class="mp-ajax-placeholder clearfix"></div>' );	
		
		if(pageNum <= max) {
			if(pageNumBack < 1) {
				button_back.addClass('mp-last-page');
			}
		} else {	
			button_next.addClass('mp-last-page');
			button_back.addClass('mp-last-page');
			return;
		}
		
		// The link of the next/previous page of posts.
		var nextLink = variableName.nextLink;	
		nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);
		
		var backLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNumBack);
		var placeholder = wrapper.find('.mp-ajax-placeholder');

		
		button_next.click(function() {

			if(pageNum <= max) {
				
				var placeholder_height = placeholder.height();
				
				loader.fadeTo(500, 1);
				button_back.removeClass('mp-last-page');
				placeholder.fadeTo(300, 0);
				
				setTimeout(function(){
					placeholder.height( placeholder_height ).load(nextLink + ' .mnky-posts[data-id="' + id + '"] .mp-container', function() {
						
						// Wait for images
						var images = placeholder.find('img').length;
						if( images != 0 ) {
							placeholder.find('img').load(function() {
								images--;
								if( images == 0 ) {
									// Display content
									loader.fadeTo(300, 0);
									placeholder.fadeTo(800, 1).css('height', '');
								}
							});
						} else {
							// Display content
							loader.fadeTo(300, 0);
							placeholder.fadeTo(800, 1).css('height', '');
						}
						
						// Update page number and nextLink & backLink.
						pageNum++;
						pageNumBack++;

						nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);
						backLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNumBack);

						// Update the button.
						if( pageNum > max) {
							button_next.addClass('mp-last-page');
						}
					});
				}, 300);
			}
			
			return false;
		});	
		
		
		button_back.click(function() {

			if(pageNumBack >= 1) {
				
				var placeholder_height =  placeholder.height();
				
				loader.fadeTo(500, 1);
				button_next.removeClass('mp-last-page');
				placeholder.fadeTo(300, 0);
				
				setTimeout(function(){
					placeholder.height( placeholder_height ).load(backLink + ' .mnky-posts[data-id="' + id + '"] .mp-container', function() {
						
						// Wait for images
						var images = placeholder.find('img').length;
						if( images != 0 ) {
							placeholder.find('img').load(function() {
								images--;
								if( images == 0 ) {
									// Display content
									loader.fadeTo(300, 0);
									placeholder.fadeTo(800, 1).css('height', '');
								}
							});
						} else {
							// Display content
							loader.fadeTo(300, 0);
							placeholder.fadeTo(800, 1).css('height', '');
						}
						
						// Update page number and nextLink & backLink.
						pageNum--;
						pageNumBack--;

						nextLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNum);
						backLink = nextLink.replace(/\/page\/\d+/, '/page/'+ pageNumBack);

						// Update the button message.
						if(pageNumBack < 1) {
							button_back.addClass('mp-last-page');
						}
					
					});
				}, 300);
			}
			
			return false;
		});
	});
});