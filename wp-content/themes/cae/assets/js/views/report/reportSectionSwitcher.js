var CE = CE || {};

;(function() {

  CE.reportSectionSwitcher = function() {

  	var $prev = $('.report-prev > a');
  	var $next = $('.report-next > a');
  	var $reportNavFirst = $('.report-nav li:first-child');
  	var $reportPanelFirst = $('#report-panel-1');
  	var $reportNav = $('.report-nav > li');
  	var $targetSection = window.location.hash;
  	
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
		$parent.transit({x:'-100%',opacity:0}, 800, 'ease').removeClass('current');
		$($href).transit({x:0,opacity:1}, 800, 'ease').addClass('current');
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
		$parent.transit({x:'100%',opacity:0}, 800, 'ease').removeClass('current');
		$($href).transit({x:0,opacity:1}, 800, 'ease').addClass('current');
		$reportNav.removeClass('active');
		$reportNav.filter(function() {
			return $(this).data('id') === $theID - 1;
		}).addClass('active');
		window.location.hash = $theID - 1;
		e.preventDefault();
	});

	$('.report-nav li:not(.full-report) a').click(function(e){
		var $href = $(this).attr('href');
		var $theID  = $($href).data("id");
		var $parent = $(this).parent('li');
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