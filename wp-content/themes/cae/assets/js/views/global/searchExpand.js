var CE = CE || {};

;(function() {

  CE.searchExpand = function() {

    var $searchInput = $('.js-expand-on-click');

    function resizeInput() {
    	if($(this).val().length > 15) {
    		$(this).css('min-width', ($(this).val().length * 5) + 207);
    	}
	}

	$searchInput
	    // event handler
	    .keyup(resizeInput)
	    // resize on page load
	    .each(resizeInput);


  };


})();