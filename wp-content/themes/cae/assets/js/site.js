var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$('.collapse').collapse();

  };


})();
var CE = CE || {};

;(function() {

  CE.headerParallax = function() {


		var sectionPhoto = ".page-header"

		if( $(window).scrollTop()<415 && $('html').hasClass('no-touch') ){
			$(window).scroll(function() {
				parallaxPosition = -($(window).scrollTop()/4);

				$(sectionPhoto)
				.find('.page-header-fixed')
				.css({top:parallaxPosition});
			});
		}

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

    var $nav = $('nav.affix');
    var $container = $('.page-header.text-right .page-title').width();
    var $width = $(window).width();
    var $position = ($width - $container) / 2;
    console.log($position);
    $nav.css('left', $position + 15).transit({opacity:1}); 


    // http://callmenick.com/2013/04/22/single-page-site-with-smooth-scrolling-highlighted-link-and-fixed-navigation/
    
  	/** 
     * This part does the "fixed navigation after scroll" functionality
     * We use the jQuery function scroll() to recalculate our variables as the 
     * page is scrolled/
     */
    $(window).scroll(function(){
        var window_top = $(window).scrollTop() + 150; // the "12" should equal the margin-top value for nav.stick
        var div_top = $('#nav-anchor').offset().top;
            if (window_top > div_top) {
                $('nav').addClass('stick');
            } else {
                $('nav').removeClass('stick');
            }
    });

    /**
     * This part causes smooth scrolling using scrollto.js
     * We target all a tags inside the nav, and apply the scrollto.js to it.
     */
    $("nav a").click(function(evn){
        evn.preventDefault();
        $('html,body').scrollTo(this.hash, this.hash); 
    });

    /**
     * This part handles the highlighting functionality.
     * We use the scroll functionality again, some array creation and 
     * manipulation, class adding and class removing, and conditional testing
     */
    var aChildren = $("nav li").children(); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values

    /*$(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset().top; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").addClass("nav-active");
            } else {
                $("a[href='" + theID + "']").removeClass("nav-active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$("nav li:last-child a").hasClass("nav-active")) {
                var navActiveCurrent = $(".nav-active").attr("href");
                $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                $("nav li:last-child a").addClass("nav-active");
            }
        }
    });*/


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
		e.preventDefault();
	});

  };


})();
var CE = CE || {};

;(function() {

CE.desktopFilter = function() {

	var container = $('.grid-container');

		$(document).on('facetwp-loaded', function() {

			if(container.hasClass('isotope')) {

			} else {
				container.isotope({
					itemSelector: '.grid-item',
					sortAscending: false,
					layoutMode:'masonry',
					resizable:false,
					resizesContainer : false,
					masonry: {
						gutterWidth: 5
					}
				});
			}


		});

		$(document).on('facetwp-refresh', function() {

			if(container.hasClass('isotope')) {
				container.isotope('destroy');
				container.isotope({
					itemSelector: '.grid-item',
					sortAscending: false,
					layoutMode:'masonry',
					resizable:false,
					resizesContainer : false,
					masonry: {
						gutterWidth: 5
					}
				});
			} else {

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
  archive: {
    init: function() {
      
    }
  },
  home: {
    init: function() {
      CE.desktopFilter();
      //CE.selectBox();
      //$('#container').magnet();
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
