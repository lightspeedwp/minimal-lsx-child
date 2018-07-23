<?php
/**
 * Minimal LSX functions.
 *
 * @package minimal-lsx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Constants.
 */
define( 'MINIMAL_LSX_PATH', plugin_dir_path( __FILE__ ) );
define( 'MINIMAL_LSX_CORE', __FILE__ );
define( 'MINIMAL_LSX_URL', plugin_dir_url( __FILE__ ) );
define( 'MINIMAL_LSX_VER', '1.0.0' );

/**
 * Includes.
 */
require_once( 'includes/lsx.php' );
require_once( 'includes/lsx-customizer.php' );
require_once( 'includes/class-minimal-lsx-widget-posts.php' );

/**
 * Sets up theme defaults.
 *
 * @package    minimal-lsx
 * @subpackage setup
 */
function minimal_lsx_setup() {
	load_child_theme_textdomain( 'minimal-lsx', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'minimal_lsx_setup', 11 );

/**
 * Enqueues the parent and the child theme styles.
 *
 * @package    minimal-lsx
 * @subpackage setup
 */
function minimal_lsx_scripts() {
	wp_enqueue_script( 'minimal-lsx-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'lsx_script' ), MINIMAL_LSX_VER, true );

	// Remove Google Fonts feature from LSX theme
	wp_dequeue_style( 'lsx-header-font' );
	wp_dequeue_style( 'lsx-body-font' );
	wp_style_add_data( 'lsx_main', 'after', '' );
}
add_action( 'wp_enqueue_scripts', 'minimal_lsx_scripts', 1999 );
