<?php
/**
 * Enqueue scripts for OfferLinkX
 *
 * Enqueue both frontend and backend scripts.
 *
 * @since 1.0
 *
 * @package OfferLinkX
 */

if ( ! function_exists( 'offerlinkx_enqueue_scripts' ) ) {
	/**
	 * Enqueue jquery as some themes may have jquery disabled.
	 */
	function offerlinkx_enqueue_scripts() {
		wp_enqueue_script( 'jquery', false, array(), false, false );
		wp_enqueue_script( 'offerlinkx-main', plugins_url() . '/' . OFFERLINKX_PLUGIN_DIR . '/assets/js/offerlinkx.js', array( 'jquery' ), OFFERLINKX_VERSION, true );
		wp_localize_script(
			'offerlinkx-main',
			'offerlinkxajax',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'offerlinkx-nonce' ),
			)
		);
	}
	add_action( 'wp_enqueue_scripts', 'offerlinkx_enqueue_scripts' );
}


if ( ! function_exists( 'offerlinkx_enqueue_admin_scripts' ) ) {
	add_action( 'admin_enqueue_scripts', 'offerlinkx_enqueue_admin_scripts' );

	/**
	 * Enqueue Scripts in the admin
	 *
	 * @param  [type] $hook_suffix [description].
	 */
	function offerlinkx_enqueue_admin_scripts( $hook_suffix ) {
		wp_enqueue_style( 'offerlinkx-admin', plugins_url() . '/' . OFFERLINKX_PLUGIN_DIR . '/assets/css/offerlinkx-admin.css', array(), OFFERLINKX_VERSION, $media = 'all' );
		wp_enqueue_script( 'offerlinkx-backend', plugins_url() . '/' . OFFERLINKX_PLUGIN_DIR . '/assets/js/offerlinkx-backend.js', array( 'jquery' ), OFFERLINKX_VERSION, true );
		wp_localize_script(
			'offerlinkx-backend',
			'offerlinkxadminajax',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'offerlinkx-admin-nonce' ),
			)
		);
	}
}

if ( ! function_exists( 'offerlinkx_add_frontend_stylesheets' ) ) {
	add_action( 'wp_enqueue_scripts', 'offerlinkx_add_frontend_stylesheets' );

	/**
	 * Enqueue Quotex Frontend CSS
	 *
	 * @return void
	 */
	function offerlinkx_add_frontend_stylesheets() {
		wp_enqueue_style( 'offerlinkx-main', plugins_url() . '/' . OFFERLINKX_PLUGIN_DIR . '/assets/css/offerlinkx-style.css', array(), OFFERLINKX_VERSION, 'all' );
	}
}
