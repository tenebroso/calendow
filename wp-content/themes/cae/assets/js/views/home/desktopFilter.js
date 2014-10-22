var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var $parentFilters = $('.filters > li > a');

    $parentFilters.click(function(){
    	$parentFilters.not(this).parent('li').removeClass('active');
    	$(this).toggleClass('open').parent('li').toggleClass('active');
    });

    $(document).on('click', '.facetwp-page', function(e){
		e.preventDefault;
		$('.facetwp-page').removeClass('active');
		$(this).addClass('active');
		FWP.paged = $(this).attr('data-page');
		if (1 < FWP.paged) {
		    FWP.facets['paged'] = $(this).attr('data-page');
		}else{
		    FWP.facets['paged'] = 1;
		}
		FWP.set_hash();
		FWP.fetch_data();
    });
	

	};


})();