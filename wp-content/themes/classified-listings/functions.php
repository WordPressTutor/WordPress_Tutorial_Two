<?php
/**
 * Classified Listings functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Classified Listings
 */

if ( ! defined( 'CLASSIFIED_LISTINGS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CLASSIFIED_LISTINGS_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'classified_listings_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function classified_listings_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'woocommerce' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		//add_editor_style( 'style.css' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Register nav menus.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'classified-listings' ),
			)
		);

		// Theme Activation Notice
		global $pagenow;

		if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
			add_action('admin_notices', 'classified_listings_activation_notice');
		}

	}
endif;
add_action( 'after_setup_theme', 'classified_listings_setup' );

// Notice after Theme Activation
function classified_listings_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing Classified Listings. Would like to have you on our Welcome page so that you can reap all the benefits of our Classified Listings.', 'classified-listings' ) .'</p>';
	echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=classified-listings-info' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'classified-listings' ) .'</a></p>';
	echo '</div>';
}

if ( ! function_exists( 'classified_listings_fonts_url' ) ) :
	/**
	 * Register Google fonts for Classified Listings
	 *
	 * Create your own classified_listings_fonts_url() function to override in a child theme.
	 *
	 * @since 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function classified_listings_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Poppins, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$poppins = _x( 'on', 'Poppins font: on or off', 'classified-listings' );

		if ( 'off' !== $poppins ) {
			$font_families = array();
			$font_families[] = 'Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
			$font_families[] = 'Kalam:wght@300;400;700';

			$query_args = array(
				'family' => implode( '&family=', $font_families ), //urlencode( implode( '|', $font_families ) ),
				// 'subset' => urlencode( 'latin,latin-ext' ),
				'display' => 'swap',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}

		if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
			// Load Google fonts from Local.
			require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		}

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function classified_listings_scripts() {
	wp_enqueue_style('classified-listings-font', classified_listings_fonts_url(), array());
	wp_enqueue_style('classified-listings-style', get_stylesheet_uri(), array() );
}
add_action( 'wp_enqueue_scripts', 'classified_listings_scripts' );

/**
 * Enqueue block editor style
 */
function classified_listings_block_editor_styles() {
	wp_enqueue_style( 'classified-listings-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
	wp_enqueue_style('classified-listings-font', classified_listings_fonts_url(), array());
}
add_action( 'enqueue_block_editor_assets', 'classified_listings_block_editor_styles' );

define('CLASSIFIED_LISTINGS_BUY_NOW',__('https://www.vwthemes.com/themes/classified-wordpress-theme/','classified-listings'));
define('CLASSIFIED_LISTINGS_FAQ',__('https://www.vwthemes.com/faqs/','classified-listings'));
define('CLASSIFIED_LISTINGS_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','classified-listings'));
define('CLASSIFIED_LISTINGS_CONTACT',__('https://www.vwthemes.com/contact/','classified-listings'));
define('CLASSIFIED_LISTINGS_SUPPORT',__('https://wordpress.org/support/theme/classified-listings/','classified-listings'));
define('CLASSIFIED_LISTINGS_REVIEW',__('https://wordpress.org/support/theme/classified-listings/reviews/','classified-listings'));
define('CLASSIFIED_LISTINGS_LIVE_DEMO',__('https://www.vwthemes.net/classified-listings/','classified-listings'));
define('CLASSIFIED_LISTINGS_PRO_DOC',__('https://www.vwthemesdemo.com/docs/classified-listings-pro/','classified-listings'));
define('CLASSIFIED_LISTINGS_FREE_DOC',__('https://www.vwthemesdemo.com/docs/free-classified-listings/','classified-listings'));

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/theme-info.php';
require_once get_template_directory() . '/inc/core/template-functions.php';