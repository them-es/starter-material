<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
	<?php
		echo apply_filters( 'the_content', get_post_field( 'post_content', $page_id ) );

		edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>', $page_id );
	?>
</div><!-- /.mdc-cell -->
<?php
	get_template_part( 'archive', 'loop' );

get_footer();
