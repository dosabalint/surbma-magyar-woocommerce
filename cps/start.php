<?php

// CPS SDK Version.
$this_sdk_version = '1.0';

// Custom styles and scripts for admin pages
function cps_admin_scripts() {
	$admin_url = plugins_url( '', __FILE__ );
	wp_enqueue_script( 'uikit-js', $admin_url . '/uikit/js/uikit.min.js', array( 'jquery' ), '3.0.3' );
	wp_enqueue_script( 'uikit-icons', $admin_url . '/uikit/js/uikit-icons.min.js', array( 'jquery' ), '3.0.3' );
	wp_enqueue_style( 'uikit-css', $admin_url . '/uikit/css/uikit.min.css', false, '3.0.3' );
	wp_enqueue_style( 'cps-admin', $admin_url . '/cps-admin.css' );
}

// Add inline CSS in the admin
function cps_admin_custom_admin_head() {
	// Remove Freemius promotional tab from admin pages.
	echo '<style>#pframe {display: none !important;}</style>';
}
add_action( 'admin_head', 'cps_admin_custom_admin_head' );
