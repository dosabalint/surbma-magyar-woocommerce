<?php

// Code reference: https://businessbloomer.com/woocommerce-add-need-spend-x-get-free-shipping-cart-page/
function surbma_hc_free_shipping_cart_notice() {
	$options = get_option( 'surbma_hc_fields' );
	$freeshippingnoticemessageValue = isset( $options['freeshippingnoticemessage'] ) && ( $options['freeshippingnoticemessage'] != '' ) ? $options['freeshippingnoticemessage'] : 'Az Ingyenes szállításhoz szükséges további vásárlás értéke';
	global $woocommerce;

	// Get Free Shipping Methods for Rest of the World Zone & populate array $min_amounts
	$default_zone = new WC_Shipping_Zone(0);
	$default_methods = $default_zone->get_shipping_methods();
	foreach( $default_methods as $key => $value ) {
		if ( $value->id === 'free_shipping' ) {
			if ( $value->min_amount > 0 ) $min_amounts[] = $value->min_amount;
		}
	}

	// Get Free Shipping Methods for all other Zones & populate array $min_amounts
	$delivery_zones = WC_Shipping_Zones::get_zones();
	foreach ( $delivery_zones as $key => $delivery_zone ) {
		foreach ( $delivery_zone['shipping_methods'] as $key => $value ) {
			if ( $value->id === 'free_shipping' ) {
				if ( $value->min_amount > 0 ) $min_amounts[] = $value->min_amount;
			}
		}
	}

	// Find lowest min_amount
	if ( is_array( $min_amounts ) ) {
		$min_amount = min( $min_amounts );

		// Get Cart Subtotal inc. Tax excl. Shipping
		$current = WC()->cart->subtotal;

		// If Subtotal < Min Amount Echo Notice and add "Continue Shopping" button
		if ( $current < $min_amount ) {
			$message = $freeshippingnoticemessageValue . ': ' . wc_price( $min_amount - $current );
			$returnurl = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
			$notice = sprintf( '%s <a href="%s" class="button wc-forward">%s</a>', $message, esc_url( $returnurl ), esc_html__( 'Return to shop', 'woocommerce' ) );
			wc_print_notice( $notice, 'notice' );
		}
	}
}
add_action( 'woocommerce_before_cart', 'surbma_hc_free_shipping_cart_notice' );
