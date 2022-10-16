<?php
/**
 * Misc Functions
 *
 * @package OfferLinkX
 */

/**
 * Array of currency symbols
 */
$offerlinkx_currency_symbols = array(
	'AED' => '&#1583;.&#1573;', // ?
	'AFN' => '&#65;&#102;',
	'ALL' => '&#76;&#101;&#107;',
	'AMD' => '',
	'ANG' => '&#402;',
	'AOA' => '&#75;&#122;', // ?
	'ARS' => '&#36;',
	'AUD' => '&#36;',
	'AWG' => '&#402;',
	'AZN' => '&#1084;&#1072;&#1085;',
	'BAM' => '&#75;&#77;',
	'BBD' => '&#36;',
	'BDT' => '&#2547;', // ?
	'BGN' => '&#1083;&#1074;',
	'BHD' => '.&#1583;.&#1576;', // ?
	'BIF' => '&#70;&#66;&#117;', // ?
	'BMD' => '&#36;',
	'BND' => '&#36;',
	'BOB' => '&#36;&#98;',
	'BRL' => '&#82;&#36;',
	'BSD' => '&#36;',
	'BTN' => '&#78;&#117;&#46;', // ?
	'BWP' => '&#80;',
	'BYR' => '&#112;&#46;',
	'BZD' => '&#66;&#90;&#36;',
	'CAD' => '&#36;',
	'CDF' => '&#70;&#67;',
	'CHF' => '&#67;&#72;&#70;',
	'CLF' => '', // ?
	'CLP' => '&#36;',
	'CNY' => '&#165;',
	'COP' => '&#36;',
	'CRC' => '&#8353;',
	'CUP' => '&#8396;',
	'CVE' => '&#36;', // ?
	'CZK' => '&#75;&#269;',
	'DJF' => '&#70;&#100;&#106;', // ?
	'DKK' => '&#107;&#114;',
	'DOP' => '&#82;&#68;&#36;',
	'DZD' => '&#1583;&#1580;', // ?
	'EGP' => '&#163;',
	'ETB' => '&#66;&#114;',
	'EUR' => '&#8364;',
	'FJD' => '&#36;',
	'FKP' => '&#163;',
	'GBP' => '&#163;',
	'GEL' => '&#4314;', // ?
	'GHS' => '&#162;',
	'GIP' => '&#163;',
	'GMD' => '&#68;', // ?
	'GNF' => '&#70;&#71;', // ?
	'GTQ' => '&#81;',
	'GYD' => '&#36;',
	'HKD' => '&#36;',
	'HNL' => '&#76;',
	'HRK' => '&#107;&#110;',
	'HTG' => '&#71;', // ?
	'HUF' => '&#70;&#116;',
	'IDR' => '&#82;&#112;',
	'ILS' => '&#8362;',
	'INR' => '&#8377;',
	'IQD' => '&#1593;.&#1583;', // ?
	'IRR' => '&#65020;',
	'ISK' => '&#107;&#114;',
	'JEP' => '&#163;',
	'JMD' => '&#74;&#36;',
	'JOD' => '&#74;&#68;', // ?
	'JPY' => '&#165;',
	'KES' => '&#75;&#83;&#104;', // ?
	'KGS' => '&#1083;&#1074;',
	'KHR' => '&#6107;',
	'KMF' => '&#67;&#70;', // ?
	'KPW' => '&#8361;',
	'KRW' => '&#8361;',
	'KWD' => '&#1583;.&#1603;', // ?
	'KYD' => '&#36;',
	'KZT' => '&#1083;&#1074;',
	'LAK' => '&#8365;',
	'LBP' => '&#163;',
	'LKR' => '&#8360;',
	'LRD' => '&#36;',
	'LSL' => '&#76;', // ?
	'LTL' => '&#76;&#116;',
	'LVL' => '&#76;&#115;',
	'LYD' => '&#1604;.&#1583;', // ?
	'MAD' => '&#1583;.&#1605;.', // ?
	'MDL' => '&#76;',
	'MGA' => '&#65;&#114;', // ?
	'MKD' => '&#1076;&#1077;&#1085;',
	'MMK' => '&#75;',
	'MNT' => '&#8366;',
	'MOP' => '&#77;&#79;&#80;&#36;', // ?
	'MRO' => '&#85;&#77;', // ?
	'MUR' => '&#8360;', // ?
	'MVR' => '.&#1923;', // ?
	'MWK' => '&#77;&#75;',
	'MXN' => '&#36;',
	'MYR' => '&#82;&#77;',
	'MZN' => '&#77;&#84;',
	'NAD' => '&#36;',
	'NGN' => '&#8358;',
	'NIO' => '&#67;&#36;',
	'NOK' => '&#107;&#114;',
	'NPR' => '&#8360;',
	'NZD' => '&#36;',
	'OMR' => '&#65020;',
	'PAB' => '&#66;&#47;&#46;',
	'PEN' => '&#83;&#47;&#46;',
	'PGK' => '&#75;', // ?
	'PHP' => '&#8369;',
	'PKR' => '&#8360;',
	'PLN' => '&#122;&#322;',
	'PYG' => '&#71;&#115;',
	'QAR' => '&#65020;',
	'RON' => '&#108;&#101;&#105;',
	'RSD' => '&#1044;&#1080;&#1085;&#46;',
	'RUB' => '&#1088;&#1091;&#1073;',
	'RWF' => '&#1585;.&#1587;',
	'SAR' => '&#65020;',
	'SBD' => '&#36;',
	'SCR' => '&#8360;',
	'SDG' => '&#163;', // ?
	'SEK' => '&#107;&#114;',
	'SGD' => '&#36;',
	'SHP' => '&#163;',
	'SLL' => '&#76;&#101;', // ?
	'SOS' => '&#83;',
	'SRD' => '&#36;',
	'STD' => '&#68;&#98;', // ?
	'SVC' => '&#36;',
	'SYP' => '&#163;',
	'SZL' => '&#76;', // ?
	'THB' => '&#3647;',
	'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
	'TMT' => '&#109;',
	'TND' => '&#1583;.&#1578;',
	'TOP' => '&#84;&#36;',
	'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
	'TTD' => '&#36;',
	'TWD' => '&#78;&#84;&#36;',
	'TZS' => '',
	'UAH' => '&#8372;',
	'UGX' => '&#85;&#83;&#104;',
	'USD' => '&#36;',
	'UYU' => '&#36;&#85;',
	'UZS' => '&#1083;&#1074;',
	'VEF' => '&#66;&#115;',
	'VND' => '&#8363;',
	'VUV' => '&#86;&#84;',
	'WST' => '&#87;&#83;&#36;',
	'XAF' => '&#70;&#67;&#70;&#65;',
	'XCD' => '&#36;',
	'XDR' => '',
	'XOF' => '',
	'XPF' => '&#70;',
	'YER' => '&#65020;',
	'ZAR' => '&#82;',
	'ZMK' => '&#90;&#75;', // ?
	'ZWL' => '&#90;&#36;',
);

