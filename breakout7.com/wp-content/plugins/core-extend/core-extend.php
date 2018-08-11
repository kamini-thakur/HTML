<?php
/*
Plugin Name: Mag | Theme Core Extend
Plugin URI: http://themeforest.net/user/MNKY
Description: Extend Theme and Visual Composer features.
Version: 1.0.3
Author: MNKY
Author URI: http://mnkythemes.com/
License: Envato Marketplaces Split Licence
License URI: Envato Marketplace Item License Certificate 
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) die;


class MNKY_Core_Extend {
	
	function __construct() {
		require_once ( 'include/ads_post_type.php' );
		require_once ( 'include/widgets.php' );
		require_once ( 'include/importer/importer.php' );
		require_once ( 'include/post_views.php' );
		require_once ( 'include/meta_boxes.php' );
		if ( ! class_exists('Mobile_Detect') ){
			require_once ( 'include/Mobile_Detect.php' );
		}
		$this->_constants();
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}
	
	protected function _constants() {
		define( 'MNKY_PLUGIN_MAIN', __FILE__);
		define( 'MNKY_PLUGIN_PATH', plugin_dir_path(__FILE__) );
		define( 'MNKY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	}
	
	public function init() { 
		load_plugin_textdomain( 'core-extend', false,  plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
		
		// Use shortcodes in text widgets
		add_filter('widget_text', 'do_shortcode');

		// VC
		if ( ! function_exists( 'vc_map' ) ) {
			add_action('admin_notices', array( $this, 'vc_error' ) ); 
		} else {
			$this->vc_edit();
			add_action('wp_enqueue_scripts', array( $this, 'vc_scripts' ) );
		}
	}

	// Display notice if Visual Composer is not installed or activated
	public function vc_error() {
		echo '
		<div class="updated">
			<p>'. sprintf (esc_html_x( '%1$s Mag | Theme Core Extend %2$s requires Visual Composer plugin to be installed and activated on your site.', '%1$s and %2$s stand for <strong> tags.' ,'core-extend' ), '<strong>', '</strong>') .'</p>
		</div>';
	}
	
	// Enqueue scripts
	public function vc_scripts() {
		wp_enqueue_style( 'font-awesome' );
		wp_enqueue_style( 'core-extend', MNKY_PLUGIN_URL . 'assets/css/core-extend.css', array('js_composer_front'), 1.0 );
		wp_style_add_data( 'core-extend', 'rtl', MNKY_PLUGIN_URL . 'assets/css/core-extend-rtl.css' );
	}
	
	// Extend & configure VC	
	public function vc_edit() { 
		
		// Set shortcode template dir
		$dir = MNKY_PLUGIN_PATH . '/include/vc/shortcodes/';
		vc_set_shortcodes_templates_dir($dir);
				
			
		// Add params
		require_once ('include/vc/params.php');

		// Add shortcodes
		require_once ('include/vc/classes/icons.php');	
		require_once ('include/vc/classes/posts.php');	
		require_once ('include/vc/classes/heading.php');
		require_once ('include/vc/classes/ads.php');	
		require_once ('include/vc/classes/category.php');	
		require_once ('include/vc/classes/menu-posts.php');	
		require_once ('include/vc/classes/related-posts.php');	
		require_once ('include/vc/classes/posts-grid.php');	
		require_once ('include/vc/classes/news-ticker.php');	
		require_once ('include/vc/classes/button.php');	
		require_once ('include/vc/classes/service.php');	
		require_once ('include/vc/classes/list.php');		
		require_once ('include/vc/classes/post-slider.php');
		
		// Edit VC map
		require_once ('include/vc/map.php');
		
		// Add templates
		require_once ('include/vc/templates.php');
	}
}
$mnky_core_extend = new MNKY_Core_Extend();