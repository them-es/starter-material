(function ($) {
	'use strict';
	
	// JQuery fallback: add title attribute from placeholder
	$('input, textarea').attr('title', function () {
		return $(this).attr('placeholder');
	});
	
	// Focus Search if Searchform is empty
	$('.search-form').on('submit', function (event) {
		var search = document.getElementById('s');
		if (search.value === '') {
			search.focus();
			return false;
		}
	});

	// Scrollable tab bar menu: https://github.com/material-components/material-components-web/blob/master/demos/tab-scroller.html
	window.tabBarScroller = new mdc.tabScroller.MDCTabScroller(document.querySelector('#tab-bar-menu'));

}(jQuery));