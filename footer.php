
			</div><!-- /.mdc-grid__inner -->
		</main><!-- /#main -->

		<footer id="footer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
			<div class="mdc-layout-grid footer__content">
				<?php if ( is_active_sidebar( 'secondary_widget_area' ) ) : ?>
					<div id="widget-area" class="mdc-layout-grid widget-area" role="complementary">
						<div class="mdc-layout-grid__inner">
							<?php dynamic_sidebar( 'secondary_widget_area' ); ?>
						</div>

						<?php if ( current_user_can( 'manage_options' ) ) : ?>
							<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge badge-info"><?php _e( 'Edit', 'my-theme' ); ?></a></span><!-- Show Edit Widget link -->
						<?php endif; ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
				
				<p class="copyright">
					<small>&copy; <?php echo date( 'Y' ); ?> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></small>
				</p>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'container'      => '',
							'items_wrap'     => '<ul class="mdc-list">%3$s</ul>',
							'depth'          => 1,
						)
					);
				?>
			</div><!-- /.footer-content -->
		</footer>
	</div><!-- /#wrapper -->

<?php wp_footer(); ?>

</body>
</html>
