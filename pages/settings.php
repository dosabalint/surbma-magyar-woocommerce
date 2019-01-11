<?php

function surbma_hc_fields_init() {
	register_setting(
		'surbma_hc_options',
		'surbma_hc_fields',
		'surbma_hc_fields_validate'
	);
}
add_action( 'admin_init', 'surbma_hc_fields_init' );

function surbma_hc_settings_page() {

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

					<?php if( $huformatfixValue == 1 ) { ?>
					<div class="uk-card uk-card-small uk-card-default uk-card-hover uk-margin-bottom">
						<div class="uk-card-header uk-background-muted">
							<h3 class="uk-card-title">Magyar formátum beállítások <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #huformatfix"></a></h3>
					    </div>
					    <div id="huformatfix" class="uk-card-body">

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

					    </div>
					    <div class="uk-card-footer uk-background-muted">
							<p><input type="submit" class="uk-button uk-button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
						</div>
					</div>
					<?php } ?>

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
	$options = get_option( 'surbma_hc_fields' );

	// Checkbox validation.
	$input['plusminus'] = isset( $input['plusminus'] ) && $input['plusminus'] == 1 ? 1 : 0;
	$input['huformatfix'] = isset( $input['huformatfix'] ) && $input['huformatfix'] == 1 ? 1 : 0;
	$input['nocounty'] = isset( $input['nocounty'] ) && $input['nocounty'] == 1 ? 1 : 0;
	$input['translations'] = isset( $input['translations'] ) && $input['translations'] == 1 ? 1 : 0;

	return $input;
}
