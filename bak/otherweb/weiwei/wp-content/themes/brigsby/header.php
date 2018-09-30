<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?> class="no-js">

<head>
<?php
// Fire the wp_head action required for hooking in scripts, styles, and other <head> tags.
wp_head();
?>
</head>

<body <?php hybridextend_attr( 'body' ); ?>>

	<div <?php hybridextend_attr( 'page-wrapper' ); ?>>

		<div class="skip-link">
			<a href="#content" class="screen-reader-text"><?php _e( 'Skip to content', 'brigsby' ); ?></a>
		</div><!-- .skip-link -->

		<?php
		// Template modification Hook
		do_action( 'hoot_template_site_start' );

		// Displays a friendly note to visitors using outdated browser (Internet Explorer 8 or less)
		hoot_update_browser();

		// Display Topbar
		get_template_part( 'template-parts/topbar' );
		?>

		<header <?php hybridextend_attr( 'header' ); ?>>

			<?php
			// Display Secondary Menu
			hoot_secondary_menu( 'top' );
			?>

			<div <?php hybridextend_attr( 'header-part', 'primary' ); ?>>
				<div class="grid">
					<div class="table grid-span-12">
						<?php
						// Display Branding
						hoot_header_branding();

						// Display Menu
						hoot_header_aside();
						?>
					</div>
				</div>
			</div>

			<?php
			// Display Secondary Menu
			hoot_secondary_menu( 'bottom' );
			?>

		</header><!-- #header -->

		<?php hybridextend_get_sidebar( 'below-header' ); // Loads the template-parts/sidebar-below-header.php template. ?>

		<div id="main" class="main">
			<?php
			// Template modification Hook
			do_action( 'hoot_template_main_wrapper_start' );