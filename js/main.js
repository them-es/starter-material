(function ($) {
	'use strict';
	
	// Navbar Scroll buttons: (c) https://github.com/google/material-design-lite/blob/master/docs/_assets/main.js
	var rightScroll = document.querySelector('.scrollindicator.scrollindicator--right'),
		leftScroll = document.querySelector('.scrollindicator.scrollindicator--left'),
		menuBar = document.querySelector('.mdl-navigation'),
		delta = 40;

	function updateScrollIndicator() {
		leftScroll.classList.remove('disabled');
		rightScroll.classList.remove('disabled');
		
		if (menuBar.scrollLeft <= 0) {
			leftScroll.classList.add('disabled');
		}
		// 5px tolerance because browsers!
		if (menuBar.scrollLeft + menuBar.clientWidth + 5 >= menuBar.scrollWidth) {
			rightScroll.classList.add('disabled');
		}
	}
	menuBar.addEventListener('scroll', updateScrollIndicator);
	updateScrollIndicator();

	function scrollMenuBar(delta) {
		menuBar.scrollLeft += delta;
	}
	
	rightScroll.addEventListener('click', scrollMenuBar.bind(null, delta));
	rightScroll.addEventListener('tap', scrollMenuBar.bind(null, delta));
	leftScroll.addEventListener('click', scrollMenuBar.bind(null, -delta));
	leftScroll.addEventListener('tap', scrollMenuBar.bind(null, -delta));
	

	// JQuery fallback: add title attribute from placeholder
	$('input, textarea').attr('title', function () {
		return $(this).attr('placeholder');
	});
	
	// Focus Search if Searchform is empty
	$('.searchform').on('submit', function (event) {
		var search = document.getElementById('s');
		if (search.value === '') {
			search.focus();
			return false;
		}
	});

}(jQuery));