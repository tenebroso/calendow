var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$('.collapse').collapse();

  };


})();
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
var CE = CE || {};

;(function() {

  CE.headerParallax = function() {


		var sectionPhoto = ".page-header";

		$.stellar({ horizontalScrolling: false });

  };


})();
var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger'),
  		$menu = $('.nav-full-screen'),
      $page = $('html'),
  		$body = $('body:after');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	$body.addClass('faded');
    	$closeTrigger.addClass('active');
      $('html,body').scrollTo(0,0);
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
    	$body.removeClass('faded');
      $page.css('min-height','');
    });


  };


})();
var CE = CE || {};

;(function() {

  CE.searchExpand = function() {

    $('.js-expand-on-click').click(function(){
    	$(this).toggleClass('expanded');
    });


  };


})();
var CE = CE || {};

;(function() {

  CE.sidebarNav = function() {

    var $nav = $('.side-nav-container');
    var $container = $('.container').width();
    var $width = $(window).width();
    var $position = ($width - $container) / 2;
    var $sideNav = $('.side-nav li');

    if($sideNav.length) {
      $nav.css('left', $position).transit({opacity:1});
      $nav.stickyNavbar({
        animateCSS: false
      });
    }

  };


})();
var CE = CE || {};

;(function() {

  CE.stripeParallax = function() {


		var sectionPhoto = ".stripe.bg-image";

		$.stellar();

  };


})();
var CE = CE || {};

;(function() {

  CE.temperature = function() {

  $.simpleWeather({
    location: 'Boyle Heights, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#bh").html(html);
    },
    error: function(error) {
      $("#bh").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'City Heights, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#ch").html(html);
    },
    error: function(error) {
      $("#ch").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Coachella Valley, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#cv").html(html);
    },
    error: function(error) {
      $("#cv").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Del Norte, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#dn").html(html);
    },
    error: function(error) {
      $("#dn").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'East Oakland, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#oak").html(html);
    },
    error: function(error) {
      $("#oak").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'East Salinas, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sns").html(html);
    },
    error: function(error) {
      $("#sns").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Fresno, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#fno").html(html);
    },
    error: function(error) {
      $("#fno").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Long Beach, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#lb").html(html);
    },
    error: function(error) {
      $("#lb").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Merced, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#mcd").html(html);
    },
    error: function(error) {
      $("#mcd").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Richmond, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#rmd").html(html);
    },
    error: function(error) {
      $("#rmd").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Sacramento, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sac").html(html);
    },
    error: function(error) {
      $("#sac").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Santa Ana, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sna").html(html);
    },
    error: function(error) {
      $("#sna").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'South Kern, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#krn").html(html);
    },
    error: function(error) {
      $("#krn").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'South Los Angeles, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#la").html(html);
    },
    error: function(error) {
      $("#la").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Tribal Lands, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#tbl").html(html);
    },
    error: function(error) {
      $("#tbl").html('78&deg;');
    }
  });

};


})();
var CE = CE || {};

;(function() {

  CE.reportPageHeight = function() {


    var $container = $('.single-report .main');
    var $report = $('.report-single');


    // Get an array of all element heights
    var elementHeights = $report.map(function() {
      return $(this).height();
    }).get();

    var maxHeight = Math.max.apply(null, elementHeights);

    $container.height(maxHeight);


  };


})();
var CE = CE || {};

;(function() {

  CE.reportSectionSwitcher = function() {

  	var $prev = $('.report-prev a');
  	var $next = $('.report-next a');
  	var $reportNavFirst = $('.report-nav li:first-child');
  	var $reportPanelFirst = $('#report-panel-1');
  	var $reportNav = $('.report-nav li');

  	$reportNavFirst.addClass('active');

	$next.click(function(e) {
		var $href = $(this).attr('href');
		var $parent = $(this).parents('.report-single');
		var $theID  = $(this).parents('.report-single').data("id");
		$parent.transit({x:'-1000%'}, 800, 'ease');
		$($href).transit({x:0}, 800, 'ease');
		$reportNav.removeClass('active');
		$reportNav.filter(function() {
			return $(this).data('id') === $theID + 1;
		}).addClass('active');
		window.location.hash = $theID + 1;
		e.preventDefault();
	});

	$prev.click(function(e) {
		var $href = $(this).attr('href');
		var $parent = $(this).parents('.report-single');
		var $theID  = $(this).parents('.report-single').data("id");
		$parent.transit({x:'1000%'}, 800, 'ease');
		$($href).transit({x:0}, 800, 'ease');
		$reportNav.removeClass('active');
		$reportNav.filter(function() {
			return $(this).data('id') === $theID - 1;
		}).addClass('active');
		window.location.hash = $theID - 1;
		e.preventDefault();
	});

	$("body").keydown(function(e) {
		if(e.which == 37) { // left     
			$prev.trigger("click");
		}
		else if(e.which == 39) { // right     
			$next.trigger("click");
		}
	});

  };


})();
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
var CE = window.CE || {};

CE.Site = {
  common: {
    init: function() {
      CE.searchExpand();
      CE.navTrigger();
      CE.collapse();
      CE.headerParallax();
      CE.temperature();
    }
  },
  blog: {
    init: function() {
     
    }
  },
  page: {
    init: function() {
      CE.stripeParallax();
      CE.sidebarNav();
    }
  },
  single: {
    init: function() {
      CE.sidebarNav();
    }
  },
  home: {
    init: function() {
      CE.desktopFilter();
      //CE.facetLoad();
    }
  },
  single_report: {
    init: function() {
      CE.reportPageHeight();
      CE.reportSectionSwitcher();
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = CE.Site;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);
