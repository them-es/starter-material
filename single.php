<?php
/**
 * The Template for displaying all single posts.
 */

get_header();
?>
<div class="s12 l8">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			endwhile;
		endif;

		wp_reset_postdata(); // End of the loop.

		$count_posts = wp_count_posts();

	if ( (int) $count_posts->publish > 1 ) :
		$next_post = get_next_post();
		$prev_post = get_previous_post();
		?>
		<br>
		<div class="post-navigation s12">
		<?php
		if ( $prev_post ) {
			$prev_title = get_the_title( $prev_post->ID );
			?>
				<a class="previous-post button border" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php echo esc_attr( $prev_title ); ?>">
					<i class="material-icons">arrow_back</i>
					<span class="title"><?php echo wp_kses_post( $prev_title ); ?></span>
				</a>
			<?php
		}
		?>
				<div class="s12"></div>
			<?php
			if ( $next_post ) {
				$next_title = get_the_title( $next_post->ID );
				?>
				<a class="next-post button border" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr( $next_title ); ?>">
					<span class="title"><?php echo wp_kses_post( $next_title ); ?></span>
					<i class="material-icons">arrow_forward</i>
				</a>
				<?php
			}
			?>
		</div><!-- /.post-navigation -->
		<?php
		endif;
	?>
</div><!-- /.s8 -->
<?php
get_sidebar();

get_footer();