/**
 * Update Cart price based on stored  offer price
 *
 * @param object $cart_object cart object.
 * @return void
 */
function offerlinkx_recalculate_price( $cart_object ) {
	if ( isset( $_COOKIE['offerlinkx_offer'] ) && ! empty( $_COOKIE['offerlinkx_offer'] ) ) {
		$offer_key = sanitize_text_field( wp_unslash( $_COOKIE['offerlinkx_offer'] ) );

		global $wpdb;
		$get_offer_id_from_key = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_key='offerlinkx-offer-key' AND meta_value = '$offer_key'", ARRAY_A );

		if ( ! empty( $get_offer_id_from_key ) ) {
			$post_id = $get_offer_id_from_key[0]['post_id'];
			if ( offerlinkx_offer_is_valid( $post_id ) ) {
				$get_offer_products        = get_post_meta( $post_id, 'offerlinkx-offer-products', true );
				$offerlinkx_product_prices = array();

				if ( ! empty( $get_offer_products ) ) {
					$offerlinkx_product_prices = array();
					foreach ( $get_offer_products as $offer_key => $offer_value ) {
						$offerlinkx_product_prices[ $offer_value['product'] ] = $offer_value['unit-price'];
					}
				}

				if ( count( $offerlinkx_product_prices ) > 0 ) {
					foreach ( $cart_object->get_cart() as $cart_item ) {
						$product_id = $cart_item['data']->get_id();
						if ( array_key_exists( $product_id, $offerlinkx_product_prices ) ) {
							$cart_item['data']->set_price( $offerlinkx_product_prices[ $product_id ] );
						}
					}
				}
			}
		}
	}
}

add_action( 'woocommerce_before_calculate_totals', 'offerlinkx_recalculate_price', 99 );

/**
 * Add a status column to the Offer admin table
 *
 * @param array $defaults defaults.
 * @return string
 */
function offerlinkx_offer_column_status( $defaults ) {
	$defaults['column_status'] = esc_html__( 'Status', 'offerlinkx' );
	return $defaults;
}

