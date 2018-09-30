<?php
/**
 * Call To Action Widget
 *
 * @package    Hoot
 * @subpackage Brigsby
 */

/**
* Class Hoot_CTA_Widget
*/
class Hoot_CTA_Widget extends HybridExtend_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-cta-widget';
		$settings['name'] = __( 'Hoot > Call To Action', 'brigsby' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Call To Action block.', 'brigsby'),
			'class'			=> 'hoot-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( 'Headline', 'brigsby' ),
				'id'		=> 'headline',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Description', 'brigsby' ),
				'id'		=> 'description',
				'type'		=> 'textarea',
			),
			array(
				'name'		=> __( 'Button Text', 'brigsby' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'brigsby' ),
				'id'		=> 'button_text',
				'type'		=> 'text',
				'std'		=> __( 'KNOW MORE', 'brigsby' ),
			),
			array(
				'name'		=> __( 'URL', 'brigsby' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'brigsby' ),
				'id'		=> 'url',
				'type'		=> 'text',
				'sanitize'	=> 'url',
			),
			array(
				'name'		=> __( 'Border', 'brigsby' ),
				'desc'		=> __( 'Top and bottom borders.', 'brigsby' ),
				'id'		=> 'border',
				'type'		=> 'select',
				'std'		=> 'none none',
				'options'	=> array(
					'line line'		=> __( 'Top - Line || Bottom - Line', 'brigsby' ),
					'line shadow'	=> __( 'Top - Line || Bottom - StrongLine', 'brigsby' ),
					'line none'		=> __( 'Top - Line || Bottom - None', 'brigsby' ),
					'shadow line'	=> __( 'Top - StrongLine || Bottom - Line', 'brigsby' ),
					'shadow shadow'	=> __( 'Top - StrongLine || Bottom - StrongLine', 'brigsby' ),
					'shadow none'	=> __( 'Top - StrongLine || Bottom - None', 'brigsby' ),
					'none line'		=> __( 'Top - None || Bottom - Line', 'brigsby' ),
					'none shadow'	=> __( 'Top - None || Bottom - StrongLine', 'brigsby' ),
					'none none'		=> __( 'Top - None || Bottom - None', 'brigsby' ),
				),
			),
		);

		$settings = apply_filters( 'hoot_cta_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hybridextend_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function hoot_cta_widget_register(){
	register_widget('Hoot_CTA_Widget');
}
add_action('widgets_init', 'hoot_cta_widget_register');