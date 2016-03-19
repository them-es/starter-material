<?php 
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side
 *
 */

    get_header();

	$id = get_the_ID();

	// Add class via custom field (optional)
	$class = sanitize_text_field( get_post_meta($id, '_class', true) );// get custom meta-value
	$style = sanitize_text_field( get_post_meta($id, '_style', true) );// get custom meta-value
?>

	<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--12-col-phone">
		<?php the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php if ( isset($class) && $class != "" ) : post_class($class); else: echo post_class(); endif; ?><?php if ( isset($style) && $style != "" ) : echo ' style="' . $style . '"'; endif; ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php
				the_content();

				wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'my-theme' ) . '&after=</div>');
				edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- /#post-<?php the_ID(); ?> -->

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

	</div><!-- /.mdl-cell -->
		
	<?php get_sidebar(); ?>

<?php get_footer(); ?>