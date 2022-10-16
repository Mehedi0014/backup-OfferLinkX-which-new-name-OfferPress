<?php
/**
 * Custom Post type register
 *
 * @package OfferLinkX
 */

/**
 * Register offerlinkx CPT
 *
 * @return void
 */
function offerlinkx_register_offerlinkx_cpt() {

	$labels = array(
		'name'                  => esc_html_x( 'Offers', 'Post Type General Name', 'offerlinkx' ),
		'singular_name'         => esc_html_x( 'Offer', 'Post Type Singular Name', 'offerlinkx' ),
		'menu_name'             => esc_html__( 'Offers', 'offerlinkx' ),
		'name_admin_bar'        => esc_html__( 'Offers', 'offerlinkx' ),
		'archives'              => esc_html__( 'Offer Archives', 'offerlinkx' ),
		'attributes'            => esc_html__( 'Offer Attributes', 'offerlinkx' ),
		'parent_item_colon'     => esc_html__( 'Parent Offer:', 'offerlinkx' ),
		'all_items'             => esc_html__( 'All Offers', 'offerlinkx' ),
		'add_new_item'          => esc_html__( 'Add New Offer', 'offerlinkx' ),
		'add_new'               => esc_html__( 'Add New Offer', 'offerlinkx' ),
		'new_item'              => esc_html__( 'New Offer', 'offerlinkx' ),
		'edit_item'             => esc_html__( 'Edit Offer', 'offerlinkx' ),
		'update_item'           => esc_html__( 'Update Offer', 'offerlinkx' ),
		'view_item'             => esc_html__( 'View Offer', 'offerlinkx' ),
		'view_items'            => esc_html__( 'View Offers', 'offerlinkx' ),
		'search_items'          => esc_html__( 'Search Offer', 'offerlinkx' ),
		'not_found'             => esc_html__( 'Not found', 'offerlinkx' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'offerlinkx' ),
		'featured_image'        => esc_html__( 'Featured Image', 'offerlinkx' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'offerlinkx' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'offerlinkx' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'offerlinkx' ),
		'insert_into_item'      => esc_html__( 'Insert into Offer', 'offerlinkx' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this Offer', 'offerlinkx' ),
		'items_list'            => esc_html__( 'Offers list', 'offerlinkx' ),
		'items_list_navigation' => esc_html__( 'Offers list navigation', 'offerlinkx' ),
		'filter_items_list'     => esc_html__( 'Filter Offers list', 'offerlinkx' ),
	);
	$args   = array(
		'label'               => esc_html__( 'Offer', 'offerlinkx' ),
		'description'         => esc_html__( 'Offer', 'offerlinkx' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tag',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'wcoffer', $args );

}
add_action( 'init', 'offerlinkx_register_offerlinkx_cpt', 0 );
