<?php
/**
 * Remove credit link from footer
 *
 * @package     aepo-lsx-child
 * @subpackage	lsx-customizer
 */
function lsx_aepo_credit_link( $enable_credit ) {
	$enable_credit = false;
	return $enable_credit;
}

add_filter( 'lsx_credit_link', 'lsx_aepo_credit_link', 11 );
