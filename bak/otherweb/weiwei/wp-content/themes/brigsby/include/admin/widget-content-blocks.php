<?php
/**
 * Content Blocks Widget
 *
 * @package    Hoot
 * @subpackage Brigsby
 */

/**
* Class Hoot_Content_Blocks_Widget
*/
class Hoot_Content_Blocks_Widget extends HybridExtend_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-content-blocks-widget';
		$settings['name'] = __( 'Hoot > Content Blocks', 'brigsby' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Styled Content Blocks.', 'brigsby'),
			'class'			=> 'hoot-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( "Title (optional)", 'brigsby' ),
				'id'		=> 'title',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Blocks Style', 'brigsby' ),
				'id'		=> 'style',
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-1.png',
					'style2'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-2.png',
					'style3'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-3.png',
					'style4'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-4.png',
				),
			),
			array(
				'name'		=> __( 'No. Of Columns', 'brigsby' ),
				'id'		=> 'columns',
				'type'		=> 'select',
				'std'		=> '3',
				'options'	=> array(
					'1'	=> __( '1', 'brigsby' ),
					'2'	=> __( '2', 'brigsby' ),
					'3'	=> __( '3', 'brigsby' ),
					'4'	=> __( '4', 'brigsby' ),
					'5'	=> __( '5', 'brigsby' ),
				),
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
			array(
				'name'		=> __( 'Content Boxes', 'brigsby' ),
				'id'		=> 'boxes',
				'type'		=> 'group',
				'options'	=> array(
					'item_name'	=> __( 'Content Box', 'brigsby' ),
				),
				'fields'	=> array(
					array(
						'name'		=> __( 'Page', 'brigsby' ),
						'desc'		=> __( 'Page Title, Content and Featured Image will be used.', 'brigsby' ),
						'id'		=> 'page',
						'type'		=> 'select',
						'options'	=> Hybridextend_WP_Widget::get_wp_list('page'),
					),
					array(
						'name'		=> __('Display excerpt instead of full content', 'brigsby'),
						'desc'		=> __( 'In excerpts, "Read More" link will be automatically inserted if no custom link is provided below.', 'brigsby' ),
						'id'		=> 'excerpt',
						'type'		=> 'checkbox'),
					array(
						'name'		=> __('Link Text (optional)', 'brigsby'),
						'id'		=> 'link',
						'type'		=> 'text'),
					array(
						'name'		=> __('Link URL', 'brigsby'),
						'id'		=> 'url',
						'std'		=> 'http://',
						'type'		=> 'text',
						'sanitize'	=> 'url'),
#					array(
#						'name'		=> __( 'Icon Style', 'brigsby' ),
#						'id'		=> 'icon_style',
#						'type'		=> 'select',
#						'std'		=> 'circle',
#						'options'	=> array(
#							'none'		=> __( 'None', 'brigsby' ),
#							'circle'	=> __( 'Circle', 'brigsby' ),
#							'square'	=> __( 'Square', 'brigsby' ),
#						),
#					),
					array(
						'name'		=> __('Icon', 'brigsby'),
						'desc'		=> __( 'Use an icon instead of featured image of the page selected above.', 'brigsby' ),
						'id'		=> 'icon',
						'type'		=> 'icon',
					),
					array(
						'name'		=> __( 'Icon Style', 'brigsby' ),
						'id'		=> 'icon_style',
						'type'		=> 'select',
						'std'		=> 'circle',
						'options'	=> array(
							'none'		=> __( 'None', 'brigsby' ),
							'circle'	=> __( 'Circle', 'brigsby' ),
							'square'	=> __( 'Square', 'brigsby' ),
						),
					),
				),
			),
		);

		$settings = apply_filters( 'hoot_content_blocks_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hybridextend_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function hoot_content_blocks_widget_register(){
	register_widget('Hoot_Content_Blocks_Widget');
}
add_action('widgets_init', 'hoot_content_blocks_widget_register');