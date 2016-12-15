<?php
/**
 * The Template for displaying all single posts.
 */

	get_header();
?>

	<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--12-col-phone">
			
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
			<nav class="blog-nav mdl-cell mdl-cell--12-col">
				<?php previous_post_link( '%link', '<button class="mdl-button mdl-js-button mdl-button--icon mdl-color--pink-500 mdl-color-text--white"><i class="material-icons">arrow_back</i></button> ' . __( 'Previous Post', 'my-theme' ) ); ?>
				<div class="mdl-layout-spacer"></div>
				<?php next_post_link( '%link', __( 'Next Post', 'my-theme' ) . ' <button class="mdl-button mdl-js-button mdl-button--icon mdl-color--pink-500 mdl-color-text--white"><i class="material-icons">arrow_forward</i></button>' ); ?>
			</nav><!-- /.blog-nav -->
		<?php endif; ?>

	</div><!-- /.mdl-cell -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
