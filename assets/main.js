// Webpack Imports
import * as mdc from 'material-components-web'; // Get all components

( function () {
	'use strict';

	// Focus input if Searchform is empty
	[].forEach.call( document.querySelectorAll( '.search-form' ), ( el ) => {
		el.addEventListener( 'submit', function ( e ) {
			var search = el.querySelector( 'input' );
			if ( search.value.length < 1 ) {
				e.preventDefault();
				search.focus();
			}
		} );
	} );

	[].forEach.call( document.querySelectorAll( '.mdc-text-field' ), ( el ) => {
		new mdc.textField.MDCTextField.attachTo( el );
	} );

	// Scrollable tab bar menu: https://material-components.github.io/material-components-web-catalog/#/component/tabs
	window.tabBarScroller = new mdc.tabScroller.MDCTabScroller( document.querySelector( '#tab-bar-menu' ) );
} )();

// https://material.io/develop/web/components/auto-init
//mdc.autoInit();
