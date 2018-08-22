<?php

/**
 * Class Name: material_navwalker
 * Description: A custom WordPress nav walker class to implement the Material Design Lite navigation style in a custom theme using the WordPress built in menu manager.
 */

class mdl_navwalker extends Walker_Nav_Menu {
	
	public function walk( $elements, $max_depth ) {
		$list = array ();
		
		foreach ( $elements as $item ) {
			if ( empty( $item->title ) ) {
				$list[] = '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', 'my-theme' ) . '</a>';
			}
			
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'mdl-navigation__link';

			if ( $item->current || in_array( 'current_page_parent', (array)$item->classes ) ) {
				$classes[] = 'is-active';
			}

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ) ) );
			
			$list[] = '<a href="' . $item->url . '" class="' . $class_names . '"><span>' . $item->title . '</span></a>';
		}
		
		return join( "\n", $list );
	}
	
}