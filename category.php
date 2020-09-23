<?php
/**
 * The Template for displaying Category Archive pages.
 */

get_header();

if ( have_posts() ) :
?>
<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
	<header class="page-header">
		<h1 class="page-title"><?php printf( __( 'Category Archives: %s', 'my-theme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) ) :
				echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
			endif;
		?>
	</header>
</div><!-- /.mdc-cell -->
<?php
	get_template_part( 'archive', 'loop' );

else :
	// 404
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // end of the loop.

get_footer();