add_filter( 'manage_wcoffer_posts_columns', 'offerlinkx_offer_column_status' );

/**
 * Add Quote Request Status to the Quote Request List Table
 *
 * @param string $column_name name of the column.
 *
 * @param int    $post_ID id of the offer request.
 * @return void
 */
function offerlinkx_offfer_column_status_view( $column_name, $post_ID ) {
	if ( 'column_status' === $column_name ) {
		$custom_field_values = get_post_meta( $post_ID, 'offerlinkx-offer-status', true );
		if ( ! empty( $custom_field_values ) ) {
			echo wp_kses( '<p> ' . $custom_field_values . ' </p>', 'post' );
		}
	}
}

add_action( 'manage_wcoffer_posts_custom_column', 'offerlinkx_offfer_column_status_view', 10, 2 );

/**
 * Get Variation choices by variation id
 * Used to display on various places including emails.
 *
 * @param int $variation_id
 * @return string
 */
function offerlinkx_get_variation_choices( $variation_id ) {

	$offerlinkx_variation_id = intval( $variation_id );
	$offerlinkx_variation_id = sanitize_text_field( $offerlinkx_variation_id );
	$offerlinkx_variation_id = intval( $offerlinkx_variation_id );

	if ( empty( $offerlinkx_variation_id ) || $offerlinkx_variation_id < 1 ) {
		return false;
	}

	$variation_item            = wc_get_product( $offerlinkx_variation_id );
	$variation_item_attributes = $variation_item->get_variation_attributes();

	$variation_item_count = count( $variation_item_attributes );
	$output               = '';
	$var_position         = 0;

	foreach ( $variation_item_attributes as $key => $value ) {
		if ( ++$var_position === $variation_item_count ) {
			$output .= str_replace( 'attribute_', '', $key ) . ': ' . $value;
		} else {
			$output .= str_replace( 'attribute_', '', $key ) . ': ' . $value . ', ';

		}
	}
	return esc_html( $output );
}

/**
 * Check if offer is accessible by current users.
 *
 * @param [type] $post_id
 * @return void
 */
function offerlinkx_offer_is_valid( $post_id ) {
	$post_id = intval( $post_id );
	$post_id = sanitize_text_field( $post_id );
	$post_id = intval( $post_id );

	if ( empty( $post_id ) || $post_id < 1 ) {
		return false;
	}

	$get_offer_status      = get_post_meta( $post_id, 'offerlinkx-offer-status', true );
	$get_offer_message     = get_post_meta( $post_id, 'offerlinkx-offer-message', true );
	$get_offer_expiry_date = get_post_meta( $post_id, 'offerlinkx-offer-expire-date', true );
	$get_offer_max_usage   = get_post_meta( $post_id, 'offerlinkx-offer-max-usage', true );
	$get_offer_usage_count = get_post_meta( $post_id, 'offerlinkx-offer-usage-count', true );
	$get_offer_who_can_use = get_post_meta( $post_id, 'offerlinkx-who-can-use', true );
	$get_offer_roles       = get_post_meta( $post_id, 'offerlinkx-who-can-use-roles', true );
	$get_offer_users       = get_post_meta( $post_id, 'offerlinkx-who-can-use-users', true );
	$get_offer_products    = get_post_meta( $post_id, 'offerlinkx-offer-products', true );
	$is_accessible         = false;

	// check offer status.
	if ( 'active' === $get_offer_status ) {
		$is_accessible = true;
	} else {
		$is_accessible = false;
	}

	// Check if offer is expired.
	if ( $is_accessible ) {
		if ( ! empty( $get_offer_expiry_date ) ) {
			$expiry_date = strtotime( $get_offer_expiry_date );
			if ( time() > $expiry_date ) {
				$is_accessible = false;
			}
		}
	}

	// Check if limit crossed.
	if ( $is_accessible ) {
		if ( ! empty( $get_offer_max_usage ) ) {
			$usage_count = intval( $get_offer_usage_count );
			if ( $get_offer_max_usage < 0 ) {
				$is_accessible = true;
			} else {
				if ( $usage_count >= $get_offer_max_usage ) {
					$is_accessible = false;
				} else {
					$is_accessible = true;
				}
			}
		}
	}

	if ( $is_accessible ) {
		if ( $get_offer_who_can_use == 'all' ) {
			$is_accessible = true;
		} elseif ( $get_offer_who_can_use == 'roles' ) {
			if ( is_user_logged_in() ) {
				$user = wp_get_current_user();
				foreach ( $user->roles as $role ) {
					if ( in_array( $role, $get_offer_roles ) ) {
						$is_accessible = true;
						break;
					} else {
						$is_accessible = false;
					}
				}
			} else {
				$is_accessible = false;
			}
		} elseif ( $get_offer_who_can_use == 'users' ) {
			if ( is_user_logged_in() ) {
				$user = wp_get_current_user();
				foreach ( $get_offer_users as $user_id ) {
					if ( $user->ID == $user_id ) {
						$is_accessible = true;
						break;
					} else {
						$is_accessible = false;
					}
				}
			} else {
				$is_accessible = false;
			}
		} else {
			$is_accessible = false;
		}
	}

	return $is_accessible;
}


