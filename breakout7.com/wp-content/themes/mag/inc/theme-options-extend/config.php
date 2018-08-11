<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Edit option panel
*	--------------------------------------------------------------------- 
*/


function filter_list_item_title_desc( $label, $id ) {
	$label = esc_html__( 'Add a title only you will see. This makes it easier to drag & drop.', 'mag' );
	return $label;
}
add_filter( 'ot_list_item_title_desc', 'filter_list_item_title_desc', 10, 2 );


function mnky_ot_header_logo() {
	return '<div class="dashicons dashicons-admin-settings" style="font-size:22px; padding:4px 8px 5px 8px"></div>';
}
add_filter( 'ot_header_logo_link', 'mnky_ot_header_logo', 10, 2 );

function mnky_ot_header_version() {
	return 'Mag - v'. wp_get_theme()->get( 'Version' );
}
add_filter( 'ot_header_version_text', 'mnky_ot_header_version', 10, 2 );

function mnky_ot_upload_text() {
	return 'Add to Panel';
}
add_filter( 'ot_upload_text', 'mnky_ot_upload_text', 10, 2 );


/*	
*	---------------------------------------------------------------------
*	MNKY Edit option
*	--------------------------------------------------------------------- 
*/

function mnky_radio_images( $array, $field_id ) {
	if ( $field_id == 'layout_style' ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	  => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-fullwidth.png'
			),
			array(
				'value'   => 'boxed',
				'label'   => esc_html__( 'Boxed layout', 'mag' ),
				'src'	  => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-boxed.png'
			)
		);
	} 	
	
	if ( $field_id == 'mnky_custom_layout_style' ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Default', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/admin-default.png'
			),			
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-fullwidth.png'
			),
			array(
				'value'   => 'boxed',
				'label'   => esc_html__( 'Boxed layout', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-boxed.png'
			)
		);
	} 
	
	if ( $field_id == 'catalog_layout'  || $field_id == 'product_layout' || $field_id == 'blog_layout' ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'right-sidebar',
				'label'   => esc_html__( 'Right sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'left-sidebar',
				'label'   => esc_html__( 'Left sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}
	
	if ( $field_id == 'post_layout' ) {
		$array = array(
			array(
				'value'   => 'single.php',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'single-right-sidebar.php',
				'label'   => esc_html__( 'Right sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'single-left-sidebar.php',
				'label'   => esc_html__( 'Left sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}	
	if ( $field_id == 'mnky_custom_post_template' ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Default (Selected in theme options panel)', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/admin-default.png'
			),				
			array(
				'value'   => 'single.php',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'single-right-sidebar.php',
				'label'   => esc_html__( 'Right sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'single-left-sidebar.php',
				'label'   => esc_html__( 'Left sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}
	
	if ( $field_id == 'mnky_post_header_style' ) {
		$array = array(
			array(
				'value'   => 'opt_default',
				'label'   => esc_html__( 'Default', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/admin-default.png'
			),				
			array(
				'value'   => 'style_default',
				'label'   => esc_html__( 'Simple', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/header-style-default.png'
			),				
			array(
				'value'   => 'style_1',
				'label'   => esc_html__( 'Custom Style', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/header-style-1.png'
			),
			array(
				'value'   => 'style_2',
				'label'   => esc_html__( 'Custom Style', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/header-style-2.png'
			)
		);
	}		
	
	if ( $field_id == 'post_header_style_opt' ) {
		$array = array(
			array(
				'value'   => 'style_default',
				'label'   => esc_html__( 'Default', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/header-style-default.png'
			),				
			array(
				'value'   => 'style_1',
				'label'   => esc_html__( 'Custom Style', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/header-style-1.png'
			),
			array(
				'value'   => 'style_2',
				'label'   => esc_html__( 'Custom Style', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/header-style-2.png'
			)
		);
	}	


	if ( preg_match( '/^category_styles_cat_layout_/', $field_id ) ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/admin-default.png'
			),	
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'right-sidebar',
				'label'   => esc_html__( 'Right sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'left-sidebar',
				'label'   => esc_html__( 'Left sidebar', 'mag' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}	
		
	
	
	return $array;
}
add_filter( 'ot_radio_images', 'mnky_radio_images', 10, 2 );