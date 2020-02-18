<?php

function surbma_hc_checkout_scripts() {
	$options = get_option( 'surbma_hc_fields' );
	$nocountryValue = isset( $options['nocountry'] ) ? $options['nocountry'] : 0;
	if( is_checkout() && $nocountryValue == 1 ) {
		wp_enqueue_script( 'surbma_hc_checkout_nocountry', SURBMA_HC_PLUGIN_URL . '/assets/js/nocountry.js', array( 'jquery' ), SURBMA_HC_PLUGIN_VERSION_NUMBER, true );
	}
	$billingcompanycheckValue = isset( $options['billingcompanycheck'] ) ? $options['billingcompanycheck'] : 0;
	if( is_checkout() && $billingcompanycheckValue == 1 ) {
		wp_enqueue_script( 'surbma_hc_checkout_billingcompanycheck', SURBMA_HC_PLUGIN_URL . '/assets/js/billingcompanycheck.js', array( 'jquery' ), SURBMA_HC_PLUGIN_VERSION_NUMBER, true );
	}
}
add_action( 'wp_enqueue_scripts', 'surbma_hc_checkout_scripts' );

// Add new Billing Company check field.
function surbma_hc_checkout_custom_billing_fields( $fields ) {
	$options = get_option( 'surbma_hc_fields' );
	$billingcompanycheckValue = isset( $options['billingcompanycheck'] ) ? $options['billingcompanycheck'] : 0;
	if( $billingcompanycheckValue == 1 ) {
		$fields['billing_company_check'] = array(
			'type' 			=> 'checkbox',
			'label' 		=> __( 'Company billing', 'surbma-magyar-woocommerce' ),
			'required' 		=> false,
			'class' 		=> array( 'form-row-wide' ),
			'priority' 		=> 29,
			'clear' 		=> true
		);
	}
	return $fields;
}
add_filter( 'woocommerce_billing_fields', 'surbma_hc_checkout_custom_billing_fields' );

// Pre-populate billing_country field, if it's hidden
function surbma_hc_checkout_field_values( $input, $key ) {
	$options = get_option( 'surbma_hc_fields' );
	$nocountryValue = isset( $options['nocountry'] ) ? $options['nocountry'] : 0;
	if( $nocountryValue == 1 ) {
		// The country/state
		$store_raw_country = get_option( 'woocommerce_default_country' );
		// Split the country/state
		$split_country = explode( ":", $store_raw_country );
		// Country and state separated:
		$store_country = $split_country[0];
		// $store_state   = $split_country[1];

		switch ($key) :
			case 'billing_country':
				return $store_country;
			break;
		endswitch;
	}
}
add_filter( 'woocommerce_checkout_get_value', 'surbma_hc_checkout_field_values', 10, 2 );

// Customize the checkout default address fields
function surbma_hc_checkout_filter_default_address_fields( $address_fields ) {
	$options = get_option( 'surbma_hc_fields' );

	// Put Postcode and City fields before Address fields
	$address_fields['postcode']['priority'] = 42;
	$address_fields['city']['priority'] = 44;

	$postcodecitypairValue = isset( $options['postcodecitypair'] ) ? $options['postcodecitypair'] : 0;
	if ( $postcodecitypairValue == 1 ) {
		$address_fields['postcode']['class'] = array( 'form-row-first' );
		$address_fields['city']['class'] = array( 'form-row-last' );
	}

	// Remove Billing country field
	/* This function is removed, because country field is hidden with JS & CSS
	$nocountryValue = isset( $options['nocountry'] ) ? $options['nocountry'] : 0;
	if ( $nocountryValue == 1 ) {
		$address_fields['country']['required'] = false;
		unset( $address_fields['country'] );
	}
	*/

	return $address_fields;
}
add_filter( 'woocommerce_default_address_fields' , 'surbma_hc_checkout_filter_default_address_fields' );

// Customize the checkout fields
function surbma_hc_checkout_filter_checkout_fields( $fields ) {
	$options = get_option( 'surbma_hc_fields' );

	$companytaxnumberpairValue = isset( $options['companytaxnumberpair'] ) ? $options['companytaxnumberpair'] : 0;
	if ( $companytaxnumberpairValue == 1 ) {
		$fields['billing']['billing_company']['class'] = array( 'form-row-first' );
		$fields['billing']['billing_tax_number']['class'] = array( 'form-row-last' );
	}

	$billingcompanycheckValue = isset( $options['billingcompanycheck'] ) ? $options['billingcompanycheck'] : 0;
	if( $billingcompanycheckValue == 1 ) {
		// Billing company must be required
		$fields['billing']['billing_company']['required'] = true;
	}

	$phoneemailpairValue = isset( $options['phoneemailpair'] ) ? $options['phoneemailpair'] : 0;
	if ( $phoneemailpairValue == 1 ) {
		$fields['billing']['billing_phone']['class'] = array( 'form-row-first' );
		$fields['billing']['billing_email']['class'] = array( 'form-row-last' );
	}

	$noordercommentsValue = isset( $options['noordercomments'] ) ? $options['noordercomments'] : 0;
	if ( $noordercommentsValue == 1 ) {
		unset( $fields['order']['order_comments'] );
	}

	return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'surbma_hc_checkout_filter_checkout_fields' );
