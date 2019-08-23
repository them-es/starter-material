// Webpack Imports
import * as mdc from 'material-components-web'; // Get all components


document.addEventListener('DOMContentLoaded', function () {
	
	// Focus Search if Searchform is empty
	document.querySelector('.search-form').addEventListener('submit', function (event) {
		var search = document.getElementById('s');
		if (search.value === '') {
			search.focus();
			return false;
		}
	});

	// Scrollable tab bar menu: https://github.com/material-components/material-components-web/blob/master/demos/tab-scroller.html
	window.tabBarScroller = new mdc.tabScroller.MDCTabScroller(document.querySelector('#tab-bar-menu'));

});

// https://material.io/develop/web/components/auto-init
mdc.autoInit();