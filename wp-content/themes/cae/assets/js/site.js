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

    $(window).scroll(function(){
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
    });


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
      $("#weather-boyle-heights").html(html);
    },
    error: function(error) {
      $("#weather-boyle-heights").html('<p>'+error+'</p>');
    }

  });

  };


})();
var CE = CE || {};

;(function() {

  CE.desktopFilter = function() {


  	var $parentFilters = $('.filters > li > a');

    $parentFilters.click(function(){
    	$parentFilters.not(this).parent('li').removeClass('active');
    	$(this).toggleClass('open').parent('li').toggleClass('active');
    });

    $(document).on('facetwp-loaded', function() {
       var $container = $('.isotope').isotope({
			itemSelector: '.grid-item',
			masonry: {
				columnWidth: 330,
	  			gutter: 5
			}
		});
		//$('.isotope').css('max-height','');
		//$('body').css('opacity','.7');
     });

     $(document).on('facetwp-refresh', function() {
     	//$('.isotope').isotope('destroy');
        //$('.isotope').css('max-height','0px');
     });
	

	// store filter for each group
	var filters = {};

	$('#filters').on( 'click', '.selector', function() {
		var $this = $(this);
		
		// get group key
		var $buttonGroup = $this.parents('.selector-group');
		var filterGroup = $buttonGroup.attr('data-filter-group');
		
		// set filter for group
		filters[ filterGroup ] = $this.attr('data-filter');
		
		// combine filters
		var filterValue = '';
		for ( var prop in filters ) {
		  filterValue += filters[ prop ];
		}
		// set filter for Isotope
		$container.isotope({ filter: filterValue });
	});

	// change is-checked class on buttons
	/*$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
		  $buttonGroup.find('.is-checked').removeClass('is-checked');
		  $( this ).addClass('is-checked');
		});
	});*/


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
      //CE.sidebarNav();
    }
  },
  archive: {
    init: function() {
      
    }
  },
  home: {
    init: function() {
      //CE.desktopFilter();
      //CE.selectBox();
      //$('#container').magnet();
    }
  },
  about_us: {
    init: function() {

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
