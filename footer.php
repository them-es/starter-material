		</div><!-- /.mdl-grid -->

		<footer id="footer" class="mdl-mega-footer">
			<div class="mdl-mega-footer--middle-section">
				<?php if ( is_active_sidebar('secondary_widget_area') ) : ?>

					<div id="widget-area" class="widget-area mdl-mega-footer--drop-down-section" role="complementary">
						<?php dynamic_sidebar( 'secondary_widget_area' ); ?>

						<?php if ( current_user_can('manage_options') ) : ?>
							<a href="<?php echo admin_url( 'widgets.php' ); ?>" class="mdl-badge">Edit</a><!-- Show Edit Widget link -->
						<?php endif; ?>
					</div><!-- .widget-area -->

				<?php endif; ?>
			</div>

			<div class="mdl-mega-footer--bottom-section">
        		<?php
  					/*
  						Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
  						Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
  						!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
  					*/
  					wp_nav_menu( array(
  						'theme_location'  => 'footer-menu',
  						'container'       => '',
  						'fallback_cb'     => '',
  						'items_wrap'      => '<ul id="%1$s" class="mdl-mega-footer--link-list">%3$s</ul>',
  						'walker'          => ''
  					) );
  				?>
			</div>
		</footer>
	
		</div><!-- /#main -->
	
	</div><!-- /#wrapper -->

<?php wp_footer(); ?>

</body>
</html>
