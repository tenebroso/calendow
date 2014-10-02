var CE = CE || {};

;(function() {

  CE.headerParallax = function() {


		var sectionPhoto = ".page-header"

		if( $(window).scrollTop()<415 && $('html').hasClass('no-touch') ){
			$(window).scroll(function() {
				parallaxPosition = -($(window).scrollTop()/4);

				$(sectionPhoto)
				.find('.page-header-fixed')
				.css({top:parallaxPosition});
			});
		}

  };


})();