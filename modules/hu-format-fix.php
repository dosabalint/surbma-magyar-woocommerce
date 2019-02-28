<?php

// Fix locale if WPML is active.
function surbma_hc_fix_locale_language( $locale ) {
	if( !is_admin() && defined( 'ICL_LANGUAGE_CODE' ) ) {
		$languages = icl_get_languages();
		return $languages[ICL_LANGUAGE_CODE]['default_locale'];
	} else {
		return $locale;
	}
}
add_filter( 'locale', 'surbma_hc_fix_locale_language' );

// Custom checkout fields
function surbma_hc_filter_woocommerce_default_address_fields( $fields ) {
	$fields['last_name']['autofocus'] = false;
	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'surbma_hc_filter_woocommerce_default_address_fields' );

/* TODO
/*
/* Ezt is érdemes lenne lecserélni úgy, hogy minden locale esetén legyen meg a csere, ha magyar nyelven nézik az oldalt.
/*
*/
// Reorder the checkout fields
function surbma_hc_filter_woocommerce_get_country_locale( $locale ) {
	$locale['HU']['last_name']['priority'] = 10;
	$locale['HU']['last_name']['class'] = array( 'form-row-first' );
	$locale['HU']['last_name']['autofocus'] = true;

	$locale['HU']['first_name']['priority'] = 20;
	$locale['HU']['first_name']['class'] = array( 'form-row-last' );
	$locale['HU']['first_name']['autofocus'] = false;

	$locale['HU']['postcode']['priority'] = 42;
	$locale['HU']['postcode']['class'] = array( 'form-row-first' );

	$locale['HU']['city']['priority'] = 44;
	$locale['HU']['city']['class'] = array( 'form-row-last' );

	$options = get_option( 'surbma_hc_fields' );
	$nocountyValue = isset( $options['nocounty'] ) ? $options['nocounty'] : 1;

	if ( $nocountyValue == 1 ) {
		$locale['HU']['state']['required'] = false;
	}

	return $locale;
}
add_filter( 'woocommerce_get_country_locale', 'surbma_hc_filter_woocommerce_get_country_locale' );

// Default state reset function
function surbma_hc_default_checkout_state() {
	return null;
}
$options = get_option( 'surbma_hc_fields' );
$nocountyValue = isset( $options['nocounty'] ) ? $options['nocounty'] : 1;
if ( $nocountyValue == 1 ) {
	add_filter( 'default_checkout_billing_state', 'surbma_hc_default_checkout_state' );
	add_filter( 'default_checkout_shipping_state', 'surbma_hc_default_checkout_state' );
}

// Hide the state field
function surbma_hc_remove_hu_states( $states ) {
	$options = get_option( 'surbma_hc_fields' );
	$nocountyValue = isset( $options['nocounty'] ) ? $options['nocounty'] : 1;
	if ( $nocountyValue == 1 ) {
		$states['HU'] = array();
	}
	return $states;
}
add_filter( 'woocommerce_states', 'surbma_hc_remove_hu_states' );

// Fixed Hungarian address format
function surbma_hc_address_format( $format ) {
	$format['HU']="{name}\n{company}\n{postcode} {city}\n{address_1}\n{address_2}\n{country}";
	return $format;
}
add_filter( 'woocommerce_localisation_address_formats', 'surbma_hc_address_format' );

// Change the name order if language is Hungarian.
add_filter( 'woocommerce_formatted_address_replacements', function( $replacements, $args ) {
	if ( get_locale() == 'hu_HU' || get_locale() == 'hu' )
		$replacements['{name}'] = $args['last_name'] . ' ' . $args['first_name'];
	return $replacements;
}, 10, 2 );
