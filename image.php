<?php
/**
 * The template for displaying image attachments
 *
 */

get_header();
?>
<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="mdc-layout-grid">
				<div class="mdc-layout-grid__inner">
					<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6"><?php previous_image_link( 'large', '<span aria-hidden="true">&larr;</span> ' . esc_html__( 'Previous Image', 'my-theme' ) ); ?></div>
					<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 text-right"><?php next_image_link( 'large', esc_html__( 'Next Image', 'my-theme' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?></div>
				</div><!-- /.mdc-layout-grid__inner -->
			</div><!-- /.mdc-layout-grid -->

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- /.entry-header -->

			<div class="entry-content">
				<div class="entry-attachment">
					<?php
						echo wp_get_attachment_image( get_the_ID(), 'large', false, array( 'class' => 'img-responsive' ) );

						if ( has_excerpt() ) :
					?>
						<div class="entry-caption">
							<?php
								the_excerpt();
							?>
						</div><!-- /.entry-caption -->
					<?php
						endif;
					?>
				</div><!-- /.entry-attachment -->

				<?php
					the_content();

					wp_link_pages(
						array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'my-theme' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'my-theme' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						)
					);
				?>
			</div><!-- /.entry-content -->

			<footer class="entry-footer">
				<?php edit_post_link( esc_html__( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- /.entry-footer -->
		</article><!-- /#post-## -->
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Parent post navigation.
			the_post_navigation(
				array(
					'prev_text' => _x( 'Published in %title', 'Parent post link', 'my-theme' ),
					'aria_label' => __( 'Parent post', 'my-theme' ),
				)
			);
			endwhile;
		endif;
		wp_reset_postdata(); // End of the loop.
	?>
</div><!-- /.mdc-cell -->
<?php
get_footer();
