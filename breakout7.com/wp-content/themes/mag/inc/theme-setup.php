<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Theme Setup
*	--------------------------------------------------------------------- 
*/


// Set content width
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}
if ( ! function_exists( 'mnky_content_width' ) ) {
	function mnky_content_width() {
			global $content_width;
			$content_width = ot_get_option('content_width', '1200');
	}
}
add_action( 'template_redirect', 'mnky_content_width' );

if ( ! function_exists( 'mnky_theme_setup' ) ) {
	function mnky_theme_setup() {

		// Register menu
		register_nav_menus( array(
			'primary' => esc_html__( 'Main Navigation Left', 'mag' ),
			'secondary' => esc_html__( 'Main Navigation Right', 'mag' ),
			'side' => esc_html__( 'Side Navigation', 'mag' ),
			'mobile' => esc_html__( 'Mobile Navigation', 'mag' )
		) );

		// Menu fallback
		function mnky_no_menu(){
			$url = admin_url( 'nav-menus.php');
			echo '<div class="menu-container"><ul class="menu"><li><a href="'. esc_url($url) .'">'.esc_html__( 'Click here to assign menu!', 'mag' ).'</a></li></ul></div>';
		}

		// Thumbnails
		add_theme_support( 'post-thumbnails' );
		
		// Custom image sizes
		add_image_size( 'mnky_size-100x100', 100, 100, true );
		add_image_size( 'mnky_size-200x200', 200, 200, true );
		add_image_size( 'mnky_size-300x200', 300, 200, true );
		add_image_size( 'mnky_size-600x400', 600, 400, true );
		add_image_size( 'mnky_size-1200x800', 1200, 800, true );

		// Title tag
		add_theme_support( 'title-tag' );

		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'link', 'hello' ) );

		// Feeds
		add_theme_support( 'automatic-feed-links' );

		// HTML5
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
		// Widget selective refresh
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Languages
		load_theme_textdomain( 'mag', get_template_directory() . '/languages' );
		
		// Editor style
		add_editor_style( 'custom-editor-style.css' );

	}
}
add_action( 'after_setup_theme', 'mnky_theme_setup' );


// Add Single post templates
if ( ! function_exists( 'mnky_post_template' ) ) {
	function mnky_post_template( $template ) {
		global $post;
		
		if( is_singular('post') ){
			$custom_field = get_post_meta( $post->ID, 'mnky_custom_post_template', true );

			if( ! $custom_field ) {
				if( ot_get_option('post_layout') != 'single.php') {
					$custom_field = ot_get_option('post_layout');
				} else {
					return $template;
				}
			} elseif( $custom_field == 'single.php') {
				return $template;
			}
			
			// Prevent directory traversal
			$custom_field = str_replace( '..', '', $custom_field );
			
			if(strlen($custom_field) > 0) {
				if( file_exists( get_stylesheet_directory() . "/{$custom_field}" ) ) {
					$template = get_stylesheet_directory() . "/{$custom_field}";
				} elseif( file_exists( get_template_directory() . "/{$custom_field}" ) ) {
					$template = get_template_directory() . "/{$custom_field}";
				}
			}		
		}
		return $template;
	}
}
add_filter( 'single_template', 'mnky_post_template' );

/* Remove editor from "Ads" post type */
if ( ! function_exists( 'mnky_edit_ads_post_type' ) ) {
	function mnky_edit_ads_post_type() {
		remove_post_type_support( 'ads', 'editor' );
	}
}
add_action( 'init', 'mnky_edit_ads_post_type' );

// Redirect to "Theme Options/Import Data" after activation
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	wp_redirect( admin_url( 'themes.php?page=mag-welcome' ) );
}
