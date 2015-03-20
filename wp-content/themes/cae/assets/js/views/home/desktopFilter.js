var CE = CE || {};

;(function() {

CE.desktopFilter = function () {

    var $parentFilters = $('.filters > li > a');
                var $childFilters = $('.sub-filter li a');
                var $ajaxLoadMore = $('#ajax-load-more .alm-btn-wrap .more');
                var $gridContainer = $('#ajax-load-more');
                var $gridItem = $('.grid-item');

                var masOptions = {
                        itemSelector: '.grid-item',
                        gutter: 5,
                };

                //$ajaxLoadMore.trigger('click');

                $parentFilters.click(function (e) {
                        e.preventDefault();
                        $parentFilters.not(this).parent('li').removeClass('open');
                        $(this).parent('.filter-main').toggleClass('open').removeClass('selected');
                });

                $('.filters > li').hover(function () {
                        $('.filters > li').not(this).children('.filter-key').css('background-image', 'none');
                }, function () {
                        $('.filter-key').css('background-image', '');
                });

                $(document).mouseup(function (e)
                {
                        var container = $(".main");

                        if (!container.is(e.target) && container.has(e.target).length === 0)
                                ; // ... nor a descendant of the container
                        {
                                $('.filters li').removeClass('open');
                        }
                });
                
                var $container = $gridContainer.imagesLoaded(function () {
                        $container.masonry(masOptions);
                        $('.grid-item').addClass('loaded');
                });

                $filter_ya_container = $('ul.filters');

                $filter_ya_container.on('click', '.sub-filter li a', function (e) {
                        $container.fadeOut();

                        $('.filter-key.reset').hide();
                        $('.filter-key:last-of-type').show();

                        e.preventDefault();

                        $tax = [];

                        if ($(this).parents('li').hasClass('selected')) {
                                $('.filter-key').css('background-image', '');
                                $(this).parents('li').removeClass('selected');

                        } else {
                                
                                $(this).parents('li').removeClass('open').addClass('selected');

                        }

                        $current = $filter_ya_container.find('.sub-filter li.selected');

                        $current.each(function () {
                                
                                $curr = {
                                        'term': $(this).find('a').attr('title'),
                                        'taxonomy': $(this).closest('ul.sub-filter').data('tax'),
                                        'name': $(this).find('a span').html(),
                                        'title': $('.page-title').find('strong').html()
                                };

                                $tax.push($curr);
                        });

                        
                        data = {
                                action: 'filter_posts',
                                afp_nonce: afp_vars.afp_nonce,
                                tax_details: $tax
                        };

                        $.ajax({
                                type: 'post',
                                dataType: 'html',
                                url: afp_vars.afp_ajax_url,
                                data: data,
                                timeout: 15000,
                                success: function (data, textStatus, XMLHttpRequest) {
                                        $container.html(data);
                                        $container.fadeIn();
                                        $('#ajax-load-more .alm-btn-wrap .more').hide();
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        console.log(XMLHttpRequest);
                                        console.log(textStatus);
                                        console.log(errorThrown);
                                        console.log('error');
                                        $container.html(data);
                                        //$container.fadeIn();
                                }
                        });

                        $(document).ajaxComplete(function () {
                                $container.masonry('destroy');
                                $container.masonry(masOptions);
                                $('.grid-item').addClass('loaded');
                        });

                });

                var masonryInit = true;
                $.fn.almComplete = function (alm) {

                        $container.append(alm.el).masonry('appended', alm.el).masonry('layout', masOptions);
                        $('.grid-item').addClass('loaded');
                };


};


})();