/**
 * AEPO scripts.
 *
 * @package    aepo-lsx-child
 * @subpackage scripts
 */

var lsx_aepo = Object.create( null );

;( function( $, window, document, undefined ) {

	'use strict';

	var $document    = $( document ),
		$window      = $( window ),
		windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
		windowWidth  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

	/**
	 * Create homepage banner Slick Slider
	 *
	 * @package    aepo-lsx-child
	 * @subpackage scripts
	 */
	lsx_aepo.create_homepage_slick_slider = function() {
		$( '.aepo-slider' ).slick({
			draggable: false,
			infinite: true,
			slidesToScroll: 1,
			swipe: false,
			cssEase: 'ease-out',
			responsive: [{
				breakpoint: 992,
				settings: {
					draggable: true,
					swipe: true
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					draggable: true,
					swipe: true
				}
			}]
		});
	};

	/**
	 * Update testimonials slick slider (remove arrows)
	 *
	 * @package    aepo-lsx-child
	 * @subpackage scripts
	 */
	lsx_aepo.update_testimonials_slick_slider = function() {
		var $testimonialSlider = $( '#lsx-testimonials-slider' );
		$testimonialSlider.slick( 'slickSetOption', 'arrows', false, true );
	};

	/**
	 * On document ready.
	 *
	 * @package    aepo-lsx-child
	 * @subpackage scripts
	 */
	$document.ready( function() {

		lsx_aepo.create_homepage_slick_slider();
		lsx_aepo.update_testimonials_slick_slider();

	} );

} )( jQuery, window, document );
