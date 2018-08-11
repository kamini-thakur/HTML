<?php
/*---------------------------------------------------------------*/
/* Register shortcode within Visual Composer interface
/*---------------------------------------------------------------*/

add_action( 'init', 'mnky_vc_map' );
function mnky_vc_map() {

	if ( function_exists( 'vc_map' ) ) {
		$add_css_animation = vc_map_add_css_animation( true );
	} else {
		$add_css_animation = '';
	}

	$add_css_animation_delay = array(
		'type' => 'dropdown',
		'heading' => esc_html__('CSS Animation Delay', 'core-extend'),
		'param_name' => 'css_animation_delay',
		'value' => array(
			'0ms' => '', 
			'100ms' => 'delay-100', 
			'200ms' => 'delay-200', 
			'300ms' => 'delay-300', 
			'400ms' => 'delay-400', 
			'500ms' => 'delay-500', 
			'600ms' => 'delay-600', 
			'700ms' => 'delay-700', 
			'800ms' => 'delay-800', 
			'900ms' => 'delay-900', 
			'1000ms' => 'delay-1000', 
			'1100ms' => 'delay-1100', 
			'1200ms' => 'delay-1200', 
			'1300ms' => 'delay-1300', 
			'1400ms' => 'delay-1400', 
			'1500ms' => 'delay-1500', 
			'1600ms' => 'delay-1600',
			'1700ms' => 'delay-1700',
			'1800ms' => 'delay-1800', 
			'1900ms' => 'delay-1900', 
			'2000ms' => 'delay-2000'
		)
	);
	
	
	// Heading
	vc_map( array(
		'name' => esc_html__('Styled Heading', 'core-extend'),
		'base' => 'mnky_heading',
		'icon' => 'icon-mnky_heading',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Eye catching headings', 'core-extend'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'core-extend'),
				'param_name' => 'title',
				'value' => 'This is title',
				'admin_label' => true,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Heading tag', 'core-extend'),
				'param_name' => 'heading_tag',
				'value' => array(
					esc_html__('H2', 'core-extend' ) => 'h2',
					esc_html__('H1', 'core-extend' ) => 'h1',
					esc_html__('H3', 'core-extend' ) => 'h3',
					esc_html__('H4', 'core-extend' ) => 'h4',
					esc_html__('H5', 'core-extend' ) => 'h5',
					esc_html__('H6', 'core-extend' ) => 'h6',
				),
				'description' => esc_html__('Choose heading tag from the list.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font size', 'core-extend'),
				'param_name' => 'font_size',
				'value' => '18px',
				'description' => esc_html__('Enter font size in pixels.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Align', 'core-extend' ),
				'param_name' => 'align',
				'value' => array(
					esc_html__('Left', 'core-extend' ) => '',
					esc_html__('Center', 'core-extend' ) => 'align-center',
					esc_html__('Right', 'core-extend' ) => 'align-right',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Text transform', 'core-extend' ),
				'param_name' => 'text_transform',
				'value' => array(
					esc_html__('None', 'core-extend' ) => '',
					esc_html__('Uppercase', 'core-extend' ) => 'uppercase',
					esc_html__('Capitalize', 'core-extend' ) => 'capitalize'
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin bottom', 'core-extend'),
				'param_name' => 'margin_bottom',
				'value' => '',
				'description' => esc_html__('Enter bottom margin in pixels, e.g., -20px', 'core-extend')
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin left', 'core-extend'),
				'param_name' => 'margin_left',
				'value' => '',
				'description' => esc_html__('Enter left margin in pixels, e.g., -20px', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );
	
	// Buttons
	vc_map( array(
		'name' => esc_html__('Styled Button', 'core-extend'),
		'base' => 'mnky_button',
		'icon' => 'icon-mnky_button',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Eye catching button', 'core-extend'),
		'params' => array(
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button text', 'core-extend'),
				'admin_label' => true,
				'param_name' => 'title',
				'value' => esc_html__('Text on the button', 'core-extend'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Button color', 'core-extend'),
				'param_name' => 'bg_color',
				'value' => '',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Text color', 'core-extend'),
				'param_name' => 'color',
				'value' => ''
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Align center?', 'core-extend' ),
				'param_name' => 'center_element',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'button-center-align')
			),	
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'No icon', 'core-extend' ) => '',
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );
	
	// List item
	vc_map( array(
		'name' => esc_html__('List Item', 'core-extend'),
		'base' => 'mnky_list_item',
		'icon' => 'icon-mnky_list', 
		'is_container' => false,
		'description' => esc_html__('List with custom icon', 'core-extend'),
		'category' => esc_html__('Premium', 'core-extend'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon color', 'core-extend'),
				'param_name' => 'icon_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('List item color', 'core-extend'),
				'param_name' => 'list_color',
				'description' => esc_html__('Leave empty to use defautl text color.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Size', 'core-extend' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__('Small', 'core-extend' ) => 'li_small',
					esc_html__('Medium', 'core-extend' ) => 'li_medium',
					esc_html__('Large', 'core-extend' ) => 'li_large',
				),
			),	
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Text', 'core-extend'),
				'param_name' => 'content',
				'value' => esc_html__('I am a list item', 'core-extend'),
				'admin_label' => true,
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Last or only list item?', 'core-extend' ),
				'param_name' => 'last_item',
				'description' => 'Removes bottom margin for the list item.',
				'value' => array(esc_html__( 'Yes', 'core-extend' ) => 'last')
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)		
		),
		'js_view' => 'MNKYIconView'
	) );	
	
	// Service
	vc_map( array(
		'name' => esc_html__('Service', 'core-extend'),
		'base' => 'mnky_service',
		'icon' => 'icon-mnky_service',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Service info with custom icon', 'core-extend'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'core-extend'),
				'param_name' => 'title',
				'admin_label' => true,
				'value' => esc_html__('Your service title', 'core-extend')
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Service description', 'core-extend'),
				'param_name' => 'content',
				'value' => esc_html__('I am service box text. Click edit button to change this text.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Service box align', 'core-extend'),
				'param_name' => 'position',
				'value' => array(esc_html__('Left', 'core-extend') => '', esc_html__('Right', 'core-extend') => 'sb_right', esc_html__('Center', 'core-extend') => 'sb_center')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon color', 'core-extend'),
				'param_name' => 'icon_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Title color', 'core-extend'),
				'param_name' => 'heading_color',
				'description' => esc_html__('Leave empty to use default heading color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Text color', 'core-extend'),
				'param_name' => 'text_color',
				'description' => esc_html__('Leave empty to use default text color.', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		 'js_view' => 'MNKYIconView'

	) );
	
	// Icons
	vc_map( array(
		'name' => esc_html__('Icons', 'core-extend'),
		'base' => 'mnky_icons',
		'icon' => 'icon-mnky_icons',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Scalable vector icons', 'core-extend'),
		'admin_enqueue_js' => array( MNKY_PLUGIN_URL . 'assets/js/extend-composer-custom-views.js' ),
		'admin_enqueue_css' => array( MNKY_PLUGIN_URL . 'assets/css/core-extend-backend.css'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Mono Social', 'core-extend' ) => 'monosocial',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_monosocial',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'monosocial',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon size', 'core-extend'),
				'param_name' => 'icon_size',
				'value' => '28px',
				'description' => esc_html__('Icon size in pixels.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon color', 'core-extend'),
				'param_name' => 'icon_color',
				'value' => '#666677'
			),		
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Align center?', 'core-extend' ),
				'param_name' => 'center_element',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'icon-center-align')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Padding left', 'core-extend'),
				'param_name' => 'padding_left',
				'value' => '0px',
				'description' => esc_html__('The padding-left property sets the left padding (space) of an element.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Padding right', 'core-extend'),
				'param_name' => 'padding_right',
				'value' => '0px',
				'description' => esc_html__('The padding-right property sets the right padding (space) of an element.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Hover effect', 'core-extend'),
				'param_name' => 'hover_effect',
				'value' => array(esc_html__('None', 'core-extend') => '', esc_html__('Fade out', 'core-extend') => 'fade_out', esc_html__('Change color', 'core-extend') => 'change_color', esc_html__('Bounce', 'core-extend') => 'bounce', esc_html__('Shrink', 'core-extend') => 'shrink')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Hover color', 'core-extend'),
				'param_name' => 'hover_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend'),
				'dependency' => array('element' => 'hover_effect', 'value' => array('change_color'))
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		'js_view' => 'VcIconView'
	) );	
	

	// Posts
	$postTypes = get_post_types( array() );
	$postTypesList = array();
	$excludedPostTypes = array(
		'revision',
		'nav_menu_item',
		'vc_grid_item',
		'custom_css',
		'customize_changeset',
		'vc4_templates',
		'attachment'
	);
	if ( is_array( $postTypes ) && ! empty( $postTypes ) ) {
		foreach ( $postTypes as $postType ) {
			if ( ! in_array( $postType, $excludedPostTypes ) ) {
				$label = ucfirst( $postType );
				$postTypesList[] = array(
					$postType,
					$label,
				);
			}
		}
	}
	
	$author_list = array();
	$author_list['Select author...'] = 'all';
	$blogusers = get_users( array( 'fields' => array( 'display_name', 'ID' ) ) );
	foreach ( $blogusers as $user ) {
		$author_list[$user->display_name] = $user->ID;
	}
	

	vc_map( array(
		'name'		=> esc_html__('Article Block', 'core-extend'),
		'base'		=> 'mnky_posts',
		'icon'		=> 'icon-mnky_posts',
		'class'		=> 'mnky-get-posts',
		'front_enqueue_css' => MNKY_PLUGIN_URL . 'assets/css/core-extend-frontend.css',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Display selected posts', 'core-extend'),
		'show_settings_on_create' => true,
		'params' => array(	
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Layout', 'core-extend' ),
				'param_name' => 'layout',
				'value' => array(
					esc_html__('Image on top', 'core-extend' ) => '1',
					esc_html__('Image on the left', 'core-extend' ) => '2',
					esc_html__('List', 'core-extend' ) => '3',
					esc_html__('List with image', 'core-extend' ) => '4',
					esc_html__('Content over image', 'core-extend' ) => '5'
				),
				'admin_label' => true
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image height', 'core-extend' ),
				'param_name' => 'bg_image_height',
				'value' => '450px',
				'description' => esc_html__( 'Add unit size, e.g., 400px.', 'core-extend' ),
				'dependency' => array('element' => 'layout', 'value' => array('5'))
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Columns', 'core-extend' ),
				'param_name' => 'column_layout',
				'value' => array(
					esc_html__('One column', 'core-extend' ) => 'column-count-1',
					esc_html__('Two columns', 'core-extend' ) => 'column-count-2',
					esc_html__('Three columns', 'core-extend' ) => 'column-count-3',
					esc_html__('Four columns', 'core-extend' ) => 'column-count-4',
					esc_html__('Five columns', 'core-extend' ) => 'column-count-5',
					esc_html__('Six columns', 'core-extend' ) => 'column-count-6',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom title size', 'core-extend'),
				'param_name' => 'title_size',
				'value' => '',
				'description' => esc_html__( 'Add unit size, e.g., 16px.', 'core-extend' )
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Add post number before the title', 'core-extend'),
				'param_name' => 'post_nr',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'on'),
				'dependency' => array('element' => 'layout', 'value' => array('3', '4'))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Adjust number position', 'core-extend' ),
				'param_name' => 'post_nr_adjust',
				'value' => '',
				'description' => esc_html__( 'Adjust top margin of the number. Add unit size, e.g., 5px.', 'core-extend' ),
				'dependency' => array('element' => 'post_nr', 'value' => array('on'))
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Thumbnail size', 'core-extend' ),
				'param_name' => 'thumbnail_size',
				'value' => array(
					esc_html__('600x400', 'core-extend' ) => 'mnky_size-600x400',
					esc_html__('100x100', 'core-extend' ) => 'mnky_size-100x100',
					esc_html__('200x200', 'core-extend' ) => 'mnky_size-200x200',
					esc_html__('300x200', 'core-extend' ) => 'mnky_size-300x200',
					esc_html__('1200x800', 'core-extend' ) => 'mnky_size-1200x800',
					esc_html__('Thumbnail', 'core-extend' ) => 'thumbnail',
					esc_html__('Medium', 'core-extend' ) => 'medium',
					esc_html__('Medium large', 'core-extend' ) => 'medium_large',
					esc_html__('Large', 'core-extend' ) => 'large',
					esc_html__('Full', 'core-extend' ) => 'full',
				),
				'dependency' => array('element' => 'layout', 'value_not_equal_to' => array('3'))
			),			
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Choose content type', 'core-extend'),
				'param_name' => 'content_type',
				'value' => array(esc_html__('No Content', 'core-extend')	=> '', esc_html__('Excerpt', 'core-extend') => 'excerpt', esc_html__('Full Content', 'core-extend') => 'content_full'),
				'group' => esc_html__('Display', 'core-extend')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post labels', 'core-extend'),
				'param_name' => 'label_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post review rating', 'core-extend'),
				'param_name' => 'rating_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post category', 'core-extend'),
				'param_name' => 'cat_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post author', 'core-extend'),
				'param_name' => 'author_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post date', 'core-extend'),
				'param_name' => 'date_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post comment count', 'core-extend'),
				'param_name' => 'comments_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post views count', 'core-extend'),
				'param_name' => 'views_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format', 'core-extend'),
				'param_name' => 'post_format_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format text (show icon only)', 'core-extend'),
				'param_name' => 'post_format_text_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend'),
				'dependency' => array('element' => 'post_format_hide', 'value_not_equal_to' => array('off'))
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Add custom content after each post', 'core-extend'),
				'param_name' => 'loop_content',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'loop_content_on'),
				'group' => esc_html__('Display', 'core-extend')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Additional content shortcode', 'core-extend' ),
				'param_name' => 'loop_content_custom_code',
				'description' => esc_html__( 'Add your custom shortcode or html, e.g., sharing or advertisement. This content will be placed after each post in this loop.', 'core-extend' ),
				'group' => esc_html__('Display', 'core-extend'),
				'dependency' => array('element' => 'loop_content', 'value' => 'loop_content_on')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Do not duplicate posts', 'core-extend'),
				'param_name' => 'no_duplicate',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
				'group' => esc_html__('Settings', 'core-extend'),
				'description' => esc_html__( 'Do not include posts that are already shown before in other post section.', 'core-extend' ),
				'admin_label' => true
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Allow to duplicate posts from this section', 'core-extend'),
				'param_name' => 'allow_duplicate',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
				'group' => esc_html__('Settings', 'core-extend'),
				'description' => esc_html__( 'Other post sections below will include posts from THIS section even if "Do not duplicate posts" will be active.', 'core-extend' ),
				'admin_label' => true
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Posts per page', 'core-extend' ),
				'param_name' => 'posts_per_page',
				'value' => '4',
				'description' => esc_html__( 'Number of post to show per page (-1 to show all posts)', 'core-extend' ),
				'group' => esc_html__('Settings', 'core-extend')
			),		
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Limit posts by time period', 'core-extend' ),
				'param_name' => 'time_limit',
				'value' => array(esc_html__('No Limit', 'core-extend')	=> '', esc_html__('Today', 'core-extend') => 'today', esc_html__('This Week', 'core-extend') => 'week', esc_html__('This Month', 'core-extend') => 'month'),
				'group' => esc_html__('Settings', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Pagination type', 'core-extend'),
				'param_name' => 'pagination',
				'value' => array(esc_html__('None (Show only one page)', 'core-extend')	=> '', esc_html__('Load more button', 'core-extend') => 'load_more', esc_html__('Post carousel', 'core-extend') => 'carousel', esc_html__('Infinite scroll', 'core-extend') => 'infinite', esc_html__('Numeric pagination', 'core-extend') => 'pagination'),
				'group' => esc_html__('Settings', 'core-extend')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Offset', 'core-extend' ),
				'param_name' => 'offset',
				'value' => '',
				'description' => esc_html__( 'Number of posts to displace or pass over. Does not work with pagination!', 'core-extend' ),
				'group' => esc_html__('Settings', 'core-extend')
			),				
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order', 'core-extend' ),
				'param_name' => 'order',
				'value' => array(esc_html__('Descending', 'core-extend') => 'DESC', esc_html__('Ascending', 'core-extend') => 'ASC'),
				'group' => esc_html__('Settings', 'core-extend')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'core-extend' ),
				'param_name' => 'orderby',
				'value' => array(esc_html__('By date', 'core-extend' ) => 'date', esc_html__('By post views', 'core-extend' ) => 'meta_value_num', esc_html__('By last modified date', 'core-extend' ) => 'modified', esc_html__('By number of comments', 'core-extend' ) => 'comment_count', esc_html__('Random order', 'core-extend' ) => 'rand', esc_html__('By title', 'core-extend' ) => 'title', esc_html__('By ID', 'core-extend' ) => 'ID', esc_html__('By author', 'core-extend' ) => 'author', esc_html__('By post slug', 'core-extend' ) => 'name', esc_html__('By post/page parent id', 'core-extend' ) => 'parent', esc_html__('No order', 'core-extend' ) => 'none' ),
				'group' => esc_html__('Settings', 'core-extend')
			),										
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Filter results', 'core-extend'),
				'param_name' => 'taxonomy',
				'group' => esc_html__('Filter', 'core-extend'),
				'holder' => 'div',
				'value' => array('All posts' => 'all_posts', 'By Category' => 'category', 'By Tags' => 'post_tag', 'By Author' => 'author', 'Custom' => 'custom'),
			),	
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Operator', 'core-extend'),
				'param_name' => 'tax_operator',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('IN' => 'IN', 'NOT IN' => 'NOT IN', 'AND' => 'AND'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category', 'post_tag', 'custom')),
				'description' => sprintf (esc_html_x( 'IN = Posts must be %2$s at least in ONE %3$s of selected categories or tags %1$s NOT IN = Excludes posts that are in selected categories or tags %1$s AND = Post must be %2$s in ALL %3$s selected categories or tags', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Data source', 'js_composer' ),
				'param_name' => 'post_type',
				'value' => $postTypesList,
				'save_always' => true,
				'description' => esc_html__( 'Select content type.', 'js_composer' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('custom')),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy name', 'js_composer' ),
				'param_name' => 'custom_tax',
				'description' => esc_html__( 'e.g. "post_type_categories"', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('custom')),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy term SLUGs', 'js_composer' ),
				'param_name' => 'custom_tax_terms',
				'description' => esc_html__( 'Comma separated custom taxonomy term slugs', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('custom')),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Select author', 'core-extend' ),
				'param_name' => 'author',
				'value' => $author_list,
				'admin_label' => true,
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('author'))
			),			
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Categories', 'core-extend' ),
				'param_name' => 'category',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category'))
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Tags', 'core-extend' ),
				'param_name' => 'tag',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('post_tag'))
			),		
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Refine results', 'core-extend'),
				'param_name' => 'taxonomy_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('None' => 'none', 'By Categories' => 'category', 'By Tags' => 'post_tag'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category', 'post_tag'))
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Taxonomy relation', 'core-extend' ),
				'param_name' => 'tax_relation',
				'value' => array('OR' => 'OR', 'AND' => 'AND'),
				'description' => esc_html__( 'The logical relationship between each taxonomy.', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => Array('element' => 'taxonomy_2', 'value' => array('category', 'post_tag'))
			),		
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Operator 2', 'core-extend'),
				'param_name' => 'tax_operator_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('IN' => 'IN', 'NOT IN' => 'NOT IN', 'AND' => 'AND'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('category', 'post_tag'))
			),						
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Categories 2', 'core-extend' ),
				'param_name' => 'category_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('category'))
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Tags 2', 'core-extend' ),
				'param_name' => 'tag_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('post_tag'))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'core-extend' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend' ),
			),
			array(
				'type' => 'el_id',
				'param_name' => 'el_id',
				'settings' => array(
					'auto_generate' => true,
				),
				'heading' => esc_html__( 'Element ID', 'core-extend' ),
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'core-extend' ), '<a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>' ),
			)
		),
		'js_view' => 'MNKYPostView'

	) );

	
	// News Ticker
	vc_map( array(
		'name'		=> esc_html__('News Ticker', 'core-extend'),
		'base'		=> 'mnky_news_ticker',
		'icon'		=> 'icon-mnky_posts',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Animated news ticker', 'core-extend'),
		'show_settings_on_create' => true,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Ticker title', 'core-extend' ),
				'param_name' => 'title',
				'value' => '',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Data source', 'js_composer' ),
				'param_name' => 'post_type',
				'value' => $postTypesList,
				'save_always' => true,
				'description' => esc_html__( 'Select content type', 'js_composer' ),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy name', 'js_composer' ),
				'param_name' => 'custom_tax',
				'description' => esc_html__( 'e.g. "post_type_categories"', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value_not_equal_to' => array('post')),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy term SLUGs', 'js_composer' ),
				'param_name' => 'custom_tax_terms',
				'description' => esc_html__( 'Comma separated custom taxonomy term slugs', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value_not_equal_to' => array('post')),
			),			
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Narrow data by categories', 'core-extend' ),
				'param_name' => 'category',
				'admin_label' => true,
				'dependency' => array('element' => 'post_type', 'value' => array('post')),
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Narrow data by tags', 'core-extend' ),
				'param_name' => 'tag',
				'admin_label' => true,
				'dependency' => array('element' => 'post_type', 'value' => array('post')),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Taxonomy relation', 'core-extend' ),
				'param_name' => 'tax_relation',
				'value' => array('OR' => 'OR', 'AND' => 'AND'),
				'description' => esc_html__( 'The logical relationship between categories and tags. If "OR" - post must be at least in one of the selected category OR tag. If "AND" - post must be at least in one of the selected category AND ALSO tag.', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value' => array('post')),				
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Posts per page', 'core-extend' ),
				'param_name' => 'posts_per_page',
				'value' => '4',
				'description' => esc_html__( 'Number of post to show per page (-1 to show all posts)', 'core-extend' ),
			),		
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Limit posts by time period', 'core-extend' ),
				'param_name' => 'time_limit',
				'value' => array(esc_html__('No Limit', 'core-extend')	=> '', esc_html__('Today', 'core-extend') => 'today', esc_html__('This Week', 'core-extend') =>'week', esc_html__('This Month', 'core-extend') => 'month'),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Offset', 'core-extend' ),
				'param_name' => 'offset',
				'value' => '',
				'description' => esc_html__( 'Number of posts to displace or pass over. Does not work with pagination!', 'core-extend' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order', 'core-extend' ),
				'param_name' => 'order',
				'value' => array(esc_html__('Descending', 'core-extend') => 'DESC', esc_html__('Ascending', 'core-extend') => 'ASC'),
			),				
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'core-extend' ),
				'param_name' => 'orderby',
				'value' => array(esc_html__('By date', 'core-extend' ) => 'date', esc_html__('By post views', 'core-extend' ) => 'meta_value_num', esc_html__('By last modified date', 'core-extend' ) => 'modified', esc_html__('By number of comments', 'core-extend' ) => 'comment_count', esc_html__('Random order', 'core-extend' ) => 'rand', esc_html__('By title', 'core-extend' ) => 'title', esc_html__('By ID', 'core-extend' ) => 'ID', esc_html__('By author', 'core-extend' ) => 'author', esc_html__('By post slug', 'core-extend' ) => 'name', esc_html__('By post/page parent id', 'core-extend' ) => 'parent', esc_html__('No order', 'core-extend' ) => 'none' ),
			),		
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'core-extend' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend' ),
			)
		)
	) );

	// Related posts
	vc_map( array(
		'name'		=> esc_html__('Related Posts', 'core-extend'),
		'base'		=> 'mnky_related_posts',
		'icon'		=> 'icon-mnky_posts',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Posts with similar categories or tags', 'core-extend'),
		'show_settings_on_create' => true,
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'How many posts to display', 'core-extend' ),
				'param_name' => 'num',
				'value' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format', 'core-extend'),
				'param_name' => 'post_format_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format text (show icon only)', 'core-extend'),
				'param_name' => 'post_format_text_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend'),
				'dependency' => array('element' => 'post_format_hide', 'value_not_equal_to' => array('off'))
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show post labels', 'core-extend'),
				'param_name' => 'label_show',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'on'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Data source', 'js_composer' ),
				'param_name' => 'post_type',
				'value' => $postTypesList,
				'save_always' => true
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Display only category related posts (no tag related)', 'core-extend' ),
				'param_name' => 'no_tags',
				'value' => array(esc_html__('On', 'core-extend') => 'on'),				
				'dependency' => array('element' => 'post_type', 'value' => array('post'))				
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Taxonomy relation', 'core-extend' ),
				'param_name' => 'tax_relation',
				'value' => array('OR' => 'OR', 'AND' => 'AND'),
				'description' => esc_html__( 'The logical relationship between categories and tags. If "OR" - related post must be at least in one of the current post\'s category OR tag. If "AND" - related post must be at least in one of the current post\'s category AND ALSO tag.', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value' => array('post'))				
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Display related posts for specific post ID (optional)', 'core-extend' ),
				'param_name' => 'id',
				'description' => esc_html__( 'To display related posts from other post than current, enter ID of the custom post above.', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value' => array('post')),
				
			),		
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy name', 'js_composer' ),
				'param_name' => 'custom_tax',
				'description' => esc_html__( 'e.g. "post_type_categories"', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value_not_equal_to' => array('post')),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy term SLUGs', 'js_composer' ),
				'param_name' => 'custom_tax_terms',
				'description' => esc_html__( 'Comma separated custom taxonomy TERM SLUGS. Leave empty to get terms from current post type. Works only if current post has the same taxonomy as entered above, otherwise returns all posts.', 'core-extend' ),
				'dependency' => array('element' => 'post_type', 'value_not_equal_to' => array('post')),
			),					
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order', 'core-extend' ),
				'param_name' => 'order',
				'value' => array(esc_html__('Descending', 'core-extend') => 'DESC', esc_html__('Ascending', 'core-extend') => 'ASC')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'core-extend' ),
				'param_name' => 'orderby',
				'value' => array(esc_html__('By date', 'core-extend' ) => 'date', esc_html__('By post views', 'core-extend' ) => 'meta_value_num', esc_html__('By last modified date', 'core-extend' ) => 'modified', esc_html__('By number of comments', 'core-extend' ) => 'comment_count', esc_html__('Random order', 'core-extend' ) => 'rand', esc_html__('By title', 'core-extend' ) => 'title', esc_html__('By ID', 'core-extend' ) => 'ID', esc_html__('By author', 'core-extend' ) => 'author', esc_html__('By post slug', 'core-extend' ) => 'name', esc_html__('By post/page parent id', 'core-extend' ) => 'parent', esc_html__('No order', 'core-extend' ) => 'none' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Offset', 'core-extend' ),
				'param_name' => 'offset',
				'value' => '0',
				'description' => esc_html__( 'Number of posts to displace or pass over.', 'core-extend' )
			)
		)
	) );	

	
	// Posts Slider
	vc_map( array(
		'name'		=> esc_html__('Post Slider', 'core-extend'),
		'base'		=> 'mnky_posts_slider',
		'icon'		=> 'icon-mnky_posts',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Slide selected posts', 'core-extend'),
		'show_settings_on_create' => true,
		'params' => array(	
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Slider height', 'core-extend'),
				'param_name' => 'slider_height',
				'value' => '',
				'description' => esc_html__( 'Add unit size, e.g., 450px.', 'core-extend' )
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Slide Interval', 'core-extend'),
				'param_name' => 'slider_interval',
				'value' => '5',
				'description' => esc_html__( 'Sets the amount of time between each slide in seconds.', 'core-extend' ),
				'group' => esc_html__('Settings', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Animation', 'core-extend'),
				'param_name' => 'slider_fx',
				'value' => array(esc_html__('Fade', 'core-extend') => 'fade', esc_html__('Slide', 'core-extend')	=> 'slide'),
				'description' => esc_html__( 'Will determine the animation type of the slider.', 'core-extend' ),
				'group' => esc_html__('Settings', 'core-extend')
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom title size', 'core-extend'),
				'param_name' => 'title_size',
				'value' => '',
				'description' => esc_html__( 'Add unit size, e.g., 16px. Note that this will overwrite reposive sizes.', 'core-extend' )
			),						
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Thumbnail size', 'core-extend' ),
				'param_name' => 'thumbnail_size',
				'value' => array(
					esc_html__('600x400', 'core-extend' ) => 'mnky_size-600x400',
					esc_html__('100x100', 'core-extend' ) => 'mnky_size-100x100',
					esc_html__('200x200', 'core-extend' ) => 'mnky_size-200x200',
					esc_html__('300x200', 'core-extend' ) => 'mnky_size-300x200',
					esc_html__('1200x800', 'core-extend' ) => 'mnky_size-1200x800',
					esc_html__('Thumbnail', 'core-extend' ) => 'thumbnail',
					esc_html__('Medium', 'core-extend' ) => 'medium',
					esc_html__('Medium large', 'core-extend' ) => 'medium_large',
					esc_html__('Large', 'core-extend' ) => 'large',
					esc_html__('Full', 'core-extend' ) => 'full',
				),
				'dependency' => array('element' => 'layout', 'value_not_equal_to' => array('3'))
			),
			$add_css_animation,
			$add_css_animation_delay,			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Choose content type', 'core-extend'),
				'param_name' => 'content_type',
				'value' => array(esc_html__('No Content', 'core-extend')	=> '', esc_html__('Excerpt', 'core-extend') => 'excerpt'),
				'group' => esc_html__('Display', 'core-extend')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post labels', 'core-extend'),
				'param_name' => 'label_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post review rating', 'core-extend'),
				'param_name' => 'rating_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post category', 'core-extend'),
				'param_name' => 'cat_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post author', 'core-extend'),
				'param_name' => 'author_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post date', 'core-extend'),
				'param_name' => 'date_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post comment count', 'core-extend'),
				'param_name' => 'comments_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post views count', 'core-extend'),
				'param_name' => 'views_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format', 'core-extend'),
				'param_name' => 'post_format_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format text (show icon only)', 'core-extend'),
				'param_name' => 'post_format_text_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend'),
				'dependency' => array('element' => 'post_format_hide', 'value_not_equal_to' => array('off'))
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Do not duplicate posts', 'core-extend'),
				'param_name' => 'no_duplicate',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
				'group' => esc_html__('Settings', 'core-extend'),
				'description' => esc_html__( 'Do not include posts that are already shown before in other post section.', 'core-extend' ),
				'admin_label' => true
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Allow to duplicate posts from this section', 'core-extend'),
				'param_name' => 'allow_duplicate',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
				'group' => esc_html__('Settings', 'core-extend'),
				'description' => esc_html__( 'Other post sections below will include posts from THIS section even if "Do not duplicate posts" will be active.', 'core-extend' ),
				'admin_label' => true
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Number of slides', 'core-extend' ),
				'param_name' => 'posts_per_page',
				'value' => '4',
				'group' => esc_html__('Settings', 'core-extend')
			),		
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Limit posts by time period', 'core-extend' ),
				'param_name' => 'time_limit',
				'value' => array(esc_html__('No Limit', 'core-extend')	=> '', esc_html__('Today', 'core-extend') => 'today', esc_html__('This Week', 'core-extend') => 'week', esc_html__('This Month', 'core-extend') => 'month'),
				'group' => esc_html__('Settings', 'core-extend')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Offset', 'core-extend' ),
				'param_name' => 'offset',
				'value' => '',
				'description' => esc_html__( 'Number of posts to displace or pass over. Does not work with pagination!', 'core-extend' ),
				'group' => esc_html__('Settings', 'core-extend')
			),				
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order', 'core-extend' ),
				'param_name' => 'order',
				'value' => array(esc_html__('Descending', 'core-extend') => 'DESC', esc_html__('Ascending', 'core-extend') => 'ASC'),
				'group' => esc_html__('Settings', 'core-extend')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'core-extend' ),
				'param_name' => 'orderby',
				'value' => array(esc_html__('By date', 'core-extend' ) => 'date', esc_html__('By post views', 'core-extend' ) => 'meta_value_num', esc_html__('By last modified date', 'core-extend' ) => 'modified', esc_html__('By number of comments', 'core-extend' ) => 'comment_count', esc_html__('Random order', 'core-extend' ) => 'rand', esc_html__('By title', 'core-extend' ) => 'title', esc_html__('By ID', 'core-extend' ) => 'ID', esc_html__('By author', 'core-extend' ) => 'author', esc_html__('By post slug', 'core-extend' ) => 'name', esc_html__('By post/page parent id', 'core-extend' ) => 'parent', esc_html__('No order', 'core-extend' ) => 'none' ),
				'group' => esc_html__('Settings', 'core-extend')
			),										
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Filter results', 'core-extend'),
				'param_name' => 'taxonomy',
				'group' => esc_html__('Filter', 'core-extend'),
				'holder' => 'div',
				'value' => array('All posts' => 'all_posts', 'By Category' => 'category', 'By Tags' => 'post_tag', 'By Author' => 'author', 'Custom' => 'custom'),
			),	
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Operator', 'core-extend'),
				'param_name' => 'tax_operator',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('IN' => 'IN', 'NOT IN' => 'NOT IN', 'AND' => 'AND'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category', 'post_tag', 'custom')),
				'description' => sprintf (esc_html_x( 'IN = Posts must be %2$s at least in ONE %3$s of selected categories or tags %1$s NOT IN = Excludes posts that are in selected categories or tags %1$s AND = Post must be %2$s in ALL %3$s selected categories or tags', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Data source', 'js_composer' ),
				'param_name' => 'post_type',
				'value' => $postTypesList,
				'save_always' => true,
				'description' => esc_html__( 'Select content type.', 'js_composer' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('custom')),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy name', 'js_composer' ),
				'param_name' => 'custom_tax',
				'description' => esc_html__( 'e.g. "post_type_categories"', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('custom')),
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom taxonomy term SLUGs', 'js_composer' ),
				'param_name' => 'custom_tax_terms',
				'description' => esc_html__( 'Comma separated custom taxonomy term slugs', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('custom')),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Select author', 'core-extend' ),
				'param_name' => 'author',
				'value' => $author_list,
				'admin_label' => true,
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('author'))
			),			
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Categories', 'core-extend' ),
				'param_name' => 'category',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category'))
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Tags', 'core-extend' ),
				'param_name' => 'tag',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('post_tag'))
			),		
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Refine results', 'core-extend'),
				'param_name' => 'taxonomy_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('None' => 'none', 'By Categories' => 'category', 'By Tags' => 'post_tag'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category', 'post_tag'))
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Taxonomy relation', 'core-extend' ),
				'param_name' => 'tax_relation',
				'value' => array('OR' => 'OR', 'AND' => 'AND'),
				'description' => esc_html__( 'The logical relationship between each taxonomy.', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => Array('element' => 'taxonomy_2', 'value' => array('category', 'post_tag'))
			),		
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Operator 2', 'core-extend'),
				'param_name' => 'tax_operator_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('IN' => 'IN', 'NOT IN' => 'NOT IN', 'AND' => 'AND'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('category', 'post_tag'))
			),						
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Categories 2', 'core-extend' ),
				'param_name' => 'category_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('category'))
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Tags 2', 'core-extend' ),
				'param_name' => 'tag_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('post_tag'))
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'core-extend' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend' ),
			),
			array(
				'type' => 'el_id',
				'param_name' => 'el_id',
				'settings' => array(
					'auto_generate' => true,
				),
				'heading' => esc_html__( 'Element ID', 'core-extend' ),
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'core-extend' ), '<a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>' ),
			)
		),
		'js_view' => 'MNKYPostView'

	) );


	// Post grid
	vc_map( array(
		'name'		=> esc_html__('Post Grid', 'core-extend'),
		'base'		=> 'mnky_posts_grid',
		'icon'		=> 'icon-mnky_posts',
		'class'		=> 'mnky-get-posts',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Display posts in a grid with background image', 'core-extend'),
		'show_settings_on_create' => true,
		'params' => array(					
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__( 'Grid layout', 'core-extend' ),
				'param_name' => 'grid_layout',
				'admin_label' => true,
				'value' => array('Layout 1' => 'mpg-layout-1', 'Layout	2' => 'mpg-layout-2', 'Layout	3' => 'mpg-layout-3', 'Layout	4' => 'mpg-layout-4', 'Layout	5' => 'mpg-layout-5', 'Layout 6' => 'mpg-layout-6', 'Layout 7' => 'mpg-layout-7'),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Grid height (px)', 'core-extend' ),
				'param_name' => 'grid_height',
				'value' => '500'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Thumbnail size', 'core-extend' ),
				'param_name' => 'thumbnail_size',
				'value' => array(
					esc_html__('600x400', 'core-extend' ) => 'mnky_size-600x400',
					esc_html__('100x100', 'core-extend' ) => 'mnky_size-100x100',
					esc_html__('200x200', 'core-extend' ) => 'mnky_size-200x200',
					esc_html__('300x200', 'core-extend' ) => 'mnky_size-300x200',
					esc_html__('1200x800', 'core-extend' ) => 'mnky_size-1200x800',
					esc_html__('Thumbnail', 'core-extend' ) => 'thumbnail',
					esc_html__('Medium', 'core-extend' ) => 'medium',
					esc_html__('Medium large', 'core-extend' ) => 'medium_large',
					esc_html__('Large', 'core-extend' ) => 'large',
					esc_html__('Full', 'core-extend' ) => 'full',
				)
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post labels', 'core-extend'),
				'param_name' => 'label_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post category', 'core-extend'),
				'param_name' => 'cat_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post comment count', 'core-extend'),
				'param_name' => 'comments_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post views count', 'core-extend'),
				'param_name' => 'views_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format', 'core-extend'),
				'param_name' => 'post_format_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),					
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Hide post format text (show icon only)', 'core-extend'),
				'param_name' => 'post_format_text_hide',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'off'),
				'group' => esc_html__('Display', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Do not duplicate posts', 'core-extend'),
				'param_name' => 'no_duplicate',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
				'description' => esc_html__( 'Do not include posts that are already shown before in other post section.', 'core-extend' ),
				'admin_label' => true,
				'group' => esc_html__('Settings', 'core-extend')
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Allow to duplicate posts from this section', 'core-extend'),
				'param_name' => 'allow_duplicate',
				'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
				'description' => esc_html__( 'Other post sections below will include posts from THIS section even if "Do not duplicate posts" will be active.', 'core-extend' ),
				'admin_label' => true,
				'group' => esc_html__('Settings', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order', 'core-extend' ),
				'param_name' => 'order',
				'value' => array(esc_html__('Descending', 'core-extend') => 'DESC', esc_html__('Ascending', 'core-extend') => 'ASC'),
				'group' => esc_html__('Settings', 'core-extend')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'core-extend' ),
				'param_name' => 'orderby',
				'value' => array(esc_html__('By date', 'core-extend' ) => 'date', esc_html__('By post views', 'core-extend' ) => 'meta_value_num', esc_html__('By last modified date', 'core-extend' ) => 'modified', esc_html__('By number of comments', 'core-extend' ) => 'comment_count', esc_html__('Random order', 'core-extend' ) => 'rand', esc_html__('By title', 'core-extend' ) => 'title', esc_html__('By ID', 'core-extend' ) => 'ID', esc_html__('By author', 'core-extend' ) => 'author', esc_html__('By post slug', 'core-extend' ) => 'name', esc_html__('By post/page parent id', 'core-extend' ) => 'parent', esc_html__('No order', 'core-extend' ) => 'none' ),
				'group' => esc_html__('Settings', 'core-extend')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Data source', 'js_composer' ),
				'param_name' => 'post_type',
				'value' => $postTypesList,
				'save_always' => true,
				'group' => esc_html__('Filter', 'core-extend')
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Category 1 (optional)', 'core-extend' ),
				'param_name' => 'category_1',
				'description' => sprintf (esc_html_x( 'Choose category to display in the first box. Use category %2$s slug name %3$s. %1$s Leave empty to display latest posts from all categories.', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>'),
				'group' => esc_html__('Filter', 'core-extend')
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Category 2 (optional)', 'core-extend' ),
				'param_name' => 'category_2',
				'description' => sprintf (esc_html_x( 'Choose category to display in the second box. Use category %2$s slug name %3$s. %1$s Leave empty to display latest posts from all categories.', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>'),
				'group' => esc_html__('Filter', 'core-extend')
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Category 3 (optional)', 'core-extend' ),
				'param_name' => 'category_3',
				'description' => sprintf (esc_html_x( 'Choose category to display in the third box. Use category %2$s slug name %3$s. %1$s Leave empty to display latest posts from all categories.', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>'),
				'group' => esc_html__('Filter', 'core-extend')
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Category 4 (optional)', 'core-extend' ),
				'param_name' => 'category_4',
				'dependency' => Array( 'element' => 'grid_layout', 'value' => array('mpg-layout-1', 'mpg-layout-2', 'mpg-layout-3', 'mpg-layout-6', 'mpg-layout-7') ), 
				'description' => sprintf (esc_html_x( 'Choose category to display in the fourth box. Use category %2$s slug name %3$s. %1$s Leave empty to display latest posts from all categories.', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>'),
				'group' => esc_html__('Filter', 'core-extend')
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Category 5 (optional)', 'core-extend' ),
				'param_name' => 'category_5',
				'dependency' => Array( 'element' => 'grid_layout', 'value' => array('mpg-layout-1', 'mpg-layout-3') ),
				'description' => sprintf (esc_html_x( 'Choose category to display in the fifth box. Use category %2$s slug name %3$s. %1$s Leave empty to display latest posts from all categories.', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>'),
				'group' => esc_html__('Filter', 'core-extend')
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Category 6 (optional)', 'core-extend' ),
				'param_name' => 'category_6',
				'dependency' => Array( 'element' => 'grid_layout', 'value' => array('mpg-layout-3') ),
				'description' => sprintf (esc_html_x( 'Choose category to display in the sixth box. Use category %2$s slug name %3$s. %1$s Leave empty to display latest posts from all categories.', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>'),
				'group' => esc_html__('Filter', 'core-extend')
			),			
			$add_css_animation,
			$add_css_animation_delay,			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'core-extend' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend' )
			)
		)

	) );
	
	// Category
	vc_map( array(
		'name' => esc_html__('Category', 'core-extend'),
		'base' => 'mnky_category',
		'icon' => 'icon-mnky_posts',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Category link with image', 'core-extend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Category image', 'core-extend'),
				'param_name' => 'img_url',
				'value' => '', 
				'description' => esc_html__('Choose image to represent selected category.', 'core-extend')
			),
			array(
				'type' => 'mnky_single_cat',
				'heading' => esc_html__( 'Category', 'core-extend' ),
				'param_name' => 'category'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Link text', 'core-extend'),
				'param_name' => 'a_title',
				'description' => esc_html__('Link title attribute text.', 'core-extend')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Open link in a new tab', 'core-extend'),
				'param_name' => 'a_target',
				'value' => array(esc_html__('Yes, please', 'core-extend') => '_blank')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Add nofollow option to link', 'core-extend'),
				'param_name' => 'a_rel',
				'value' => array(esc_html__('Yes, please', 'core-extend') => 'nofollow')
			),				
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );

	
	// Menu posts
	vc_map( array(
		'name'		=> esc_html__('Menu posts', 'core-extend'),
		'base'		=> 'mnky_menu_posts',
		'icon'		=> 'icon-mnky_menu_posts',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Posts', 'core-extend'),
		'show_settings_on_create' => false,
		'content_element' => false,
		'params' => array(
		)
	) );

	
	// Ads
	$ads_title = array('None' => '');
	$args = array( 'post_type' => 'ads', 'posts_per_page' => -1, );
	$loop = new WP_Query( $args );

	if( $loop->have_posts() ){
		while( $loop->have_posts() ): $loop->the_post();
			$ads_title[get_the_title()] = get_the_ID();
		endwhile;
	} else {
		$ads_title = array('No ads have been found!' => '');
	}
	wp_reset_postdata();
	
	$ads_category = array('None' => '');
	$terms = get_terms( 'ads_category', 'hide_empty=0' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$ads_category[$term->name] = $term->slug;
		}
	} else {
		$ads_category = array('No categories have been found!' => '');
	}

	vc_map( array(
		'name'		=> esc_html__('Ads', 'core-extend'),
		'base'		=> 'mnky_ads',
		'icon'		=> 'icon-mnky_ads',
		'category'	=> esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Add ads to the content', 'core-extend'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Specific ad', 'core-extend' ),
				'param_name' => 'id',
				'admin_label' => true,
				'value' => $ads_title,
			),		
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Ads by category', 'core-extend' ),
				'param_name' => 'category',
				'admin_label' => true,
				'value' => $ads_category,
				'dependency' => array('element' => 'id', 'value' => array('') )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'How many ads to show', 'core-extend' ),
				'param_name' => 'posts_per_page',
				'value' => '1',
				'dependency' => array('element' => 'id', 'value' => array('') )
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Rotate ads randomly', 'core-extend'),
				'param_name' => 'rotate_ads',
				'value' => array(esc_html__('On', 'core-extend') => 'on'),
				'dependency' => array('element' => 'id', 'value' => array('') )
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. <br> Use class "light" for white text and links.', 'core-extend')
			)			
		)
	) );		
	
	
	
}