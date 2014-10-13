var CE = CE || {};

;(function() {

  CE.desktopFilter = function() {


  	var $parentFilters = $('.filters > li > a');

    $parentFilters.click(function(){
    	$parentFilters.not(this).parent('li').removeClass('active');
    	$(this).toggleClass('open').parent('li').toggleClass('active');
    });

    $(document).on('facetwp-loaded', function() {
       var $container = $('.isotope').isotope({
			itemSelector: '.grid-item',
			masonry: {
				columnWidth: 330,
	  			gutter: 5
			}
		});
		//$('.isotope').css('max-height','');
		//$('body').css('opacity','.7');
     });

     $(document).on('facetwp-refresh', function() {
     	//$('.isotope').isotope('destroy');
        //$('.isotope').css('max-height','0px');
     });
	

	// store filter for each group
	var filters = {};

	$('#filters').on( 'click', '.selector', function() {
		var $this = $(this);
		
		// get group key
		var $buttonGroup = $this.parents('.selector-group');
		var filterGroup = $buttonGroup.attr('data-filter-group');
		
		// set filter for group
		filters[ filterGroup ] = $this.attr('data-filter');
		
		// combine filters
		var filterValue = '';
		for ( var prop in filters ) {
		  filterValue += filters[ prop ];
		}
		// set filter for Isotope
		$container.isotope({ filter: filterValue });
	});

	// change is-checked class on buttons
	/*$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
		  $buttonGroup.find('.is-checked').removeClass('is-checked');
		  $( this ).addClass('is-checked');
		});
	});*/


	};


})();