<?php

function surbma_hc_fields_init() {
	register_setting(
		'surbma_hc_options',
		'surbma_hc_fields',
		'surbma_hc_fields_validate'
	);
}
add_action( 'admin_init', 'surbma_hc_fields_init' );

$returntoshop_cart_position_options = array(
	'beforecarttable' => array(
		'value' => 'beforecarttable',
		'label' => 'Termék táblázat előtt (üzenettel)'
	),
	'aftercarttable' => array(
		'value' => 'aftercarttable',
		'label' => 'Termék táblázat után (üzenettel)'
	),
	'cartactions' => array(
		'value' => 'cartactions',
		'label' => 'Kosár frissítése gomb mellett (üzenet nélkül)'
	),
	'proceedtocheckout' => array(
		'value' => 'proceedtocheckout',
		'label' => 'Tovább a pénztárhoz gomb után (üzenet nélkül)'
	)
);

$returntoshop_checkout_position_options = array(
	'nocheckout' => array(
		'value' => 'nocheckout',
		'label' => 'A Pénztár oldalon ne jelenjen meg'
	),
	'beforecheckoutform' => array(
		'value' => 'beforecheckoutform',
		'label' => 'Pénztár űrlap előtt (üzenettel)'
	),
	'aftercheckoutform' => array(
		'value' => 'aftercheckoutform',
		'label' => 'Pénztár űrlap után (üzenettel)'
	)
);

