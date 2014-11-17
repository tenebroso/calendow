var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger'),
  		$menu = $('.nav-full-screen'),
      $menuHeight = $menu.height();
      $page = $('html'),
      $intViewportHeight = window.innerHeight;
  		$body = $('body');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	$body.addClass('faded').css('max-height',$menuHeight).css('overflow','hidden');
    	$closeTrigger.addClass('active');
      $('html, body').animate({scrollTop : 0},200);
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
    	$body.removeClass('faded').css('min-height','').css('overflow','');
      $page.css('min-height','');
    });


  };


})();