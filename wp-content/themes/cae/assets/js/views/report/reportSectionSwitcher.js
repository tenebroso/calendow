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
		window.location.hash = $theID + 1;
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
		window.location.hash = $theID - 1;
		e.preventDefault();
	});

	$("body").keydown(function(e) {
		if(e.which == 37) { // left     
			$prev.trigger("click");
		}
		else if(e.which == 39) { // right     
			$next.trigger("click");
		}
	});

  };


})();