function surbma_hc_settings_page() {
	global $returntoshop_cart_position_options;
	global $returntoshop_checkout_position_options;

	$freeNotification = '<p class="uk-text-meta uk-text-center">Ezek a modulok a bővítmény PRO kiegészítőjével érhetők el, amelyet külön kell megvásárolni a bővítményhez.</p>';

?>
<div class="surbma-admin surbma-settings-page">
	<?php surbma_hc_admin_header(); ?>
	<div class="wrap">
		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
			<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
		<?php } ?>

		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-3-4@l">
				<form class="uk-form-horizontal" method="post" action="options.php">
					<?php settings_fields( 'surbma_hc_options' ); ?>
					<?php $options = get_option( 'surbma_hc_fields' ); ?>

					<div class="uk-card uk-card-small uk-card-default uk-card-hover uk-margin-bottom">
						<div class="uk-card-header uk-background-muted">
							<h3 class="uk-card-title">HuCommerce modulok <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #hc-modules"></a></h3>
						</div>
						<div id="hc-modules" class="uk-card-body">

							<div class="uk-margin">
								<div class="uk-form-label">Magyar formátum javítások <span uk-icon="icon: info; ratio: 1" uk-tooltip="title: A keresztnév és vezetéknév sorrendjének a megfordítása a Pénztár oldalon akkor, ha a cím Magyarország. Megye mező elrejtése. Az Irányítószám és Város mezők pozícionálása a pénztár oldalon.; pos: right"></span></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<label class="switch">
											<?php $huformatfixValue = isset( $options['huformatfix'] ) ? $options['huformatfix'] : 1; ?>
											<input id="surbma_hc_fields[huformatfix]" name="surbma_hc_fields[huformatfix]" type="checkbox" value="1" <?php checked( '1', $huformatfixValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
								</div>
							</div>

							<div class="uk-margin">
								<div class="uk-form-label">Plusz/minusz mennyiségi gombok <span uk-icon="icon: info; ratio: 1" uk-tooltip="title: A mennyiség mezőnél megjelenít egy plusz/minusz gombot, amivel lehet módosítani a mennyiséget.; pos: right"></span></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<label class="switch">
											<?php $plusminusValue = isset( $options['plusminus'] ) ? $options['plusminus'] : 0; ?>
											<input id="surbma_hc_fields[plusminus]" name="surbma_hc_fields[plusminus]" type="checkbox" value="1" <?php checked( '1', $plusminusValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
								</div>
							</div>

							<div class="uk-margin">
								<div class="uk-form-label">Vásárlás folytatása gombok <span uk-icon="icon: info; ratio: 1" uk-tooltip="title: Egy gombot helyez el a Kosár és/vagy a Pénztár oldalon, amivel folytathatja a látogató a vásárlást. A gomb az üzlet oldalra viszi a látogatót.; pos: right"></span></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<label class="switch">
											<?php $returntoshopValue = isset( $options['returntoshop'] ) ? $options['returntoshop'] : 0; ?>
											<input id="surbma_hc_fields[returntoshop]" name="surbma_hc_fields[returntoshop]" type="checkbox" value="1" <?php checked( '1', $returntoshopValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
								</div>
							</div>

							<div class="uk-margin">
								<div class="uk-form-label">Fordítási hiányosságok javítása <span uk-icon="icon: info; ratio: 1" uk-tooltip="title: Ideiglenes fordítási hiányosságok javítása, amíg a hivatalos fordításban esetleg nem jelenik meg vagy nem frissíti a rendszer.; pos: right"></span></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<label class="switch">
											<?php $translationsValue = isset( $options['translations'] ) ? $options['translations'] : 1; ?>
											<input id="surbma_hc_fields[translations]" name="surbma_hc_fields[translations]" type="checkbox" value="1" <?php checked( '1', $translationsValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
								</div>
							</div>

							<?php /*
							<h4 class="uk-heading-divider">PRO modulok</h4>

							<div class="uk-margin<?php if ( SURBMA_HC_PLUGIN_VERSION == 'free' || SURBMA_HC_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>">
								<div class="uk-form-label">Árukereső és Árgép integráció</div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<label class="switch">
											<?php $aaintegrationValue = isset( $options['aaintegration'] ) ? $options['aaintegration'] : 1; ?>
											<input id="surbma_hc_fields[aaintegration]" name="surbma_hc_fields[aaintegration]" type="checkbox" value="1" <?php checked( '1', $aaintegrationValue ); ?><?php if ( SURBMA_HC_PLUGIN_VERSION == 'free' || SURBMA_HC_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?> />
											<span class="slider round"></span>
										</label>
									</p>
								</div>
							</div>
							<?php if ( SURBMA_HC_PLUGIN_VERSION == 'free' || SURBMA_HC_PLUGIN_LICENSE != 'valid' ) { ?>
								<?php echo $freeNotification; ?>
							<?php } ?>
							*/ ?>
						</div>
						<div class="uk-card-footer uk-background-muted">
							<p><input type="submit" class="uk-button uk-button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
						</div>
					</div>

					<div class="uk-card uk-card-small uk-card-default uk-card-hover uk-margin-bottom">
						<div class="uk-card-header uk-background-muted">
							<h3 class="uk-card-title">További beállítások a modulokhoz <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #modulesettings"></a></h3>
						</div>
						<div id="modulesettings" class="uk-card-body">

							<h4 class="uk-heading-divider">Magyar formátum javítások</h4>

							<div class="uk-margin">
								<div class="uk-form-label">Megye mező elrejtése <span uk-icon="icon: info; ratio: 1" uk-tooltip="title: Mert ezt nálunk nem szokás használni, így csak plusz felesleges lépés.; pos: right"></span></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<label class="switch">
											<?php $nocountyValue = isset( $options['nocounty'] ) ? $options['nocounty'] : 1; ?>
											<input id="surbma_hc_fields[nocounty]" name="surbma_hc_fields[nocounty]" type="checkbox" value="1" <?php checked( '1', $nocountyValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
								</div>
							</div>

							<h4 class="uk-heading-divider">Vásárlás folytatása gombok</h4>

							<div class="uk-margin">
								<div class="uk-form-label">Gomb pozíciója a Kosár oldalon</div>
								<div class="uk-form-controls">
									<select class="uk-select" name="surbma_hc_fields[returntoshopcartposition]">
										<?php
											$returntoshopcartpositionValue = isset( $options['returntoshopcartposition'] ) ? $options['returntoshopcartposition'] : 'cartactions';
											$selected = $returntoshopcartpositionValue;
											$p = '';
											$r = '';

											foreach ( $returntoshop_cart_position_options as $option ) {
												$label = $option['label'];
												if ( $selected == $option['value'] ) // Make default first in list
													$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
												else
													$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
											}
											echo $p . $r;
										?>
									</select>
								</div>
							</div>

							<div class="uk-margin">
								<div class="uk-form-label">Gomb pozíciója a Pénztár oldalon</div>
								<div class="uk-form-controls">
									<select class="uk-select" name="surbma_hc_fields[returntoshopcheckoutposition]">
										<?php
											$returntoshopcheckoutpositionValue = isset( $options['returntoshopcheckoutposition'] ) ? $options['returntoshopcheckoutposition'] : 'nocheckout';
											$selected = $returntoshopcheckoutpositionValue;
											$p = '';
											$r = '';

											foreach ( $returntoshop_checkout_position_options as $option ) {
												$label = $option['label'];
												if ( $selected == $option['value'] ) // Make default first in list
													$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
												else
													$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
											}
											echo $p . $r;
										?>
									</select>
								</div>
							</div>

							<div class="uk-margin">
								<label class="uk-form-label" for="surbma_hc_fields[returntoshopmessage]">Üzenet szövege</label>
								<div class="uk-form-controls">
									<?php $returntoshopmessageValue = isset( $options['returntoshopmessage'] ) ? $options['returntoshopmessage'] : 'Szeretnél még körbenézni a webáruházunkban?'; ?>
									<input id="surbma_hc_fields[returntoshopmessage]" class="uk-input" type="text" name="surbma_hc_fields[returntoshopmessage]" value="<?php echo stripslashes( $returntoshopmessageValue ); ?>" />
								</div>
							</div>

						</div>
						<div class="uk-card-footer uk-background-muted">
							<p><input type="submit" class="uk-button uk-button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
						</div>
					</div>

				</form>
			</div>
			<div class="uk-width-1-4@l">
				<?php surbma_hc_admin_sidebar(); ?>
			</div>
		</div>
		<div class="uk-margin-bottom" id="bottom"></div>
	</div>
	<?php surbma_hc_admin_footer(); ?>
</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function surbma_hc_fields_validate( $input ) {
	global $returntoshop_cart_position_options;
	global $returntoshop_checkout_position_options;

	$options = get_option( 'surbma_hc_fields' );

	// Checkbox validation.
	$input['huformatfix'] = isset( $input['huformatfix'] ) && $input['huformatfix'] == 1 ? 1 : 0;
	$input['plusminus'] = isset( $input['plusminus'] ) && $input['plusminus'] == 1 ? 1 : 0;
	$input['translations'] = isset( $input['translations'] ) && $input['translations'] == 1 ? 1 : 0;
	$input['returntoshop'] = isset( $input['returntoshop'] ) && $input['returntoshop'] == 1 ? 1 : 0;
	$input['nocounty'] = isset( $input['nocounty'] ) && $input['nocounty'] == 1 ? 1 : 0;

	// Our select option must actually be in our array of select options
	if ( !array_key_exists( $input['returntoshopcartposition'], $returntoshop_cart_position_options ) )
		$input['returntoshopcartposition'] = 'cartactions';
	if ( !array_key_exists( $input['returntoshopcheckoutposition'], $returntoshop_checkout_position_options ) )
		$input['returntoshopcheckoutposition'] = 'nocheckout';

	// Say our text option must be safe text with no HTML tags
	$input['returntoshopmessage'] = wp_filter_nohtml_kses( $input['returntoshopmessage'] );

	return $input;
}
