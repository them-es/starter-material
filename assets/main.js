// Webpack Imports
import "beercss";
import "beercss/node_modules/material-dynamic-colors";

(function () {
	"use strict";

	// Toggle side nav
	document
		.querySelector("#toggle-sidebar")
		?.addEventListener("click", (e) => {
			e.target?.closest("nav").classList.toggle("max");
		});

	// Focus input element onload
	document
		.querySelector("#search-modal")
		?.addEventListener("beforetoggle", (event) => {
			if (event.newState === "open") {
				setTimeout(() => {
					document
						.querySelector('#search-modal input[name="s"]')
						?.focus();
				}, 100);
			}
		});

	// Focus input if Searchform is empty
	[].forEach.call(document.querySelectorAll(".search-form"), (el) => {
		el.addEventListener("submit", function (e) {
			const search = el.querySelector('input[name="s"]');

			if (search.value.length < 1) {
				e.preventDefault();
				search.focus();
			}
		});
	});
})();
