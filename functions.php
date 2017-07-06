<?php
/**
 * AEPO functions.
 *
 * @package aepo-lsx-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme version.
 */
define( 'LSX_AEPO_VERSION', '1.0.0' );

/**
 * Includes.
 */
require_once( 'includes/lsx.php' );
require_once( 'includes/lsx-customizer.php' );

/**
 * Sets up theme defaults.
 *
 * @package    aepo-lsx-child
 * @subpackage setup
 */
function lsx_aepo_setup() {
	load_child_theme_textdomain( 'aepo-lsx-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'lsx_aepo_setup', 11 );

/**
 * Enqueues the parent and the child theme styles.
 *
 * @package    aepo-lsx-child
 * @subpackage setup
 */
function lsx_aepo_scripts() {
	wp_enqueue_script( 'aepo-lsx-child-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'lsx_script' ), LSX_AEPO_VERSION, true );

	// Remove Google Fonts feature from LSX theme
	wp_dequeue_style( 'lsx-header-font' );
	wp_dequeue_style( 'lsx-body-font' );
	wp_style_add_data( 'lsx_main', 'after', '' );
}
add_action( 'wp_enqueue_scripts', 'lsx_aepo_scripts', 1999 );
