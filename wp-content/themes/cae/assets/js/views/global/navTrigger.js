var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger'),
  		$menu = $('.nav-full-screen'),
      $page = $('html'),
      $intViewportHeight = window.innerHeight;
  		$body = $('body');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	$body.addClass('faded').css('min-height',$intViewportHeight);
    	$closeTrigger.addClass('active');
      $("html, body").stop().animate({
          scrollTop: $(window).top + 5 + 'px'
      });
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
    	$body.removeClass('faded').css('min-height','');
      $page.css('min-height','');
    });


  };


})();