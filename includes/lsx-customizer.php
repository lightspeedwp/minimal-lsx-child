<?php
/**
 * New colours scheme.
 *
 * @package     minimal-lsx
 * @subpackage	lsx-customizer
 */
function minimal_lsx_customizer_colour_choices( $array ) {
	$array['minimal'] = array(
		'label'  => __( 'MINIMAL', 'minimal-lsx' ),

		'colors' => array(
			'button_background_color'       => '#FFFFFF',
			'button_background_hover_color' => '#FFFFFF',
			'button_text_color'             => '#54636D',
			'button_text_color_hover'       => '#54636D',
			'button_shadow'                 => '#DFDFDF',

			'button_cta_background_color'       => '#FFFFFF',
			'button_cta_background_hover_color' => '#404f5A',
			'button_cta_text_color'             => '#313F48',
			'button_cta_text_color_hover'       => '#FFFFFF',
			'button_cta_shadow'                 => '#DFDFDF',

			'top_menu_background_color'          => $array['default']['colors']['top_menu_background_color'],
			'top_menu_link_color'                => $array['default']['colors']['top_menu_link_color'],
			'top_menu_link_hover_color'          => $array['default']['colors']['top_menu_link_hover_color'],
			'top_menu_icon_color'                => $array['default']['colors']['top_menu_icon_color'],
			'top_menu_icon_hover_color'          => $array['default']['colors']['top_menu_icon_hover_color'],
			'top_menu_dropdown_color'            => $array['default']['colors']['top_menu_dropdown_color'],
			'top_menu_dropdown_hover_color'      => $array['default']['colors']['top_menu_dropdown_hover_color'],
			'top_menu_dropdown_link_color'       => $array['default']['colors']['top_menu_dropdown_link_color'],
			'top_menu_dropdown_link_hover_color' => $array['default']['colors']['top_menu_dropdown_link_hover_color'],

			'header_background_color'  => '#FFFFFF',
			'header_link_color'        => $array['default']['colors']['header_link_color'],
			'header_link_hover_color'  => $array['default']['colors']['header_link_hover_color'],
			'header_description_color' => $array['default']['colors']['header_description_color'],

			'main_menu_background_color'                => '#FFFFFF',
			'main_menu_link_color'                      => '#313F48',
			'main_menu_link_hover_color'                => '#FFFFFF',
			'main_menu_dropdown_background_color'       => '#313F48',
			'main_menu_dropdown_background_hover_color' => $array['default']['colors']['main_menu_dropdown_background_hover_color'],
			'main_menu_dropdown_link_color'             => $array['default']['colors']['main_menu_dropdown_link_color'],
			'main_menu_dropdown_link_hover_color'       => $array['default']['colors']['main_menu_dropdown_link_hover_color'],

			'banner_background_color'               => '#FAFBFC',
			'banner_text_color'                     => '#313F48',
			'banner_text_image_color'               => '#FFFFFF',
			'banner_breadcrumb_background_color'    => '#FAFBFC',
			'banner_breadcrumb_text_color'          => '#313F48',
			'banner_breadcrumb_text_selected_color' => '#313F48',

			'background_color'                       => '#FFFFFF',
			'body_line_color'                        => '#54636D',
			'body_text_heading_color'                => '#313F48',
			'body_text_small_color'                  => '#313F48',
			'body_text_color'                        => '#54636D',
			'body_link_color'                        => '#47B7E9',
			'body_link_hover_color'                  => '#1894CB', // darken #47B7E9 15%
			'body_section_full_background_color'     => '#FAFBFC',
			'body_section_full_text_color'           => '#54636D',
			'body_section_full_link_color'           => '#47B7E9',
			'body_section_full_link_hover_color'     => '#1894CB', // darken #47B7E9 15%
			'body_section_full_cta_background_color' => $array['default']['colors']['body_section_full_cta_background_color'],
			'body_section_full_cta_text_color'       => $array['default']['colors']['body_section_full_cta_text_color'],
			'body_section_full_cta_link_color'       => $array['default']['colors']['body_section_full_cta_link_color'],
			'body_section_full_cta_link_hover_color' => $array['default']['colors']['body_section_full_cta_link_hover_color'],

			'footer_cta_background_color' => $array['default']['colors']['footer_cta_background_color'],
			'footer_cta_text_color'       => $array['default']['colors']['footer_cta_text_color'],
			'footer_cta_link_color'       => $array['default']['colors']['footer_cta_link_color'],
			'footer_cta_link_hover_color' => $array['default']['colors']['footer_cta_link_hover_color'],

			'footer_widgets_background_color' => $array['default']['colors']['footer_widgets_background_color'],
			'footer_widgets_text_color'       => $array['default']['colors']['footer_widgets_text_color'],
			'footer_widgets_link_color'       => $array['default']['colors']['footer_widgets_link_color'],
			'footer_widgets_link_hover_color' => $array['default']['colors']['footer_widgets_link_hover_color'],

			'footer_background_color' => '#FFFFFF',
			'footer_text_color'       => '#54636D',
			'footer_link_color'       => '#54636D',
			'footer_link_hover_color' => '#313F48',
		),
	);

	return $array;
}

