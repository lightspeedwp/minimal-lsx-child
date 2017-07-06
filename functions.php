<?php
/**
 * AEPO functions.
 *
 * @package aepo-lsx-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LSX_AEPO_VERSION', '1.0.0' );

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
}
add_action( 'wp_enqueue_scripts', 'lsx_aepo_scripts', 1999 );
