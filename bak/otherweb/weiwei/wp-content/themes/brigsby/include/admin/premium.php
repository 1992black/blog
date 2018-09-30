<?php
/**
 * Premium Theme Options displayed in admin
 *
 * @package    Hoot
 * @subpackage Brigsby
 * @return array Return Hoot Options array to be merged to the original Options array
 */

$hybridextend_options_premium = array();
$imagepath =  HYBRIDEXTEND_INCURI . 'admin/images/';
$hoot_cta_top = '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/brigsby/" target="_blank">' . __( 'Click here to know more', 'brigsby' ) . '</a>';
$hoot_cta_top = $hoot_cta = '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/brigsby/" target="_blank">' . __( 'Buy Brigsby Premium', 'brigsby' ) . '</a>';
$hoot_cta_demo = '<a class="button button-secondary button-view-demo" href="http://demo.wphoot.com/brigsby/" target="_blank">' . __( 'View Demo Site', 'brigsby' ) . '</a>';

$hoot_intro = array(
	'name' => __('Upgrade to Brigsby Premium', 'brigsby'),
	'desc' => __("If you've enjoyed using Brigsby, you're going to love Brigsby Premium.<br>It's a robust upgrade to Brigsby that gives you many useful features.", 'brigsby'),
	);

$hybridextend_options_premium[] = array(
	'name' => __('Complete Style Customization', 'brigsby'),
	'desc' => __('Brigsby Premium lets you select unlimited colors for different sections of your site.<hr>Select pre-existing backgrounds for site sections like header, footer etc or upload your own background images/patterns.', 'brigsby'),
	'img' => $imagepath . 'premium-style.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Fonts and Typography Control', 'brigsby'),
	'desc' => __('Assign different typography (fonts, text size, font color) to menu, topbar, logo, content headings, sidebar, footer etc.', 'brigsby'),
	'img' => $imagepath . 'premium-typography.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Unlimites Sliders, Unlimites Slides', 'brigsby'),
	'desc' => __('Brigsby Premium allows you to create unlimited sliders with as many slides as you need.<hr>You can use these sliders on your Frontpage, or add them anywhere using shortcodes - like in your Posts, Sidebars or Footer.', 'brigsby'),
	'img' => $imagepath . 'premium-sliders.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('600+ Google Fonts', 'brigsby'),
	'desc' => __("With the integrated Google Fonts library, you can find the fonts that match your site's personality, and there's over 600 options to choose from.", 'brigsby'),
	'img' => $imagepath . 'premium-googlefonts.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Shortcodes with Easy Generator', 'brigsby'),
	'desc' => __('Enjoy the flexibility of using shortcodes throughout your site with Brigsby premium. These shortcodes were specially designed for this theme and are very well integrated into the code to reduce loading times, thereby maximizing performance!<hr>Use shortcodes to insert buttons, sliders, tabs, toggles, columns, breaks, icons, lists, and a lot more design and layout modules.<hr>The intuitive Shortcode Generator has been built right into the Edit screen, so you dont have to hunt for shortcode syntax.', 'brigsby'),
	'img' => $imagepath . 'premium-shortcodes.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Image Carousels', 'brigsby'),
	'desc' => __('Add carousels to your post, in your sidebar, on your frontpage or in your footer. A simple drag and drop interface allows you to easily create and manage carousels.', 'brigsby'),
	'img' => $imagepath . 'premium-carousels.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __("Floating 'Sticky' Header &amp; 'Goto Top' button (optional)", 'brigsby'),
	'desc' => __("The floating header follows the user down your page as they scroll, which means they never have to scroll back up to access your navigation menu, improving user experience.<hr>Or, use the 'Goto Top' button appears on the screen when users scroll down your page, giving them a quick way to go back to the top of the page.", 'brigsby'),
	'img' => $imagepath . 'premium-header-top.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('One Page Scrolling Website / Landing Page', 'brigsby'),
	'desc' => __("Make One Page websites with menu items linking to different sections on the page. Watch the scroll animation kick in when a user clicks a menu item to jump to a page section.<hr>Create different landing pages on your site. Change the menu for each page so that the menu items point to sections of the page being displayed.", 'brigsby'),
	'img' => $imagepath . 'premium-scroller.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('3 Blog Layouts (including pinterest type mosaic)', 'brigsby'),
	'desc' => __('Brigsby Premium gives you the option to display your post archives in 3 different layouts including a mosaic type layout similar to pinterest.', 'brigsby'),
	'img' => $imagepath . 'premium-blogstyles.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Custom Widgets', 'brigsby'),
	'desc' => __('Custom widgets crafted and designed specifically for Brigsby Premium Theme to give you the flexibility of adding stylized content.', 'brigsby'),
	'img' => $imagepath . 'premium-widgets.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Menu Icons', 'brigsby'),
	'desc' => __('Select from over 500 icons for your main navigation menu links.', 'brigsby'),
	'img' => $imagepath . 'premium-menuicons.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Premium Background Patterns (CC0)', 'brigsby'),
	'desc' => __('Brigsby Premium comes with many additional premium background patterns. You can always upload your own background image/pattern to match your site design.', 'brigsby'),
	'img' => $imagepath . 'premium-backgrounds.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Automatic Image Lightbox and WordPress Gallery', 'brigsby'),
	'desc' => __('Automatically open image links on your site with the integrates lightbox in Brigsby Premium.<hr>Automatically convert standard WordPress galleries to beautiful lightbox gallery slider.', 'brigsby'),
	'img' => $imagepath . 'premium-lightbox.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Developers love {LESS}', 'brigsby'),
	'desc' => __('CSS is passe. Developers love the modularity and ease of using LESS, which is why Brigsby Premium comes with properly organized LESS files for the main stylesheet. You can even turn on less.js during development to increase productivity.', 'brigsby'),
	'img' => $imagepath . 'premium-lesscss.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Easy Import/Export', 'brigsby'),
	'desc' => __('Moving to a new host? Or applying a new child theme? Easily import/export your customizer settings with just a few clicks - right from the backend.', 'brigsby'),
	'img' => $imagepath . 'premium-import-export.jpg',
	);

$hybridextend_options_premium[] = array(
	'name' => __('Custom Javascript &amp; Google Analytics', 'brigsby'),
	'std' => __("Easily insert any javascript snippet to your header without modifying the code files. This helps in adding scripts for Google Analytics, Adsense or any other custom code.", 'brigsby'),
	);

$hybridextend_options_premium[] = array(
	'name' => __('Custom CSS', 'brigsby'),
	'std' => __("Add custom CSS to your theme right from the backend. If you are not a developer yourself, you can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across theme updates.", 'brigsby'),
	);

$hybridextend_options_premium[] = array(
	'name' => __('Continued Updates', 'brigsby'),
	'std' => __("You'll help support the continued development of Brigsby - ensuring it works with future versions of WordPress for years to come.", 'brigsby'),
	);

$hybridextend_options_premium[] = array(
	'name' => __('Premium Priority Support', 'brigsby'),
	'desc' => __('Need help setting up Brigsby? Upgrading to Brigsby Premium gives you prioritized support. We have a growing support team ready to help you with your questions.', 'brigsby'),
	'img' => $imagepath . 'premium-support.jpg',
	);