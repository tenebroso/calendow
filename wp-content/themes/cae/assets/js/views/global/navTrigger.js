var CE = CE || {};

;(function() {

  CE.navTrigger = function() {

  	var $openTrigger = $('.js-nav-open-trigger'),
  		$closeTrigger = $('.js-nav-close-trigger, .main, .footer'),
  		$menu = $('.nav-full-screen'),
      $menuHeight = $menu.height();
      $page = $('html'),
      $intViewportHeight = window.innerHeight;
  		$body = $('body');

    $openTrigger.click(function(){
    	$menu.addClass('opened');
    	//$body.addClass('faded').css('min-height',$intViewportHeight);
      $('.banner').css('display','none');
      $('.main, .footer').css('z-index','2').transit({opacity:0.2});
    	$closeTrigger.addClass('active');
      $('html, body').animate({scrollTop : 0},200);
      $('.main a,.footer a').click(function(e){
        e.preventDefault();
      });
    });

    $closeTrigger.click(function(){
    	$(this).removeClass('active');
    	$menu.removeClass('opened');
      $('.banner').css('display','');
      $('.main, .footer').css('z-index','').transit({opacity:1});
    	//$body.removeClass('faded').css('min-height','').css('overflow','');
      $page.css('min-height','');
      $('.main a,.footer a').unbind('click');
    });


  };


})();