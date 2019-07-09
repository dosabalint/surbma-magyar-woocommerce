<?php

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

	$nocountryValue = isset( $options['nocountry'] ) ? $options['nocountry'] : 0;
	if ( $nocountryValue == 1 ) {
		$address_fields['country']['required'] = false;
		unset( $address_fields['country'] );
	}

	return $address_fields;
}
add_filter( 'woocommerce_default_address_fields' , 'surbma_hc_checkout_filter_default_address_fields' );

// Customize the checkout fields
function surbma_hc_checkout_filter_checkout_fields( $fields ) {
	$options = get_option( 'surbma_hc_fields' );

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
