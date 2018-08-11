<?php
/**
 * @package Cryptocurrency All-in-One
 */
/*
Plugin Name: Cryptocurrency All-in-One
Plugin URI: https://creditstocks.com/
Description: Provides multiple cryptocurrency features: accepting payments, displaying prices and exchange rates, cryptocurrency calculator, accepting donations.
Version: 2.6.2
Author: Boyan Yankov
Author URI: http://byankov.com/
Text Domain: cryprocurrency-prices
Domain Path: /languages/
License: GPL2 or later
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//define plugin url global
define('CP_URL', plugin_dir_url( __FILE__ ));

//include source files
require_once( dirname( __FILE__ ) . '/includes/currencyprice.class.php' );
require_once( dirname( __FILE__ ) . '/includes/cryptodonation.class.php' );
require_once( dirname( __FILE__ ) . '/includes/cryptopayment.class.php' );
require_once( dirname( __FILE__ ) . '/includes/ethereum.class.php' );
require_once( dirname( __FILE__ ) . '/includes/widget.class.php' );
require_once( dirname( __FILE__ ) . '/includes/common.class.php' );
if (file_exists(plugin_dir_path( __FILE__ ) . '/includes/premium.class.php')) {
  //load premium plugin features, if available
  include( plugin_dir_path( __FILE__ ) . '/includes/premium.class.php');
}

if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
  require_once( dirname( __FILE__ ) . '/includes/admin.class.php' );
	add_action( 'init', array( 'CPAdmin', 'init' ) );
}

//define suported shortcodes
add_shortcode( 'currencyprice', array( 'CPCurrencyInfo', 'cp_currencyprice_shortcode' ) );
add_shortcode( 'currencygraph', array( 'CPCurrencyInfo', 'cp_currencygraph_shortcode' ) );
add_shortcode( 'allcurrencies', array( 'CPCurrencyInfo', 'cp_all_currencies_shortcode' ) );
if (defined('CP_PREMIUM')){
  add_shortcode( 'cryptodonation', array( 'CPPremium', 'cp_cryptodonation_shortcode') );
} else {
  add_shortcode( 'cryptodonation', array( 'CPCryptoDonation', 'cp_cryptodonation_shortcode') );
}
if (defined('CP_PREMIUM')){
  add_shortcode( 'cryptopayment', array( 'CPPremium', 'cp_cryptopayment_shortcode' ) );
} else {
  add_shortcode( 'cryptopayment', array( 'CPCryptoPayment', 'cp_cryptopayment_shortcode' ) );
}
add_shortcode( 'cryptoethereum', array( 'CPEthereum', 'cp_ethereum_shortcode' ) );

//this plugin requires jquery library
add_action( 'wp_enqueue_scripts', array( 'CPCommon', 'cp_load_jquery') );

//handle plugin activation
register_activation_hook( __FILE__, array( 'CPCommon', 'cp_plugin_activate') );

//add widget support
add_action('widgets_init', array( 'CPCommon', 'cp_shortcode_widget_init') );

//add custom stylesheet
add_action('wp_head', array( 'CPCommon', 'cp_custom_styles'), 100);
if (defined('CP_PREMIUM') and get_option('cryptocurrency-prices-default-css') != '0'){
  add_action( 'wp_enqueue_scripts', array( 'CPPremium', 'cp_enqueue_styles') );
}

//add translation
add_action('plugins_loaded', array( 'CPCommon', 'cp_load_textdomain'));