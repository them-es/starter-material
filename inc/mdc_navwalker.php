<?php

/**
 * Class Name: WP_MDC_Navwalker
 * Description: A custom WordPress nav walker class to implement the Material Design navigation style in a custom theme using the WordPress built in menu manager.
 */

if ( ! class_exists( 'WP_MDC_Navwalker' ) ) {
	/**
	 * WP_MDC_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class WP_MDC_Navwalker extends Walker_Nav_Menu {
		
		public function walk( $elements, $max_depth = 1, ...$args ) {
			$list = array ();
			
			foreach ( $elements as $item ) {
				if ( empty( $item->title ) ) {
					$list[] = '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', 'my-theme' ) . '</a>';
				}

				$atts    = array();
				$atts['target'] = empty( $item->target ) ? array() : (array) $item->target;
				$atts['rel']    = empty( $item->xfn ) ? array() : (array) $item->xfn;

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'mdc-tab';

				$indicator_classes = array();
				$indicator_classes[] = 'mdc-tab-indicator';
	
				if ( $item->current || in_array( 'current_page_parent', (array) $item->classes ) ) {
					$classes[] = 'mdc-tab--active';
					$indicator_classes[] = 'mdc-tab-indicator--active';
					$atts['aria-current'] = 'page';
				}

				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ) ) );
				$indicator_class_names = join( ' ', $indicator_classes );
				
				$list[] = '<a href="' . $item->url . '" class="' . $class_names . '"' . $attributes . ' role="tab"><span class="mdc-tab__content">' . $item->title . '</span><span class="' . $indicator_class_names . '"><span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span></span><span class="mdc-tab__ripple"></span></a>';
			}
			
			return join( "\n", $list );
		}
		
	}
}
