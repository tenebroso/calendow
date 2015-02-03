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
      if (!$('html.touch').length) {
         CE.headerParallax();
      }

      var $hash = window.location.hash;
      var $panelGroup = $('.panel-group');

      if ($panelGroup.length && $hash.length){
        $($hash).find('.collapsed').trigger('click');
      }
      CE.legacy();
      CE.splashMessage();
      $('body').tweetHighlighted({
        via: 'calendow'
      });
    }
  },
  page_template_page_campaign_overview_php: {
    init: function() {
      $('.bx-slider').bxSlider({
        maxSlides:3,
        auto:false,
        pager:false,
        slideWidth:265,
        slideMargin: 9,
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
      var $previous = $('.nav.newsletters li:nth-of-type(5) a').attr('href');
      var $next = $('.nav.newsletters li:nth-of-type(3) a').attr('href');
      $('.nav.newsletters li.pull-left a').attr('href',$previous);
      $('.nav.newsletters li.pull-right a').attr('href',$next);
    }
  },
  page: {
    init: function() {
      CE.sidebarNav();
      CE.socialPopup();
      if (!$('html.touch').length) {
         CE.stripeParallax();
      }
      if($('.newsletter-wrapper').length) {
         $('#ajax-load-more .alm-btn-wrap .more').trigger('click');
         CE.desktopFilter();
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
