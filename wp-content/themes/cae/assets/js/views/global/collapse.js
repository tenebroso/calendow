var CE = CE || {};

;(function() {

  CE.collapse = function() {

  	$('.collapse').collapse();

  	$('.panel-body .btn').click(function(e){
  		$("html,body").animate({
	          scrollTop: $(window).top + 25 + 'px',
	      }, 1000);
  		e.preventDefault;
  	});

  };


})();