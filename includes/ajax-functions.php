<?php
/**
 * Ajax Handling Functions
 *
 * @package OfferLinkX
 */

// Ajax Handler for offerlinkx_accept_quote action.
add_action( 'wp_ajax_offerlinkx_accept_offer', 'offerlinkx_accept_offer' );
add_action( 'wp_ajax_nopriv_offerlinkx_accept_offer', 'offerlinkx_accept_offer' );

function offerlinkx_accept_offer() {

	$result = array();

	// verify nonce.
	if ( ! wp_verify_nonce( $_POST['offerlinkx_nonce'], 'offerlinkx-nonce' ) ) {
		$result['status']  = esc_html__( 'error', 'offerlinkx' );
		$result['message'] = apply_filters( 'offerlinkx_invalid_nonce_message', esc_html__( 'Invalid nonce.', 'offerlinkx' ) );
		echo wp_json_encode( $result );
		die();
	}

	$offerlinkx_offer_id = intval( $_POST['offerlinkx_offer'] );
	$offerlinkx_offer_id = sanitize_text_field( $_POST['offerlinkx_offer'] );

	// Check if user has access.
	if ( offerlinkx_offer_is_valid( $offerlinkx_offer_id ) ) {
		$offer_details         = get_post( $offerlinkx_offer_id );
		$get_offer_status      = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-status', true );
		$get_offer_message     = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-message', true );
		$get_offer_expiry_date = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-expire-date', true );
		$get_offer_max_usage   = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-max-usage', true );
		$get_offer_usage_count = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-usage-count', true );
		$get_offer_who_can_use = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-who-can-use', true );
		$get_offer_roles       = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-who-can-use-roles', true );
		$get_offer_users       = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-who-can-use-users', true );
		$get_offer_products    = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-products', true );
		$get_offer_key         = get_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-key', true );

		// Add Products to cart.
		if ( count( $get_offer_products ) > 0 ) {
			WC()->cart->empty_cart();
			foreach ( $get_offer_products as $key => $product ) {
				$product_id       = intval( $product['product'] );
				$product_id       = sanitize_text_field( $product_id );
				$product_id       = intval( $product_id );
				$product_quantity = intval( $product['quantity'] );
				$product_quantity = sanitize_text_field( $product_quantity );
				$product_quantity = intval( $product_quantity );
				$product_price    = floatval( $product['unit-price'] );
				$product_price    = sanitize_text_field( $product_price );

				WC()->cart->add_to_cart( $product_id, $product_quantity );
			}
		}

		// Add key to cookie.
		setcookie( 'offerlinkx_offer', $get_offer_key, time() + ( 86400 * 1 ), COOKIEPATH, COOKIE_DOMAIN );

		// Add one to usage count.
		if ( empty( $get_offer_usage_count ) ) {
			$get_offer_usage_count = 1;
		} else {
			$get_offer_usage_count = $get_offer_usage_count + 1;
		}

		update_post_meta( $offerlinkx_offer_id, 'offerlinkx-offer-usage-count', $get_offer_usage_count );

		$result['status']   = esc_html__( 'success', 'offerlinkx' );
		$result['message']  = 'Items added to cart, <a href="' . wc_get_checkout_url() . '" class="offerlinkx-checkout-link">checkout now</a>';
		$result['redirect'] = wc_get_checkout_url();
		echo wp_json_encode( $result );
		die();

	} else {
		$result['status']  = esc_html__( 'error', 'offerlinkx' );
		$result['message'] = apply_filters( 'offerlinkx_offer_not_available_message', esc_html__( 'Sorry, This offer is no longer available.', 'offerlinkx' ) );
		echo wp_json_encode( $result );
		die();
	}
}
