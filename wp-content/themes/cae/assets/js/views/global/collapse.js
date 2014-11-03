var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$('.collapse').collapse();

  	$('.panel-body .btn').click(function(){
  		$('html, body').animate({scrollTop : 0},800);
		return false;
  	});

  };


})();