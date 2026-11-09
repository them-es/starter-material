<?php
if ( ! is_page_template( 'page-full.php' ) ) :
	echo '</div><!-- /.grid -->';
	endif;
?>
	</main><!-- /#main -->
	<footer id="footer" class="responsive">
		<?php
		if ( is_active_sidebar( 'secondary_widget_area' ) ) :
			?>
			<div id="widget-area" class=" widget-area" role="complementary">
				<?php
					dynamic_sidebar( 'secondary_widget_area' );

				if ( current_user_can( 'manage_options' ) ) :
					?>
						<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="chip"><?php esc_html_e( 'Edit', 'my-theme' ); ?></a></span><!-- Show Edit Widget link -->
					<?php
					endif;
				?>
				</div><!-- /.widget-area -->
			<?php
			endif;

			wp_nav_menu(
				array(
					'container'      => '',
					'depth'          => 1,
					'walker'         => new Material_Navwalker(),
					'theme_location' => 'footer-menu',
					'items_wrap'     => '<nav>%3$s</nav>',
				)
			);
			?>

		<p class="copyright">
			<?php printf( esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'my-theme' ), wp_date( 'Y' ), get_bloginfo( 'name', 'display' ) ); ?>
		</p>
	</footer>
	<?php
		wp_footer();
	?>
	</div>
</body>
</html>
