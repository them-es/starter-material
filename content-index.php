<?php
/**
 * The template for displaying content in the index.php template.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card round no-padding ' . esc_attr( 's12 l6' ) ); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		echo '<a href="' . get_the_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( array( 'echo' => false ) ) ) . '" rel="bookmark">' . get_the_post_thumbnail( get_the_ID(), 'responsive' ) . '</a>';
	}
	?>

	<div class="large-padding">
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( array( 'echo' => false ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>

		<?php
		if ( 'post' === get_post_type() ) :
			?>
				<p class="entry-meta">
			<?php
				themes_starter_article_posted_on();

				$num_comments = get_comments_number();
			if ( comments_open() && $num_comments >= 1 ) :
				echo ' <a href="' . esc_url( get_comments_link() ) . '" class="chip fill round" title="' . esc_attr( sprintf( _n( '%s Comment', '%s Comments', $num_comments, 'my-theme' ), $num_comments ) ) . '" data-badge="' . esc_attr( $num_comments ) . '">' . esc_html( $num_comments ) . ' <i class="material-icons">chat_bubble_outline</i></a>';
				endif;
			?>
				</p>
			<?php
				endif;

		if ( is_search() ) {
			the_excerpt();
		} else {
			the_content();
		}

			wp_link_pages(
				array(
					'before' => '<div class="page-link"><span>' . __( 'Pages:', 'my-theme' ) . '</span>',
					'after'  => '</div>',
				)
			);
			?>
		<nav>
			<a href="<?php the_permalink(); ?>" class="button"><?php esc_html_e( 'more', 'my-theme' ); ?></a>
		</nav>
	</div>
</article><!-- /#post-<?php the_ID(); ?> -->
