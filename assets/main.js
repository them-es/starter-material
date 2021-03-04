// Webpack Imports
import * as mdc from 'material-components-web'; // Get all components

( function () {
	'use strict';

	// Focus Search if Searchform is empty
	document.querySelector( '.search-form' ).addEventListener( 'submit', function ( e ) {
		var search = document.querySelector( '#s' );
		if ( search.value.length < 1 ) {
			e.preventDefault();
			search.focus();
		}
	} );

	// Scrollable tab bar menu: https://material-components.github.io/material-components-web-catalog/#/component/tabs
	window.tabBarScroller = new mdc.tabScroller.MDCTabScroller( document.querySelector( '#tab-bar-menu' ) );
} )();

// https://material.io/develop/web/components/auto-init
//mdc.autoInit();
