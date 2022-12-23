<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();

the_post();
?>
<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-12-phone">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php
			the_content();

			wp_link_pages(
				array(
					'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'my-theme' ) . '">',
					'after'    => '</nav>',
					'pagelink' => esc_html__( 'Page %', 'my-theme' ),
				)
			);
			edit_post_link(
				esc_attr__( 'Edit', 'my-theme' ),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div><!-- /#post-<?php the_ID(); ?> -->
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	?>
</div><!-- /.mdc-cell -->
<?php
get_sidebar();

get_footer();
