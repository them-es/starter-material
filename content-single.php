<?php
/**
 * The template for displaying content in the single.php template.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'round' ); ?>>
	<header>
		<?php
		if ( has_post_thumbnail() ) {
			echo '<p class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large responsive round' ) . '</p>';
		}
		?>

		<h1><?php the_title(); ?></h1>

		<?php
		if ( 'post' === get_post_type() ) {
			?>
			<p class="entry-meta">
				<?php themes_starter_article_posted_on(); ?>
			</p><!-- /.entry-meta -->
			<?php
		}
		?>
	</header>

	<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-link"><span>' . __( 'Pages:', 'my-theme' ) . '</span>',
				'after'  => '</div>',
			)
		);

		edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>' );
		?>

	<footer class="surface-container-low elevate large-padding round">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'my-theme' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'my-theme' ) );
		if ( '' !== $tag_list ) {
			$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'my-theme' );
		} elseif ( '' !== $category_list ) {
			$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'my-theme' );
		} else {
			$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'my-theme' );
		}

			echo '<p><small>' . sprintf(
				$utility_text,
				$category_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( array( 'echo' => false ) ),
				get_the_author(),
				esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) )
			) . '</small></p><br>';

			get_template_part( 'author', 'bio' );
			?>
	</footer>
</div><!-- /#post-<?php the_ID(); ?> -->
