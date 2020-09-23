<?php
/**
 * The Template for displaying Author pages.
 */

get_header();

if ( have_posts() ) :
	/**
	 * Queue the first post, that way we know
	 * what author we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	the_post();
?>
	<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
		<header class="page-header">
			<h1 class="page-title author">
				<?php
					printf( __( 'Author Archives: %s', 'my-theme' ), '<span class="vcard">' . get_the_author() . '</span>' );
				?>
			</h1>
		</header>
	</div><!-- /.mdc-cell -->
<?php
	get_template_part( 'author', 'bio' );

	/**
	 * Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	get_template_part( 'archive', 'loop' );
else :
	// 404
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // end of the loop.

get_footer();
