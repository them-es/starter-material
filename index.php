<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

	get_header();

	$page_id = get_option('page_for_posts');
?>

	<div class="mdl-cell mdl-cell--12-col">
	<?php
		echo nl2br( apply_filters('the_content', get_post_field('post_content', $page_id) ) );// = echo content from Bloghome

		edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>', $page_id );
	?>
	</div><!-- /.mdl-cell -->

	<?php themes_starter_content_nav( 'nav-above' ); ?>

		<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/* Include the Post-Format-specific template for the content.
				* If you want to overload this in a child theme then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'content', 'index' );

			endwhile;
		?>

	<?php themes_starter_content_nav( 'nav-below' ); ?>

<?php get_footer(); ?>
