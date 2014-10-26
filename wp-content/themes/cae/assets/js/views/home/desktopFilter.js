var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var $parentFilters = $('.filter-key');
    var $childFilters = $('.sub-filter li a');

    var isoOptions = {
      itemSelector: '.grid-item',
        sortAscending: false,
        layoutMode:'masonry',
        resizable:false,
        resizesContainer : false,
        masonry: {
            columnWidth: '.grid-item',
            gutter:5
        }
    };

    $parentFilters.click(function(e){
        e.preventDefault();
        $parentFilters.not(this).parent('li').removeClass('open');
        $(this).toggleClass('open').parent('li').toggleClass('open');
    });

    var $container = $('.grid-container').imagesLoaded( function() {
      $container.isotope( isoOptions );
    });

$childFilters.click( function(e) {

        $container.fadeOut();

        var $text = $(this).text();

        $(this).parents('li').removeClass('open').children('.filter-key').html($text);

        e.preventDefault();
        var selected_taxonomy = $(this).attr('title');
        var taxonomy_type = $(this).parents('ul').data('tax');

        data = {
            action: 'filter_posts',
            afp_nonce: afp_vars.afp_nonce,
            tax: taxonomy_type,
            taxonomy: selected_taxonomy,
        };

        $.ajax({
            type: 'post',
            dataType: 'html',
            url: afp_vars.afp_ajax_url,
            data: data,
            timeout: 5000,
            success: function( data, textStatus, XMLHttpRequest ) {
                $container.html( data );
                console.log(data);
                $container.fadeIn(); 
            },
            error: function( XMLHttpRequest, textStatus, errorThrown ) {
                console.log( XMLHttpRequest );
                console.log( textStatus );
                console.log( errorThrown );
                console.log('error');
                $container.html( data);
                //$container.fadeIn();
            }
        });

        $(document).ajaxComplete(function() {
            $container.isotope('destroy');
            $container.isotope( isoOptions );
        });

    });

    

};


})();