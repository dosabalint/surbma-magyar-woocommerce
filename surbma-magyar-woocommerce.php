<?php

/*
Plugin Name: Surbma | Magyar WooCommerce
Plugin URI: https://surbma.hu/wordpress/wordpress-bovitmenyek/
Description: Hasznos javítások a magyar nyelvű WooCommerce webáruházakhoz.

Version: 4.4

Author: Surbma
Author URI: https://surbma.hu/

License: GPLv2

WC requires at least: 3.4.5
WC tested up to: 3.4.5
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

define( 'SURBMA_MWC_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

// Default state reset function
function surbma_mwc_default_checkout_state() {
    return null;
}
if ( !defined( 'SURBMA_MWC_MEGYE' ) || SURBMA_MWC_MEGYE != true ) {
    add_filter( 'default_checkout_billing_state', 'surbma_mwc_default_checkout_state' );
    add_filter( 'default_checkout_shipping_state', 'surbma_mwc_default_checkout_state' );
}

// Custom checkout fields
function surbma_mwc_filter_woocommerce_default_address_fields( $fields ) {
    $fields['last_name']['autofocus'] = false;
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'surbma_mwc_filter_woocommerce_default_address_fields' );

function surbma_mwc_filter_woocommerce_get_country_locale( $locale ) {
    $locale['HU']['last_name']['priority'] = 10;
    $locale['HU']['last_name']['class'] = array( 'form-row-first' );
    $locale['HU']['last_name']['autofocus'] = true;

    $locale['HU']['first_name']['priority'] = 20;
    $locale['HU']['first_name']['class'] = array( 'form-row-last' );
    $locale['HU']['first_name']['autofocus'] = false;

    $locale['HU']['postcode']['priority'] = 42;
    $locale['HU']['postcode']['class'] = array( 'form-row-first' );

    $locale['HU']['city']['priority'] = 44;
    $locale['HU']['city']['class'] = array( 'form-row-last' );

	if ( !defined( 'SURBMA_MWC_MEGYE' ) || SURBMA_MWC_MEGYE != true ) {
    	$locale['HU']['state']['required'] = false;
	}

    return $locale;
}
add_filter( 'woocommerce_get_country_locale', 'surbma_mwc_filter_woocommerce_get_country_locale' );

// Hide the state field
function surbma_mwc_remove_hu_states( $states ) {
	if ( !defined( 'SURBMA_MWC_MEGYE' ) || SURBMA_MWC_MEGYE != true ) {
        $states['HU'] = array();
        return $states;
    }
}
add_filter( 'woocommerce_states', 'surbma_mwc_remove_hu_states' );

// Custom translations
function surbma_mwc_custom_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'I&rsquo;ve read and accept the <a href="%s" target="_blank" class="woocommerce-terms-and-conditions-link">terms &amp; conditions</a>' :
			$translated_text = 'Elolvastam és elfogadom az <a href="%s" target="_blank" class="woocommerce-terms-and-conditions-link">általános szerződési feltételeket</a>.';
			break;
	}
	return $translated_text;
}
// add_filter( 'gettext', 'surbma_mwc_custom_strings', 20, 3 );

// Add plugin woocommerce templates if exist
function surbma_mwc_locate_template( $template, $template_name, $template_path ) {
    global $woocommerce;
    $_template = $template;

    if ( !$template_path ) $template_path = $woocommerce->template_url;
        $plugin_path = SURBMA_MWC_PLUGIN_DIR . '/woocommerce/';

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
add_filter( 'woocommerce_locate_template', 'surbma_mwc_locate_template', 10, 3 );

// Fixed Hungarian address format
function surbma_mwc_address_format( $format ) {
    $format['HU']="{last_name} {first_name}\n{company}\n{postcode} {city}\n{address_1}\n{address_2}\n{country}";
    return $format;
}
add_filter( 'woocommerce_localisation_address_formats', 'surbma_mwc_address_format' );
