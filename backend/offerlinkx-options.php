<?php
/**
 * OfferLinkX Settings Page
 *
 * All the settings are here, Powered by CSF.
 *
 * @since 1.0
 *
 * @package OfferLinkX
 */

// Control core classes for avoid errors.
if ( class_exists( 'CSF' ) ) {
	$prefix = 'offerlinkx_plugin_options';

	// Create options.
	CSF::createOptions(
		$prefix,
		array(
			'framework_title' => wp_kses( 'OfferLinkX <small>by <a href="https://themencode.com" target="_blank" style="color: #fff;">ThemeNcode</a></small>', 'post' ),
			'framework_class' => '',
			'menu_title'      => esc_html( 'Settings', 'offerlinkx' ),
			'menu_slug'       => 'offerlinkx-plugin-options',
			'menu_type'       => 'submenu',
			'menu_parent'     => 'edit.php?post_type=offerlinkx',
			'show_bar_menu'   => false,
			'footer_text'     => wp_kses( 'Love OfferLinkX? Please <a href="#" target="_blank">click here</a> to support us with your valuable review on codecanyon.', 'post' ),
			'footer_after'    => '',
			'footer_credit'   => esc_html( 'Thank you for using OfferLinkX', 'offerlinkx' ),
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Welcome', 'offerlinkx' ),
			'fields' => array(

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Welcome to OfferLinkX', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => esc_html__( 'Thank you for purchasing OfferLinkX. On this page we\'ll give you some quick details you may need.', 'offerlinkx' ),
				),

				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Getting Started', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => esc_html__( 'OfferLinkX comes with some pretty simple options which you can configure in minutes and get your quotation feature and running on your WooCommerce Site. We have documentation as well as some videos below to help us understand all the features and settings.', 'offerlinkx' ),
				),

				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Useful Links', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => wp_kses( '
						<ul>
						<li><a target="_blank" href="https://codecanyon.net/item/offerlinkx/X>Codecanyon Plugin Page</a></li>
						<li><a target="_blank" href="https://themencode.com/live-preview/offerlinkx/">Plugin Live Demo</a></li>
						<li><a target="_blank" href="https://themencode.com/docs/offerlinkx/">Plugin Documentation</a></li>
						<li><a target="_blank" href="http://youtube.com/channel/UC0mkhMK6fTx1BCovV6M_E4w">Video Documentations</a></li>
						<li><a target="_blank" href="https://themencode.support-hub.io">Support Portal</a></li>
						</ul>
					', 'post' ),
				),

				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Latest updates from ThemeNcode', 'offerlinkx' ),
				),

				array(
					'type'     => 'callback',
					'function' => 'offerlinkx_themencode_news_updates_callback',
				),

			),
		)
	);

	// Create a section.
	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Display Settings', 'offerlinkx' ),
			'fields' => array(

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Display Settings', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => esc_html__( 'Select where you want to display/enable the Request a Quote feature here.', 'offerlinkx' ),
				),

				array(
					'id'       => 'offerlinkx-display-select-display',
					'type'     => 'select',
					'title'    => esc_html__( 'Request a Quote Button', 'offerlinkx' ),
					'subtitle' => esc_html__( 'Select where you want to enable Request a Quote button.', 'offerlinkx' ),
					'options'  => array(
						'disable'    => esc_html__( 'Do not enable anywhere', 'offerlinkx' ),
						'all'        => esc_html__( 'Enable on All Products', 'offerlinkx' ),
						'categories' => esc_html__( 'Enable on Selected Categories', 'offerlinkx' ),
						'individual' => esc_html__( 'Manage on Individual Products', 'offerlinkx' ),
					),
					'default'  => 'disable',
				),

				array(
					'id'          => 'offerlinkx-display-select-all-exclude-items',
					'type'        => 'select',
					'title'       => esc_html__( 'Exclude Products', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select Products where you do not want to enable Quote Button', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select products to exclude', 'offerlinkx' ),
					'chosen'      => true,
					'multiple'    => true,
					'ajax'        => true,
					'options'     => 'posts',
					'query_args'  => array(
						'post_type' => 'product',
					),
					'dependency'  => array(
						'offerlinkx-display-select-display',
						'==',
						'all',
					),
				),

				array(
					'id'          => 'offerlinkx-display-select-categories',
					'type'        => 'select',
					'title'       => esc_html__( 'Select Product Categories', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select Product Categories where you want to enable Quote Button', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select a category', 'offerlinkx' ),
					'chosen'      => true,
					'multiple'    => true,
					'ajax'        => true,
					'options'     => 'categories',
					'query_args'  => array(
						'taxonomy' => 'product_cat',
					),
					'dependency'  => array(
						'offerlinkx-display-select-display',
						'==',
						'categories',
					),
				),

				array(
					'type'       => 'content',
					'content'    => esc_html__( 'Please find the settings to enable on indiviual product edit page on top right part.', 'offerlinkx' ),
					'dependency' => array(
						'offerlinkx-display-select-display',
						'==',
						'individual',
					),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Add to Cart Button', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => esc_html__( 'Select where you want to keep or remove the Add to Cart Button.', 'offerlinkx' ),
				),

				array(
					'id'       => 'offerlinkx-display-add-to-cart',
					'type'     => 'select',
					'title'    => esc_html__( 'Hide Add to Cart Button', 'offerlinkx' ),
					'subtitle' => esc_html__( 'Select where you want to Hide Add to Cart ', 'offerlinkx' ),
					'options'  => array(
						'disable'    => esc_html__( 'Do not hide anywhere', 'offerlinkx' ),
						'all'        => esc_html__( 'Hide on All Products', 'offerlinkx' ),
						'categories' => esc_html__( 'Hide on Selected Categories', 'offerlinkx' ),
						'individual' => esc_html__( 'Manage on Individual Products', 'offerlinkx' ),
					),
					'default'  => 'disable',
				),

				array(
					'id'          => 'offerlinkx-display-add-to-cart-all-exclude-items',
					'type'        => 'select',
					'title'       => esc_html__( 'Exclude Products', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select Products where you want to display Add to Cart button', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select products to exclude', 'offerlinkx' ),
					'chosen'      => true,
					'multiple'    => true,
					'ajax'        => true,
					'options'     => 'posts',
					'query_args'  => array(
						'post_type' => 'product',
					),
					'dependency'  => array(
						'offerlinkx-display-add-to-cart',
						'==',
						'all',
					),
				),

				array(
					'id'          => 'offerlinkx-display-add-to-cart-categories',
					'type'        => 'select',
					'title'       => esc_html__( 'Select Product Categories', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select Product Categories where want to hide add to cart button', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select a category', 'offerlinkx' ),
					'chosen'      => true,
					'multiple'    => true,
					'ajax'        => true,
					'options'     => 'categories',
					'query_args'  => array(
						'taxonomy' => 'product_cat',
					),
					'dependency'  => array(
						'offerlinkx-display-add-to-cart',
						'==',
						'categories',
					),
				),

				array(
					'type'       => 'content',
					'content'    => esc_html__( 'Please find the settings on indiviual product edit page on top right part.', 'offerlinkx' ),
					'dependency' => array(
						'offerlinkx-display-add-to-cart',
						'==',
						'individual',
					),
				),

				array(
					'id'         => 'offerlinkx-add-to-cart-hide-on-archives',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Hide Add to Cart Button On Archives', 'offerlinkx' ),
					'desc'       => esc_html__( 'This option hides Add to cart button from archive pages.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Hide', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Show', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => false,
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Display/Hide Prices', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => esc_html__( 'Select where you want to keep or remove the prices', 'offerlinkx' ),
				),

				array(
					'id'       => 'offerlinkx-display-price',
					'type'     => 'select',
					'title'    => esc_html__( 'Hide Price', 'offerlinkx' ),
					'subtitle' => esc_html__( 'Select where you want to Hide Price', 'offerlinkx' ),
					'options'  => array(
						'disable'    => esc_html__( 'Do not hide anywhere', 'offerlinkx' ),
						'all'        => esc_html__( 'Hide on All Products', 'offerlinkx' ),
						'categories' => esc_html__( 'Hide on Selected Categories', 'offerlinkx' ),
						'individual' => esc_html__( 'Manage on Individual Products', 'offerlinkx' ),
					),
					'default'  => 'disable',
				),

				array(
					'id'          => 'offerlinkx-display-price-all-exclude-items',
					'type'        => 'select',
					'title'       => esc_html__( 'Exclude Products', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select Products where you want to display price', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select products to exclude', 'offerlinkx' ),
					'chosen'      => true,
					'multiple'    => true,
					'ajax'        => true,
					'options'     => 'posts',
					'query_args'  => array(
						'post_type' => 'product',
					),
					'dependency'  => array(
						'offerlinkx-display-price',
						'==',
						'all',
					),
				),

				array(
					'id'          => 'offerlinkx-display-price-categories',
					'type'        => 'select',
					'title'       => esc_html__( 'Select Product Categories', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select Product Categories where want to Hide price', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select a category', 'offerlinkx' ),
					'chosen'      => true,
					'multiple'    => true,
					'ajax'        => true,
					'options'     => 'categories',
					'query_args'  => array(
						'taxonomy' => 'product_cat',
					),
					'dependency'  => array(
						'offerlinkx-display-price',
						'==',
						'categories',
					),
				),

				array(
					'type'       => 'content',
					'content'    => esc_html__( 'Please find the settings on indiviual product edit page on top right part.', 'offerlinkx' ),
					'dependency' => array(
						'offerlinkx-display-price',
						'==',
						'individual',
					),
				),


			),
		)
	);

	// Create a section.
	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Misc. Settings', 'offerlinkx' ),
			'fields' => array(

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Misc. Settings', 'offerlinkx' ),
				),

				array(
					'type'    => 'content',
					'content' => esc_html__( 'There are some of the misc. settings for the Quote settings.', 'offerlinkx' ),
				),

				array(
					'id'      => 'offerlinkx-rquest-quote-btn-text',
					'type'    => 'text',
					'title'   => esc_html__( 'Request Quote Button Text', 'offerlinkx' ),
					'default' => esc_html__( 'Request Quote ', 'offerlinkx' ),
				),

				array(
					'id'       => 'offerlinkx-require-login',
					'type'     => 'select',
					'title'    => esc_html__( 'Require Login to Request Quote?', 'offerlinkx' ),
					'subtitle' => esc_html__( 'Select for the type of users to enable Request a Quote button.', 'offerlinkx' ),
					'desc'     => esc_html__( 'Requiring login ensures best functionality. Requests from Not logged in users are not logged in the admin panel. You can only continue conversation by email.', 'offerlinkx' ),
					'options'  => array(
						'yes' => esc_html__( 'Users Must Login to Request Quote.', 'offerlinkx' ),
						'no'  => esc_html__( 'User can Request Quote w/out logging in (Email only for not logged in users)', 'offerlinkx' ),
					),
					'default'  => 'yes',
				),

				array(
					'id'      => 'offerlinkx-expire-quoted-price',
					'type'    => 'select',
					'title'   => esc_html__( 'Quoted Price Expires After', 'offerlinkx' ),
					'desc'    => esc_html__( 'Applies to specific user.', 'offerlinkx' ),
					'options' => array(
						'never' => esc_html__( 'Never Expires', 'offerlinkx' ),
						'days'  => esc_html__( 'After X number of days (Specify Below)', 'offerlinkx' ),
					),
					'default' => 'never',
				),

				array(
					'id'         => 'offerlinkx-expire-quoted-price-days',
					'type'       => 'number',
					'title'      => esc_html__( 'Days', 'offerlinkx' ),
					'desc'       => esc_html__( 'Specify the number of days', 'offerlinkx' ),
					'default'    => esc_html__( '30', 'offerlinkx' ),
					'dependency' => array( 'offerlinkx-expire-quoted-price', '==', 'days' ),
				),

				array(
					'id'       => 'offerlinkx-select-currency',
					'type'     => 'select',
					'title'    => esc_html__( 'Currency', 'offerlinkx' ),
					'subtitle' => esc_html__( 'Select Currency to Display.', 'offerlinkx' ),
					'options'  => array(
						'AFA' => esc_html__( 'Afghan Afghani', 'offerlinkx' ),
						'ALL' => esc_html__( 'Albanian Lek', 'offerlinkx' ),
						'DZD' => esc_html__( 'Algerian Dinar', 'offerlinkx' ),
						'AOA' => esc_html__( 'Angolan Kwanza', 'offerlinkx' ),
						'ARS' => esc_html__( 'Argentine Peso', 'offerlinkx' ),
						'AMD' => esc_html__( 'Armenian Dram', 'offerlinkx' ),
						'AWG' => esc_html__( 'Aruban Florin', 'offerlinkx' ),
						'AUD' => esc_html__( 'Australian Dollar', 'offerlinkx' ),
						'AZN' => esc_html__( 'Azerbaijani Manat', 'offerlinkx' ),
						'BSD' => esc_html__( 'Bahamian Dollar', 'offerlinkx' ),
						'BHD' => esc_html__( 'Bahraini Dinar', 'offerlinkx' ),
						'BDT' => esc_html__( 'Bangladeshi Taka', 'offerlinkx' ),
						'BBD' => esc_html__( 'Barbadian Dollar', 'offerlinkx' ),
						'BYR' => esc_html__( 'Belarusian Ruble', 'offerlinkx' ),
						'BEF' => esc_html__( 'Belgian Franc', 'offerlinkx' ),
						'BZD' => esc_html__( 'Belize Dollar', 'offerlinkx' ),
						'BMD' => esc_html__( 'Bermudan Dollar', 'offerlinkx' ),
						'BTN' => esc_html__( 'Bhutanese Ngultrum', 'offerlinkx' ),
						'BTC' => esc_html__( 'Bitcoin', 'offerlinkx' ),
						'BOB' => esc_html__( 'Bolivian Boliviano', 'offerlinkx' ),
						'BAM' => esc_html__( 'Bosnia-Herzegovina Convertible Mark', 'offerlinkx' ),
						'BWP' => esc_html__( 'Botswanan Pula', 'offerlinkx' ),
						'BRL' => esc_html__( 'Brazilian Real', 'offerlinkx' ),
						'GBP' => esc_html__( 'British Pound Sterling', 'offerlinkx' ),
						'BND' => esc_html__( 'Brunei Dollar', 'offerlinkx' ),
						'BGN' => esc_html__( 'Bulgarian Lev', 'offerlinkx' ),
						'BIF' => esc_html__( 'Burundian Franc', 'offerlinkx' ),
						'KHR' => esc_html__( 'Cambodian Riel', 'offerlinkx' ),
						'CAD' => esc_html__( 'Canadian Dollar', 'offerlinkx' ),
						'CVE' => esc_html__( 'Cape Verdean Escudo', 'offerlinkx' ),
						'KYD' => esc_html__( 'Cayman Islands Dollar', 'offerlinkx' ),
						'XOF' => esc_html__( 'CFA Franc BCEAO', 'offerlinkx' ),
						'XAF' => esc_html__( 'CFA Franc BEAC', 'offerlinkx' ),
						'XPF' => esc_html__( 'CFP Franc', 'offerlinkx' ),
						'CLP' => esc_html__( 'Chilean Peso', 'offerlinkx' ),
						'CNY' => esc_html__( 'Chinese Yuan', 'offerlinkx' ),
						'COP' => esc_html__( 'Colombian Peso', 'offerlinkx' ),
						'KMF' => esc_html__( 'Comorian Franc', 'offerlinkx' ),
						'CDF' => esc_html__( 'Congolese Franc', 'offerlinkx' ),
						'CRC' => esc_html__( 'Costa Rican ColÃ³n', 'offerlinkx' ),
						'HRK' => esc_html__( 'Croatian Kuna', 'offerlinkx' ),
						'CUC' => esc_html__( 'Cuban Convertible Peso', 'offerlinkx' ),
						'CZK' => esc_html__( 'Czech Republic Koruna', 'offerlinkx' ),
						'DKK' => esc_html__( 'Danish Krone', 'offerlinkx' ),
						'DJF' => esc_html__( 'Djiboutian Franc', 'offerlinkx' ),
						'DOP' => esc_html__( 'Dominican Peso', 'offerlinkx' ),
						'XCD' => esc_html__( 'East Caribbean Dollar', 'offerlinkx' ),
						'EGP' => esc_html__( 'Egyptian Pound', 'offerlinkx' ),
						'ERN' => esc_html__( 'Eritrean Nakfa', 'offerlinkx' ),
						'EEK' => esc_html__( 'Estonian Kroon', 'offerlinkx' ),
						'ETB' => esc_html__( 'Ethiopian Birr', 'offerlinkx' ),
						'EUR' => esc_html__( 'Euro', 'offerlinkx' ),
						'FKP' => esc_html__( 'Falkland Islands Pound', 'offerlinkx' ),
						'FJD' => esc_html__( 'Fijian Dollar', 'offerlinkx' ),
						'GMD' => esc_html__( 'Gambian Dalasi', 'offerlinkx' ),
						'GEL' => esc_html__( 'Georgian Lari', 'offerlinkx' ),
						'DEM' => esc_html__( 'German Mark', 'offerlinkx' ),
						'GHS' => esc_html__( 'Ghanaian Cedi', 'offerlinkx' ),
						'GIP' => esc_html__( 'Gibraltar Pound', 'offerlinkx' ),
						'GRD' => esc_html__( 'Greek Drachma', 'offerlinkx' ),
						'GTQ' => esc_html__( 'Guatemalan Quetzal', 'offerlinkx' ),
						'GNF' => esc_html__( 'Guinean Franc', 'offerlinkx' ),
						'GYD' => esc_html__( 'Guyanaese Dollar', 'offerlinkx' ),
						'HTG' => esc_html__( 'Haitian Gourde', 'offerlinkx' ),
						'HNL' => esc_html__( 'Honduran Lempira', 'offerlinkx' ),
						'HKD' => esc_html__( 'Hong Kong Dollar', 'offerlinkx' ),
						'HUF' => esc_html__( 'Hungarian Forint', 'offerlinkx' ),
						'ISK' => esc_html__( 'Icelandic KrÃ³na', 'offerlinkx' ),
						'INR' => esc_html__( 'Indian Rupee', 'offerlinkx' ),
						'IDR' => esc_html__( 'Indonesian Rupiah', 'offerlinkx' ),
						'IRR' => esc_html__( 'Iranian Rial', 'offerlinkx' ),
						'IQD' => esc_html__( 'Iraqi Dinar', 'offerlinkx' ),
						'ILS' => esc_html__( 'Israeli New Sheqel', 'offerlinkx' ),
						'ITL' => esc_html__( 'Italian Lira', 'offerlinkx' ),
						'JMD' => esc_html__( 'Jamaican Dollar', 'offerlinkx' ),
						'JPY' => esc_html__( 'Japanese Yen', 'offerlinkx' ),
						'JOD' => esc_html__( 'Jordanian Dinar', 'offerlinkx' ),
						'KZT' => esc_html__( 'Kazakhstani Tenge', 'offerlinkx' ),
						'KES' => esc_html__( 'Kenyan Shilling', 'offerlinkx' ),
						'KWD' => esc_html__( 'Kuwaiti Dinar', 'offerlinkx' ),
						'KGS' => esc_html__( 'Kyrgystani Som', 'offerlinkx' ),
						'LAK' => esc_html__( 'Laotian Kip', 'offerlinkx' ),
						'LVL' => esc_html__( 'Latvian Lats', 'offerlinkx' ),
						'LBP' => esc_html__( 'Lebanese Pound', 'offerlinkx' ),
						'LSL' => esc_html__( 'Lesotho Loti', 'offerlinkx' ),
						'LRD' => esc_html__( 'Liberian Dollar', 'offerlinkx' ),
						'LYD' => esc_html__( 'Libyan Dinar', 'offerlinkx' ),
						'LTL' => esc_html__( 'Lithuanian Litas', 'offerlinkx' ),
						'MOP' => esc_html__( 'Macanese Pataca', 'offerlinkx' ),
						'MKD' => esc_html__( 'Macedonian Denar', 'offerlinkx' ),
						'MGA' => esc_html__( 'Malagasy Ariary', 'offerlinkx' ),
						'MWK' => esc_html__( 'Malawian Kwacha', 'offerlinkx' ),
						'MYR' => esc_html__( 'Malaysian Ringgit', 'offerlinkx' ),
						'MVR' => esc_html__( 'Maldivian Rufiyaa', 'offerlinkx' ),
						'MRO' => esc_html__( 'Mauritanian Ouguiya', 'offerlinkx' ),
						'MUR' => esc_html__( 'Mauritian Rupee', 'offerlinkx' ),
						'MXN' => esc_html__( 'Mexican Peso', 'offerlinkx' ),
						'MDL' => esc_html__( 'Moldovan Leu', 'offerlinkx' ),
						'MNT' => esc_html__( 'Mongolian Tugrik', 'offerlinkx' ),
						'MAD' => esc_html__( 'Moroccan Dirham', 'offerlinkx' ),
						'MZM' => esc_html__( 'Mozambican Metical', 'offerlinkx' ),
						'MMK' => esc_html__( 'Myanmar Kyat', 'offerlinkx' ),
						'NAD' => esc_html__( 'Namibian Dollar', 'offerlinkx' ),
						'NPR' => esc_html__( 'Nepalese Rupee', 'offerlinkx' ),
						'ANG' => esc_html__( 'Netherlands Antillean Guilder', 'offerlinkx' ),
						'TWD' => esc_html__( 'New Taiwan Dollar', 'offerlinkx' ),
						'NZD' => esc_html__( 'New Zealand Dollar', 'offerlinkx' ),
						'NIO' => esc_html__( 'Nicaraguan CÃ³rdoba', 'offerlinkx' ),
						'NGN' => esc_html__( 'Nigerian Naira', 'offerlinkx' ),
						'KPW' => esc_html__( 'North Korean Won', 'offerlinkx' ),
						'NOK' => esc_html__( 'Norwegian Krone', 'offerlinkx' ),
						'OMR' => esc_html__( 'Omani Rial', 'offerlinkx' ),
						'PKR' => esc_html__( 'Pakistani Rupee', 'offerlinkx' ),
						'PAB' => esc_html__( 'Panamanian Balboa', 'offerlinkx' ),
						'PGK' => esc_html__( 'Papua New Guinean Kina', 'offerlinkx' ),
						'PYG' => esc_html__( 'Paraguayan Guarani', 'offerlinkx' ),
						'PEN' => esc_html__( 'Peruvian Nuevo Sol', 'offerlinkx' ),
						'PHP' => esc_html__( 'Philippine Peso', 'offerlinkx' ),
						'PLN' => esc_html__( 'Polish Zloty', 'offerlinkx' ),
						'QAR' => esc_html__( 'Qatari Rial', 'offerlinkx' ),
						'RON' => esc_html__( 'Romanian Leu', 'offerlinkx' ),
						'RUB' => esc_html__( 'Russian Ruble', 'offerlinkx' ),
						'RWF' => esc_html__( 'Rwandan Franc', 'offerlinkx' ),
						'SVC' => esc_html__( 'Salvadoran ColÃ³n', 'offerlinkx' ),
						'WST' => esc_html__( 'Samoan Tala', 'offerlinkx' ),
						'SAR' => esc_html__( 'Saudi Riyal', 'offerlinkx' ),
						'RSD' => esc_html__( 'Serbian Dinar', 'offerlinkx' ),
						'SCR' => esc_html__( 'Seychellois Rupee', 'offerlinkx' ),
						'SLL' => esc_html__( 'Sierra Leonean Leone', 'offerlinkx' ),
						'SGD' => esc_html__( 'Singapore Dollar', 'offerlinkx' ),
						'SKK' => esc_html__( 'Slovak Koruna', 'offerlinkx' ),
						'SBD' => esc_html__( 'Solomon Islands Dollar', 'offerlinkx' ),
						'SOS' => esc_html__( 'Somali Shilling', 'offerlinkx' ),
						'ZAR' => esc_html__( 'South African Rand', 'offerlinkx' ),
						'KRW' => esc_html__( 'South Korean Won', 'offerlinkx' ),
						'XDR' => esc_html__( 'Special Drawing Rights', 'offerlinkx' ),
						'LKR' => esc_html__( 'Sri Lankan Rupee', 'offerlinkx' ),
						'SHP' => esc_html__( 'St. Helena Pound', 'offerlinkx' ),
						'SDG' => esc_html__( 'Sudanese Pound', 'offerlinkx' ),
						'SRD' => esc_html__( 'Surinamese Dollar', 'offerlinkx' ),
						'SZL' => esc_html__( 'Swazi Lilangeni', 'offerlinkx' ),
						'SEK' => esc_html__( 'Swedish Krona', 'offerlinkx' ),
						'CHF' => esc_html__( 'Swiss Franc', 'offerlinkx' ),
						'SYP' => esc_html__( 'Syrian Pound', 'offerlinkx' ),
						'STD' => esc_html__( 'São Tomé and Príncipe Dobra', 'offerlinkx' ),
						'TJS' => esc_html__( 'Tajikistani Somoni', 'offerlinkx' ),
						'TZS' => esc_html__( 'Tanzanian Shilling', 'offerlinkx' ),
						'THB' => esc_html__( 'Thai Baht', 'offerlinkx' ),
						'TOP' => esc_html__( 'Tongan pa\'anga', 'offerlinkx' ),
						'TTD' => esc_html__( 'Trinidad & Tobago Dollar', 'offerlinkx' ),
						'TND' => esc_html__( 'Tunisian Dinar', 'offerlinkx' ),
						'TRY' => esc_html__( 'Turkish Lira', 'offerlinkx' ),
						'TMT' => esc_html__( 'Turkmenistani Manat', 'offerlinkx' ),
						'UGX' => esc_html__( 'Ugandan Shilling', 'offerlinkx' ),
						'UAH' => esc_html__( 'Ukrainian Hryvnia', 'offerlinkx' ),
						'AED' => esc_html__( 'United Arab Emirates Dirham', 'offerlinkx' ),
						'UYU' => esc_html__( 'Uruguayan Peso', 'offerlinkx' ),
						'USD' => esc_html__( 'US Dollar', 'offerlinkx' ),
						'UZS' => esc_html__( 'Uzbekistan Som', 'offerlinkx' ),
						'VUV' => esc_html__( 'Vanuatu Vatu', 'offerlinkx' ),
						'VEF' => esc_html__( 'Venezuelan BolÃ­var', 'offerlinkx' ),
						'VND' => esc_html__( 'Vietnamese Dong', 'offerlinkx' ),
						'YER' => esc_html__( 'Yemeni Rial', 'offerlinkx' ),
						'ZMK' => esc_html__( 'Zambian Kwacha', 'offerlinkx' ),
					),
					'default'  => esc_html__( 'USD', 'offerlinkx' ),
				),

			),
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Pages', 'offerlinkx' ),
			'fields' => array(
				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Associate Pages', 'offerlinkx' ),
				),

				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Associate Specific Pages here.', 'offerlinkx' ),
				),

				array(
					'id'          => 'offerlinkx-basket-page',
					'type'        => 'select',
					'title'       => esc_html__( 'Select Basket Page', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select the page where you have [offerlinkx-basket] shortcode.', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select a page', 'offerlinkx' ),
					'chosen'      => true,
					'ajax'        => true,
					'options'     => 'pages',
				),

				array(
					'id'          => 'offerlinkx-requests-page',
					'type'        => 'select',
					'title'       => esc_html__( 'Select Requests Page', 'offerlinkx' ),
					'desc'        => esc_html__( 'Select the page where you have [offerlinkx-requests] shortcode.', 'offerlinkx' ),
					'placeholder' => esc_html__( 'Select a page', 'offerlinkx' ),
					'chosen'      => true,
					'ajax'        => true,
					'options'     => 'pages',
				),
			),
		)
	);

	// Create a section.
	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Email Settings', 'offerlinkx' ),
			'fields' => array(

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Setup Email Settings', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Email Sender Settings', 'offerlinkx' ),
				),

				array(
					'id'           => 'offerlinkx-misc-logo',
					'type'         => 'media',
					'title'        => esc_html__( 'Logo', 'offerlinkx' ),
					'desc'         => esc_html__( 'Logo that appears on emails.', 'offerlinkx' ),
					'library'      => 'image',
					'placeholder'  => esc_html__( 'https://', 'offerlinkx' ),
					'button_title' => esc_html__( 'Upload Logo', 'offerlinkx' ),
					'remove_title' => esc_html__( 'Remove Logo', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-from-name',
					'title' => esc_html__( 'Email From Name', 'offerlinkx' ),
					'desc'  => esc_html__( 'Sender Name', 'offerlinkx' ),
				),

				array(
					'type'     => 'text',
					'id'       => 'offerlinkx-email-from-email',
					'title'    => esc_html__( 'Email From Email', 'offerlinkx' ),
					'desc'     => esc_html__( 'Sender Email', 'offerlinkx' ),
					'validate' => 'csf_validate_email',
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Admin Email Settings', 'offerlinkx' ),
				),

				array(
					'type'     => 'text',
					'id'       => 'offerlinkx-email-admin-email',
					'title'    => esc_html__( 'Admin Email', 'offerlinkx' ),
					'desc'     => esc_html__( 'Used for sending admin notifications', 'offerlinkx' ),
					'validate' => 'csf_validate_email',
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Enable/Disable Certain Emails', 'offerlinkx' ),
				),

				array(
					'id'         => 'offerlinkx-email-admin-on-quote-request',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Admin Email on Quote Request', 'offerlinkx' ),
					'desc'       => esc_html__( 'The email notification sent to admin on request a quote form submission.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Enable', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Disable', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => true,
				),

				array(
					'id'         => 'offerlinkx-email-admin-on-quote-comment',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Admin Email on Quote Comment', 'offerlinkx' ),
					'desc'       => esc_html__( 'The email notification sent to admin on comment submission by customer.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Enable', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Disable', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => true,
				),

				array(
					'id'         => 'offerlinkx-email-admin-on-quote-accept',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Admin Email on Quote Accept', 'offerlinkx' ),
					'desc'       => esc_html__( 'The email notification sent to admin when customer accepts quote.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Enable', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Disable', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => true,
				),

				array(
					'id'         => 'offerlinkx-email-admin-on-quote-reject',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Admin Email on Quote Reject', 'offerlinkx' ),
					'desc'       => esc_html__( 'The email notification sent to admin when customer rejects quote.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Enable', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Disable', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => true,
				),

				array(
					'id'         => 'offerlinkx-email-customer-on-quote-request',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Customer Email on Quote Request', 'offerlinkx' ),
					'desc'       => esc_html__( 'The email notification sent to customer on request a quote form submission.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Enable', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Disable', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => true,
				),

				array(
					'id'         => 'offerlinkx-email-customer-on-quote-comment',
					'type'       => 'switcher',
					'title'      => esc_html__( 'Customer Email on Quote Comment', 'offerlinkx' ),
					'desc'       => esc_html__( 'The email notification sent to customer on comment submission by admin.', 'offerlinkx' ),
					'text_on'    => esc_html__( 'Enable', 'offerlinkx' ),
					'text_off'   => esc_html__( 'Disable', 'offerlinkx' ),
					'text_width' => 100,
					'default'    => true,
				),
			),
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Email Content', 'offerlinkx' ),
			'fields' => array(

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Setup Email Content', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Admin Notification Email on Quote Request', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-request-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Admin Email on Quote Request. Available Shortcodes: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-request-heading',
					'title' => esc_html__( 'Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Admin Email on Quote Request. Available Shortcodes: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-admin-request-content',
					'title' => esc_html__( 'Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Admin Email on Quote Request. Available Shortcodes are: %name%, %phone%, %message%', 'offerlinkx' ),
				),


				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Admin Notification Email on Quote Comment', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-comment-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Admin Email on Quote Comment. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-comment-heading',
					'title' => esc_html__( 'Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Admin Email on Quote Comment. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-admin-comment-content',
					'title' => esc_html__('Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Admin Email on Quote Comment. Available Shortcodes are: %name%, %id%, %comment%', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Admin Notification Email on Quote Accept', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-accept-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Admin Email on Quote Accept. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-accept-heading',
					'title' => esc_html__( 'Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Admin Email on Quote Accept. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-admin-accept-content',
					'title' => esc_html__( 'Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Admin Email on Quote Accept. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),


				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Admin Notification Email on Quote Reject', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-reject-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Admin Email on Quote Reject. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-admin-reject-heading',
					'title' => esc_html__( 'Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Admin Email on Quote Reject. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-admin-reject-content',
					'title' => esc_html__( 'Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Admin Email on Quote Reject. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Customer Emails', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Customer Notification Email on Quote Request', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-customer-request-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Customer Email on Quote Request. Available Shortcodes are: %name%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-customer-request-heading',
					'title' => esc_html__('Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Customer Email on Quote Request. Available Shortcodes are: %name%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-customer-request-content',
					'title' => esc_html__( 'Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Customer Email on Quote Request. Available Shortcodes are: %name%, %phone%, %message% ', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Customer Notification Email on Quote Comment', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-customer-comment-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Customer Email on Quote Comment. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-customer-comment-heading',
					'title' => esc_html__( 'Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Customer Email on Quote Comment. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-customer-comment-content',
					'title' => esc_html__( 'Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Customer Email on Quote Comment. Available Shortcodes are: %name%, %id%, %comment%', 'offerlinkx' ),
				),

				array(
					'type'    => 'heading',
					'content' => esc_html__( 'Customer Notification Email on Quote Update', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-customer-update-subject',
					'title' => esc_html__( 'Subject', 'offerlinkx' ),
					'desc'  => esc_html__( 'Subject for Customer Email on Quote Comment. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'text',
					'id'    => 'offerlinkx-email-customer-update-heading',
					'title' => esc_html__( 'Heading', 'offerlinkx' ),
					'desc'  => esc_html__( 'Heading for Customer Email on Quote Comment. Available Shortcodes are: %name%, %id%', 'offerlinkx' ),
				),

				array(
					'type'  => 'wp_editor',
					'id'    => 'offerlinkx-email-customer-update-content',
					'title' => esc_html__( 'Content', 'offerlinkx' ),
					'desc'  => esc_html__( 'Content for Customer Email on Quote Comment. Available Shortcodes are: %name%, %id%, %comment%', 'offerlinkx' ),
				),
			),
		)
	);
}