/**
 * Display Offer Details on Single Offer page on Frontend
 *
 * @param string $content offer content.
 * @return string
 */
function offerlinkx_single_offer_content( $content ) {
	if ( is_singular( 'wcoffer' ) ) {

		global $offerlinkx_currency_symbols;

		$get_offer_status      = get_post_meta( get_the_ID(), 'offerlinkx-offer-status', true );
		$get_offer_message     = get_post_meta( get_the_ID(), 'offerlinkx-offer-message', true );
		$get_offer_expiry_date = get_post_meta( get_the_ID(), 'offerlinkx-offer-expire-date', true );
		$get_offer_max_usage   = get_post_meta( get_the_ID(), 'offerlinkx-offer-max-usage', true );
		$get_offer_usage_count = get_post_meta( get_the_ID(), 'offerlinkx-offer-usage-count', true );
		$get_offer_who_can_use = get_post_meta( get_the_ID(), 'offerlinkx-who-can-use', true );
		$get_offer_roles       = get_post_meta( get_the_ID(), 'offerlinkx-who-can-use-roles', true );
		$get_offer_users       = get_post_meta( get_the_ID(), 'offerlinkx-who-can-use-users', true );
		$get_offer_products    = get_post_meta( get_the_ID(), 'offerlinkx-offer-products', true );

		if ( offerlinkx_offer_is_valid( get_the_ID() ) ) {

			$get_offer_total_quantity = 0;
			$get_offer_total_price    = 0;

			$output  = '';
			$output .= '<div class="offerlinkx-offer-details">';
			$output .= $get_offer_message;
			$output .= '<br />';
			$output .= apply_filters( 'offerlinkx_instruction_message_above_offer_prooducts_table', esc_html__( 'Please find the products and other details of this offer below and accept. Once Accepted, all the products will be added to your cart and you will be redirected to checkout page for completing your order.', 'offerlinkx' ) );
			$output .= '<br />';
			$output .= do_action( 'offerlinkx_single_offer_before_content' );
			$output .= '<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents offerlinkx-single-offer-table" cellspacing="0">';

			$output .= '
					<thead>
						<tr>
							<th class="single-offer-product">' . esc_html__( 'Product', 'offerlinkx' ) . '</th>
							<th class="single-offer-unit-price">' . esc_html__( 'Unit Price', 'offerlinkx' ) . '</th>
							<th class="single-offer-quantity">' . esc_html__( 'Quantity', 'offerlinkx' ) . '</th>
							<th class="single-offer-subtotal">' . esc_html__( 'Subtotal', 'offerlinkx' ) . '</th>
						</tr>
					</thead>';
			$output .= '<tbody>';

			foreach ( $get_offer_products as $key => $value ) {

				$price                    = $value['unit-price'];
				$quantity                 = $value['quantity'];
				$subtotal                 = $price * $quantity;
				$get_offer_total_quantity = $get_offer_total_quantity + $quantity;
				$get_offer_total_price    = $get_offer_total_price + $subtotal;

				$output .= '<tr>';
				$output .= '<td class="single-offer-product"><a href="' . get_permalink( $value['product'] ) . '">' . get_the_title( $value['product'] ) . ' <small>' . offerlinkx_get_variation_choices( @$value['variation'] ) . '</small></a></td>';
				$output .= '<td class="single-offer-unit-price">' . @$offerlinkx_currency_symbols['offerlinkx-select-currency'] . esc_html( $price ) . '</td>';
				$output .= '<td class="single-offer-quantity">' . esc_html( $quantity ) . '</td>';
				$output .= '<td class="single-offer-subtotal">' . @$offerlinkx_currency_symbols['offerlinkx-select-currency'] . esc_html( $subtotal ) . '</td>';
				$output .= '</tr>';
			}

			$output .= '<tr>';
			$output .= '<td class="single-offer-total" colspan="2">' . esc_html__( 'Total', 'offerlinkx' ) . '</td>';
			$output .= '<td class="single-offer-total-quantity">' . esc_html( $get_offer_total_quantity, 'offerlinkx' ) . '</td>';
			$output .= '<td class="single-offer-total-price">' . @$offerlinkx_currency_symbols['offerlinkx-select-currency'] . ' ' . esc_html( $get_offer_total_price, 'offerlinkx' ) . '</td>';
			$output .= '</tr>';

			$output .= '<tr class="single-offer-actions">';
			if ( $get_offer_status == 'active' ) {
				$output .= '<td class="single-offer-action" colspan="4"><a id="offerlinkx-accept-offer-btn" class="offerlinkx-btn offerlinkx-accept-offer-btn" href="#" data-offer-id="' . esc_attr( get_the_ID() ) . '">' . __( 'Accept Offer', 'offerlinkx' ) . '</a> </td>';
			}
			$output .= '</tr>';

			$output .= '<tr>';
			$output .= '<td class="single-offer-actions-status" colspan="4"><div id="offerlinkx-offer-status-message" class="offerlinkx-offer-status-message"></div></td>';
			$output .= '</tr>';

			$output .= '</tbody>';
			$output .= '</table>';
			$output .= do_action( 'offerlinkx_single_offer_after_content' );
			$output .= '</div>';

			return wp_kses( $output, 'post' );

		} else {
			$output  = '';
			$output .= apply_filters( 'offerlinkx_single_offer_no_access_message', esc_html__( 'Sorry, The offer link you followed is either invalid or expired or you may not have access to this offer.', 'offerlinkx' ) );
			return wp_kses( $output, 'post' );
		}
	} else {
		return $content;
	}
}

