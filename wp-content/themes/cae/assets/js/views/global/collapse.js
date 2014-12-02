var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$headerHeight = $('.banner');

  	//$('.collapse').collapse();

  	$('.panel-body .btn').click(function(){
  		$('html, body').animate({scrollTop : 0},800);
		return false;
  	});

  	$('#accordion').on('shown.bs.collapse', function () {
  
	  var panel = $(this).find('.in').prevAll('.panel-heading');
	  
	  $('html, body').animate({
	        scrollTop: panel.offset().top
	  }, 500);
	  
	});

  };


})();