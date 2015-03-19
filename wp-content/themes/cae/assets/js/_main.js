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

        $('.content-map--container-column-cell').click(function() {

            var startAt = Number($(this).attr('data-id'));
            var cmitems = [];
            $( $(this).attr('href') ).find('.content-map--modal').each(function() {
              cmitems.push( {
                src: $(this) 
              } );
            });

            
            $.magnificPopup.open({
              items:cmitems,
              gallery: {
                enabled: true 
              }
            }, startAt);

        });


    }
  },
  page_template_page_campaign_overview_php: {
    init: function() {
      CE.readThisSlider();
    }
  },
  page_template_page_campaign_detail_php: {
    init: function() {

      $(".animsition").animsition({
  
        inClass               :   'fade-in',
        outClass              :   'fade-out',
        inDuration            :    1500,
        outDuration           :    400,
        linkElement           :   '.animsition-link',
        // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
        loading               :    true,
        loadingParentElement  :   'body', //animsition wrapper element
        loadingClass          :   'animsition-loading',
        unSupportCss          : [ 'animation-duration',
                                  '-webkit-animation-duration',
                                  '-o-animation-duration'
                                ],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        
        overlay               :   false,
        
        overlayClass          :   'animsition-overlay-slide',
        overlayParentElement  :   'body'
      });

      if($('.footer-post-nav li').length < 4) {
        $('.footer-post-nav,.footer-add-padding').addClass('short');
      }
      
      CE.thumbnailNav();
      
      
    }
  },
  page_template_template_places_php: {
    init: function() {
      CE.thumbnailNav();
      CE.readThisSlider();

      var $width = $(window).width();

      if($width > 992) {

        var $title = $('.side-nav-container .sidenav-title');

        $title.addClass('white-text');

        $(window).on("scroll", function(){
          if($("body").scrollTop() > 500){
            $title.removeClass('white-text');
          } else {
            $title.addClass('white-text');
          }
        });
        
      }

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
  },
  search: {
    init: function() {
      var $height = window.screen.height;
      var $main = $('.main');
      var $footer = $('.footer');

      $main.css('min-height', $height - 308);
      $footer.css('opacity','1');
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
