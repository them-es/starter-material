		</div><!-- /.mdl-grid -->

		<footer id="footer" class="mdl-mega-footer">
			<?php if ( is_active_sidebar( 'secondary_widget_area' ) ) : ?>

				<div id="widget-area" class="widget-area mdl-mega-footer__middle-section" role="complementary">
					<?php dynamic_sidebar( 'secondary_widget_area' ); ?>

					<?php if ( current_user_can( 'manage_options' ) ) : ?>
						<p class="edit-link"><a href="<?php echo admin_url( 'widgets.php' ); ?>" class="badge badge-info"><?php _e( 'Edit', 'my-theme' ); ?></a></p><!-- Show Edit Widget link -->
					<?php endif; ?>
				</div><!-- .widget-area -->

			<?php endif; ?>
			
			<div class="mdl-mega-footer__bottom-section">
				<?php
					/*
						Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
						Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
						!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
					*/
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'container'      => '',
						'fallback_cb'    => '',
						'items_wrap'     => '<ul id="%1$s" class="mdl-mega-footer__link-list">%3$s</ul>',
						'walker'         => '',
					) );
				?>
			</div>
			
			<p>&copy; <?php echo date('Y'); ?> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></p>
		</footer>
	
		</div><!-- /#main -->
	
	</div><!-- /#wrapper -->

<?php wp_footer(); ?>

</body>
</html>