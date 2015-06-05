var CE = CE || {};

;(function() {

CE.desktopFilter = function () {

    var $parentFilters = $('.filters > li > a');
                var $childFilters = $('.sub-filter li a');
                var $ajaxLoadMore = $('#ajax-load-more .alm-btn-wrap .more');
                var $gridContainer = $('#ajax-load-more');
                var $gridItem = $('.grid-item');

                var masOptions = {
                        itemSelector: '.grid-item',
                        gutter: 5,
                };

                //$ajaxLoadMore.trigger('click');

                $parentFilters.click(function (e) {
                        e.preventDefault();
                        $parentFilters.not(this).parent('li').removeClass('open');
                        $(this).parent('.filter-main').toggleClass('open').removeClass('selected');
                });

                $('.filters > li').hover(function () {
                        $('.filters > li').not(this).children('.filter-key').css('background-image', 'none');
                }, function () {
                        $('.filter-key').css('background-image', '');
                });

                $(document).mouseup(function (e)
                {
                        var container = $(".main");

                        if (!container.is(e.target) && container.has(e.target).length === 0)
                                ; // ... nor a descendant of the container
                        {
                                $('.filters li').removeClass('open');
                        }
                });
                
                var $container = $gridContainer.imagesLoaded(function () {
                        $container.masonry(masOptions);
                        $('.grid-item').addClass('loaded');
                });

                $filter_ya_container = $('ul.filters');

                $filter_ya_container.on('click', '.sub-filter li a', function (e) {
                        $container.fadeOut();

                        $('.filter-key.reset').hide();
                        $('.filter-key:last-of-type').show();

                        e.preventDefault();

                        $tax = [];

                        if ($(this).parents('li').hasClass('selected')) {
                                $('.filter-key').css('background-image', '');
                                $(this).parents('li').removeClass('selected');

                        } else {
                                
                                $(this).parents('li').removeClass('open').addClass('selected');

                        }

                        $current = $filter_ya_container.find('.sub-filter li.selected');

                        console.log($current);

                        $current.each(function () {
                                
                                $curr = {
                                        'term': $(this).find('a').attr('title'),
                                        'taxonomy': $(this).closest('ul.sub-filter').data('tax'),
                                        'name': $(this).find('a span').html(),
                                        'custom': $(this).find('a').data('url'),
                                        'title': $('.page-title').find('strong').html()
                                };

                                $tax.push($curr);
                        });


                            $title = $('.page-title').find('strong').html();

                            if($title == undefined) {
                                $title = 'Home';
                            }

                        
                        data = {
                                action: 'filter_posts',
                                afp_nonce: afp_vars.afp_nonce,
                                tax_details: $tax,
                                page_title: $title
                        };

                        $.ajax({
                                type: 'post',
                                dataType: 'html',
                                url: afp_vars.afp_ajax_url,
                                data: data,
                                timeout: 15000,
                                success: function (data, textStatus, XMLHttpRequest) {
                                        $container.html(data);
                                        $container.fadeIn();
                                        $('#ajax-load-more .alm-btn-wrap .more').hide();
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        console.log(XMLHttpRequest);
                                        console.log(textStatus);
                                        console.log(errorThrown);
                                        console.log('error');
                                        $container.html(data);
                                        //$container.fadeIn();
                                }
                        });

                        $(document).ajaxComplete(function () {
                                $container.masonry('destroy');
                                $container.masonry(masOptions);
                                $('.grid-item').addClass('loaded');
                        });

                });

                var masonryInit = true;
                $.fn.almComplete = function (alm) {

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

  	var $prev = $('.report-prev > a');
  	var $next = $('.report-next > a');
  	var $reportNavFirst = $('.report-nav li:first-child');
  	var $reportPanelFirst = $('#report-panel-1');
  	var $reportNav = $('.report-nav > li');
  	var $targetSection = window.location.hash;
  	var $container = $('.report-container');
    var $report = $('.report-single');

    $container.height($report).css('overflow','hidden');
  	
  	if($targetSection.length) {
  		$id = $targetSection.substr(1);
  		$('.report-nav li:not(.report)').each(function() {
  			if($(this).data('id') == $id) {
  				$(this).addClass('active');
  			}
	    });
	    $('.report-single').each(function() {
  			if($(this).data('id') == $id) {
  				$(this)
  					.addClass('current')
  					.transit({x:0,opacity:1}, 800, 'ease');
  				$('.report-single')
  					.not($(this))
					.transit({x:'100%',opacity:0}, 800, 'ease')
					.removeClass('current');
				var $height = $(this).height();
				$container.height($height + 210);
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
		var $height = $($href).height();
		$parent.transit({x:'-100%',opacity:0}, 800, 'ease').removeClass('current');
		$($href).transit({x:0,opacity:1}, 800, 'ease').addClass('current');
		$reportNav.removeClass('active');
		$reportNav.filter(function() {
			return $(this).data('id') === $theID + 1;
		}).addClass('active');
		window.location.hash = $theID + 1;
		e.preventDefault();
		$container.height($height + 210);
	});

	$prev.click(function(e) {
		var $href = $(this).attr('href');
		var $parent = $(this).parents('.report-single');
		var $theID  = $(this).parents('.report-single').data("id");
		var $height = $($href).height();
		$parent.transit({x:'100%',opacity:0}, 800, 'ease').removeClass('current');
		$($href).transit({x:0,opacity:1}, 800, 'ease').addClass('current');
		$reportNav.removeClass('active');
		$reportNav.filter(function() {
			return $(this).data('id') === $theID - 1;
		}).addClass('active');
		window.location.hash = $theID - 1;
		e.preventDefault();
		$container.height($height + 210);
	});

	$('.report-nav li:not(.full-report) a').click(function(e){
		var $href = $(this).attr('href');
		var $theID  = $($href).data("id");
		var $parent = $(this).parent('li');
		var $height = $($href).height();
		var $cur = window.location.hash;
		window.location.hash = $theID;
		
		$reportNav.removeClass('active');
		$parent.addClass('active');

		$($href)
			.nextUntil('span')
				.transit({x:'100%',opacity:0}, 800, 'ease')
				.removeClass('current');
		$($href)
			.prevUntil('span')
				.transit({x:'-100%',opacity:0}, 800, 'ease')
				.removeClass('current');

		$($href)
			.transit({x:0,opacity:1}, 800, 'ease')
			.addClass('current');

		
		/*if('#' + $parent.data("id") > $cur) {
			$($href)
				.next()
				.transit({x:'100%',opacity:0}, 800, 'ease').removeClass('current');
			$($href)
				.transit({x:0,opacity:1}, 800, 'ease')
				.addClass('current');
		} else if ('#' + $parent.data("id") < $cur) {
			$($href)
				.next()
				.transit({x:'-100%',opacity:0}, 800, 'ease').removeClass('current');
			$($href)
				.transit({x:0,opacity:1}, 800, 'ease')
				.addClass('current');
		}*/


		$container.height($height + 210);
		e.preventDefault();
	});

	$('.doc__module--item-link').click(function(e){
			var $href = $(this).attr('href');

			$($href)
				.nextUntil('span')
					.transit({x:'100%',opacity:0}, 800, 'ease')
					.removeClass('current');
			$($href)
				.prevUntil('span')
					.transit({x:'-100%',opacity:0}, 800, 'ease')
					.removeClass('current');

			$($href)
				.transit({x:0,opacity:1}, 800, 'ease')
				.addClass('current');

			
			/*if('#' + $parent.data("id") > $cur) {
				$($href)
					.next()
					.transit({x:'100%',opacity:0}, 800, 'ease').removeClass('current');
				$($href)
					.transit({x:0,opacity:1}, 800, 'ease')
					.addClass('current');
			} else if ('#' + $parent.data("id") < $cur) {
				$($href)
					.next()
					.transit({x:'-100%',opacity:0}, 800, 'ease').removeClass('current');
				$($href)
					.transit({x:0,opacity:1}, 800, 'ease')
					.addClass('current');
			}*/


			$container.height($height + 210);
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
var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$headerHeight = $('.banner');

  	//$('.collapse').collapse();

  	$('.panel-body .btn[href="#top"]').click(function(){
  		$('html, body').animate({scrollTop : 0},800);
		return false;
  	});

  	$('#accordion').on('shown.bs.collapse', function () {
  
	  var panel = $(this).find('.in').prevAll('.panel-heading');
	  
	  $('html, body').animate({
	        scrollTop: panel.offset().top - 100
	  }, 500);
	  
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

  CE.legacy = function() {

  	if (!Modernizr.csscalc) {
  		$('.hero-nav .hero-nav-color-block').css('color','white');
  	}

  };


})();
var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger, .main, .footer'),
  		$menu = $('.nav-full-screen'),
      $menuHeight = $menu.height(),
      $page = $('html'),
      $intViewportHeight = (window.innerHeight),
  		$body = $('body');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	//$body.addClass('faded').css('min-height',$intViewportHeight);
      $('.banner').css('display','none');
      $('.main, .footer').css('z-index','2').transit({opacity:0.2});
    	$closeTrigger.addClass('active');
      $('html, body').animate({scrollTop : 0},200);
      $('.main a,.footer a').click(function(e){
        //e.preventDefault();
      });
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
      $('.banner').css('display','');
      $('.main, .footer').css('z-index','').transit({opacity:1});
    	//$body.removeClass('faded').css('min-height','').css('overflow','');
      $page.css('min-height','');
      //$('.main a,.footer a').unbind('click');
    });


  };


})();
var CE = CE || {};

;(function() {

CE.readThisSlider = function() {

		$('.bx-slider').bxSlider({
	        maxSlides:3,
	        auto:false,
	        pager:false,
	        slideWidth:265,
	        slideMargin: 9,
	        infiniteLoop:false,
	        hideControlOnEnd:true
	      });

	};


})();
var CE = CE || {};

;(function() {

  CE.searchExpand = function() {

    var $searchInput = $('.js-expand-on-click');

    function resizeInput() {
    	if($(this).val().length > 15) {
    		$(this).css('min-width', ($(this).val().length * 5) + 207);
    	}
	}

	$searchInput
	    // event handler
	    .keyup(resizeInput)
	    // resize on page load
	    .each(resizeInput);


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
      var $sideNav = $('.side-nav li:not(.share)');
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

  CE.splashMessage = function() {

      var $signUpForm = $('.splash-message');
      var $close = $('.splash-message .close, body');
      var $closeCookie = $('.close-cookie');
      var $body = $('body');


    if (!$.cookie('cae_splash_mod')) {
        $signUpForm.addClass('active');
        $body.addClass('dimmed');
        $.cookie('cae_splash_mod', 'true', { expires: 30 });
    } else {
        $signUpForm.removeClass('active');
        $body.removeClass('dimmed');
    }

    $close.click(function() {
        $signUpForm.removeClass('active');
        $body.removeClass('dimmed');
    });

    $closeCookie.click(function() {
        $signUpForm.removeClass('active');
        $body.removeClass('dimmed');
        $.cookie('cae_splash_mod', 'true', { expires: 30 });
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
      $("#dnatl").html(html);
    },
    error: function(error) {
      $("#dnatl").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Oakland, CA',
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

CE.thumbnailNav = function() {

		var url = window.location.href;
		var $current = $('.sub-nav-thumbnail a[href="'+url+'"]');
		var $currentParent = $current.parent('li');
		var $previous = $currentParent.prevAll('li').children('a').attr('href');
		var $next = $currentParent.nextAll('li').children('a').attr('href');
		var $first = $('.nav.newsletters li.sub-nav-thumbnail a').attr('href');
		var $last = $('.nav.newsletters li:nth-of-type(5) a').attr('href');

		$currentParent.addClass('active');

		if($next !== '#') {
			$('.nav.newsletters li.pull-right a').attr('href',$next);
		} else {
			$('.nav.newsletters li.pull-right a').attr('href',$first);
		}

		if($previous !== '#') {
			$('.nav.newsletters li.pull-left a').attr('href',$previous);
		} else {
			$('.nav.newsletters li.pull-left a').attr('href',$last);
		}

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
      $('.js-popup').magnificPopup({type:'inline'});
      $('.wp-polls-ans ul li.poll--answer').click(function(){

        $('.wp-polls-ans ul li.poll--answer').removeClass('active');
        $('.wp-polls-ans ul li.poll--answer').children('input').attr('checked',false);

        $(this).children('input').attr('checked',true);
        $(this).addClass('active');
      });
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
