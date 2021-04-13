<?php
/**
 * The template for displaying content in the index.php template
 */

	if ( is_home() ) {
		$post_class = 'mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-12-phone';
	} else {
		$post_class = 'mdc-layout-grid__cell--span-12';
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mdc-card mdc-shadow--3dp mdc-layout-grid__cell mdc-layout-grid__cell--align-top ' . esc_attr( $post_class ) ); ?>>
	<section class="mdc-card__primary">
		<header class="mdc-card__title">
			<h2 class="mdc-card__title-text">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</header><!-- /.entry-header -->

		<?php
			if ( 'post' === get_post_type() ) :
		?>
			<p class="entry-meta">
				<?php
					themes_starter_article_posted_on();
					
					$num_comments = get_comments_number();
					if ( comments_open() && $num_comments >= 1 ) :
						echo ' <a href="' . get_comments_link() . '" class="pull-right mdc-badge" title="' . esc_attr( sprintf( _n( '%s Comment', '%s Comments', $num_comments, 'my-theme' ), $num_comments ) ) . '" data-badge="' . $num_comments . '">' . $num_comments . ' <i class="material-icons">chat_bubble_outline</i></a>';
					endif;
				?>
			</p>
		<?php
			endif;

			if ( has_post_thumbnail() ) :
				echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
			endif;

			if ( is_search() ) :
				the_excerpt();
			else :
				the_content();
			endif;

			wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'my-theme' ) . '</span>', 'after' => '</div>' ) );
		?>
	</section>

	<footer class="mdc-card__actions mdc-card--border">
		<a href="<?php echo get_the_permalink(); ?>" class="mdc-button mdc-button--stroked"><?php esc_html_e( 'more', 'my-theme' ); ?></a>
	</footer>
</article><!-- /#post-<?php the_ID(); ?> -->
