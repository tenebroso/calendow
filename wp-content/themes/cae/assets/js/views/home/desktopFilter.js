var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var $parentFilters = $('.filters > li > a');
    var $childFilters = $('.sub-filter li a');
    var $ajaxLoadMore = $('#ajax-load-more .alm-btn-wrap .more');
    var $gridContainer = $('.grid-container');
    var $gridItem = $('.grid-item');

    var masOptions = {
      itemSelector: '.grid-item',
      gutter:5,
    };

    $ajaxLoadMore.trigger('click');

    $parentFilters.click(function(e){
        e.preventDefault();
        $parentFilters.not(this).parent('li').removeClass('open');
        $(this).parent('.filter-main').toggleClass('open').removeClass('selected');
    });

    $(document).mouseup(function (e)
    {
        var container = $(".main");

        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0); // ... nor a descendant of the container
        {
            $('.filters li').removeClass('open');
        }
    });

var $container = $gridContainer.imagesLoaded( function() {
      $container.masonry( masOptions );
      $('.grid-item').addClass('loaded');
    });

$childFilters.click( function(e) {

        var $text = $(this).text();

        $container.fadeOut();

        $('.filter-key.reset').hide();
        $('.filter-key:last-of-type').show();

        e.preventDefault();

        var selected_taxonomy, taxonomy_type, taxonomy_name;

        if($(this).parents('li').hasClass('selected')) {
            var selected_taxonomy = '';
            var taxonomy_type = '';
            var taxonomy_name = '';
            $('.filter-key').css('background-image','');
            $(this).parents('li').removeClass('selected');
        } else {
            var selected_taxonomy = $(this).attr('title');
            var taxonomy_type = $(this).parents('ul').data('tax');
            var taxonomy_name = $(this).children('span').html();
            $('.filter-main').removeClass('selected');
            $('.filter-key').css('background-image','none');
            $(this).parents('li').removeClass('open').addClass('selected');
        }

        console.log(taxonomy_name);

        data = {
            action: 'filter_posts',
            afp_nonce: afp_vars.afp_nonce,
            tax: taxonomy_type,
            taxonomy: selected_taxonomy,
            name: taxonomy_name
        };

        $.ajax({
            type: 'post',
            dataType: 'html',
            url: afp_vars.afp_ajax_url,
            data: data,
            timeout: 5000,
            success: function( data, textStatus, XMLHttpRequest ) {
                $container.html( data );
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