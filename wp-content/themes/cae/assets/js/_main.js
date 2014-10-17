var CE = window.CE || {};

CE.Site = {
  common: {
    init: function() {
      CE.searchExpand();
      CE.navTrigger();
      CE.collapse();
      CE.headerParallax();
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
