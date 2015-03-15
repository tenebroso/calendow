var CE = CE || {};

;(function() {

  CE.splashMessage = function() {

      var $signUpForm = $('.splash-message');
      var $close = $('.splash-message .close, body');
      var $closeCookie = $('.close-cookie');
      var $body = $('body');


    if (!$.cookie('cae_splash_modal_cookie')) {
        $body.addClass('dimmed');
        $.cookie('cae_splash_modal_cookie', 'true', { expires: 30 });
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
        $.cookie('cae_splash_modal_cookie', 'true', { expires: 30 });
    });

  };


})();