<?php

// Custom styles and scripts for admin pages
function surbma_hc_admin_scripts( $hook ) {
	$admin_url = plugins_url( '', __FILE__ );
	global $surbma_hc_settings_page;
	global $surbma_hc_social_page;
	global $surbma_hc_cookies_page;
	global $surbma_hc_documentation_page;
	if ( $hook == $surbma_hc_settings_page || $hook == $surbma_hc_social_page || $hook == $surbma_hc_cookies_page || $hook == $surbma_hc_documentation_page ) {
		wp_enqueue_script( 'uikit-js', $admin_url . '/uikit/js/uikit.min.js', array( 'jquery' ), '3.0.0-rc.26' );
		wp_enqueue_script( 'uikit-icons', $admin_url . '/uikit/js/uikit-icons.min.js', array( 'jquery' ), '3.0.0-rc.26' );
		wp_enqueue_style( 'uikit-css', $admin_url . '/uikit/css/uikit.min.css', false, '3.0.0-rc.26' );
		wp_enqueue_style( 'surbma-admin', $admin_url . '/surbma-admin.css' );
	}
	wp_enqueue_style( 'surbma-global-admin', $admin_url . '/surbma-global-admin.css' );
}
add_action( 'admin_enqueue_scripts', 'surbma_hc_admin_scripts', 9999 );

function surbma_hc_admin_header() {
	$plugin_data = get_plugin_data( SURBMA_HC_PLUGIN_FILE );
	$plugin_name = $plugin_data['Name'];
	?><nav class="uk-navbar-container uk-margin" id="surbma-header" uk-navbar>
		<div class="uk-navbar-left">
			<div class="uk-navbar-item uk-logo">
				<div><span uk-icon="icon: settings; ratio: 2"></span> <?php echo $plugin_name ?></div>
			</div>
		</div>
	</nav><?php
}

function surbma_hc_admin_footer() {
	$plugin_data = get_plugin_data( SURBMA_HC_PLUGIN_FILE );
	$plugin_version = $plugin_data['Version'];
	$plugin_name = $plugin_data['Name'];
	$plugin_authorURI = $plugin_data['AuthorURI'];
	$plugin_pluginURI = $plugin_data['PluginURI'];
	?><div class="uk-section uk-section-small">
		<div class="uk-text-center">
			<p>
				<strong><a class="uk-link-reset" href="<?php echo $plugin_pluginURI; ?>" target="_blank"><?php echo $plugin_name; ?></a></strong><br>
				<a href="<?php echo $plugin_authorURI; ?>" target="_blank">Made with &hearts; by Surbma</a><br>
				v.<?php echo $plugin_version; ?>
			</p>
		</div>
	</div><?php
}

function surbma_hc_admin_sidebar() {
	$options = get_option( 'surbma_hc_fields' );
	?><div uk-sticky="offset: 42; bottom: #bottom">
	<div class="uk-card uk-card-small uk-card-default uk-card-hover">
		<div class="uk-card-header uk-background-muted">
			<h3 class="uk-card-title">Információk <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #informations"></a></h3>
		</div>
		<div id="informations" class="uk-card-body">
			<h4 class="uk-heading-divider">Bővítmény linkek</h4>
			<ul class="uk-list">
				<li><a href="https://wordpress.org/support/plugin/surbma-magyar-woocommerce" target="_blank">Hivatalos támogató fórum</a></li>
				<li><a href="https://hu.wordpress.org/plugins/surbma-magyar-woocommerce/#reviews" target="_blank">Olvasd el az értékeléseket (5/5 csillag)</a></li>
			</ul>
			<hr>
			<p>
				<strong>Tetszik a bővítmény? Kérlek értékeld 5 csillaggal:</strong>
				 <a href="https://wordpress.org/support/plugin/surbma-magyar-woocommerce/reviews/#new-post" target="_blank">Új értékelés létrehozása</a>
			</p>
			<h4 class="uk-heading-divider">Tervezett funkciók</h4>
			<ul class="uk-list">
				<li><span uk-icon="icon: check; ratio: 0.8"></span> Webáruházak kötelező jogi megfelelésének a technikai biztosítása.</li>
				<li><span uk-icon="icon: check; ratio: 0.8"></span> Globális adatok, amiket shortcode-dal lehet bárhol megjeleníteni.</li>
				<li><span uk-icon="icon: check; ratio: 0.8"></span> Köszönő oldal egyedi módosítási lehetősége.</li>
			</ul>
			<?php /*
			<h4 class="uk-heading-divider">Szerezd meg a PRO verziót</h4>
			<p>Aktiváld a HuCommerce bővítmény összes lehetőségét! A PRO verzió megvásárlásával további fantasztikus funkciókat és integrációkat kapsz.</p>
			<div class="uk-alert-success" style="display: none;" uk-alert>
				<?php _e( '<p>Use this special <strong>BEFOREGDPR</strong> coupon to get 50% OFF your first purchase, which is available till <strong>May 26, 2018</strong>. Hurry, GDPR is coming!</p>', 'surbma-gdpr-proof-google-analytics' ); ?>
			</div>
			<p><a class="uk-button uk-button-default uk-width-1-1" href="#">Vedd meg a PRO verziót!</a></p>
			<div class="uk-alert-primary" style="display: none;" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<h3><?php _e( 'Affiliate Program', 'surbma-gdpr-proof-google-analytics' ); ?></h3>
				<p><?php _e( 'Do you like this plugin? Let\'s make some money by referring new customers and get 20% commission, for the lifetime of the new customers! Good deal, hah?', 'surbma-gdpr-proof-google-analytics' ); ?></p>
				<p><a class="uk-button uk-button-primary uk-width-1-1" href="<?php echo esc_url( get_admin_url() ); ?>admin.php?page=surbma-gpga-menu-affiliation"><?php _e( 'Be an Affiliate!', 'surbma-gdpr-proof-google-analytics' ); ?></a></p>
			</div>
			*/ ?>
		</div>
		<div class="uk-card-footer uk-background-muted">
			<p class="uk-text-right"><?php _e( 'License: GPLv2', 'surbma-gdpr-proof-cookies' ); ?></p>
		</div>
	</div>
</div>
<?php
}
