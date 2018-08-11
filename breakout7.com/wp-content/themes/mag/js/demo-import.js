jQuery(document).ready(function($) {
	"use strict";
	
			jQuery('.button-install-demo').live('click', function(e) {
				var selectedDemo = jQuery(this).data('demo-name');
			
				var data = {
					action: 'mnky_importer',
					demo_type: selectedDemo
				};
				
				jQuery('.importer-notice').hide();
				jQuery('.data-importing').fadeIn();

				jQuery.post(ajaxurl, data, function(response) {
					if( response && response.indexOf('successful') == -1 ) {
						jQuery('.data-imported').fadeIn();
						jQuery('.data-importing').hide();
					} else {
						jQuery('.data-imported').fadeIn();
						jQuery('.data-importing').hide();
					}
				}).fail(function() {
					jQuery('.import-error').fadeIn();
					jQuery('.data-importing').hide();
				});
				
				e.preventDefault();
			});	
	
});