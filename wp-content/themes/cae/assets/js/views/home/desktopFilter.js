var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var $parentFilters = $('.filters > li > a');

    $parentFilters.click(function(){
    	$parentFilters.not(this).parent('li').removeClass('open');
    	$(this).toggleClass('open').parent('li').toggleClass('open');
    });

	wp.hooks.addAction('facetwp/refresh/dropdown', function($this, facet_name) {
        var val = $this.find('.facetwp-dd-val').data('value');
        FWP.facets[facet_name] = val ? [val] : [];
    });

    wp.hooks.addAction('facetwp/ready', function() {
        $(document).on('click', '.facetwp-facet .facetwp-dd-val', function() {
        	$(this).parent('ul').children('.facetwp-dd-val').not(this).removeClass('selected');
        	$(this).addClass('selected');
            var $facet = $(this).closest('.facetwp-facet');
            console.log($facet);
            if ('' != $facet.hasClass('selected')) {
                FWP.static_facet = $facet.attr('data-name');
                console.log(FWP.static_facet);
            }
            FWP.autoload();
        });
    });

	};


})();