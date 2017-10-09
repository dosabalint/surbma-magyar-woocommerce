<?php

/*
Plugin Name: Surbma - Magyar WooCommerce
Plugin URI: https://surbma.hu/wordpress/wordpress-bovitmenyek/
Description: Hasznos javítások a magyar nyelvű WooCommerce webáruházakhoz.

Version: 1.0.0

Author: Surbma
Author URI: http://surbma.hu/

License: GPLv2

WC requires at least: 3.1.0
WC tested up to: 3.2.0
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

function change_default_checkout_state() {
    return null;
}
if ( !defined( 'SURBMA_MWC_MEGYE' ) || SURBMA_MWC_MEGYE != true ) {
    add_filter( 'default_checkout_billing_state', 'surbma_mwc_default_checkout_state' );
    add_filter( 'default_checkout_shipping_state', 'surbma_mwc_default_checkout_state' );
}

function surbma_mwc_filter_woocommerce_get_country_locale( $locale ) {
    $locale['HU']['last_name']['priority'] = 10;
    $locale['HU']['last_name']['class'] = array( 'form-row-first' );

    $locale['HU']['first_name']['priority'] = 20;
    $locale['HU']['first_name']['class'] = array( 'form-row-last' );

	if ( !defined( 'SURBMA_MWC_MEGYE' ) || SURBMA_MWC_MEGYE != true ) {
    	$locale['HU']['state']['required'] = false;
    	$locale['HU']['state']['class'] = array( 'surbma-mwc-hidden' );
	}

    return $locale;
}
add_filter( 'woocommerce_get_country_locale', 'surbma_mwc_filter_woocommerce_get_country_locale' );

function surbma_mwc_css() {
    echo '<style>.surbma-mwc-hidden{display:none!important;}</style>';
}
add_action( 'wp_head', 'surbma_mwc_css' );
