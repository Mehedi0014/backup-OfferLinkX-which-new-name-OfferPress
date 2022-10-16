<?php
/**
 * Plugin Name: OfferLinkX - WooCommerce Discount Plugin
 * Description: OfferLinkX is a WooCommerce plugin that allows you to create discount links for customers.
 * Author: ThemeNcode
 * Author URI: http://www.themencode.com
 * Version: 1.0
 * Text Domain: offerlinkx
 * Domain Path: /languages
 *
 * @package OfferLinkX
 */

define( 'OFFERLINKX_NAME', 'OfferLinkX' );
define( 'OFFERLINKX_PLUGIN_URL', 'https://themencode.com' );
define( 'OFFERLINKX_VERSION', '1.0' );
define( 'OFFERLINKX_PLUGIN_DIR', 'offerlinkx' );
define( 'OFFERLINKX_PLUGIN_GLOBAL_SETTINGS', get_option( 'offerlinkx_plugin_options' ) );

if( ! class_exists( 'CSF' ) ) {
	require_once 'includes/codestar-framework/codestar-framework.php';
}
require_once 'includes/scripts.php';
require_once 'includes/cpt.php';
require_once 'backend/offerlinkx-options.php';
require_once 'backend/offerlinkx-meta-fields.php';
require_once 'includes/misc-functions.php';
require_once 'includes/ajax-functions.php';

/**
 * Fires on Plugin Activation
 *
 * @return void
 */
function offerlinkx_plugin_activation() {

	if ( ! wp_next_scheduled( 'offerlinkx_daily_cron_event' ) ) {
		wp_schedule_event( time(), 'daily', 'offerlinkx_daily_cron_event' );
	}
}

register_activation_hook( __FILE__, 'offerlinkx_plugin_activation' );

/**
 * Handles cron to expire quoted Price
 *
 * @return void
 */
function offerlinkx_handle_quoted_prices() {
	global $wpdb;
	$offerlinkx_get_settings       = get_option( 'offerlinkx_plugin_options' );
	$offerlinkx_get_expire_setting = $offerlinkx_get_settings['offerlinkx-expire-quoted-price'];

	if ( $offerlinkx_get_expire_setting == 'days' ) {
		$offerlinkx_get_expire_setting = $offerlinkx_get_settings['offerlinkx-expire-quoted-price-days'];
		$seconds                       = $offerlinkx_get_expire_setting * 86400;

		$offerlinkx_get_meta_key = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_key = '%s'", 'offerlinkx-request-accepted-time' ) );

		foreach ( $offerlinkx_get_meta_key as $offerlinkx_get_meta_key_value ) {
			$request_id    = $offerlinkx_get_meta_key_value->post_id;
			$accepted_time = $offerlinkx_get_meta_key_value->meta_value;

			if ( $accepted_time + $seconds < time() ) {
				$get_customer_id = get_post_meta( $request_id, 'offerlinkx-customer-id', true );
				$get_cart_items  = get_user_meta( $get_customer_id, 'offerlinkx_cart_items', true );

				foreach ( $get_cart_items as $key => $cart_item ) {
					if ( $request_id == $key ) {
						unset( $get_cart_items[ $key ] );
					}
				}

				update_user_meta( $get_customer_id, 'offerlinkx_cart_items', $get_cart_items );
			}
		}
	}
}
add_action( 'offerlinkx_daily_cron_event', 'offerlinkx_handle_quoted_prices' );

// Add deactivation hook.
register_deactivation_hook( __FILE__, 'offerlinkx_plugin_deactivation' );

/**
 * Deactivation hook.
 *
 * @return void
 */
function offerlinkx_plugin_deactivation() {
	wp_clear_scheduled_hook( 'offerlinkx_daily_cron_event' );
}

/**
 * Check if WooCommerce is activated.
 *
 * @return void
 */
function offerlinkx_wc_check() {

	if ( class_exists( 'woocommerce' ) ) {

		global $offerlinkx_wc_active;
		$offerlinkx_wc_active = esc_html__( 'yes', 'offerlinkx' );

	} else {

		global  $offerlinkx_wc_active;
		$offerlinkx_wc_active = esc_html__( 'no', 'offerlinkx' );

	}

}
add_action( 'admin_init', 'offerlinkx_wc_check' );

/**
 * Display notice for WooCommerce.
 *
 * @return void
 */
function offerlinkx_wc_admin_notice() {

	global  $offerlinkx_wc_active;

	if ( 'no' === $offerlinkx_wc_active ) {
		$output  = '';
		$output .= '
		<div class="notice notice-error is-dismissible">
			<p>WooCommerce is not activated, please activate it to use <b>OfferLinkX</b></p>
		</div>';
		echo wp_kses( $output, 'post' );
	}

}
add_action( 'admin_notices', 'offerlinkx_wc_admin_notice' );

add_action( 'init', 'offerlinkx_autoupdate_checker' );

/**
 * Auto Update Checker
 *
 * @return void
 */
function offerlinkx_autoupdate_checker() {
	require_once plugin_dir_path( __FILE__ ) . '/backend/class.OfferLinkXUpdate.php';
	$offerlinkx_plugin_current_version = OFFERLINKX_VERSION;
	$offerlinkx_plugin_remote_path     = 'https://updates.themencode.com/offerlinkx/update.php';
	$offerlinkx_plugin_slug            = plugin_basename( __FILE__ );
	$site_url_parse                    = wp_parse_url( site_url() );
	$offerlinkx_domain                 = $site_url_parse['host'];
	$offerlinkx_license_key            = get_option( 'offerlinkx_sitekey' );

	new OfferLinkXUpdate( $offerlinkx_plugin_current_version, $offerlinkx_plugin_remote_path, $offerlinkx_plugin_slug, $offerlinkx_domain, $offerlinkx_license_key );
}
