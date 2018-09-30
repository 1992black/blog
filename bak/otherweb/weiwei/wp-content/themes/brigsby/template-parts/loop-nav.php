<?php
/**
 * If viewing a single post page.
 */
if ( is_singular( 'post' ) ) :
?>

	<div class="loop-nav">
		<?php previous_post_link( '<div class="prev">' . __( 'Previous Post: %link', 'brigsby' ) . '</div>', '%title' ); ?>
		<?php next_post_link(     '<div class="next">' . __( 'Next Post: %link',     'brigsby' ) . '</div>', '%title' ); ?>
	</div><!-- .loop-nav -->

<?php
/**
 * If viewing the blog, an archive, or search results.
 */
elseif ( is_home() || is_archive() || is_search() ) :

	?><div class="clearfix"></div><?php

	if ( function_exists('wp_pagenavi' ) ) {

		// Load WP-PageNavi plugin if installed and active
		wp_pagenavi();

	} elseif ( function_exists( 'hybridextend_loop_pagination' ) ) {

		// Load HybridExtend Paginaion plugin if installed and active
		hybridextend_loop_pagination(
			array( 
				'prev_text' => _x( '&larr; Previous', 'posts navigation', 'brigsby' ), 
				'next_text' => _x( 'Next &rarr;',     'posts navigation', 'brigsby' )
			) 
		);

	} else {

		posts_nav_link();

	}

endif;