<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Custom theme meta boxes
*	--------------------------------------------------------------------- 
*/


add_action( 'admin_init', 'mnky_custom_meta_boxes' );

function mnky_custom_meta_boxes() {
	
	$mnky_meta_page = array(
		'id'          => 'mnky_page_options',
		'title'       => esc_html__( 'Page Options', 'mag' ),
		'desc'        => '',
		'pages'       => array( 'page'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'id'          => 'general_tab',
				'label'       => esc_html__( 'General', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'mag' ),
				'id'          => 'mnky_custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'mag' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'label'       => esc_html__( 'Custom contrast color for theme accent color', 'mag' ),
				'id'          => 'mnky_custom_accent_contrast_color',
				'desc'        => esc_html__( 'Set different contrast color for accent color. Leave blank for default color.', 'mag' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'id'          => 'mnky_custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'mag' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s 2. Full width layout %1$s 3. Boxed layout', '%1$s stands for line break' ,'mag' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
			),
			array(
				'id'          => 'mnky_custom_body_background',
				'label'       => esc_html__( 'Body background', 'mag' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'mag' ),
				'std'         => '',
				'type'        => 'background',
				'condition'   => 'mnky_custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'mnky_custom_content_width',
				'label'       => esc_html__( 'Content width', 'mag' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website. Leave empty for default.', 'mag' ),
				'std'         => '',
				'type'        => 'text',
			),
			array(
				'id'          => 'header_tab',
				'label'       => esc_html__( 'Header', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'id'          => 'mnky_sticky_header',
				'label'       => esc_html__( 'Sticky header', 'mag' ),
				'desc'        => esc_html__( 'Do you want a header to stick to top while you scroll?', 'mag' ),
				'std'         => '',
				'type'        => 'radio',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Default (set in Theme Options)', 'mag' ),
					'src'         => ''
				  ),				  
				  array(
					'value'       => 'sticky_header_smart',
					'label'       => esc_html__( 'Smart header (sticky only when scrolling up)', 'mag' ),
					'src'         => ''
				  ),
				  array(
					'value'       => 'sticky_header',
					'label'       => esc_html__( 'Always sticky header', 'mag' ),
					'src'         => ''
				  ),
				  array(
					'value'       => 'no_sticky',
					'label'       => esc_html__( 'Disable sticky header', 'mag' ),
					'src'         => ''
				  )
				)
			  ),
			array(
				'label'       => esc_html__( 'Top bar', 'mag' ),
				'id'          => 'mnky_top_bar',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Disable top bar on this page only. If top bar is not enabled in theme options, this setting has no effect.', 'mag' ),
				'std'         => 'on'
			),	
			array(
				'label'       => esc_html__( 'Overlay header', 'mag' ),
				'id'          => 'mnky_header_overlay',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enable overlay header on this page. Overlay header is configured in Theme Options/Header options/Overlay Header.', 'mag' ),
				'std'         => 'off'
			),			
			array(
				'label'       => esc_html__( 'Page title', 'mag' ),
				'id'          => 'mnky_page_title',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Display or hide page title.', 'mag' ),
				'std'         => 'on'
			),
			array(
				'label'       => esc_html__( 'Custom page title styles', 'mag' ),
				'id'          => 'mnky_custom_page_title_styles',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Use custom page title styles for this page.', 'mag' ),
				'std'         => 'off',
				'condition'   => 'mnky_page_title:is(on)'
			),
			array(
				'label'       => esc_html__( 'Title area paddings', 'mag' ),
				'id'          => 'mnky_custom_page_title_paddings',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x('Set custom paddings for title area. Use shorthand format and add size units, e.g., %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>40px 30px</code>'),
				'std'         => '',
				'class'       => 'child-options child-first',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on)'
			),
			array(
				'label'       => esc_html__( 'Title color', 'mag' ),
				'id'          => 'mnky_custom_page_title_text_color',
				'type'        => 'colorpicker_opacity',
				'desc'        => esc_html__( 'Choose custom title text color.', 'mag' ),
				'std'         => '',
				'class'       => 'child-options',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on)'
			),
			array(
				'label'       => esc_html__( 'Background color', 'mag' ),
				'id'          => 'mnky_custom_page_title_background_color',
				'type'        => 'colorpicker_opacity',
				'desc'        => esc_html__( 'Choose custom background color for page title.', 'mag' ),
				'std'         => '',
				'class'       => 'child-options',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on)'
			),
			array(
				'label'       => esc_html__( 'Enable gradient background', 'mag' ),
				'id'          => 'mnky_custom_page_title_background_gradient',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables left to right gradient background for page title area.', 'mag' ),
				'std'         => 'off',
				'class'       => 'child-options',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on)'
			),
			array(
				'label'       => esc_html__( 'Gradient start color', 'mag' ),
				'id'          => 'mnky_custom_page_title_background_gradient_start',
				'type'        => 'colorpicker_opacity',
				'desc'        => esc_html__( 'Choose custom color at gradient start.', 'mag' ),
				'std'         => '',
				'class'       => 'child-options',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on),mnky_custom_page_title_background_gradient:is(on)'
			),
			array(
				'label'       => esc_html__( 'Gradient end color', 'mag' ),
				'id'          => 'mnky_custom_page_title_background_gradient_end',
				'type'        => 'colorpicker_opacity',
				'desc'        => esc_html__( 'Choose custom color at gradient end.', 'mag' ),
				'std'         => '',
				'class'       => 'child-options',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on),mnky_custom_page_title_background_gradient:is(on)'
			),
			array(
				'label'       => esc_html__( 'Enable background image', 'mag' ),
				'id'          => 'mnky_custom_page_title_background_image_switch',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables background image for title area.', 'mag' ),
				'std'         => 'off',
				'class'       => 'child-options',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on)'
			),
			array(
				'label'       => esc_html__( 'Page title background image', 'mag' ),
				'id'          => 'mnky_custom_page_title_background_image',
				'type'        => 'background',
				'desc'        => esc_html__( 'Set custom background image for title area.', 'mag' ),
				'std'         => '',
				'class'       => 'child-options child-last',
				'condition'   => 'mnky_page_title:is(on),mnky_custom_page_title_styles:is(on),mnky_custom_page_title_background_image_switch:is(on)'
			),
			array(
				'id'          => 'precontent_tab',
				'label'       => esc_html__( 'Pre-content', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),			
			array(
				'label'       => esc_html__( 'Pre-content area', 'mag' ),
				'id'          => 'mnky_pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'mag' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => esc_html__( 'Height (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>250px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'mag' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>1200px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Paddings (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_paddings',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area paddings. Example: %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>40px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'mnky_pre_content_bg',
				'label'       => esc_html__( 'Background', 'mag' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'mag' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'mag' ),
				'id'          => 'mnky_pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'mag' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	);
	
	$mnky_meta_post = array(
		'id'          => 'mnky_post_options',
		'title'       => esc_html__( 'Post Options', 'mag' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(
			array(
				'id'          => 'general_tab',
				'label'       => esc_html__( 'General', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'mag' ),
				'id'          => 'mnky_custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'mag' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'label'       => esc_html__( 'Custom contrast color for theme accent color', 'mag' ),
				'id'          => 'mnky_custom_accent_contrast_color',
				'desc'        => esc_html__( 'Set different contrast color for accent color. Leave blank for default color.', 'mag' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'id'          => 'mnky_custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'mag' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s Selected in Appearance / Theme Options / General Options %1$s%1$s 2. Full width layout %1$s3. Boxed layout', '%1$s stands for line break' ,'mag' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
			),
			array(
				'id'          => 'mnky_custom_body_background',
				'label'       => esc_html__( 'Body background', 'mag' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'mag' ), 
				'std'         => '',
				'type'        => 'background',
				'section'     => 'general',
				'condition'   => 'mnky_custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'mnky_custom_content_width',
				'label'       => esc_html__( 'Content width', 'mag' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website. Leave empty for default.', 'mag' ), 
				'std'         => '',
				'type'        => 'text',
				'section'     => 'general',
			),
			array(
				'label'       => esc_html__( 'Top bar', 'mag' ),
				'id'          => 'mnky_top_bar',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Disable top bar on this page only. If top bar is not enabled in theme options, this setting has no effect.', 'mag' ),
				'std'         => 'on'
			),	
			array(
				'id'          => 'post_options_tab',
				'label'       => esc_html__( 'Post settings', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'id'          => 'mnky_post_lead_content',
				'label'       => esc_html__( 'Lead content', 'mag' ),
				'desc'        => esc_html__( 'Optional content displayed below the title. Shortcode enabled. It will not be included into post excerpt.', 'mag' ),
				'std'         => '',
				'type'        => 'textarea',
				'rows'        => '4'
			),
			array(
				'id'          => 'mnky_post_header_style',
				'label'       => esc_html__( 'Header style', 'mag' ),
				'desc'        => sprintf (esc_html_x( '1. Default style %1$s Selected in Appearance / Theme Options / Single Post %1$s%1$s 2. Simple style %1$s 3. Featured image in pre-content area %1$s 4. Featured image with title overlay in pre-content area  %1$s %1$s%1$s To customize activate pre-content area', '%1$s stands for line break' ,'mag' ), '<br/>'),
				'std'         => 'opt_default',
				'type'        => 'radio-image'
			),		
			array(
				'label'       => esc_html__( 'Title position', 'mag'),
				'id'          => 'mnky_overlay_post_title_align',
				'type'        => 'select',
				'choices'     => array( 					
					array(
						'value'       => 'left',
						'label'       => esc_html__( 'Left', 'mag' ),
						'src'         => ''
					),
					array(
						'value'       => 'center',
						'label'       => esc_html__( 'Center', 'mag' ),
						'src'         => ''
					),
					array(
						'value'       => 'right',
						'label'       => esc_html__( 'Right', 'mag' ),
						'src'         => ''
					)
				),	
				'std'         => '',
				'condition'   => 'mnky_post_header_style:is(style_2)',
				'desc'        => esc_html__( 'Choose title position', 'mag' )
			),	
			array(
				'label'       => esc_html__( 'Gradient for background image', 'mag' ),
				'id'          => 'mnky_overlay_post_title_gradient',
				'type'        => 'on-off',
				'std'         => 'off',
				'condition'   => 'mnky_post_header_style:is(style_2)',
				'desc'        => esc_html__( 'Activates gradient overlay for background image.', 'mag' )
			),					
			array(
				'label'       => esc_html__( 'Post title area', 'mag' ),
				'id'          => 'mnky_single_post_header',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enable or disable title area for this post. Includes title, category links and post labels.', 'mag' ),
				'std'         => 'on'
			), 
			array(
				'label'       => esc_html__( 'Featured image after title', 'mag' ),
				'id'          => 'mnky_content_featured_img',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Do you want to display featured image after title in content?', 'mag' ),
				'std'         => 'on'
			), 
			array(
				'label'       => esc_html__( 'Post content sidebar', 'mag' ),
				'id'          => 'mnky_post_content_sidebar',
				'type'        => 'select',
				'desc'        => esc_html__( 'Do you want to display sidebar within post content? Add widgets in Appearance/Widgets - "Single Post Content Sidebar".', 'mag' ),
				'std'         => '',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Inherit from theme options', 'mag' ),
					'src'         => ''
				  ),
				  array(
					'value'       => 'on',
					'label'       => esc_html__( 'Enable', 'mag' ),
					'src'         => ''
				  ),
				  array(
					'value'       => 'off',
					'label'       => esc_html__( 'Disable', 'mag' ),
					'src'         => ''
				  )  				  
				)
			),	
			array(
				'id'          => 'mnky_custom_post_template',
				'label'       => esc_html__( 'Template', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'radio-image',
				'desc'        => '',
			),
			array(
				'label'       => esc_html__( 'Set different width for paragraphs', 'mag' ),
				'id'          => 'mnky_post_width',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Specify maximum width for text paragraphs without affecting other content , e.g., images.', 'mag' ),
			),
			array(
				'label'       => esc_html__( 'Post labels', 'mag' ),
				'id'          => 'mnky_post_labels',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Add some labels to the post, e.g., "Sponsored Content".', 'mag' ),
				'settings'    => array( 
				array(
					'id'          => 'mnky_post_label_text',
					'label'       => esc_html__( 'Label text', 'mag' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'mnky_post_label_color',
					'label'       => esc_html__( 'Choose label background color', 'mag' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker_opacity',
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'mnky_post_label_text_color',
					'label'       => esc_html__( 'Choose label text color', 'mag' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker_opacity',
					'operator'    => 'and'
				  )
				)

			),
			array(
				'id'          => 'precontent_tab',
				'label'       => esc_html__( 'Pre-content', 'mag' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Pre-content area', 'mag' ),
				'id'          => 'mnky_pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'mag' ),
				'std'         => 'off'
			),
			array(
				'label'       => esc_html__( 'Height (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>250px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'mag' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>1200px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Paddings (optional)', 'mag' ),
				'id'          => 'mnky_pre_content_paddings',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area paddings. Example: %s', '%s stands for example value. Do not delete it.' ,'mag' ), '<code>40px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'mnky_pre_content_bg',
				'label'       => esc_html__( 'Background', 'mag' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'mag' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'mag' ),
				'id'          => 'mnky_pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'mag' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	
	);
	
  
	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $mnky_meta_page );
		ot_register_meta_box( $mnky_meta_post );
	}
}