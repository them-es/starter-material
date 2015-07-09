<?php

/**
 * Class Name: material_navwalker
 * Description: A custom WordPress nav walker class to implement the Material Design Lite navigation style in a custom theme using the WordPress built in menu manager.
 */

class mdl_navwalker extends Walker_Nav_Menu {
	
	public function walk( $elements, $max_depth ) {
		$list = array ();
		
		foreach ( $elements as $item ) {
			if ( $item->current ) {
				$list[] = '<span class="mdl-navigation__link is-active">' . $item->title . '</span>';
			} else {
				$list[] = '<a href="' . $item->url . '" class="mdl-navigation__link">' . $item->title . '</a>';
			}
			
		}
		
		return join( "\n", $list );
	}
	
}