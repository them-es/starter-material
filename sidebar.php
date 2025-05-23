<?php
/**
 * Sidebar Template.
 */

if ( is_active_sidebar( 'primary_widget_area' ) || is_archive() || is_single() ) :
	?>
<div id="sidebar" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-12-phone">
	<?php
	if ( is_active_sidebar( 'primary_widget_area' ) ) :
		?>
		<div id="widget-area" class="widget-area" role="complementary">
		<?php
			dynamic_sidebar( 'primary_widget_area' );

		if ( current_user_can( 'manage_options' ) ) :
			?>
				<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge badge-info"><?php esc_html_e( 'Edit', 'my-theme' ); ?></a></span><!-- Show Edit Widget link -->
			<?php
			endif;
		?>
		</div><!-- /.widget-area -->
		<?php
		endif;

	if ( is_archive() || is_single() ) :
		?>
		<div class="sidebar-nav">
			<div id="primary-two" class="widget-area">
			<?php
				$output                = '<ul class="mdc-list recentposts">';
					$recentposts_query = new WP_Query( array( 'posts_per_page' => 5 ) ); // Max. 5 posts in Sidebar!
					$month_check       = null;
			if ( $recentposts_query->have_posts() ) :
				$output .= '<li><h3>' . esc_html__( 'Recent Posts', 'my-theme' ) . '</h3></li>';
				while ( $recentposts_query->have_posts() ) :
							$recentposts_query->the_post();

							// Show monthly archive and link to months.
							$month = get_the_date( 'F, Y' );
					if ( $month !== $month_check ) :
						$output .= '<li><a href="' . esc_url( get_month_link( get_the_date( 'Y' ), get_the_date( 'm' ) ) ) . '" title="' . esc_attr( get_the_date( 'F, Y' ) ) . '">' . esc_html( $month ) . '</a></li>';
							endif;
							$month_check = $month;

							$output     .= '<li class="mdc-list-item">';
								$output .= '<h4><a href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'my-theme' ), the_title_attribute( array( 'echo' => false ) ) ) . '" rel="bookmark">' . esc_html( get_the_title() ) . '</a></h4>';
							$output     .= '</li>';
					endwhile;
						endif;
					wp_reset_postdata();
				$output .= '</ul>';

				echo $output;
			?>
				<br />
				<ul class="categories mdc-list">
					<li><h3 class="border-bottom"><?php esc_html_e( 'Categories', 'my-theme' ); ?></h3></li>
				<?php
					wp_list_categories( array( 'title_li' => '' ) );

				if ( ! is_author() ) :
					?>
							<li>&nbsp;</li>
							<li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="mdc-button mdc-button--stroked"><?php esc_html_e( 'more', 'my-theme' ); ?></a></li>
					<?php
					endif;
				?>
				</ul>
			</div><!-- /#primary-two -->
		</div>
		<?php
		endif;
	?>
</div><!-- /#sidebar -->
	<?php
	endif;
?>
