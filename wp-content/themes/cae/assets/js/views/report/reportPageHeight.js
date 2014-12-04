var CE = CE || {};

;(function() {

  CE.reportPageHeight = function() {


    var $container = $('.single-report .main');
    var $report = $('.report-single.current').height() + 210;

    $container.height($report).css('overflow','hidden');


  };


})();