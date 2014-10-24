var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var $parentFilters = $('.filters > li > a');

    $parentFilters.click(function(){
    	$parentFilters.not(this).parent('li').removeClass('open');
    	$(this).toggleClass('open').parent('li').toggleClass('open');
    });

	wp.hooks.addAction('facetwp/refresh/dropdown', function($this, facet_name) {
        var val = [];
        $this.find('.facetwp-dd-val.selected').each(function() {
            val.push($(this).attr('data-value'));
        });
        FWP.facets[facet_name] = val;
    });
 
    wp.hooks.addAction('facetwp/ready', function() {
        $(document).on('click', '.facetwp-dd-val', function() {
            $(this).toggleClass('selected');
            var $facet = $(this).closest('.facetwp-facet');
            FWP.autoload();
        });
    });

	};


})();