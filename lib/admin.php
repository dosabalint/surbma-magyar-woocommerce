<?php

include_once( SURBMA_HC_PLUGIN_DIR . '/admin/surbma-admin.php');
include_once( SURBMA_HC_PLUGIN_DIR . '/pages/settings.php');

/* Admin options menu */
function surbma_hc_add_menus() {
	global $surbma_hc_settings_page;
	$surbma_hc_settings_page = add_submenu_page(
		'woocommerce',
		'HuCommerce',
		'HuCommerce',
		'manage_options',
		'surbma-hucommerce-menu',
		'surbma_hc_settings_page'
	);
}
add_action( 'admin_menu', 'surbma_hc_add_menus', 999 );

function surbma_hc_admin_notices() {
	// Notification if user is activated the license, but still use the free version
	global $surbma_hc_fs;
	if( SURBMA_HC_PLUGIN_VERSION == 'free' && SURBMA_HC_PLUGIN_LICENSE == 'valid' ) {
		echo '<div class="notice notice-error">' . __('<p><strong>IMPORTANT!</strong> You have a valid license for Surbma - GDPR Proof Cookies plugin, but still using the FREE version.</p><p>You have to download the PREMIUM version from the <a href="' . $surbma_hc_fs->get_account_url() . '">GDPR Proof Cookies -> Account</a> menu and activate it. Please also delete the FREE version of the plugin!</p>') . '</div>';
	}

	// Notification if user is using the premium version, but didn't delete the free version
	$freePluginFile = ABSPATH . 'wp-content/plugins/surbma-gdpr-proof-google-analytics/surbma-gdpr-proof-google-analytics.php';
	if( SURBMA_HC_PLUGIN_VERSION == 'premium' && file_exists( $freePluginFile ) ) {
		echo '<div class="notice notice-error">' . __('<p><strong>IMPORTANT!</strong> Please delete the FREE version of the Surbma - GDPR Proof Cookies plugin!</p><p>Go to <a href="' . admin_url() . 'plugins.php">Plugins</a> menu and search for the Surbma - GDPR Proof Cookies plugin. Delete the FREE version and you are done.</p>') . '</div>';
	}
}
// add_action( 'admin_notices', 'surbma_hc_admin_notices' );
