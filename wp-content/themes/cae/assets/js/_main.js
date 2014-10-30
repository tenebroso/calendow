var CE = window.CE || {};

CE.Site = {
  common: {
    init: function() {
      CE.searchExpand();
      CE.navTrigger();
      CE.collapse();
      CE.headerParallax();
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
  page: {
    init: function() {
      CE.stripeParallax();
      CE.sidebarNav();
      CE.socialPopup();
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
