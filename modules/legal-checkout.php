<?php

function surbma_hc_legal_registration_fields() {
	$options = get_option( 'surbma_hc_fields' );
	$regacceptppValue = isset( $options['regacceptpp'] ) ? stripslashes( $options['regacceptpp'] ) : 'Elolvastam és elfogadom az <a href="/adatkezeles/" target="_blank">Adatkezelési tájékoztatót</a>';

	if( $regacceptppValue != '' ) {
		woocommerce_form_field( 'reg_accept_pp', array(
			'type'          => 'checkbox',
			'class'         => array('woocommerce-form-row woocommerce-form-row--wide form-row-wide privacy'),
			'label'         => $regacceptppValue,
			'required'      => true
		) );
	}
}
// A 20-asnál az adatkezelési tájékoztató szöveg fölé kerül a checkbox
add_action( 'woocommerce_register_form', 'surbma_hc_legal_registration_fields', 21 );

function surbma_hc_legal_registration_fields_validation( $errors, $username, $email ) {
	$options = get_option( 'surbma_hc_fields' );

	if ( !is_checkout() && isset( $options['regacceptpp'] ) && $options['regacceptpp'] != '' && !$_POST['reg_accept_pp'] )
		$errors->add( 'reg_accept_pp_error', '<strong>Adatkezelési Tájékoztató</strong> elfogadása kötelező.' );
	return $errors;
}
add_filter( 'woocommerce_registration_errors', 'surbma_hc_legal_registration_fields_validation', 10, 3 );

function surbma_hc_legal_checkout_fields( $checkout ) {
	$options = get_option( 'surbma_hc_fields' );
	$legalcheckouttitleValue = isset( $options['legalcheckouttitle'] ) ? $options['legalcheckouttitle'] : 'Vásárláshoz szükséges jogi megerősítések';
	if( $legalcheckouttitleValue != '' ) $legalcheckouttitleValue = '<h3>' . $legalcheckouttitleValue . '</h3>';
	$accepttosValue = isset( $options['accepttos'] ) ? stripslashes( $options['accepttos'] ) : 'Elolvastam és elfogadom az <a href="/aszf/" target="_blank">Általános Szerződési Feltételeket</a>';
	$acceptppValue = isset( $options['acceptpp'] ) ? stripslashes( $options['acceptpp'] ) : 'Elolvastam és elfogadom az <a href="/adatkezeles/" target="_blank">Adatkezelési tájékoztatót</a>';

	echo '<div id="surbma_hc_gdpr_checkout">' . $legalcheckouttitleValue;

	if( $accepttosValue != '' ) {
		woocommerce_form_field( 'accept_tos', array(
			'type'          => 'checkbox',
			'class'         => array( 'form-row-wide', 'tos' ),
			'label'         => $accepttosValue,
			'required'      => true
		), $checkout->get_value( 'accept_tos' ));
	}

	if( $acceptppValue != '' ) {
		woocommerce_form_field( 'accept_pp', array(
			'type'          => 'checkbox',
			'class'         => array( 'form-row-wide', 'pp' ),
			'label'         => $acceptppValue,
			'required'      => true
		), $checkout->get_value( 'accept_pp' ) );
	}

	echo '</div>';
}
add_action( 'woocommerce_after_order_notes', 'surbma_hc_legal_checkout_fields' );

function surbma_hc_legal_checkout_fields_validation() {
	$options = get_option( 'surbma_hc_fields' );

	if ( isset( $options['accepttos'] ) && $options['accepttos'] != '' && !$_POST['accept_tos'] )
		wc_add_notice( '<strong>Általános Szerződési Feltételek</strong> elfogadása kötelező.', 'error' );

	if ( isset( $options['acceptpp'] ) && $options['acceptpp'] != '' && !$_POST['accept_pp'] )
		wc_add_notice( '<strong>Adatkezelési Tájékoztató</strong> elfogadása kötelező.', 'error' );
}
add_action( 'woocommerce_checkout_process', 'surbma_hc_legal_checkout_fields_validation' );

function surbma_hc_legal_checkout_fields_update_order_meta( $order_id ) {
	if ( !empty( $_POST['accept_tos'] ) )
		update_post_meta( $order_id, 'accept_tos', 'Elfogadva' );
	if ( !empty( $_POST['accept_pp'] ) )
		update_post_meta( $order_id, 'accept_pp', 'Elfogadva' );
}
add_action( 'woocommerce_checkout_update_order_meta', 'surbma_hc_legal_checkout_fields_update_order_meta' );

function surbma_hc_legal_checkout_fields_display_admin_order_meta( $order ) {
	$accepttos = get_post_meta( $order->get_id(), 'accept_tos', true );
	$acceptpp = get_post_meta( $order->get_id(), 'accept_pp', true );

	if( $accepttos )
		echo '<p><strong>Általános Szerződési Feltételek:</strong> ' . $accepttos . '</p>';
	if( $acceptpp )
		echo '<p><strong>Adatkezelési Tájékoztató:</strong> ' . $acceptpp . '</p>';
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'surbma_hc_legal_checkout_fields_display_admin_order_meta', 10, 1 );

function surbma_hc_legal_checkout_before_submit() {
	$options = get_option( 'surbma_hc_fields' );
	$beforeorderbuttonmessageValue = isset( $options['beforeorderbuttonmessage'] ) ? stripslashes( $options['beforeorderbuttonmessage'] ) : null;
	if ( $beforeorderbuttonmessageValue )
		echo '<div class="surbma-hc-before-submit" style="margin: 0 0 1em;text-align: center;">' . $beforeorderbuttonmessageValue . '</div>';
}
add_action( 'woocommerce_review_order_before_submit', 'surbma_hc_legal_checkout_before_submit' );

function surbma_hc_legal_checkout_after_submit() {
	$options = get_option( 'surbma_hc_fields' );
	$afterorderbuttonmessageValue = isset( $options['afterorderbuttonmessage'] ) ? stripslashes( $options['afterorderbuttonmessage'] ) : null;
	if ( $afterorderbuttonmessageValue )
		echo '<div class="surbma-hc-before-submit" style="margin: 1em 0 0;text-align: center;">' . $afterorderbuttonmessageValue . '</div>';
}
add_action( 'woocommerce_review_order_after_submit', 'surbma_hc_legal_checkout_after_submit' );
