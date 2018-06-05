/**
 * MINIMAL scripts.
 *
 * @package    minimal-lsx
 * @subpackage scripts
 */

var minimal_lsx = Object.create( null );

;( function( $, window, document, undefined ) {

	'use strict';

	var $document    = $( document ),
		$window      = $( window ),
		windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
		windowWidth  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

	/**
	 * Create homepage banner Slick Slider
	 *
	 * @package    minimal-lsx
	 * @subpackage scripts
	 */
	minimal_lsx.create_homepage_slick_slider = function() {
		$( '.minimal-slider' ).slick({
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
	 * @package    minimal-lsx
	 * @subpackage scripts
	 */
	minimal_lsx.update_testimonials_slick_slider = function() {
		var $testimonialSlider = $( '#lsx-testimonials-slider' );
		$testimonialSlider.slick( 'slickSetOption', 'arrows', false, true );
	};

	/**
	 * On document ready.
	 *
	 * @package    minimal-lsx
	 * @subpackage scripts
	 */
	$document.ready( function() {

		minimal_lsx.create_homepage_slick_slider();
		minimal_lsx.update_testimonials_slick_slider();

	} );

} )( jQuery, window, document );
