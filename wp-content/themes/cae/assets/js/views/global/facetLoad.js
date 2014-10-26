var CE = CE || {};

;(function() {

CE.facetLoad = function() {

	//https://facetwp.com/how-to-customize-the-facet-loader/

	//https://facetwp.com/add-loading-notifications-to-facetwp-templates/
	

	var container = $('.grid-container');

		$(document).on('facetwp-loaded', function() {

			if(container.hasClass('isotope')) {

				//container.isotope('destroy');

			} else {
				

			}

			alert('facet-loaded');

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

			$('.facetwp-template').html('<div class="loading_data animated">LOADING</div>');

			alert('facetwp-refresh');

		});

		var isPager = false;
		var template_html;

		function loadMore() {
			isPager = true;
			template_html = jQuery('.facetwp-template').html();
			var next_page = parseInt(jQuery('.pager').attr('data-page'));
			jQuery('.pager').attr('data-page', next_page + 1);
			FWP.paged = (next_page + 1);
			FWP.auto_refresh = false;
			FWP.soft_refresh = true;
			FWP.refresh();
		}

		function getItemElement() {
			var $item = $('<div class="grid-item"></div>');
			// add width and height class
			var wRand = Math.random();
			var hRand = Math.random();
			var widthClass = wRand > 0.85 ? 'width3' : wRand > 0.7 ? 'width2' : '';
			var heightClass = hRand > 0.85 ? 'height3' : hRand > 0.5 ? 'height2' : '';
			$item.addClass( widthClass ).addClass( heightClass );
			return $item;
		}

		$('.pager').click(function() {
			loadMore();
			/*$(document).on('facetwp-loaded', function() {
				alert('new items loaded');
				var elems = [];
				for ( var i = 0; i < 3; i++ ) {
					var elem = getItemElement();
					elems.push( elem );
				}
				// append elements to container
				container.append( elems )
				// add and lay out newly appended elements
				.isotope( 'appended', elems );
			});*/
		});

	};


})();