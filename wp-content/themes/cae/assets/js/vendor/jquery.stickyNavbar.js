/*
 * stickyNavbar.js v1.1.3
 * https://github.com/jbutko/stickyNavbar.js
 * Fancy sticky navigation jQuery plugin with smart anchor links highlighting
 *
 * Developed and maintenained under MIT licence by Jozef Butko - www.jozefbutko.com
 * http://www.opensource.org/licenses/MIT

 * Original jquery-browser code Copyright 2005, 2014 jQuery Foundation, Inc. and other contributors
 * http://jquery.org/license
 *
 * CREDITS:
 * Daniel Eden for Animate.CSS:
 * http://daneden.github.io/animate.css/
 * jQuery easing plugin:
 * http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * COPYRIGHT (C) 2014 Jozef Butko
 * https://github.com/jbutko
 * LAST UPDATE: 20/09/2014
 *
 */
/* The semi-colon before function invocation is a safety net against concatenated
   scripts and/or other plugins which may not be closed properly. */
;
(function ($, window, document) {

    'use strict';

    $.fn.stickyNavbar = function (prop) {

        // Set default values
        var options = $.extend({
            activeClass: "active", // Class to be added to highlight nav elements
            sectionSelector: "scrollto", // Class of the section that is interconnected with nav links
            animDuration: 350, // Duration of jQuery animation as well as jQuery scrolling duration
            startAt: 0, // Stick the menu at XXXpx from the top of the this() (nav container)
            easing: "swing", // Easing type if jqueryEffects = true, use jQuery Easing plugin to extend easing types - gsgd.co.uk/sandbox/jquery/easing
            animateCSS: false, // AnimateCSS effect on/off
            animateCSSRepeat: false, // Repeat animation everytime user scrolls
            cssAnimation: "fadeInDown", // AnimateCSS class that will be added to selector
            jqueryEffects: false, // jQuery animation on/off
            jqueryAnim: "slideDown", // jQuery animation type: fadeIn, show or slideDown
            selector: "a", // Selector to which activeClass will be added, either "a" or "li"
            mobile: false, // If false, nav will not stick under viewport width of 480px (default) or user defined mobileWidth
            mobileWidth: 480, // The viewport width (without scrollbar) under which stickyNavbar will not be applied (due user usability on mobile)
            zindex: 9999, // The zindex value to apply to the element: default 9999, other option is "auto"
            stickyModeClass: "sticky", // Class that will be applied to 'this' in sticky mode
            unstickyModeClass: "unsticky" // Class that will be applied to 'this' in non-sticky mode
        }, prop),
            section = $('.' + options.sectionSelector);


        return this.each(function () {

            /* Cache variables */
            var $self = $(this),
                $selfPosition = $self.css("position"), // Initial position of this,
                $selfZindex = $self.css("zIndex"), // Z-index of this
                thisHeight = $self.outerHeight(true), // Height of navigation wrapper
                $selfScrollTop = $self.offset().top - thisHeight, // scrollTop position of this
                $topOffset = $self.css("top") === 'auto' ? 0 : $self.css("top"), // Top property of this: if not set = 0
                menuItems = options.selector === "a" ? $self.find('li a') : $self.find('li'), // Navigation lists or links
                menuItemsHref = $self.find('li a[href*=#]'), // href attributes of navigation links
                windowPosition = $(window).scrollTop();




            /* Smooth scrolling logic */
            menuItems.click(function(e) {
                /* v1.1.2: Ignore external links and just let them open - pull request #15 by Globegitter */
                var href = $(this).attr("href");
                if (href.substring(0, 4) === 'http' || href.substring(0, 7) === 'mailto:') {
                    return true;
                }

                windowPosition = $(window).scrollTop();

                /* Get index of clicked nav link */
                var index = menuItems.index(this),
                    section = href; // Get href attr of clicked nav link

                /* Prevent default click behaviour */
                e.preventDefault();


                $("html, body").stop().animate({
                    scrollTop: $(section).offset().top - 80 + 'px'
                }, {
                    duration: options.animDuration,
                    easing: options.easing
                });

            });


            /* v1.1.0: Main function, then on bottom called window.scroll, ready and resize */
            var mainFunc = function() {

                /* Cache window and window position from the top */
                var win = $(window),
                    windowPosition = win.scrollTop(),
                    windowWidth = win.width(),
                    windowHeight = win.height();

                /* v1.1.0: Optional mobileWidth */
                if (!options.mobile && windowWidth < options.mobileWidth) {
                    $self.css('position', $selfPosition);
                    return;
                }

                /* Everytime we scroll remove the activeClass. Later on we add it if needed. */
                menuItems.removeClass(options.activeClass);

                /* Add activeClass to the div that is passing the top of the window */
                section.each(function () {
                    var top = $(this).offset().top - thisHeight,
                        bottom = $(this).outerHeight(true) + top;

                    if ((windowPosition >= top) && (windowPosition <= bottom)) {
                        if (options.selector === "a") {
                            $self.find('li a[href~="#' + this.id + '"]').addClass(options.activeClass);
                        } else {
                            $self.find('li a[href~="#' + this.id + '"]').parent().addClass(options.activeClass);
                        }
                    }
                });

            }

            $(window).scroll(mainFunc); // scroll fn end
            $(window).ready(mainFunc);
            $(window).resize(mainFunc);

        }); // return this.each end
    }; // $.fn.stickyNavbar end
})(jQuery, window, document); // document ready end