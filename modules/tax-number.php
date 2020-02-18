<?php

// Add new Company check and Tax number fields.
function surbma_hc_tax_number_custom_billing_fields( $fields ) {
	$fields['billing_tax_number'] = array(
		'label' 		=> __( 'Tax number', 'surbma-magyar-woocommerce' ),
		'required' 		=> false,
		'class' 		=> array( 'form-row-wide' ),
		'priority' 		=> 32,
		'clear' 		=> true
	);
	return $fields;
}
add_filter( 'woocommerce_billing_fields', 'surbma_hc_tax_number_custom_billing_fields' );

// add_action( 'woocommerce_checkout_process', function() {
// 	if ( !$_POST['billing_tax_number'] )
// 		wc_add_notice( '<strong>Adószám</strong> kitöltése kötelező.', 'error' );
// } );

add_action( 'woocommerce_checkout_update_user_meta', function( $customer_id ) {
	$billing_tax_number = !empty( $_POST['billing_tax_number'] ) ? $_POST['billing_tax_number'] : '';
	update_user_meta( $customer_id, 'billing_tax_number', sanitize_text_field( $_POST['billing_tax_number'] ) );
} );

// Add extra user meta to edit order page.
// This is not needed anymore, as woocommerce_localisation_address_formats filter adds it to the edit order page also.
// add_action( 'woocommerce_admin_order_data_after_billing_address', function( $order ) {
// 	global $post;
// 	$customer_user = get_post_meta( $post->ID, '_customer_user', true );
// 	$taxnumber = get_user_meta( $customer_user, 'billing_tax_number', true );
// 	$taxnumber = $taxnumber != '' ? $taxnumber : 'Nincs megadva';
// 	echo '<p><strong>Adószám:</strong> ' . $taxnumber . '</p>';
// } );

add_filter( 'woocommerce_localisation_address_formats', function( $formats ) {
	foreach ( $formats as $key => &$format ) {
		$format .= "\n{tax_number}";
	}
	return $formats;
} );

// Replacement value for My Account page.
add_filter( 'woocommerce_my_account_my_address_formatted_address', function( $address, $customer_id, $address_type ) {
	$taxnumber = get_user_meta( $customer_id, 'billing_tax_number', true );
	$address['tax_number'] = $address_type == 'billing' && $taxnumber != '' ? __( 'Tax number', 'surbma-magyar-woocommerce' ) . ': ' . $taxnumber : null;
	return $address;
}, 10, 3 );

// Replacement value for Billing address on Thank you page.
add_filter( 'woocommerce_order_formatted_billing_address', function( $address, $wc_order ) {
	$taxnumber = $wc_order->get_meta( '_billing_tax_number' );
	$address['tax_number'] = $taxnumber != '' ? __( 'Tax number', 'surbma-magyar-woocommerce' ) . ': ' . $taxnumber : null;
	return $address;
}, 10, 2 );

// Replacement value for Shipping address on Thank you page.
add_filter( 'woocommerce_order_formatted_shipping_address', function( $address ) {
	$address['tax_number'] = null;
	return $address;
} );

// Replacement value for Billing & Shipping address on Thank you page.
// add_filter( 'woocommerce_get_order_address', function( $address, $type, $order ) {
// 	$address['tax_number'] = __( 'Tax number', 'surbma-magyar-woocommerce' ) . ': ' . $order->get_meta( '_billing_tax_number' );
// 	return $address;
// }, 10, 3 );

// Replacement for the new tax_number field.
add_filter( 'woocommerce_formatted_address_replacements', function( $replacements, $args ) {
	$taxnumber = isset( $args['tax_number'] ) ? $args['tax_number'] : null;
	$replacements['{tax_number}'] = $taxnumber;
	return $replacements;
}, 10, 2 );

// Adding Tax number to user profile.
add_filter( 'woocommerce_customer_meta_fields', function( $profileFieldArray ) {
	$fieldData = array(
		'label'			=> __( 'Tax number', 'surbma-magyar-woocommerce' ),
		'description'   => ''
	);
	$profileFieldArray['billing']['fields']['billing_tax_number'] = $fieldData;
	return $profileFieldArray;
} );
