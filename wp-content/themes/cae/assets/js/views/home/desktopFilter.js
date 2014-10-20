var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var container = $('.grid-container');

		$(document).on('facetwp-loaded', function() {

			if(container.hasClass('isotope')) {

			} else {
				container.isotope({
					itemSelector: '.grid-item',
					sortAscending: false,
					layoutMode:'masonry',
					resizable:false,
					resizesContainer : false,
					masonry: {
						gutterWidth: 5
					}
				});
			}


		});

		$(document).on('facetwp-refresh', function() {

			if(container.hasClass('isotope')) {
				container.isotope('destroy');
				container.isotope({
					itemSelector: '.grid-item',
					sortAscending: false,
					layoutMode:'masonry',
					resizable:false,
					resizesContainer : false,
					masonry: {
						gutterWidth: 5
					}
				});
			} else {

			}

		});
	

	};


})();