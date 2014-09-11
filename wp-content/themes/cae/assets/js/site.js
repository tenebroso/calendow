var GP = window.GP || {};

GP.Site = {
  common: {
    init: function() {
      GP.fullHeight();
     
      GP.searchReveal();
      GP.svgCheck();
      GP.modal();
      //GP.pageFade();
      GP.bottomNav();
      $(window).on('resize', function() {
          GP.fullHeight();
          GP.bottomNav();
      });
    }
  },
  blog: {
    init: function() {
      //GP.fitText();
      GP.categoryExpand();
    }
  },
  single: {
    init: function() {
       //GP.fitText();
       GP.categoryExpand();
       GP.sharing();
    }
  },
  archive: {
    init: function() {
      //GP.fitText();
      GP.categoryExpand();
    }
  },
  home: {
    init: function() {
      GP.homeRollover();
    }
  },
  about_us: {
    init: function() {

    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = GP.Site;
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
