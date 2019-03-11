<?php
/**
 * The Template for displaying all single posts.
 */

	get_header();
?>

	<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-12-phone">
		
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
				the_post();
			?>

			<?php
				get_template_part( 'content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php
				endwhile;
			endif;
			wp_reset_postdata(); // end of the loop.
		?>

		<?php
			$count_posts = wp_count_posts();

			if ( $count_posts->publish > '1' ) :
		?>
			<nav class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 post-navigation">
				<?php previous_post_link( '%link', '<i class="material-icons mdc-button__icon">arrow_back</i> ' . __( 'Previous Post', 'my-theme' ) ); ?>
				<div class="mdc-layout-spacer"></div>
				<?php next_post_link( '%link', __( 'Next Post', 'my-theme' ) . ' <i class="material-icons mdc-button__icon">arrow_forward</i>' ); ?>
			</nav><!-- /.blog-nav -->
		<?php
			endif;
		?>

	</div><!-- /.mdc-cell -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
