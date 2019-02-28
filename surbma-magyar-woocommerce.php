<?php

/*
Plugin Name: HuCommerce - Magyar WooCommerce kiegészítések
Plugin URI: https://www.hucommerce.hu/
Description: Hasznos javítások a magyar nyelvű WooCommerce webáruházakhoz.

Version: 11.2

Author: HuCommerce
Author URI: https://www.hucommerce.hu/

License: GPLv2

WC requires at least: 3.4.5
WC tested up to: 3.5.5
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

define( 'SURBMA_HC_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'SURBMA_HC_PLUGIN_URL', plugins_url( '', __FILE__ ) );
define( 'SURBMA_HC_PLUGIN_FILE', __FILE__ );

// Check if free or premium version is used
if( !defined( 'SURBMA_HC_PLUGIN_VERSION' ) ) {
	define( 'SURBMA_HC_PLUGIN_VERSION', 'free' );
}

$options = get_option( 'surbma_hc_fields' );
$huformatfixValue = isset( $options['huformatfix'] ) ? $options['huformatfix'] : 1;
$plusminusValue = isset( $options['plusminus'] ) ? $options['plusminus'] : 0;
$returntoshopValue = isset( $options['returntoshop'] ) ? $options['returntoshop'] : 0;
$loginregistrationredirectValue = isset( $options['loginregistrationredirect'] ) ? $options['loginregistrationredirect'] : 0;
$freeshippingnoticeValue = isset( $options['freeshippingnotice'] ) ? $options['freeshippingnotice'] : 0;
$taxnumberValue = isset( $options['taxnumber'] ) ? $options['taxnumber'] : 0;
$legalcheckoutValue = isset( $options['legalcheckout'] ) ? $options['legalcheckout'] : 0;
$autofillcityValue = isset( $options['autofillcity'] ) ? $options['autofillcity'] : 0;
// $translationsValue = isset( $options['translations'] ) ? $options['translations'] : 1;

// Include files & modules
if ( is_admin() ) {
	include_once( SURBMA_HC_PLUGIN_DIR . '/lib/admin.php' );
}
else {
	// if( $translationsValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/translations.php' );
}
if( $huformatfixValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/hu-format-fix.php' );
if( $plusminusValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/plus-minus-buttons.php' );
if( $returntoshopValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/return-to-shop.php' );
if( $loginregistrationredirectValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/login-registration-redirect.php' );
if( $freeshippingnoticeValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/free-shipping-notice.php' );
if( $taxnumberValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/tax-number.php' );
if( $legalcheckoutValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/legal-checkout.php' );
if( $autofillcityValue == 1 ) include_once( SURBMA_HC_PLUGIN_DIR . '/modules/autofill-city.php' );

// Add plugin woocommerce templates if exist
function surbma_hc_locate_template( $template, $template_name, $template_path ) {
	global $woocommerce;
	$_template = $template;

	if ( !$template_path ) $template_path = $woocommerce->template_url;
		$plugin_path = SURBMA_HC_PLUGIN_DIR . '/woocommerce/';

	// Look within passed path within the theme – this is priority
	$template = locate_template(
		array( $template_path . $template_name, $template_name )
	);

	// Modification: Get the template from this plugin, if it exists
	if ( !$template && file_exists( $plugin_path . $template_name ) )
		$template = $plugin_path . $template_name;

	// Use default template
	if ( !$template )
		$template = $_template;

	// Return what we found
	return $template;
}
add_filter( 'woocommerce_locate_template', 'surbma_hc_locate_template', 10, 3 );
