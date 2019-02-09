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
