<?php
/**
 * The Template used to display Tag Archive pages.
 */

get_header();

if ( have_posts() ) :
	?>
	<div class="s12">
		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Tag: %s', 'my-theme' ), single_tag_title( '', false ) ); ?></h1>
			<?php
				$tag_description = tag_description();
			if ( ! empty( $tag_description ) ) :
				echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
				endif;
			?>
		</header>
	</div><!-- /.s# -->
	<?php
	get_template_part( 'archive', 'loop' );
else :
	// 404.
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // End of the loop.

get_footer();
