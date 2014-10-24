var CE = CE || {};

;(function() {

CE.facetLoad = function() {

	//https://facetwp.com/how-to-customize-the-facet-loader/

	//https://facetwp.com/add-loading-notifications-to-facetwp-templates/

	var isPager = false;
	var template_html;

	function loadMore() {
		isPager = true;
		template_html = jQuery('.facetwp-template').html();
		var next_page = parseInt(jQuery('.pager').attr('data-page'));
		jQuery('.pager').attr('data-page', next_page + 1);
		FWP.paged = (next_page + 1);
		FWP.refresh();
	}
	

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
						columnWidth: '.grid-item',
						gutter:5
					}
				});
			}

			if ( isPager ) {
				var new_html = $('.facetwp-template').html();
				$('.facetwp-template').html(template_html + new_html);
				isPager = false;
			}
			else {
				$('.pager').attr('data-page', 1);
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