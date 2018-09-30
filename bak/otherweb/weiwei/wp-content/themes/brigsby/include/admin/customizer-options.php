<?php
/**
 * Defines customizer options
 *
 * This file is loaded at 'after_setup_theme' hook with 10 priority.
 *
 * @package    Hoot
 * @subpackage Brigsby
 */

/**
 * Build the Customizer options (panels, sections, settings)
 *
 * Always remember to mention specific priority for non-static options like:
 *     - options being added based on a condition (eg: if woocommerce is active)
 *     - options which may get removed (eg: logo_size, headings_fontface)
 *     - options which may get rearranged (eg: logo_background_type)
 *     This will allow other options inserted with priority to be inserted at
 *     their intended place.
 *
 * @since 1.0
 * @access public
 * @return array
 */
if ( !function_exists( 'hoot_theme_customizer_options' ) ) :
function hoot_theme_customizer_options() {

	// Stores all the settings to be added
	$settings = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Theme default colors and fonts
	extract( apply_filters( 'hoot_theme_options_defaults', array(
		'accent_color'         => '#74a116',
		'accent_font'          => '#ffffff',
		'box_background'       => '#ffffff',
		'site_background'      => '#f5f5f5',
		'site_background_patt' => 'hybrid/extend/images/patterns/4.png',
	) ) );

	// Directory path for radioimage buttons
	$imagepath =  HYBRIDEXTEND_INCURI . 'admin/images/';

	// Logo Sizes (different range than standard typography range)
	$logosizes = array();
	$logosizerange = range( 14, 110 );
	foreach ( $logosizerange as $isr )
		$logosizes[ $isr . 'px' ] = $isr . 'px';
	$logosizes = apply_filters( 'hoot_theme_options_logosizes', $logosizes);

	// Logo Font Options for Lite version
	$logofont = apply_filters( 'hoot_theme_options_logofont', array(
					'standard' => __('Standard Body Font', 'brigsby'),
					'heading' => __("Logo Font (set in 'Typography' section)", 'brigsby'),
					) );

	/*** Add Options (Panels, Sections, Settings) ***/

	/** Section **/

	$section = 'title_tagline';

	$sections[ $section ] = array(
		'title'       => __( 'Setup &amp; Layout', 'brigsby' ),
	);

	$settings['site_layout'] = array(
		'label'       => __( 'Site Layout - Boxed vs Stretched', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'boxed'   => __('Boxed layout', 'brigsby'),
			'stretch' => __('Stretched layout (full width)', 'brigsby'),
		),
		'default'     => 'stretch',
		'description' => __("For boxed layouts, both backgrounds (site and content box) can be set in the Backgrounds' section.<br />For Stretched Layout, only site background is available.", 'brigsby'),
	);

	$settings['site_width'] = array(
		'label'       => __( 'Max. Site Width (pixels)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'1260' => __('1260px (wide)', 'brigsby'),
			'1080' => __('1080px (standard)', 'brigsby'),
		),
		'default'     => '1260',
	);

	$settings['load_minified'] = array(
		'label'       => __( 'Load Minified Styles and Scripts (when available)', 'brigsby' ),
		'sublabel'    => __( 'Checking this option reduces data size, hence increasing page load speed.', 'brigsby' ),
		'section'     => $section,
		'type'        => 'checkbox',
		// 'default'     => 1,
	);

	$settings['sidebar_desc'] = array(
		'label'       => __( 'Multiple Sidebars', 'brigsby' ),
		'section'     => $section,
		'type'        => 'content',
		'content'     => sprintf( __( 'This theme can display different sidebar content on different pages of your site with the %1sCustom Sidebars%2s plugin. Simply install and activate the plugin to use it with this theme. Or if you are using %3sJetpack%4s, you can use the %5s"Widget Visibility"%6s module.', 'brigsby' ), '<a href="https://wordpress.org/plugins/custom-sidebars/screenshots/" target="_blank">', '</a>', '<a href="https://wordpress.org/plugins/jetpack/" target="_blank">', '</a>', '<a href="https://jetpack.com/support/widget-visibility/" target="_blank">', '</a>' ),
		'priority'    => '35', // Non static options must have a priority
	);

	$settings['sidebar'] = array(
		'label'       => __( 'Sidebar Layout (Site-wide)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radioimage',
		'choices'     => array(
			'wide-right'         => $imagepath . 'sidebar-wide-right.png',
			'narrow-right'       => $imagepath . 'sidebar-narrow-right.png',
			'wide-left'          => $imagepath . 'sidebar-wide-left.png',
			'narrow-left'        => $imagepath . 'sidebar-narrow-left.png',
			'narrow-left-right'  => $imagepath . 'sidebar-narrow-left-right.png',
			'narrow-left-left'   => $imagepath . 'sidebar-narrow-left-left.png',
			'narrow-right-right' => $imagepath . 'sidebar-narrow-right-right.png',
			'full-width'         => $imagepath . 'sidebar-full.png',
			'none'               => $imagepath . 'sidebar-none.png',
		),
		'default'     => 'wide-right',
		'description' => __("Set the default sidebar width and position for your site.", 'brigsby'),
	);

	$settings['sidebar_pages'] = array(
		'label'       => __( 'Sidebar Layout (for Pages)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radioimage',
		'choices'     => array(
			'wide-right'         => $imagepath . 'sidebar-wide-right.png',
			'narrow-right'       => $imagepath . 'sidebar-narrow-right.png',
			'wide-left'          => $imagepath . 'sidebar-wide-left.png',
			'narrow-left'        => $imagepath . 'sidebar-narrow-left.png',
			'narrow-left-right'  => $imagepath . 'sidebar-narrow-left-right.png',
			'narrow-left-left'   => $imagepath . 'sidebar-narrow-left-left.png',
			'narrow-right-right' => $imagepath . 'sidebar-narrow-right-right.png',
			'full-width'         => $imagepath . 'sidebar-full.png',
			'none'               => $imagepath . 'sidebar-none.png',
		),
		'default'     => 'wide-right',
	);

	$settings['sidebar_posts'] = array(
		'label'       => __( 'Sidebar Layout (for single Posts)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radioimage',
		'choices'     => array(
			'wide-right'         => $imagepath . 'sidebar-wide-right.png',
			'narrow-right'       => $imagepath . 'sidebar-narrow-right.png',
			'wide-left'          => $imagepath . 'sidebar-wide-left.png',
			'narrow-left'        => $imagepath . 'sidebar-narrow-left.png',
			'narrow-left-right'  => $imagepath . 'sidebar-narrow-left-right.png',
			'narrow-left-left'   => $imagepath . 'sidebar-narrow-left-left.png',
			'narrow-right-right' => $imagepath . 'sidebar-narrow-right-right.png',
			'full-width'         => $imagepath . 'sidebar-full.png',
			'none'               => $imagepath . 'sidebar-none.png',
		),
		'default'     => 'wide-right',
	);

	/** Section **/

	$section = 'header';

	$sections[ $section ] = array(
		'title'       => __( 'Header', 'brigsby' ),
	);

	$settings['header_layout_help'] = array(
		'section'     => $section,
		'type'        => 'content',
		'content'     => '<em>' . __( 'Select options below to create a variety of header layouts. Example:', 'brigsby' ) . '</em><br><img src="' . $imagepath . 'header-layout.png">',
	);

	$settings['primary_menuarea'] = array(
		'label'       => __( 'Primary Area (right of logo)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'menu'        => __('Display Primary Menu', 'brigsby'),
			'search'      => __('Display Search', 'brigsby'),
			'custom'      => __('Custom Text', 'brigsby'),
			'none'        => __('None (Logo will get centre aligned)', 'brigsby'),
		),
		'default'     => 'menu',
	);

	$settings['primary_menuarea_custom'] = array(
		'label'             => __( 'Custom Text instead of Menu', 'brigsby' ),
		'section'           => $section,
		'type'              => 'textarea',
		'description'       => __( 'You can use this area to display ads or custom text.', 'brigsby' ),
		'active_callback'   => 'hoot_callback_show_primary_menuarea_custom',
	);
	// Allow users to add javascript in case they need to use this area to insert code for ads
	// etc. To enable this, add the following code in your child theme's functions.php file (without
	// the '//'). This code is already included in premium version.
	//     add_filter( 'primary_menuarea_custom_allowscript', 'hoot_child_textarea_allowscript' );
	//     function hoot_child_textarea_allowscript(){ return true; }
	if ( apply_filters( 'primary_menuarea_custom_allowscript', true ) )
		$settings['primary_menuarea_custom']['sanitize_callback'] = 'hoot_custom_sanitize_textarea_allowscript';

	$settings['secondary_menu_location'] = array(
		'label'       => __( 'Secondary Menu Location', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'top'        => __('Top (above logo)', 'brigsby'),
			'bottom'     => __('Bottom (below logo)', 'brigsby'),
			'none'       => __('Do not display secondary menu', 'brigsby'),
		),
		'default'     => 'bottom',
	);

	$settings['secondary_menu_align'] = array(
		'label'       => __( 'Secondary Menu Alignment', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'left'      => __('Left', 'brigsby'),
			'right'     => __('Right', 'brigsby'),
			'center'    => __('Center', 'brigsby'),
		),
		'default'     => 'center',
	);

	/** Section **/

	$section = 'logo';

	$sections[ $section ] = array(
		'title'       => __( 'Logo', 'brigsby' ),
	);

	$settings['logo_background_type'] = array(
		'label'       => __( 'Logo Background', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'priority'    => '115', // Non static options must have a priority
		'choices'     => array(
			'transparent' => __('None', 'brigsby'),
			'accent'      => __('Accent Color', 'brigsby'),
		),
		'default'     => 'transparent',
	);

	$settings['logo'] = array(
		'label'       => __( 'Site Logo', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'text'        => __('Default Text (Site Title)', 'brigsby'),
			'custom'      => __('Custom Text', 'brigsby'),
			'image'       => __('Image Logo', 'brigsby'),
			'mixed'       => __('Image &amp; Default Text (Site Title)', 'brigsby'),
			'mixedcustom' => __('Image &amp; Custom Text', 'brigsby'),
		),
		'default'     => 'text',
		'description' => sprintf( __('Use %sSite Title%s as default text logo', 'brigsby'), '<a href="' . admin_url('/') . 'options-general.php" target="_blank">', '</a>' ),
	);

	$settings['logo_size'] = array(
		'label'       => __( 'Logo Text Size', 'brigsby' ),
		'section'     => $section,
		'type'        => 'select',
		'priority'    => '125', // Non static options must have a priority
		'choices'     => array(
			'tiny'   => __( 'Tiny', 'brigsby'),
			'small'  => __( 'Small', 'brigsby'),
			'medium' => __( 'Medium', 'brigsby'),
			'large'  => __( 'Large', 'brigsby'),
			'huge'   => __( 'Huge', 'brigsby'),
		),
		'default'     => 'medium',
		'active_callback' => 'hoot_callback_logo_size',
	);

	$settings['site_title_icon'] = array(
		'label'           => __( 'Site Title Icon (Optional)', 'brigsby' ),
		'section'         => $section,
		'type'            => 'icon',
		// 'default'         => 'fa-anchor',
		'description'     => __( 'Leave empty to hide icon.', 'brigsby' ),
		'active_callback' => 'hoot_callback_site_title_icon',
	);

	$settings['site_title_icon_size'] = array(
		'label'           => __( 'Site Title Icon Size', 'brigsby' ),
		'section'         => $section,
		'type'            => 'select',
		'choices'         => $logosizes,
		'default'         => '50px',
		'active_callback' => 'hoot_callback_site_title_icon',
	);

	if ( ! function_exists( 'the_custom_logo' ) )
	$settings['logo_image'] = array(
		'label'           => __( 'Upload Logo', 'brigsby' ),
		'section'         => $section,
		'type'            => 'image',
		'priority'        => '145', // Replaced by WP's custom_logo if available // Update in premium if needed
		'active_callback' => 'hoot_callback_logo_image',
	);

	$settings['logo_image_width'] = array(
		'label'           => __( 'Maximum Logo Width', 'brigsby' ),
		'section'         => $section,
		'type'            => 'text',
		'priority'        => '146', // Keep it with image logo // Update in premium if needed
		'default'         => 200,
		'description'     => __( '(in pixels)<hr>The logo width may be automatically adjusted by the browser depending on title length and space available.', 'brigsby' ),
		'input_attrs'     => array(
			'min'         => 0,
			'max'         => 3,
			'placeholder' => __( '(in pixels)', 'brigsby' ),
		),
		'active_callback' => 'hoot_callback_logo_image_width',
	);

	$logo_custom_line_options = array(
		'text' => array(
			'label'       => __( 'Line Text', 'brigsby' ),
			'type'        => 'text',
		),
		'size' => array(
			'label'       => __( 'Line Size', 'brigsby' ),
			'type'        => 'select',
			'choices'     => $logosizes,
			'default'     => '24px',
		),
		'font' => array(
			'label'       => __( 'Line Font', 'brigsby' ),
			'type'        => 'select',
			'choices'     => $logofont,
			'default'     => 'heading',
		),
	);

	$settings['logo_custom'] = array(
		'label'           => __( 'Custom Logo Text', 'brigsby' ),
		'section'         => $section,
		'type'            => 'sortlist',
		'choices'         => array(
			'line1' => __('Line 1', 'brigsby'),
			'line2' => __('Line 2', 'brigsby'),
			'line3' => __('Line 3', 'brigsby'),
			'line4' => __('Line 4', 'brigsby'),
		),
		'options'         => array(
			'line1' => $logo_custom_line_options,
			'line2' => $logo_custom_line_options,
			'line3' => $logo_custom_line_options,
			'line4' => $logo_custom_line_options,
		),
		'attributes'      => array(
			'inactive' => array( 'line3', 'line4' ),
			'hideable' => true,
			'sortable' => false,
		),
		'active_callback' => 'hoot_callback_logo_custom',
	);

	$settings['show_tagline'] = array(
		'label'           => __( 'Show Tagline', 'brigsby' ),
		'sublabel'        => __( 'Display site description as tagline below logo.', 'brigsby' ),
		'section'         => $section,
		'type'            => 'checkbox',
		'default'         => 1,
		'active_callback' => 'hoot_callback_show_tagline',
	);

	/** Section **/

	$section = 'colors';

	// Redundant as 'colors' section is added by WP. But we still add it for brevity
	$sections[ $section ] = array(
		'title'       => __( 'Colors', 'brigsby' ),
		'description' => __('Control various color options in the premium version for fonts, backgrounds, contrast, highlight, accent etc.', 'brigsby'),
	);

	$settings['accent_color'] = array(
		'label'       => __( 'Accent Color', 'brigsby' ),
		'section'     => $section,
		'type'        => 'color',
		'default'     => $accent_color,
	);

	$settings['accent_font'] = array(
		'label'       => __( 'Font Color on Accent Color', 'brigsby' ),
		'section'     => $section,
		'type'        => 'color',
		'default'     => $accent_font,
	);

	if ( current_theme_supports( 'woocommerce' ) ) :
		$settings['woocommerce-colors-plugin'] = array(
			'label'       => __( 'Woocommerce Styling', 'brigsby' ),
			'section'     => $section,
			'type'        => 'content',
			'priority'    => '185', // Non static options must have a priority
			'content'     => sprintf( __('Looks like you are using Woocommerce. Install %sthis plugin%s to change colors and styles for WooCommerce elements like buttons etc.', 'brigsby'), '<a href="https://wordpress.org/plugins/woocommerce-colors/" target="_blank">', '</a>' ),
		);
	endif;

	/** Section **/

	$section = 'backgrounds';

	$sections[ $section ] = array(
		'title'       => __( 'Backgrounds', 'brigsby' ),
		'description' => __('The premium version comes with background options for different sections of your site like header, menu dropdown, content area, logo background, footer etc.', 'brigsby'),
	);

	$settings['background'] = array(
		'label'       => __( 'Site Background', 'brigsby' ),
		'section'     => $section,
		'type'        => 'betterbackground',
		'default'     => array(
			'color'      => $site_background,
			'pattern'    => $site_background_patt,
		),
	);

	$settings['box_background_color'] = array(
		'label'       => __( 'Content Box Background', 'brigsby' ),
		'section'     => $section,
		'type'        => 'color',
		'default'     => $box_background,
		'description' => __("This background is available only when <strong>'Boxed'</strong> option is selected in the <strong>'Setup &amp; Layout'</strong> section.", 'brigsby'),
		// 'active_callback' => 'hoot_callback_box_background_color',
	);

	/** Section **/

	$section = 'typography';

	$sections[ $section ] = array(
		'title'       => __( 'Typography', 'brigsby' ),
		'description' => __('The premium version offers complete typography control (color, style, size) for various headings, header, menu, footer, widgets, content sections etc (over 600 Google Fonts to chose from)', 'brigsby'),
	);

	$settings['logo_fontface'] = array(
		'label'       => __( 'Logo Font (Free Version)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'select',
		'priority'    => 305, // Non static options must have a priority
		'choices'     => array(
			'standard' => __( 'Standard Font (Open Sans)', 'brigsby'),
			'cursive'  => __( 'Cursive Font (Pacifico)', 'brigsby'),
		),
		'default'     => 'cursive',
	);

	/** Section **/

	$section = 'frontpage';

	$sections[ $section ] = array(
		'title'       => __( 'Frontpage - Modules', 'brigsby' ),
	);

	$widget_area_options = array(
		'columns' => array(
			'label'   => __( 'Columns', 'brigsby' ),
			'type'    => 'select',
			'choices' => array(
				'100'         => __('One Column [100]', 'brigsby'),
				'50-50'       => __('Two Columns [50 50]', 'brigsby'),
				'33-66'       => __('Two Columns [33 66]', 'brigsby'),
				'66-33'       => __('Two Columns [66 33]', 'brigsby'),
				'25-75'       => __('Two Columns [25 75]', 'brigsby'),
				'75-25'       => __('Two Columns [75 25]', 'brigsby'),
				'33-33-33'    => __('Three Columns [33 33 33]', 'brigsby'),
				'25-25-25-25' => __('Four Columns [25 25 25 25]', 'brigsby'),
			),
		),
		'modulebg' => array(
			'label'       => '',
			'type'        => 'content',
			'content'     => '<div class="button">' . __( 'Module Background', 'brigsby' ) . '</div>',
		),
	);

	$settings['frontpage_sections'] = array(
		'label'       => __( 'Frontpage Widget Areas', 'brigsby' ),
		'sublabel'    => sprintf( __("<p></p><ul><li>Sort different sections of the Frontpage in the order you want them to appear.</li><li>You can add content to widget areas from the %1sWidgets Management screen%2s.</li><li>You can disable areas by clicking the 'eye' icon. (This will hide them on the Widgets screen as well)</li></ul>", 'brigsby'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
		'section'     => $section,
		'type'        => 'sortlist',
		'choices'     => array(
			'slider_html' => __('HTML Slider', 'brigsby'),
			'slider_img'  => __('Image Slider', 'brigsby'),
			'area_a'      => __('Widget Area A', 'brigsby'),
			'area_b'      => __('Widget Area B', 'brigsby'),
			'area_c'      => __('Widget Area C', 'brigsby'),
			'area_d'      => __('Widget Area D', 'brigsby'),
			'area_e'      => __('Widget Area E', 'brigsby'),
			'content'     => __('Frontpage Content', 'brigsby'),
		),
		'default'     => array(
			// 'content' => array( 'sortitem_hide' => 1, ),
			'area_b'  => array( 'columns' => '50-50' ),
		),
		'options'     => array(
			// 'slider_html' => $widget_area_options,
			// 'slider_img'  => $widget_area_options,
			'area_a'      => $widget_area_options,
			'area_b'      => $widget_area_options,
			'area_c'      => $widget_area_options,
			'area_d'      => $widget_area_options,
			'area_e'      => $widget_area_options,
			'content'     => array(
							'title' => array(
								'label'       => __( 'Title (optional)', 'brigsby' ),
								'type'        => 'text',
							),
							'modulebg' => array(
								'label'       => '',
								'type'        => 'content',
								'content'     => '<div class="button">' . __( 'Module Background', 'brigsby' ) . '</div>',
							), ),
		),
		'attributes'  => array(
			'hideable'      => true,
			'sortable'      => true,
		),
		// 'description' => sprintf( __('You must first save the changes you make here and refresh this screen for widget areas to appear in the Widgets panel (in customizer). Once you save the settings, you can add content to these widget areas using the %sWidgets Management screen%s.', 'brigsby'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
	);

	$settings['frontpage_content_desc'] = array(
		'label'       => __( "Frontpage Content", 'brigsby' ),
		'section'     => $section,
		'type'        => 'content',
		'content'     => sprintf( __( "This module will show<ul style='list-style:disc;margin:1em 0 0 2em;'><li>the <strong>'Blog'</strong> if you have <strong>Your Latest Posts</strong> selectd in %3sReading Settings%4s</li><li>the <strong>Page Content</strong> of the page set as Front page if you have <strong>A static page</strong> selected in %3sReading Settings%4s</li></ul>", 'brigsby' ), '<a href="' . admin_url('/') . 'options-reading.php" target="_blank">', '</a>', '<a href="' . admin_url('/') . 'options-reading.php" target="_blank">', '</a>' ),
	);

	$frontpagemodule_bg = array(
		'area_a'      => __('Widget Area A', 'brigsby'),
		'area_b'      => __('Widget Area B', 'brigsby'),
		'area_c'      => __('Widget Area C', 'brigsby'),
		'area_d'      => __('Widget Area D', 'brigsby'),
		'area_e'      => __('Widget Area E', 'brigsby'),
		'content'     => __('Frontpage Content', 'brigsby'),
		);

	foreach ( $frontpagemodule_bg as $fpgmodid => $fpgmodname ) {

		$settings["frontpage_sectionbg_{$fpgmodid}"] = array(
			'label'       => '',
			'section'     => $section,
			'type'        => 'group',
			'button'      => __( 'Module Background', 'brigsby' ),
			'options'     => array(
				'description' => array(
					'label'       => '',
					'type'        => 'content',
					'content'     => '<span class="hoot-module-bg-title">' . $fpgmodname . '</span>',
				),
				'type' => array(
					'label'   => __( 'Background Type', 'brigsby' ),
					'type'    => 'radio',
					'choices' => array(
						'none'        => __('None', 'brigsby'),
						'highlight'   => __('Highlight Color', 'brigsby'),
						'image'       => __('Background Image', 'brigsby'),
					),
					'default' => ( ( $fpgmodid == 'area_b' ) ? 'image' : 'none' ),
				),
				'image' => array(
					'label'       => __( "Background Image (Select 'Image' above)", 'brigsby' ),
					'type'        => 'image',
					'default' => ( ( $fpgmodid == 'area_b' ) ? HYBRID_PARENT_URI . 'images/modulebg.jpg' : '' ),
				),
				'parallax' => array(
					'label'   => __( 'Apply Parallax Effect to Background Image', 'brigsby' ),
					'type'    => 'checkbox',
					'default' => ( ( $fpgmodid == 'area_b' ) ? 1 : 0 ),
				),
			),
		);

	} // end for

	/** Section **/

	$section = 'slider_html';

	$sections[ $section ] = array(
		'title'       => __( 'Frontpage - HTML Slider', 'brigsby' ),
	);

	$settings['wt_html_slider_width'] = array(
		'label'       => __( 'Slider Width', 'brigsby' ),
		'sublabel'    => __( "Note: This option is useful only if the <strong>Site Layout</strong> option is set to <strong>Stretched</strong> in 'Setup &amp; Layout' section.", 'brigsby' ),
		'section'     => $section,
		'type'        => 'radioimage',
		'choices'     => array(
			'boxed'   => $imagepath . 'slider-width-boxed.png',
			'stretch' => $imagepath . 'slider-width-stretch.png',
		),
		'default'     => 'boxed',
	);

	$settings['wt_html_slider_min_height'] = array(
		'label'       => __( 'Minimum Slider Height (in pixels)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'text',
		'priority'    => 695, // Non static options must have a priority
		'default'     => 375,
		'description' => __('<strong>(in pixels)</strong><hr>Leave empty to let the slider height adjust automatically.', 'brigsby'),
		'input_attrs' => array(
			'min' => 0,
			'max' => 3,
			'placeholder' => __( '(in pixels)', 'brigsby' ),
		),
	);

	$settings['wt_html_slider'] = array(
		'label'       => __( 'Slides', 'brigsby' ),
		'section'     => $section,
		'type'        => 'content',
		'priority'    => 695, // Non static options must have a priority
		'content'     => __( 'Premium version of this theme comes with capability to create <strong>Unlimited slides</strong>.', 'brigsby' ),
	);

	for ( $slide = 1; $slide <= 4; $slide++ ) {

		$settings["wt_html_slide_{$slide}"] = array(
			'label'       => sprintf( __( 'Slide %s Content', 'brigsby' ), $slide),
			'section'     => $section,
			'type'        => 'group',
			'priority'    => 695, // Non static options must have a priority
			'button'      => sprintf( __( 'Edit Slide %s', 'brigsby' ), $slide),
			'options'     => array(
				'description' => array(
					'label'       => '',
					'type'        => 'content',
					'content'     => '<span class="hoot-module-bg-title">' . sprintf( __( 'Slide %s Content', 'brigsby' ), $slide) . '</span>' . __( '<em>To hide this slide, simply leave the Image and Content empty.</em>', 'brigsby' ),
				),
				'image' => array(
					'label'       => __( 'Showcase Image (Right Column)', 'brigsby' ),
					'type'        => 'content',
					'description' => __( 'If the page below has a featured image, it will be used as the Showcase Image (image in right column)', 'brigsby' ),
				),
				'content' => array(
					'label'       => __( 'Content (Left Column)', 'brigsby' ),
					'type'        => 'select',
					'choices'     => array( __( 'Select Page', 'brigsby' ) ) + HybridExtend_Options_Helper::pages(),
				),
				// 'image' => array(
				// 	'label'       => __( 'Featured Image (Right Column)', 'brigsby' ),
				// 	'type'        => 'image',
				// 	'description' => __( 'Content below will be center aligned if no image is present.', 'brigsby' ),
				// ),
				// 'content' => array(
				// 	'label'       => __( 'Content (Left Column)', 'brigsby' ),
				// 	'type'        => 'textarea',
				// 	'default'     => '<h3>Lorem Ipsum Dolor</h3>' . "\n" . __('<p>This is a sample description text for the slide.</p>', 'brigsby'),
				// 	'description' => __('You can use the <code>&lt;h3&gt;Lorem Ipsum Dolor&lt;/h3&gt;</code> tag to create styled heading.', 'brigsby'),
				// ),
				'content_bg' => array(
					'label'   => __( 'Content Styling', 'brigsby' ),
					'type'    => 'select',
					'default' => 'light-on-dark',
					'choices' => array(
						'dark'          => __('Dark Font', 'brigsby'),
						'light'         => __('Light Font', 'brigsby'),
						'dark-on-light' => __('Dark Font / Light Background', 'brigsby'),
						'light-on-dark' => __('Light Font / Dark Background', 'brigsby'),
					),
				),
				'button' => array(
					'label'       => __( 'Button Text', 'brigsby' ),
					'type'        => 'text',
				),
				'url' => array(
					'label'       => __( 'Button URL', 'brigsby' ),
					'type'        => 'url',
					'description' => __( 'Leave empty if you do not want to show the button.', 'brigsby' ),
					'input_attrs' => array(
						'placeholder' => 'http://',
					),
				),
			),
		);

		$settings["wt_html_slide_{$slide}-background"] = array(
			'label'       => sprintf( __( 'Slide %s Background', 'brigsby' ), $slide),
			'section'     => $section,
			'type'        => 'betterbackground',
			'priority'    => 695, // Non static options must have a priority
			'default'     => array(
				'color'      => '#dddddd',
			),
			'options'     => array( 'color', 'image', 'pattern' ),
		);

	} // end for

	/** Section **/

	$section = 'slider_img';

	$sections[ $section ] = array(
		'title'       => __( 'Frontpage - Image Slider', 'brigsby' ),
	);

	$settings['wt_img_slider_width'] = array(
		'label'       => __( 'Slider Width', 'brigsby' ),
		'sublabel'    => __("Note: This option is useful only if the <strong>Site Layout</strong> option is set to <strong>Stretched</strong> in 'Setup &amp; Layout' section.", 'brigsby'),
		'section'     => $section,
		'type'        => 'radioimage',
		'choices'     => array(
			'boxed'   => $imagepath . 'slider-width-boxed.png',
			'stretch' => $imagepath . 'slider-width-stretch.png',
		),
		'default'     => 'boxed',
	);

	$settings['wt_img_slider'] = array(
		'label'       => __( 'Slides', 'brigsby' ),
		'section'     => $section,
		'type'        => 'content',
		'priority'    => 705, // Non static options must have a priority
		'content'     => __( 'Premium version of this theme comes with capability to create <strong>Unlimited slides</strong>.', 'brigsby' ),
	);

	for ( $slide = 1; $slide <= 4; $slide++ ) { 

		$settings["wt_img_slide_{$slide}"] = array(
			'label'       => '',//sprintf( __( 'Slide %s Content', 'brigsby' ), $slide),
			'section'     => $section,
			'type'        => 'group',
			'priority'    => 705, // Non static options must have a priority
			'button'      => sprintf( __( 'Edit Slide %s', 'brigsby' ), $slide),
			'options'     => array(
				'description' => array(
					'label'       => '',
					'type'        => 'content',
					'content'     => '<span class="hoot-module-bg-title">' . sprintf( __( 'Slide %s Content', 'brigsby' ), $slide) . '</span>' . __( '<em>To hide this slide, simply leave the Image empty.</em>', 'brigsby' ),
				),
				'image' => array(
					'label'       => __( 'Slide Image', 'brigsby' ),
					'type'        => 'image',
					'description' => __( 'The main showcase image.', 'brigsby' ),
				),
				'caption' => array(
					'label'       => __( 'Slide Caption (optional)', 'brigsby' ),
					'type'        => 'textarea',
					'default'     => '<h3>Lorem Ipsum Dolor</h3>' . "\n" . __('<p>This is a sample description text for the slide.</p>', 'brigsby'),
					'description' => __('You can use the <code>&lt;h3&gt;Lorem Ipsum Dolor&lt;/h3&gt;</code> tag to create styled heading.', 'brigsby'),
				),
				'caption_bg' => array(
					'label'   => __( 'Caption Styling', 'brigsby' ),
					'type'    => 'select',
					'default' => 'dark-on-light',
					'choices' => array(
						'dark'          => __('Dark Font', 'brigsby'),
						'light'         => __('Light Font', 'brigsby'),
						'dark-on-light' => __('Dark Font / Light Background', 'brigsby'),
						'light-on-dark' => __('Light Font / Dark Background', 'brigsby'),
					),
				),
				'url' => array(
					'label'       => __( 'Slide Link', 'brigsby' ),
					'type'        => 'url',
					'description' => __( 'Leave empty if you do not want to link the slide.', 'brigsby' ),
					'input_attrs' => array(
						'placeholder' => 'http://',
					),
				),
				'button' => array(
					'label'       => __( 'Button Text (Optional)', 'brigsby' ),
					'type'        => 'text',
					'description' => __( 'Leave empty if you do not want to show the button and instead link the slide image (if you have a url set in the above field)', 'brigsby' ),
				),
			),
		);

	} // end for

	/** Section **/

	$section = 'archives';

	$sections[ $section ] = array(
		'title'       => __( 'Archives (Blog, Cats, Tags)', 'brigsby' ),
	);

	$settings['archive_post_content'] = array(
		'label'       => __( 'Post Items Content', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'excerpt' => __('Post Excerpt', 'brigsby'),
			'full-content' => __('Full Post Content', 'brigsby'),
		),
		'default'     => 'excerpt',
		'description' => __( 'Content to display for each post in the list', 'brigsby' ),
	);

	$settings['archive_post_meta'] = array(
		'label'       => __( 'Meta Information for Post List Items', 'brigsby' ),
		'sublabel'    => __( 'Check which meta information to display for each post item in the archive list.', 'brigsby' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'choices'     => array(
			'author'   => __('Author', 'brigsby'),
			'date'     => __('Date', 'brigsby'),
			'cats'     => __('Categories', 'brigsby'),
			'tags'     => __('Tags', 'brigsby'),
			'comments' => __('No. of comments', 'brigsby')
		),
		'default'     => 'author, date, cats, comments',
	);

	$settings['excerpt_length'] = array(
		'label'       => __( 'Excerpt Length', 'brigsby' ),
		'section'     => $section,
		'type'        => 'text',
		'description' => __( 'Number of words in excerpt. Default is 105. Leave empty if you dont want to change it.', 'brigsby' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 3,
			'placeholder' => __( 'default: 105', 'brigsby' ),
		),
	);

	$settings['read_more'] = array(
		'label'       => __( "'Read More' Text", 'brigsby' ),
		'section'     => $section,
		'type'        => 'text',
		'description' => __( "Replace the default 'Read More' text. Leave empty if you dont want to change it.", 'brigsby' ),
		'input_attrs' => array(
			'placeholder' => __( 'default: READ MORE &rarr;', 'brigsby' ),
		),
	);

	/** Section **/

	$section = 'singular';

	$sections[ $section ] = array(
		'title'       => __( 'Single (Posts, Pages)', 'brigsby' ),
	);

	$settings['page_header_full'] = array(
		'label'       => __( 'Stretch Page Header to Full Width', 'brigsby' ),
		'sublabel'    => '<img src="' . $imagepath . 'page-header.png">',
		'section'     => $section,
		'type'        => 'checkbox',
		'choices'     => array(
			'default'    => __('Default (Archives, Blog, Woocommerce etc.)', 'brigsby'),
			'posts'      => __('For All Posts', 'brigsby'),
			'pages'      => __('For All Pages', 'brigsby'),
			'no-sidebar' => __('Always override for full width pages (any page which has no sidebar)', 'brigsby'),
		),
		'default'     => 'default, pages, no-sidebar',
		'description' => __('This is the Page Header area containing Page/Post Title and Meta details like author, categories etc.', 'brigsby'),
	);

	$settings['post_featured_image'] = array(
		'label'       => __( 'Display Featured Image', 'brigsby' ),
		'sublabel'    => __( 'Display featured image at the beginning of post/page content.', 'brigsby' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'default'     => 1,
	);

	$settings['post_meta'] = array(
		'label'       => __( 'Meta Information on Posts', 'brigsby' ),
		'sublabel'    => __( "Check which meta information to display on an individual 'Post' page", 'brigsby' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'choices'     => array(
			'author'   => __('Author', 'brigsby'),
			'date'     => __('Date', 'brigsby'),
			'cats'     => __('Categories', 'brigsby'),
			'tags'     => __('Tags', 'brigsby'),
			'comments' => __('No. of comments', 'brigsby')
		),
		'default'     => 'author, date, cats, tags, comments',
	);

	$settings['page_meta'] = array(
		'label'       => __( 'Meta Information on Page', 'brigsby' ),
		'sublabel'    => __( "Check which meta information to display on an individual 'Page' page", 'brigsby' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'choices'     => array(
			'author'   => __('Author', 'brigsby'),
			'date'     => __('Date', 'brigsby'),
			'comments' => __('No. of comments', 'brigsby')
		),
		'default'     => 'author, date, comments',
	);

	$settings['post_meta_location'] = array(
		'label'       => __( 'Meta Information location', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radio',
		'choices'     => array(
			'top'    => __('Top (below title)', 'brigsby'),
			'bottom' => __('Bottom (after content)', 'brigsby'),
		),
		'default'     => 'top',
	);

	$settings['post_prev_next_links'] = array(
		'label'       => __( 'Previous/Next Posts', 'brigsby' ),
		'sublabel'    => __( 'Display links to Prev/Next Post links at the end of post content.', 'brigsby' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'default'     => 1,
	);

	$settings['contact-form'] = array(
		'label'       => __( 'Contact Form', 'brigsby' ),
		'section'     => $section,
		'type'        => 'content',
		'content'     => sprintf( __('This theme comes bundled with CSS required to style %sContact-Form-7%s forms. Simply install and activate the plugin to add Contact Forms to your pages.', 'brigsby'), '<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">', '</a>'), // JNES@todo update link to docs
	);

	if ( current_theme_supports( 'woocommerce' ) ) :

		/** Section **/

		$section = 'woocommerce';

		$sections[ $section ] = array(
			'title'       => __( 'WooCommerce', 'brigsby' ),
			'priority'    => '58', // Non static options must have a priority
		);

		$wooproducts = range( 0, 99 );
		for ( $wpr=0; $wpr < 4; $wpr++ )
			unset( $wooproducts[$wpr] );
		$settings['wooshop_products'] = array(
			'label'       => __( 'Total Products per page', 'brigsby' ),
			'section'     => $section,
			'type'        => 'select',
			'priority'    => '815', // Non static options must have a priority
			'choices'     => $wooproducts,
			'default'     => '12',
			'description' => __( 'Total number of products to show on the Shop page', 'brigsby' ),
		);

		$settings['wooshop_product_columns'] = array(
			'label'       => __( 'Product Columns', 'brigsby' ),
			'section'     => $section,
			'type'        => 'select',
			'priority'    => '815', // Non static options must have a priority
			'choices'     => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			),
			'default'     => '3',
			'description' => __( 'Number of products to show in 1 row on the Shop page', 'brigsby' ),
		);

		$settings['sidebar_wooshop'] = array(
			'label'       => __( 'Sidebar Layout (Woocommerce Shop/Archives)', 'brigsby' ),
			'section'     => $section,
			'type'        => 'radioimage',
			'priority'    => '815', // Non static options must have a priority
			'choices'     => array(
				'wide-right'         => $imagepath . 'sidebar-wide-right.png',
				'narrow-right'       => $imagepath . 'sidebar-narrow-right.png',
				'wide-left'          => $imagepath . 'sidebar-wide-left.png',
				'narrow-left'        => $imagepath . 'sidebar-narrow-left.png',
				'narrow-left-right'  => $imagepath . 'sidebar-narrow-left-right.png',
				'narrow-left-left'   => $imagepath . 'sidebar-narrow-left-left.png',
				'narrow-right-right' => $imagepath . 'sidebar-narrow-right-right.png',
				'full-width'         => $imagepath . 'sidebar-full.png',
				'none'               => $imagepath . 'sidebar-none.png',
			),
			'default'     => 'wide-right',
			'description' => __("Set the default sidebar width and position for WooCommerce Shop and Archives pages like product categories etc.", 'brigsby'),
		);

		$settings['sidebar_wooproduct'] = array(
			'label'       => __( 'Sidebar Layout (Woocommerce Single Product Page)', 'brigsby' ),
			'section'     => $section,
			'type'        => 'radioimage',
			'priority'    => '815', // Non static options must have a priority
			'choices'     => array(
				'wide-right'         => $imagepath . 'sidebar-wide-right.png',
				'narrow-right'       => $imagepath . 'sidebar-narrow-right.png',
				'wide-left'          => $imagepath . 'sidebar-wide-left.png',
				'narrow-left'        => $imagepath . 'sidebar-narrow-left.png',
				'narrow-left-right'  => $imagepath . 'sidebar-narrow-left-right.png',
				'narrow-left-left'   => $imagepath . 'sidebar-narrow-left-left.png',
				'narrow-right-right' => $imagepath . 'sidebar-narrow-right-right.png',
				'full-width'         => $imagepath . 'sidebar-full.png',
				'none'               => $imagepath . 'sidebar-none.png',
			),
			'default'     => 'wide-right',
			'description' => __("Set the default sidebar width and position for WooCommerce product page", 'brigsby'),
		);

	endif;

	/** Section **/

	$section = 'footer';

	$sections[ $section ] = array(
		'title'       => __( 'Footer', 'brigsby' ),
	);

	$settings['footer'] = array(
		'label'       => __( 'Footer Layout', 'brigsby' ),
		'section'     => $section,
		'type'        => 'radioimage',
		'choices'     => array(
			'1-1' => $imagepath . '1-1.png',
			'2-1' => $imagepath . '2-1.png',
			'2-2' => $imagepath . '2-2.png',
			'2-3' => $imagepath . '2-3.png',
			'3-1' => $imagepath . '3-1.png',
			'3-2' => $imagepath . '3-2.png',
			'3-3' => $imagepath . '3-3.png',
			'3-4' => $imagepath . '3-4.png',
			'4-1' => $imagepath . '4-1.png',
		),
		'default'     => '3-1',
		'description' => sprintf( __('You must first save the changes you make here and refresh this screen for footer columns to appear in the Widgets panel (in customizer).<hr> Once you save the settings here, you can add content to footer columns using the %sWidgets Management screen%s.', 'brigsby'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
	);

	$settings['site_info'] = array(
		'label'       => __( 'Site Info Text (footer)', 'brigsby' ),
		'section'     => $section,
		'type'        => 'textarea',
		'default'     => __( '<!--default-->', 'brigsby'),
		'description' => sprintf( __('Text shown in footer. Useful for showing copyright info etc.<hr>Use the <code>&lt;!--default--&gt;</code> tag to show the default Info Text.<hr>Use the <code>&lt;!--year--&gt;</code> tag to insert the current year.<hr>Always use %sHTML codes%s for symbols. For example, the HTML for &copy; is <code>&amp;copy;</code>', 'brigsby'), '<a href="http://ascii.cl/htmlcodes.htm" target="_blank">', '</a>' ),
	);


	/*** Return Options Array ***/
	return apply_filters( 'hoot_theme_customizer_options', array(
		'settings' => $settings,
		'sections' => $sections,
		'panels'   => $panels,
	) );

}
endif;

/**
 * Add Options (settings, sections and panels) to HybridExtend_Customize class options object
 *
 * @since 1.0
 * @access public
 * @return void
 */
if ( !function_exists( 'hoot_theme_add_customizer_options' ) ) :
function hoot_theme_add_customizer_options() {

	$hybridextend_customize = HybridExtend_Customize::get_instance();

	// Add Options
	$options = hoot_theme_customizer_options();
	$hybridextend_customize->add_options( array(
		'settings' => $options['settings'],
		'sections' => $options['sections'],
		'panels' => $options['panels'],
		) );

}
endif;
add_action( 'init', 'hoot_theme_add_customizer_options', 0 ); // cannot hook into 'after_setup_theme' as this hook is already being executed (this file is loaded at after_setup_theme @priority 10) (hooking into same hook from within while hook is being executed leads to undesirable effects as $GLOBALS[$wp_filter]['after_setup_theme'] has already been ksorted)
// Hence, we hook into 'init' @priority 0, so that settings array gets populated before 'widgets_init' action ( which itself is hooked to 'init' at priority 1 ) for creating widget areas ( settings array is needed for creating defaults when user value has not been stored )

/**
 * Enqueue custom scripts to customizer screen
 *
 * @since 1.0
 * @return void
 */
function hoot_theme_customizer_enqueue_scripts() {
	// Enqueue Styles
	wp_enqueue_style( 'hoot-theme-customize-styles', HYBRIDEXTEND_INCURI . 'admin/css/customize.css', array(),  HYBRIDEXTEND_VERSION );
	// Enqueue Scripts
	wp_enqueue_script( 'hoot-theme-customize-script', HYBRIDEXTEND_INCURI . 'admin/js/customize.js', array( 'jquery', 'wp-color-picker', 'customize-controls', 'hybridextend-customize-script' ), HYBRIDEXTEND_VERSION, true );
}
// Load scripts at priority 11 so that Hoot Customizer Custom Controls have loaded their scripts
add_action( 'customize_controls_enqueue_scripts', 'hoot_theme_customizer_enqueue_scripts', 12 );

/**
 * Modify default WordPress Settings Sections and Panels
 *
 * @since 1.0
 * @param object $wp_customize
 * @return void
 */
function hoot_customizer_modify_default_options( $wp_customize ) {

	if ( function_exists( 'the_custom_logo' ) ) {
		$wp_customize->get_control( 'custom_logo' )->section = 'logo';
		$wp_customize->get_control( 'custom_logo' )->priority = 145; // Replaces theme's logo_image // Update in premium if needed
		$wp_customize->get_control( 'custom_logo' )->width = 250;
		$wp_customize->get_control( 'custom_logo' )->height = 90;
		// $wp_customize->get_control( 'custom_logo' )->type = 'image'; // Stored value becomes url instead of image ID (fns like the_custom_logo() dont work)
		// Defaults: [type] => cropped_image, [width] => 150, [height] => 150, [flex_width] => 1, [flex_height] => 1, [button_labels] => array(...), [label] => Logo
		$wp_customize->get_control( 'custom_logo' )->active_callback = 'hoot_callback_logo_image';
	}

	$wp_customize->get_control( 'site_icon' )->priority = 10;

	$wp_customize->get_section( 'static_front_page' )->priority = 3;

	// $wp_customize->get_section( 'title_tagline' )->panel = 'general';
	// $wp_customize->get_section( 'title_tagline' )->priority = 1;
	// $wp_customize->get_section( 'colors' )->panel = 'styling';

	// global $wp_version;
	// if ( version_compare( $wp_version, '4.3', '>=' ) ) // 'Creating Default Object from Empty Value' error before 4.3 since 'nav_menus' panel did not exist ( we did have 'nav' section till 4.1.9 i.e. before 4.2 )
	// 	$wp_customize->get_panel( 'nav_menus' )->priority = 999;
	// This will set the priority, however will give a 'Creating Default Object from Empty Value' error first.
	// $wp_customize->get_panel( 'widgets' )->priority = 999;

}
add_action( 'customize_register', 'hoot_customizer_modify_default_options', 100 );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function hoot_customizer_customize_register( $wp_customize ) {
	// $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'hoot_customizer_customize_register' );

/**
 * Callback Functions for customizer settings
 */

function hoot_callback_logo_size( $control ) {
	$selector = $control->manager->get_setting('logo')->value();
	return ( $selector == 'text' || $selector == 'mixed' ) ? true : false;
}
function hoot_callback_site_title_icon( $control ) {
	$selector = $control->manager->get_setting('logo')->value();
	return ( $selector == 'text' || $selector == 'custom' ) ? true : false;
}
function hoot_callback_logo_image( $control ) {
	$selector = $control->manager->get_setting('logo')->value();
	return ( $selector == 'image' || $selector == 'mixed' || $selector == 'mixedcustom' ) ? true : false;
}
function hoot_callback_logo_image_width( $control ) {
	$selector = $control->manager->get_setting('logo')->value();
	return ( $selector == 'mixed' || $selector == 'mixedcustom' ) ? true : false;
}
function hoot_callback_logo_custom( $control ) {
	$selector = $control->manager->get_setting('logo')->value();
	return ( $selector == 'custom' || $selector == 'mixedcustom' ) ? true : false;
}
function hoot_callback_show_tagline( $control ) {
	$selector = $control->manager->get_setting('logo')->value();
	return ( $selector == 'text' || $selector == 'custom' || $selector == 'mixed' || $selector == 'mixedcustom' ) ? true : false;
}
function hoot_callback_show_primary_menuarea_custom( $control ) {
	$selector = $control->manager->get_setting('primary_menuarea')->value();
	return ( $selector == 'custom' ) ? true : false;
}

function hoot_callback_box_background_color( $control ) {
	$selector = $control->manager->get_setting('site_layout')->value();
	return ( $selector == 'boxed' ) ? true : false;
}

/**
 * Specific Sanitization Functions for customizer settings
 * This is disabled by default. Users need to add filter to enable this.
 * See specific settings above for more details.
 */
function hoot_custom_sanitize_textarea_allowscript( $value ) {
	global $allowedposttags;
	// Allow javascript to let users ad code for ads etc.
	$allow = array_merge( $allowedposttags, array(
		'script' => array( 'type' => true, ),
	) );
	return wp_kses( $value , $allow );
}

/**
 * Helper function to return the theme mod value.
 * If no value has been saved, it returns $default provided by the theme.
 * If no $default provided, it checks the default value specified in the customizer settings..
 * 
 * @since 1.0
 * @access public
 * @param string $name
 * @param mixed $default
 * @return mixed
 */
function hoot_get_mod( $name, $default = NULL ) {

	if ( is_customize_preview() ) {

		// We cannot use "if ( !empty( $mod ) )" as this will become false for empty values, and hence fallback to default. isset() is not an option either as $mod is always set. Hence we calculate the default here, and supply it as second argument to get_theme_mod()
		$default = ( $default !== NULL ) ? $default : hybridextend_customize_get_default( $name );
		$mod = get_theme_mod( $name, $default );

		return apply_filters( 'hoot_get_mod_customize', $mod, $name, $default );

	} else {

		/*** Return value if set ***/

		// Cache
		static $mods = NULL;

		// Get the values from database
		if ( !$mods ) {
			$mods = get_theme_mods();
			$mods = apply_filters( 'hoot_get_mod', $mods );
		}

		if ( isset( $mods[$name] ) ) {
			// Filter applied as in get_theme_mod() core function
			$mods[$name] = apply_filters( "theme_mod_{$name}", $mods[$name] );
			// Add exceptions: If a value has been set but is empty, this gives the option to return default values in such cases. Simply return $override as (bool)true.
			$override = apply_filters( 'hoot_get_mod_override_empty_values', false, $name, $mods[$name] );
			if ( $override !== true )
				return $mods[$name];
		}

		/*** Return default if provided ***/
		if ( $default !== NULL )
			return apply_filters( "theme_mod_{$name}", $default );

		/*** Return default theme option value specified in customizer settings ***/
		$default = hybridextend_customize_get_default( $name );
		if ( !empty( $default ) )
			return apply_filters( "theme_mod_{$name}", $default );

	}

	/*** We dont have anything! ***/
	return false;
}