add_filter( 'lsx_customizer_colour_choices', 'minimal_lsx_customizer_colour_choices', 11 );

/**
 * Handle body colours that might be change by LSX Customiser.
 *
 * @package     minimal-lsx
 * @subpackage	lsx-customizer
 */
function minimal_lsx_customizer_colour_selectors_body( $css, $colors ) {
	$css .= '
		@import "' . MINIMAL_LSX_PATH . '/assets/css/scss/customizer-colours";

		/**
		 * LSX Customizer - Body (MINIMAL)
		 */
		@include customizer-minimal-body-colours (
			$bg_section: ' . $colors['body_section_full_background_color'] . '
		);

		/**
		 * LSX Customizer - Body (LSX Testimonials) (MINIMAL)
		 */
		@include customizer-minimal-lsx-testimonials-body-colours (
			$small: ' . $colors['body_text_small_color'] . '
		);
	';

	return $css;
}

add_filter( 'lsx_customizer_colour_selectors_body', 'minimal_lsx_customizer_colour_selectors_body', 15, 2 );

/**
 * Handle body colours that might be change by LSX Customiser.
 *
 * @package     minimal-lsx
 * @subpackage	lsx-customizer
 */
function minimal_lsx_customizer_colour_selectors_button( $css, $colors ) {
	$css .= '
		@import "' . MINIMAL_LSX_PATH . '/assets/css/scss/customizer-colours";

		/**
		 * LSX Customizer - Button (MINIMAL)
		 */
		@include customizer-minimal-button-colours (
			$shadow: ' . $colors['button_shadow'] . '
		);
	';

	return $css;
}

add_filter( 'lsx_customizer_colour_selectors_button', 'minimal_lsx_customizer_colour_selectors_button', 15, 2 );


/**
 * Handle slider switch by LSX Customiser.
 *
 * @package     minimal-lsx
 * @subpackage  lsx-customizer
 */
function minimal_lsx_customizer_slider_button( $lsx_controls ) {
	$lsx_controls['settings']['lsx_slider_on'] = array(
		'default'           => false,
		'sanitize_callback' => 'lsx_sanitize_checkbox',
		'transport'         => 'postMessage',
	);
	$lsx_controls['fields']['lsx_slider_on'] = array(
		'label'   => esc_html__( 'Remove Home Demo Slider', 'lsx' ),
		'section' => 'lsx-layout',
		'type'    => 'checkbox',
	);
	return $lsx_controls;
}

add_filter( 'lsx_customizer_controls', 'minimal_lsx_customizer_slider_button', 15, 2 );
