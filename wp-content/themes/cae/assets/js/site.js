var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$('.collapse').collapse();

  };


})();
var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger'),
  		$menu = $('.nav-full-screen'),
  		$body = $('body:after');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	$body.addClass('faded');
    	$closeTrigger.addClass('active');
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
    	$body.removeClass('faded');
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

  CE.desktopFilter = function() {


  	var $parentFilters = $('.filters > li > a');

    $parentFilters.click(function(){
    	$parentFilters.not(this).parent('li').removeClass('active');
    	$(this).toggleClass('open').parent('li').toggleClass('active');
    });

	var $container = $('.isotope').isotope({
		itemSelector: '.color-shape'
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
    }
  },
  blog: {
    init: function() {
     
    }
  },
  single: {
    init: function() {
      
    }
  },
  archive: {
    init: function() {
      
    }
  },
  home: {
    init: function() {
      CE.desktopFilter();
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
