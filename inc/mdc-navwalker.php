<?php

/**
 * Class Name: WP_MDC_Navwalker
 * Description: A custom WordPress nav walker class to implement the Material Design navigation styles.
 */

if ( ! class_exists( 'WP_MDC_Navwalker' ) ) {
	/**
	 * WP_MDC_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class WP_MDC_Navwalker extends Walker_Nav_Menu {
		/**
		 * Display array of elements hierarchically.
		 *
		 * Does not assume any existing order of elements.
		 *
		 * @param array $elements  An array of elements.
		 * @param int   $max_depth The maximum hierarchical depth.
		 * @param mixed ...$args   Optional additional arguments.
		 *
		 * @return string The hierarchical item output.
		 */
		public function walk( $elements, $max_depth = 1, ...$args ) {
			$list = array();

			foreach ( $elements as $item ) {
				if ( empty( $item->title ) && empty( $item->url ) ) {
					return '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_html__( 'Add a menu', 'my-theme' ) . '</a>';
				}

				$atts           = array();
				$atts['target'] = empty( $item->target ) ? array() : (array) $item->target;
				$atts['rel']    = empty( $item->xfn ) ? array() : (array) $item->xfn;

				$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'mdc-tab';

				$indicator_classes   = array();
				$indicator_classes[] = 'mdc-tab-indicator';

				if ( preg_grep( '/^current/', $classes ) ) {
					$classes[]            = 'mdc-tab--active';
					$indicator_classes[]  = 'mdc-tab-indicator--active';
					$atts['aria-current'] = 'page';
				}

				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
					}
				}

				$class_names           = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $max_depth ) );
				$indicator_class_names = join( ' ', $indicator_classes );

				$list[] = '<a href="' . esc_url( $item->url ) . '" class="' . esc_attr( $class_names ) . '"' . $attributes . ' role="tab"><span class="mdc-tab__content">' . esc_html( $item->title ) . '</span><span class="' . esc_attr( $indicator_class_names ) . '"><span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span></span><span class="mdc-tab__ripple"></span></a>';
			}

			return join( "\n", $list );
		}
	}
}
