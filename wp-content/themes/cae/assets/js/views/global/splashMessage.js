var CE = CE || {};

;(function() {

  CE.splashMessage = function() {

  	var $signUpForm = $('.splash-message');
  	var $close = $('.splash-message .close');
  	var $closeCookie = $('.close-cookie');
  	var $body = $('body');


	if (!$.cookie('cae_splash_v41')) {
		$body.addClass('dimmed');
		$.cookie('cae_splash_v41', 'true', { expires: 30 });
	} else {
		$signUpForm.remove();
		$body.removeClass('dimmed');
	}

	$close.click(function() {
		$signUpForm.remove();
		$body.removeClass('dimmed');
	});

	$closeCookie.click(function() {
		$signUpForm.remove();
		$body.removeClass('dimmed');
		$.cookie('cae_splash_v41', 'true', { expires: 30 });
	});

  };


})();