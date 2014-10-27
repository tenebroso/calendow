var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var $parentFilters = $('.filters > li > a');
    var $childFilters = $('.sub-filter li a');

    var masOptions = {
      itemSelector: '.grid-item',
      gutter:5,
    };

    $('#ajax-load-more .alm-btn-wrap .more').trigger('click');

    //$('.grid-item').addClass('loaded');

    $parentFilters.click(function(e){
        e.preventDefault();
        $parentFilters.not(this).parent('li').removeClass('open');
        $(this).parent('.filter-main').toggleClass('open').removeClass('selected');
    });

var $container = $('.grid-container').imagesLoaded( function() {
      $container.masonry( masOptions );
      $('.grid-item').addClass('loaded');
    });

$childFilters.click( function(e) {

        var $text = $(this).text();

        $container.fadeOut();

        $('.filter-key.reset').hide();
        $('.filter-key:last-of-type').show();

        

        e.preventDefault();

        if($(this).parents('li').hasClass('selected')) {
            var selected_taxonomy = '';
            var taxonomy_type = '';
            $(this).parents('li').removeClass('selected');
        } else {
            var selected_taxonomy = $(this).attr('title');
            var taxonomy_type = $(this).parents('ul').data('tax');
            $('.filter-main').removeClass('selected');
            $(this).parents('li').removeClass('open').addClass('selected');
        }

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
                $('#ajax-load-more .alm-btn-wrap .more').hide();
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
            $container.masonry('destroy');
            $container.masonry( masOptions );
            $('.grid-item').addClass('loaded');
        });

    });

var masonryInit = true;
$.fn.almComplete = function(alm){
        
        $container.append(alm.el).masonry('appended', alm.el).masonry('layout', masOptions);
        $('.grid-item').addClass('loaded');
};
    

};


})();