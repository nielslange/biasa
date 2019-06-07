<?php
/**
 * Biasa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Biasa
 * @since 1.0
 */

if ( ! function_exists( 'biasa_setup' ) ) {

	// Set up Biasa theme.
	function biasa_setup() {

		// Load textdomain
		load_theme_textdomain( 'biasa', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add title tag support.
		add_theme_support( 'title-tag' );

		// Add thumbnail support.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// Register custom menus.
		register_nav_menus(
			array(
				'header_menu' => __( 'Header Menu', 'biasa' ),
				'footer_menu' => __( 'Footer Menu', 'biasa' ),
			)
		);
	}

}
add_action( 'after_setup_theme', 'biasa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function biasa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'biasa_content_width', 1200 );
}
add_action( 'after_setup_theme', 'biasa_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function biasa_scripts() {
	wp_enqueue_style( 'normalize-style', get_stylesheet_directory_uri() . '/normalize.css', array(), '8.0.1' );
	wp_enqueue_style( 'biasa-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'font-styles', 'https://fonts.googleapis.com/css?family=Maven+Pro|Open+Sans:400,400i,700,700i&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'biasa_scripts' );

/**
 * Handle footer credits
 */
function bbiasa_footer_credits() {
	$credits = sprintf( '&copy; %s %s. All rights reserved.', date('Y'), get_bloginfo() );
	print( $credits );
}
add_action('footer_credits', 'bbiasa_footer_credits');