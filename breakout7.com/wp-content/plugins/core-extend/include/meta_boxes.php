<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Custom extension meta boxes
*	--------------------------------------------------------------------- 
*/


add_action( 'admin_init', 'mnky_custom_extension_meta_boxes', 11 );

function mnky_custom_extension_meta_boxes() {
	
	$mnky_meta_post_views = array(
		'id'          => 'mnky_post_views',
		'title'       => esc_html__( 'Edit Post Views', 'core-extend' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_post_views_count',
				'type'        => 'text',
				'std'         => '',
				'desc'        => '',
			)
		)
	);
	
	$mnky_meta_featured_image_caption = array(
		'id'          => 'mnky_featured_image_caption',
		'title'       => esc_html__( 'Featured image caption', 'core-extend' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_featured_image_caption_text',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Optional caption text for the featured image. Simple HTML allowed. *If featured image in content is disabled, will be displayed below header image, if present.', 'core-extend' )
			)
		)
	);
	
	$mnky_meta_custom_post_link= array(
		'id'          => 'mnky_custom_post_link',
		'title'       => esc_html__( 'Custom url for link post type', 'core-extend' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_custom_post_link_url',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Optional custom url for the link post type. Applied to title and featured image in blog view. Supports external links.', 'core-extend' )
			)
		)
	);
	
	$mnky_meta_post_reviews = array(
		'id'          => 'mnky_post_reviews',
		'title'       => esc_html__( 'Product Review', 'core-extend' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(		
			array(
			'label'       => esc_html__( 'Enable Reviews', 'core-extend' ),
			'id'          => 'mnky_enable_review',
			'type'        => 'on-off',
			'desc'        => esc_html__( 'Add review functionality to this post.', 'core-extend' ),
			'std'         => 'off'	
			),
			array(
				'label'       => esc_html__( 'Review position', 'core-extend'),
				'id'          => 'mnky_review_position',
				'type'        => 'select',
				'choices'     => array( 
					array(
						'value'       => 'top',
						'label'       => esc_html__( 'Top of the post', 'core-extend' ),
						'src'         => ''
					),
					array(
						'value'       => 'bottom',
						'label'       => esc_html__( 'Bottom of the post', 'core-extend' ),
						'src'         => ''
					)
				),	
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Choose where review will appear', 'core-extend' )
			),
			array(
				'label'       => esc_html__( 'Review title', 'core-extend'),
				'id'          => 'mnky_review_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Name this review', 'core-extend' )
			),
			array(
				'label'       => esc_html__( 'Overall rating', 'core-extend'),
				'id'          => 'mnky_review_overall_rating',
				'type'        => 'numeric-slider',
				'std'         => '5',
				'min_max_step'=> '0,10,0.1',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Give overall rating from 0 to 10 to this product.', 'core-extend' )
			),
			array(
				'label'       => esc_html__( 'Use review breakdown', 'core-extend' ),
				'id'          => 'mnky_review_breakdown',
				'type'        => 'on-off',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'If this option is active, overall review rating will be calculated from the ratings in the list.', 'core-extend' ),
				'std'         => 'off'
			), 	
			array(
				'label'       => esc_html__( 'Review ratings breakdown', 'core-extend' ),
				'id'          => 'mnky_review_ratings',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Rate product from various aspects, e.g., "Design, Features, Performance"', 'core-extend' ),
				'condition'   => 'mnky_enable_review:is(on),mnky_review_breakdown:is(on)',
				'class'       => 'child-options child-first child-last',	
				'settings'    => array( 
				array(
					'id'          => 'mnky_review_aspect_name',
					'label'       => esc_html__( 'Name', 'core-extend' ),
					'std'         => '',
					'type'        => 'text',
					'desc'        => esc_html__( 'Name this review aspect,  e.g., "Design"', 'core-extend' ),
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'mnky_review_aspect_rating',
					'label'       => esc_html__( 'Rating', 'core-extend' ),
					'desc'        => '',
					'type'        => 'numeric-slider',
					'std'         => '5',
					'min_max_step'=> '0,10,0.1',
					'operator'    => 'and'
				  )
				)
			),
			array(
				'label'       => esc_html__( 'Good things', 'core-extend' ),
				'id'          => 'mnky_review_good_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing good things in this product, e.g, "The Good"', 'core-extend' )
			),
			array(
				'label'       => '',
				'id'          => 'mnky_review_good',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was good in this product', 'core-extend' )
			),
			array(
				'label'       => esc_html__( 'Bad things', 'core-extend' ),
				'id'          => 'mnky_review_bad_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing bad things in this product, e.g, "The Bad"', 'core-extend' )
			),
			array(
				'label'       => '',
				'id'          => 'mnky_review_bad',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was bad in this product', 'core-extend' )
			),
			array(
				'label'       => esc_html__( 'Bottom line', 'core-extend' ),
				'id'          => 'mnky_review_bottomline_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing the bottom line of this product, e.g, "The Bottom Line"', 'core-extend' )
			),
			array(
				'label'       => '',
				'id'          => 'mnky_review_bottomline',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'So what is the bottom line for this product?', 'core-extend' )
			),
			array(
				'label'       => esc_html__( 'Custom content', 'core-extend' ),
				'id'          => 'mnky_review_custom_field',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add any custom content here, shortcodes are allowed', 'core-extend' )
			)
		)
	);
	
	$mnky_meta_ads = array(
		'id'          => 'mnky_ads_options',
		'title'       => esc_html__( 'Ad Options', 'core-extend' ),
		'desc'        => '',
		'pages'       => array( 'ads' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(			
			array(
				'label'       => esc_html__( 'URL', 'core-extend' ),
				'id'          => 'mnky_ad_url',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Include %1$s %2$s or %3$s', '%1$s, %2$s, %3$s stand for protocol types.' ,'core-extend' ), '<code>http://</code>', '<code>https://</code>', '<code>//</code>')
			),
			array(
				'id'          => 'mnky_ad_url_target',
				'label'       => esc_html__( 'Target', 'core-extend' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => esc_html__( 'The target attribute specifies how to open the link.', 'core-extend' ),
				'choices'     => array( 
					array(
						'value'       => '_blank',
						'label'       => esc_html__( '_blank (opens in new window or tab)', 'core-extend' ),
						'src'         => ''
					),
					array(
						'value'       => '_self',
						'label'       => esc_html__( '_self (opens in the same frame as it was clicked)', 'core-extend' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'mnky_ad_url:not()'
			),			
			array(
				'id'          => 'mnky_ad_url_rel',
				'label'       => esc_html__( 'Use rel="nofollow"', 'core-extend' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => sprintf( wp_kses_post( _x( 'Specifies the relationship between the current document and the linked document. %1$s <a href="%2$s">Should I use it?</a>', '%1$s stands for line break, %2$s stands for linked page.','core-extend' ) ), '<br/>', esc_url( 'https://support.google.com/webmasters/answer/96569?hl=en' ) ),
				'choices'     => array( 
					array(
						'value'       => '',
						'label'       => esc_html__( 'No', 'core-extend' ),
						'src'         => ''
					),
					array(
						'value'       => 'rel=nofollow',
						'label'       => esc_html__( 'Yes', 'core-extend' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'mnky_ad_url:not()'
			),
			array(
				'label'       => esc_html__( 'Alternative text', 'core-extend' ),
				'id'          => 'mnky_ad_alt_text',
				'type'        => 'text',
				'desc'        => esc_html__( 'Add text for alt attribute.', 'core-extend' )
			),	
			array(
				'label'       => esc_html__( 'Advertisement block width', 'core-extend' ),
				'id'          => 'mnky_ad_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block width, e.g. %s', '%s stands for example value, do not delete it.' ,'core-extend' ), '<code>140px</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement block height (optional)', 'core-extend' ),
				'id'          => 'mnky_ad_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block height, e.g. %1$s %2$s Will cut off ad block, if value smaller than actual ad size used.', '%1$s stands for example value, %2$s stands for line break.' ,'core-extend' ), '<code>440px</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block position (optional)', 'core-extend' ),
				'id'          => 'mnky_ad_position',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block position using css margin: property. %1$s For example %2$s will center the ad inside.', '%1$s stands for line break, %2$s stands for example value.' ,'core-extend' ), '<br/>', '<code>0 auto</code>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block float (optional)', 'core-extend' ),
				'id'          => 'mnky_ad_float',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block float using css float: property. %1$s For example %2$s will float ad to the left side.', '%1$s stands for line break, %2$s stands for example value.' ,'core-extend' ), '<br/>', '<code>left</code>')
			),
			array(
				'id'          => 'mnky_ad_image',
				'label'       => esc_html__( 'Advertisement Image', 'core-extend' ),
				'desc'        => esc_html__( 'Choose advertisement image.', 'core-extend' ),
				'std'         => '',
				'type'        => 'upload'
			),
			array(
				'label'       => esc_html__( 'Advertisement image width', 'core-extend' ),
				'id'          => 'mnky_ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value, do not delete it.' ,'core-extend' ), '<code>140</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement image height', 'core-extend' ),
				'id'          => 'mnky_ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'core-extend' ), '<code>400</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image', 'core-extend' ),
				'id'          => 'mnky_responsive_ad',
				'type'        => 'on-off',
				'desc'        => esc_html__('Use different image for smaller screens', 'core-extend' ),
				'std'         => 'off'
			), 
			array(
				'label'       => esc_html__( 'Advertisement Image', 'core-extend' ),
				'id'          => 'mnky_responsive_ad_image',
				'std'         => '',
				'type'        => 'upload',
				'desc'        => esc_html__( 'Choose advertisement image for screens below 979px (Tablet portrait) and below 1024px (Tablet landscape), if placed in header widget area.', 'core-extend' ),
				'condition'   => 'mnky_responsive_ad:is(on)',
				'class'       => 'child-options child-first'				
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image width', 'core-extend' ),
				'id'          => 'mnky_responsive_ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value. Do not delete it.', 'core-extend' ), '<code>140</code>'),
				'condition'   => 'mnky_responsive_ad:is(on)',
				'class'       => 'child-options'				
			),			
			array(
				'label'       => esc_html__( 'Responsive advertisement image height', 'core-extend' ),
				'id'          => 'mnky_responsive_ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'core-extend' ), '<code>400</code>', '<br/>'),
				'condition'   => 'mnky_responsive_ad:is(on)',
				'class'       => 'child-options child-last'				
			),
			array(
				'label'       => esc_html__( 'Hide ad on mobiles', 'core-extend' ),
				'id'          => 'mnky_hide_responsive_ad',
				'type'        => 'on-off',
				'desc'        =>  esc_html__( 'Hide advertisement on screens smaller than 767px (Mobile phones).', 'core-extend' ),
				'std'         => 'off'
			), 
			array(
				'label'       => esc_html__( 'Label', 'core-extend' ),
				'id'          => 'mnky_ad_note',
				'type'        => 'text',
				'desc'        => esc_html__( 'Optional label under advertisement, e.g. "Sponsored" or "Advertisement".', 'core-extend' )
			),	
			array(
				'label'       => '',
				'id'          => 'mnky_ads_textblock',
				'type'        => 'textblock',
				'desc'        => '<div class="section-title">'. esc_html__( 'If you use Custom HTML, you can leave fields above empty.', 'core-extend' ) .'</div>'
			),			
			array(
				'label'       => esc_html__( 'Custom HTML', 'core-extend' ),
				'id'          => 'mnky_ad_html',
				'type'        => 'textarea',
				'rows'        => '14',
				'desc'        => esc_html__( 'Insert any custom code.', 'core-extend' )
			)
		)
	);
	
  
	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $mnky_meta_post_views );
		ot_register_meta_box( $mnky_meta_ads );
		ot_register_meta_box( $mnky_meta_featured_image_caption );
		ot_register_meta_box( $mnky_meta_custom_post_link );
		ot_register_meta_box( $mnky_meta_post_reviews );
	}
}