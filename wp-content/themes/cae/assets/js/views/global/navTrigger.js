var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger'),
  		$menu = $('.nav-full-screen'),
      $page = $('html'),
  		$body = $('body:after');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	$body.addClass('faded');
    	$closeTrigger.addClass('active');
      $('html,body').scrollTo(0,0);
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
    	$body.removeClass('faded');
      $page.css('min-height','');
    });


  };


})();