add_filter( 'the_content', 'offerlinkx_single_offer_content', 99 );

/**
 * ThemeNcode News Updates Callback
 * Used on OfferLinkX options page
 *
 * @return void
 */
function offerlinkx_themencode_news_updates_callback() {
	$news = get_transient( 'offerlinkx-themencode-news-updates' );
	if ( empty( $news ) ) {
		$get_news = wp_remote_get( 'https://updates.themencode.com/' );
		set_transient( 'offerlinkx-themencode-news-updates', $get_news['body'], 86400 );
		$news = $get_news['body'];
	}

	echo wp_kses( $news, 'post' );
}

function offerlinkx_generate_offer_key( $post_id ) {
	$key = '';
	for ( $i = 0; $i < 10; $i++ ) {
		$key .= chr( rand( 97, 122 ) );
	}
	return $key . $post_id;
}


// Create key on offer save.
add_action( 'save_post', 'offerlinkx_add_offer_key', 99, 3 );
function offerlinkx_add_offer_key( $post_id, $post, $update ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( $post->post_type != 'wcoffer' ) {
		return;
	}

	if ( ! $update ) {
		$offer_key = offerlinkx_generate_offer_key( $post_id );
		update_post_meta( $post_id, 'offerlinkx-offer-key', $offer_key );
	}
}

// Append Quote for to single title.
// add_filter( 'the_title', 'offerlinkx_append_to_single_offer_title', 99, 2 );
function offerlinkx_append_to_single_offer_title( $title, $post_id ) {
	$post = get_post( $post_id );
	if ( $post->post_type == 'wcoffer' && is_singular( 'wcoffer' ) ) {
		$title = esc_html__( 'Offer', 'offerlinkx' );
	}
	return esc_html( $title );
}

add_action( 'admin_menu', 'offerlinkx_backend_menu' );
function offerlinkx_backend_menu() {
	add_submenu_page( 'edit.php?post_type=offerlinkx', esc_html__( 'Updates', 'offerlinkx' ), esc_html__( 'Updates', 'offerlinkx' ), 'manage_options', 'themencode-offerlinkx-updates', 'tnc_offerlinkx_updates', 5 );
}

function tnc_offerlinkx_updates() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'offerlinkx' ) );
	}
	include dirname( __FILE__ ) . '/../backend/update-registration.php';
}

add_action( 'woocommerce_checkout_update_order_meta', 'offerlinkx_delete_offer_cookie_on_order', 99, 2 );

/**
 * Delete cookie on order placement
 *
 * @param [type] $order_id
 * @param [type] $data
 * @return void
 */
function offerlinkx_delete_offer_cookie_on_order( $order_id, $data ) {
	if ( isset( $_COOKIE['offerlinkx_offer'] ) ) {
		setcookie( 'offerlinkx_offer', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN );
	}
}
