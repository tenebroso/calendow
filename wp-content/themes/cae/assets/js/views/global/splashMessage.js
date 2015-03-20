var CE = CE || {};

;(function() {

  CE.splashMessage = function() {

      var $signUpForm = $('.splash-message');
      var $close = $('.splash-message .close, body');
      var $closeCookie = $('.close-cookie');
      var $body = $('body');


    if (!$.cookie('cae_splash_mod')) {
        $signUpForm.addClass('active');
        $body.addClass('dimmed');
        $.cookie('cae_splash_mod', 'true', { expires: 30 });
    } else {
        $signUpForm.removeClass('active');
        $body.removeClass('dimmed');
    }

    $close.click(function() {
        $signUpForm.removeClass('active');
        $body.removeClass('dimmed');
    });

    $closeCookie.click(function() {
        $signUpForm.removeClass('active');
        $body.removeClass('dimmed');
        $.cookie('cae_splash_mod', 'true', { expires: 30 });
    });

  };


})();