<?php

// CPS SDK Version.
$this_sdk_version = '3.0';

// https://github.com/collizo4sky/persist-admin-notices-dismissal
require dirname( __FILE__ ) . '/pand/persist-admin-notices-dismissal.php';
add_action( 'admin_init', array( 'PAnD', 'init' ) );

// Custom styles and scripts for admin pages
function cps_admin_scripts() {
	$admin_url = plugins_url( '', __FILE__ );
	wp_enqueue_script( 'freemius-checkout-js', 'https://checkout.freemius.com/checkout.min.js', array( 'jquery' ), '2.3.0' );
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

function cps_admin_header() {
	$plugin_file_path = plugin_dir_path( dirname( __FILE__ ) );
	$plugin_file_name = basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '.php';
	$plugin_data = get_plugin_data( $plugin_file_path . $plugin_file_name );
	$plugin_name = $plugin_data['Name'];
	$headertitle = $plugin_name . ' | ' . __( 'Settings' );
	$headertitle = apply_filters( 'cps_admin_header_title', $headertitle );
	$fburl = apply_filters( 'cps_admin_header_facebook_url', 'https://www.facebook.com/groups/CherryPickStudios/' );
	$fbtitle = apply_filters( 'cps_admin_header_facebook_title', 'Join the Cherry Pick Studios Facebook Group, where you can ask any question or ask for new features. Everybody is welcome!' );
	$fbbuttontext = apply_filters( 'cps_admin_header_facebook_button_text', 'Join CPS Support Group' );
	$email = apply_filters( 'cps_admin_header_email', 'hello@cherrypickstudios.com' );
	$emailtitle = apply_filters( 'cps_admin_header_email_title', 'Cherry Pick Studios Email Support' );
	$website = apply_filters( 'cps_admin_header_website', 'https://www.cherrypickstudios.com/' );
	$websitetitle = apply_filters( 'cps_admin_header_website_title', 'Cherry Pick Studios Website' );
	$textDomain = apply_filters( 'cps_admin_header_textdomain', 'cps-admin/' );
	?><nav class="uk-navbar-container uk-margin" id="cps-header" uk-navbar>
		<div class="uk-navbar-left">
			<div class="uk-navbar-item uk-logo">
				<div><span uk-icon="icon: settings; ratio: 2"></span> <?php echo $headertitle ?></div>
			</div>
		</div>
		<div class="uk-navbar-right">
			<div class="uk-navbar-item">
				<a href="<?php echo $fburl ?>" class="facebook-button uk-button uk-button-primary" title="<?php _e( $fbtitle, $textDomain ); ?>" target="_blank"><span uk-icon="facebook"></span> <?php _e( $fbbuttontext, $textDomain ); ?></a>
			</div>
			<ul class="uk-navbar-nav">
				<li><a href="mailto:<?php echo $email ?>" title="<?php _e( $emailtitle, $textDomain ); ?>" target="_blank" uk-icon="mail"></a></li>
				<li><a href="<?php echo $website ?>" title="<?php _e( $websitetitle, $textDomain ); ?>" target="_blank" uk-icon="world"></a></li>
			</ul>
			<div class="uk-navbar-item"></div>
		</div>
	</nav><?php
}

function cps_admin_footer() {
	$plugin_file_path = plugin_dir_path( dirname( __FILE__ ) );
	$plugin_file_name = basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '.php';
	$plugin_data = get_plugin_data( $plugin_file_path . $plugin_file_name );
	$plugin_version = $plugin_data['Version'];
	$plugin_name = $plugin_data['Name'];
	$plugin_authorURI = $plugin_data['AuthorURI'];
	$plugin_pluginURI = $plugin_data['PluginURI'];
	$home_url = get_option( 'home' );
	$wp_version = get_bloginfo( 'version' );
	$php = phpversion();
	?><div class="uk-section uk-section-small">
    	<div class="uk-text-center">
			<p>
				<strong><a class="uk-link-reset" href="<?php echo $plugin_pluginURI; ?>" target="_blank"><?php echo $plugin_name; ?></a></strong> - v.<?php echo $plugin_version; ?><br>
				Made with &hearts; by <img src="https://www.cherrypickstudios.com/cps-logo/?url=<?php echo urlencode( $home_url ); ?>&plugin=<?php echo urlencode( $plugin_name ); ?>&ver=<?php echo urlencode( $plugin_version ); ?>&wpver=<?php echo urlencode( $wp_version ); ?>&php=<?php echo urlencode( $php ); ?>" alt="Cherry Pick Studios" width="20"> <a class="uk-link-reset" href="https://www.cherrypickstudios.com" target="_blank">Cherry Pick Studios</a>
			</p>
		</div>
	</div><?php
}
