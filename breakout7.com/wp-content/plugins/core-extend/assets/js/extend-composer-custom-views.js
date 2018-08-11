(function($) {
	"use strict";

	window.MNKYIconView = vc.shortcode_view.extend({
		changeShortcodeParams: function (model) {
			var params = model.get('params'),
				settings = vc.map[model.get('shortcode')],
				inverted_value;
			if (_.isArray(settings.params)) {
				_.each(settings.params, function (p) {
					if (!_.isUndefined(p.admin_label) && p.admin_label) {
						var name = p.param_name,
							value = params[name],
							$wrapper = this.$el.find('> .wpb_element_wrapper'),
							$admin_label = $wrapper.children('.admin_label_' + name);

						if ($admin_label.length) {
							if (value === '' || _.isUndefined(value)) {
								$admin_label.hide().addClass('hidden-label');
							} else {
								if (name == 'icon_type') {
									// Get icon class to display
									if (!_.isUndefined(params["icon_" + value])) {
										value = vc_toTitleCase(value) + ' - ' + "<i class='" + params["icon_" + value] + "'></i>";
									}
								}
								$admin_label.html('<label>' + $admin_label.find('label').text() + '</label>: ' + value);
								$admin_label.show().removeClass('hidden-label');
							}
						}
					}
				}, this);
			}
			var view = vc.app.views[this.model.get('parent_id')];
			if (this.model.get('parent_id') !== false && _.isObject(view)) {
				view.checkIsEmpty();
			}
		}
	});
	

	window.MNKYPostView = vc.shortcode_view.extend( {
		changeShortcodeParams: function ( model ) {
			var params;

			window.MNKYPostView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) ) {
				if( ! this.$el.find( '> .wpb_element_wrapper .taxonomy').hasClass('mgp_wrapped') ){
					this.$el.find( '> .wpb_element_wrapper .taxonomy' ).addClass('mgp_wrapped').wrapAll( '<div class="mgp_params_wrapper" />');
				}
						
				if ( params.taxonomy == 'all_posts' ) {
					this.$el.find( '> .wpb_element_wrapper .taxonomy' ).html('<span class="taxonomy-all">Show all posts</span>');
					this.$el.find( '> .wpb_element_wrapper .admin_label_author' ).hide();
				} else if ( params.taxonomy == 'author' ) {
					this.$el.find( '> .wpb_element_wrapper .admin_label_author' ).show().addClass('taxonomy-all');
					this.$el.find( '> .wpb_element_wrapper .admin_label_author label' ).text('Posts by');
					this.$el.find( '> .wpb_element_wrapper .taxonomy' ).html('');
				} else if ( params.taxonomy == 'custom' ) {
					this.$el.find( '> .wpb_element_wrapper .admin_label_author' ).hide();
					this.$el.find( '> .wpb_element_wrapper .taxonomy' ).html('<span class="taxonomy-all">Custom query</span>');
				} else {
					this.$el.find( '> .wpb_element_wrapper .admin_label_author' ).hide();
					
					if ( params.taxonomy == 'category' ) {
						if ( params.category ) {
							var list = params.category;
							var listAsArray = list.split(', ');
							var newListHtml = '';
							for(var i=0; i<listAsArray.length; i++) {
								newListHtml += '<span class="selected-taxonomy '+ params.tax_operator.replace(/ /g, '_') +'">';
								newListHtml += listAsArray[i];
								newListHtml += '</span>';
							}
							var finalOutput = newListHtml;
						} else {
							var finalOutput = '<span class="taxonomy-all">No category selected.</span>';
						}						
					} else if( params.taxonomy == 'post_tag' ){					
						if ( params.tag ) {
							var list = params.tag;
							var listAsArray = list.split(', ');
							var newListHtml = '';
							for(var i=0; i<listAsArray.length; i++) {
								newListHtml += '<span class="selected-taxonomy '+ params.tax_operator.replace(/ /g, '_') +'">';
								newListHtml += listAsArray[i];
								newListHtml += '</span>';
							}
							var finalOutput = newListHtml;
						} else {
							var finalOutput = '<span class="taxonomy-all">No tag selected.</span>';
						}			
					} 
					
					if ( params.taxonomy_2 == 'category' ) {
						if ( params.category_2 ) {
							var list = params.category_2;
							var listAsArray = list.split(', ');
							var newListHtml = '';
							for(var i=0; i<listAsArray.length; i++) {
								newListHtml += '<span class="selected-taxonomy '+ params.tax_operator_2.replace(/ /g, '_') +'">';
								newListHtml += listAsArray[i];
								newListHtml += '</span>';
							}
							var finalOutput_2 = '<span class="tax-relation">' + params.tax_relation + '</span>' + newListHtml;
						} else {
							var finalOutput_2 = '<span class="tax-relation">' + params.tax_relation + '</span><span class="taxonomy-all">No category selected.</span>';
						}						
					} else if( params.taxonomy_2 == 'post_tag' ){			
						if ( params.tag_2 ) {
							var list = params.tag_2;
							var listAsArray = list.split(', ');
							var newListHtml = '';
							for(var i=0; i<listAsArray.length; i++) {
								newListHtml += '<span class="selected-taxonomy '+ params.tax_operator_2.replace(/ /g, '_') +'">';
								newListHtml += listAsArray[i];
								newListHtml += '</span>';
							}
							var finalOutput_2 = '<span class="tax-relation">' + params.tax_relation + '</span>' + newListHtml;
						} else {
							var finalOutput_2 = '<span class="tax-relation">' + params.tax_relation + '</span><span class="taxonomy-all">No tag selected.</span>';
						}			
					} else {
						var finalOutput_2 = '';
					}
					
					this.$el.find( '> .wpb_element_wrapper .taxonomy' ).html( finalOutput + finalOutput_2);
					
				} 
			}
		}
	} );	


})(window.jQuery);