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