<?php
/**
 * Meta Fields for Quotex Post type
 *
 * @package Quotex
 */

if ( class_exists( 'CSF' ) ) {

	// Set a unique slug-like ID.
	$prefix = 'offerlinkx_offer_meta';

	//
	// Create a metabox.
	CSF::createMetabox(
		$prefix,
		array(
			'title'     => esc_html__( 'Offer Details', 'offerlinkx' ),
			'post_type' => 'wcoffer',
			'data_type' => 'unserialize',
			'priority'  => 'high',
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Basic Settings', 'offerlinkx' ),
			'fields' => array(

				// fields here.
				array(
					'id'      => 'offerlinkx-offer-status',
					'type'    => 'select',
					'desc'    => esc_html__( 'Change Status here.', 'offerlinkx' ),
					'title'   => esc_html__( 'Status', 'offerlinkx' ),
					'options' => array(
						'active'   => esc_html__( 'Active', 'offerlinkx' ),
						'disabled' => esc_html__( 'Disabled', 'offerlinkx' ),
						'expired'  => esc_html__( 'Expired', 'offerlinkx' ),
					),
					'default' => esc_html__( 'pending', 'offerlinkx' ),
				),

				array(
					'id'    => 'offerlinkx-offer-message',
					'type'  => 'wp_editor',
					'desc'  => esc_html__( 'Displayed Above the Avail Offer button.', 'offerlinkx' ),
					'title' => esc_html__( 'Offer Message', 'offerlinkx' ),
				),

			),
		)
	);

	// Create a section.
	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Products', 'offerlinkx' ),
			'fields' => array(

				// fields here.
				array(
					'id'     => 'offerlinkx-offer-products',
					'type'   => 'repeater',
					'title'  => esc_html__( 'Products', 'offerlinkx' ),
					'fields' => array(

						array(
							'id'          => 'product',
							'type'        => 'select',
							'title'       => esc_html__( 'Product', 'offerlinkx' ),
							'placeholder' => esc_html__( 'Select a Product', 'offerlinkx' ),
							'chosen'      => true,
							'ajax'        => true,
							'options'     => 'posts',
							'query_args'  => array(
								'post_type' => array( 'product', 'product_variation' ),
							),
						),

						array(
							'id'    => 'quantity',
							'type'  => 'number',
							'title' => esc_html__( 'Quantity', 'offerlinkx' ),
						),

						array(
							'id'    => 'unit-price',
							'type'  => 'number',
							'title' => esc_html__( 'Unit Price', 'offerlinkx' ),
						),

					),
				),

			),
		)
	);

	// Create a section.
	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Users', 'offerlinkx' ),
			'fields' => array(

				array(
					'id'      => 'offerlinkx-who-can-use',
					'type'    => 'select',
					'title'   => esc_html__( 'Who Can Use?', 'offerlinkx' ),
					'desc'    => esc_html__( 'Who can use this offer?', 'offerlinkx' ),
					'options' => array(
						'all'   => esc_html__( 'All Users', 'offerlinkx' ),
						'roles' => esc_html__( 'Selected Roles', 'offerlinkx' ),
						'users' => esc_html__( 'Selected Users', 'offerlinkx' ),
					),
					'default' => 'all',
				),

				array(
					'id'          => 'offerlinkx-who-can-use-roles',
					'type'        => 'select',
					'title'       => esc_html__( 'Roles', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select roles which can use this.', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select the roles which can use this offer.', 'offerlinkx' ),
					'chosen'      => true,
					'ajax'        => true,
					'multiple'    => true,
					'sortable'    => true,
					'options'     => 'roles',
					'dependency'  => array(
						'offerlinkx-who-can-use',
						'==',
						'roles',
					),
				),

				array(
					'id'          => 'offerlinkx-who-can-use-users',
					'type'        => 'select',
					'title'       => esc_html__( 'Users', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select users who can use this.', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select the users who can use this offer.', 'offerlinkx' ),
					'chosen'      => true,
					'ajax'        => true,
					'multiple'    => true,
					'sortable'    => true,
					'options'     => 'users',
					'dependency'  => array(
						'offerlinkx-who-can-use',
						'==',
						'users',
					),
				),

			),
		)
	);

	// Create a section.
	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Limits & Expiration', 'offerlinkx' ),
			'fields' => array(
				array(
					'id'      => 'offerlinkx-offer-expire-date',
					'type'    => 'date',
					'desc'    => esc_html__( 'Change Expire Date here. Uses default WordPress TimeZone. Time 11:59pm on the selected day', 'offerlinkx' ),
					'title'   => esc_html__( 'Expire Date', 'offerlinkx' ),
					'default' => '',
				),

				array(
					'id'      => 'offerlinkx-offer-max-usage',
					'type'    => 'number',
					'desc'    => esc_html__( 'Change Max Usage here. Use -1 for unlimited.', 'offerlinkx' ),
					'title'   => esc_html__( 'Max Usage', 'offerlinkx' ),
					'default' => '',
				),
			),
		)
	);

}

