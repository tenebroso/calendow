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