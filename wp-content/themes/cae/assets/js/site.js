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
      $("html, body").stop().animate({
          scrollTop: $(window).top + 5 + 'px'
      });
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

    

    function resize() {
      var $nav = $('.side-nav-container');
      var $container = $('.container').width();
      var $width = $(window).width();
      var $position = ($width - $container) / 2;
      var $sideNav = $('.side-nav li');
      if($sideNav.length && $width > 992) {
        $nav.css('left', $position).transit({opacity:1});
        $nav.stickyNavbar({
          animateCSS: false
        });
      } else {
        $nav.transit({opacity:0});
      }
    }

    resize();
    

    window.onresize = resize;

  };


})();
var CE = CE || {};

;(function() {

  CE.socialPopup = function() {


		var Config = {
		    Link: ".popup",
		    Width: 500,
		    Height: 500
		};

		function PopupHandler(e) {

		    e = (e ? e : window.event);
		    var t = (e.target ? e.target : e.srcElement);

		    // popup position
		    var
		        px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
		        py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);

		    // open popup
		    var popup = window.open(t.href, "social",
		        "width="+Config.Width+",height="+Config.Height+
		        ",left="+px+",top="+py+
		        ",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
		    if (popup) {
		        popup.focus();
		        if (e.preventDefault) { e.preventDefault(); }
		        e.returnValue = false;
		    }

		    return !!popup;
		}

		// add handler links
		var slink = document.querySelectorAll(Config.Link);
		for (var a = 0; a < slink.length; a++) {
		    slink[a].onclick = PopupHandler;
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

        var selected_taxonomy, taxonomy_type, taxonomy_name;

        if($(this).parents('li').hasClass('selected')) {
            var selected_taxonomy = '';
            var taxonomy_type = '';
            var taxonomy_name = '';
            $(this).parents('li').removeClass('selected');
        } else {
            var selected_taxonomy = $(this).attr('title');
            var taxonomy_type = $(this).parents('ul').data('tax');
            var taxonomy_name = $(this).children('span').html();
            $('.filter-main').removeClass('selected');
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
  	var $targetSection = window.location.hash;
  	
  	if($targetSection.length) {
  		$id = $targetSection.substr(1);
  		$('.report-nav li:not(:last-of-type').each(function() {
  			if($(this).data('id') == $id) {
  				$(this).addClass('active');
  			}
	    });
	    $('.report-single').each(function() {
  			if($(this).data('id') == $id) {
  				$(this)
  					.addClass('current')
  					.transit({x:0}, 800, 'ease');
  				$('.report-single')
  					.not($(this))
					.transit({x:'1000%'}, 800, 'ease')
					.removeClass('current');
  			}
	    });
  	} else {
  		$reportNavFirst.addClass('active');
  	}

  	$('.report-single:nth-of-type(1) .report-prev a').remove();
  	$('.report-single:last-of-type .report-next a').remove();

	$next.click(function(e) {
		var $href = $(this).attr('href');
		var $parent = $(this).parents('.report-single');
		var $theID  = $(this).parents('.report-single').data("id");
		$parent.transit({x:'-1000%'}, 800, 'ease').removeClass('current');
		$($href).transit({x:0}, 800, 'ease').addClass('current');
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
		$parent.transit({x:'1000%'}, 800, 'ease').removeClass('current');
		$($href).transit({x:0}, 800, 'ease').addClass('current');
		$reportNav.removeClass('active');
		$reportNav.filter(function() {
			return $(this).data('id') === $theID - 1;
		}).addClass('active');
		window.location.hash = $theID - 1;
		e.preventDefault();
	});

	$('.report-nav li:not(last-of-type) a').click(function(e){
		var $href = $(this).attr('href');
		var $theID  = $($href).data("id");
		var $parent = $(this).parent('li');
		var $cur = window.location.hash;
		window.location.hash = $theID
		$reportNav.removeClass('active');
		$parent.addClass('active');
		if('#' + $parent.data("id") > $cur) {
			$('.report-single')
				.transit({x:'1000%'}, 800, 'ease').removeClass('current');
			$($href)
			.transit({x:0}, 800, 'ease')
			.addClass('current');
		} else if ('#' + $parent.data("id") < $cur) {
			$('.report-single')
				.transit({x:'-1000%'}, 800, 'ease').removeClass('current');
			$($href)
			.transit({x:0}, 800, 'ease')
			.addClass('current');
		}

		e.preventDefault();
	});


	$('body').on('keydown', function(e){
		if(e.which == 37) { // left     
			e.preventDefault();
			$('.report-single.current .report-nav-top .report-prev a')
			.trigger('click');
		}
		else if(e.which == 39) {
			e.preventDefault();
			$('.report-single.current .report-nav-top .report-next a')
			.trigger('click');
			
			//$('.report-single').hasClass('current').children('.report-next a').trigger('click');
		}
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
      CE.temperature();
      $('.js-popover').popover({ 
        html : true,
        content: function() {
          return $(this).children('span').html();
        }
      });
      $('.js-popover').click(function () {
         $('.js-popover').not(this).popover('hide');
      });
      if (!Modernizr.touch) { 
         CE.headerParallax();
      }
    }
  },
  page_template_page_campaign_overview_php: {
    init: function() {
      $('.bx-slider').bxSlider({
        maxSlides:3,
        auto:false,
        pager:false,
        slideWidth:265,
        infiniteLoop:false,
        hideControlOnEnd:true
      });
    }
  },
  page_template_page_campaign_detail_php: {
    init: function() {
      if($('.footer-post-nav li').length < 4) {
        $('.footer-post-nav,.footer-add-padding').addClass('short');
      }
    }
  },
  page: {
    init: function() {
      CE.sidebarNav();
      CE.socialPopup();
      if (!Modernizr.touch) { 
         CE.stripeParallax();
      }
      if($('.newsletter-wrapper').length) {
         $('#ajax-load-more .alm-btn-wrap .more').trigger('click');
      }
    }
  },
  single: {
    init: function() {
      CE.sidebarNav();
      $(".hentry").fitVids();
      CE.socialPopup();
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
