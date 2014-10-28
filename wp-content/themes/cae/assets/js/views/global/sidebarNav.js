var CE = CE || {};

;(function() {

  CE.sidebarNav = function() {

    

    function resize() {
      var $nav = $('.side-nav-container');
      var $container = $('.container').width();
      var $width = $(window).width();
      var $position = ($width - $container) / 2;
      var $sideNav = $('.side-nav li');
      if($sideNav.length && $width > 992) {
        $nav.css('left', $position).transit({opacity:1});
        $nav.stickyNavbar({
          animateCSS: false
        });
      } else {
        $nav.transit({opacity:0});
      }
    }

    resize();
    

    window.onresize = resize;

  };


})();