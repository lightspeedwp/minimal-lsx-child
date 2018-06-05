<?php
/**
 * Remove credit link from footer
 *
 * @package     minimal-lsx
 * @subpackage	lsx-customizer
 */
function minimal_lsx_credit_link( $enable_credit ) {
	$enable_credit = false;
	return $enable_credit;
}

add_filter( 'lsx_credit_link', 'minimal_lsx_credit_link', 11 );

/**
 * Add homepage slider
 *
 * @package     minimal-lsx
 * @subpackage	lsx-customizer
 */
function minimal_lsx_homepage_banner() {
	if ( is_front_page() ) {
		include locate_template( array( 'partials/homepage-slider.php' ) );
	}
}

add_action( 'lsx_header_after', 'minimal_lsx_homepage_banner' );
