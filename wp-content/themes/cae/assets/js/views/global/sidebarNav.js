var CE = CE || {};

;(function() {

  CE.sidebarNav = function() {

    var $nav = $('.side-nav-container');
    var $container = $('.page-header.text-right .page-title').width();
    var $width = $(window).width();
    var $position = ($width - $container) / 2;
    var $sideNav = $('.side-nav li');

    if($sideNav.length) {
      $nav.css('left', $position + 15).transit({opacity:1});
      $nav.stickyNavbar({
        animateCSS: false
      });
    }

  };


})();