<?php
/**
 * The template for displaying content in the index.php template
 */

	if ( is_home() ) {
		$post_class = 'mdl-cell--6-col mdl-cell--12-col-phone';
	} else {
		$post_class = 'mdl-cell--12-col';
	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mdl-card mdl-shadow--3dp mdl-cell ' . $post_class ); ?>>
	
	<header class="mdl-card__title">
		<h2 class="mdl-card__title-text"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- /.entry-header -->

	<div class="mdl-card__supporting-text">
		<?php if ( 'post' === get_post_type() ) : ?>
			<p class="entry-meta">
				<?php
					themes_starter_article_posted_on();
					
					$num_comments = get_comments_number();
					
					if ( comments_open() ) :
							if ( 0 === $num_comments ) {
								//$comments = __( 'No Comments', 'my-theme' );
							} elseif ( $num_comments > 1 ) {
								$comments = $num_comments . ' ' . __( 'Comments', 'my-theme' );
							} else {
								$comments = '1 ' . __( 'Comment', 'my-theme' );
							}
							
							if ( isset( $comments ) ) {
								echo ' <a href="' . get_comments_link() . '" class="pull-right material-icons mdl-badge" title="' . $comments . '" data-badge="' . $num_comments . '">chat_bubble_outline</a>';
							}
						endif;
				?>
			</p>
		<?php endif; ?>
		<?php
			if ( has_post_thumbnail() ) :
				echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
			endif;
		?>
		<?php
			if ( is_search() ) :
				the_excerpt();
			else :
				the_content();
			endif;
		?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'my-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- /.entry-content -->

	<footer class="mdl-card__actions mdl-card--border">
		<a href="<?php echo get_the_permalink(); ?>" class="mdl-button mdl-js-button"><?php _e( 'more', 'my-theme' ); ?></a>
	</footer><!-- .entry-meta -->
</article><!-- /#post-<?php the_ID(); ?> -->