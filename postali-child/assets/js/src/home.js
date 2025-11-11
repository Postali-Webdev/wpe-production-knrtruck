/**
 * Home Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */

// show & hide banner truck
jQuery(document).ready(function() {
    jQuery(window).scroll(function() {

        if (jQuery(window).width() >= 1025) {
            if (jQuery(this).scrollTop() > 800) {
                jQuery('#truck-banner').addClass('hide');
            } else {
                jQuery('#truck-banner').removeClass('hide');
            }
        } else {
            if (jQuery(this).scrollTop() > 900) {
                jQuery('#truck-banner').addClass('hide');
            } else {
                jQuery('#truck-banner').removeClass('hide');
            }
        }
        
    });
});



// show & hide first truck
jQuery(document).ready(function() {
    var targetElement = jQuery('#truck-1'); // Element to which the class will be added
    var className = 'show'; // Class to add when hp-panel-3 is in view

    function isElementInView(element) {
        var elementTop = element.offset().top;
        var elementBottom = elementTop + element.outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkElementInView() {
        var hpPanel3 = jQuery('#hp-panel-3');
        if (isElementInView(hpPanel3)) {
            targetElement.addClass(className);
        } else {
            targetElement.removeClass(className);
        }
    }

    // Check if the element is in view on page load
    checkElementInView();

    // Check if the element is in view on scroll
    jQuery(window).on('scroll', function() {
        checkElementInView();
    });
});


// show & hide second truck
jQuery(document).ready(function() {
    var targetElement = jQuery('#truck-2'); // Element to which the class will be added
    var className = 'show'; // Class to add when hp-panel-3 is in view

    function isElementInView(element) {
        var elementTop = element.offset().top;
        var elementBottom = elementTop + element.outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkElementInView() {
        var hpPanel3 = jQuery('#hp-panel-5');
        if (isElementInView(hpPanel3)) {
            targetElement.addClass(className);
        } else {
            targetElement.removeClass(className);
        }
    }

    // Check if the element is in view on page load
    checkElementInView();

    // Check if the element is in view on scroll
    jQuery(window).on('scroll', function() {
        checkElementInView();
    });
});


// show & hide third truck
jQuery(document).ready(function() {
    var targetElement = jQuery('#truck-3'); // Element to which the class will be added
    var className = 'show'; // Class to add when hp-panel-3 is in view

    function isElementInView(element) {
        var elementTop = element.offset().top;
        var elementBottom = elementTop + element.outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkElementInView() {
        var hpPanel3 = jQuery('#hp-panel-8');
        if (isElementInView(hpPanel3)) {
            targetElement.addClass(className);
        } else {
            targetElement.removeClass(className);
        }
    }

    // Check if the element is in view on page load
    checkElementInView();

    // Check if the element is in view on scroll
    jQuery(window).on('scroll', function() {
        checkElementInView();
    });
});


// detect proximity of first truck and accident
jQuery(document).ready(function() {
    var isScrollingPaused = false;
    var hasPausedOnce = false; // Flag to track if the pause has already occurred
    var pauseDuration = 2000; // Duration in milliseconds to pause scrolling

    if (jQuery(window).width() >= 1025) {
        var distanceThreshold1 = 250; // Distance in pixels to trigger the pause
    } else if (jQuery(window).width() <= 1024 && (jQuery(window).width() >= 820)) {
        var distanceThreshold1 = 470;
    } else if (jQuery(window).width() <= 819 && (jQuery(window).width() >= 601)) {
        var distanceThreshold1 = 390; // Distance in pixels to trigger the pause
    } else {
        var distanceThreshold1 = 300; // Distance in pixels to trigger the pause
    }

    var truckIcon = jQuery('#truck-1');
    var accidentIcon = jQuery('.accident-icon');

    function calculateDistance(elem1, elem2) {
        var e1Rect = elem1[0].getBoundingClientRect();
        var e2Rect = elem2[0].getBoundingClientRect();
        var dx = (e1Rect.left + (e1Rect.right - e1Rect.left) / 2) - (e2Rect.left + (e2Rect.right - e2Rect.left) / 2);
        var dy = (e1Rect.top + (e1Rect.bottom - e1Rect.top) / 2) - (e2Rect.top + (e2Rect.bottom - e2Rect.top) / 2);
        return Math.sqrt(dx * dx + dy * dy);
    }

    jQuery(window).on('scroll', function() {
        if (isScrollingPaused || hasPausedOnce) return;

        var distance = calculateDistance(truckIcon, accidentIcon);

        if (distance <= distanceThreshold1) {
            
            isScrollingPaused = true;
            jQuery('html, body').addClass('noscroll'); // Disable scrolling
            jQuery(document).on('touchmove', function(e){ 
                //prevent native touch activity like scrolling
                e.preventDefault(); 
            });
            jQuery('.alert').addClass('fadeup');
            jQuery('.attorney').addClass('fadeup');

            jQuery(function(o) {
                "use strict";
                var n = 0;
                var t = o("#counter").offset().top - window.innerHeight;
                0 == n && o(window).scrollTop() > t && (o(".counter-value").each(function() {
                    var t = o(this),
                        n = t.attr("data-count");
                    o({
                        countNum: t.text()
                    }).animate({
                        countNum: n
                    }, {
                        duration: 4e3,
                        easing: "swing",
                        step: function() {
                            t.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            t.text(this.countNum);
                        }
                    });
                }), n = 1);
            });

            setTimeout(function() {
                jQuery('html, body').removeClass('noscroll'); // Enable scrolling
                isScrollingPaused = false;
                hasPausedOnce = true; // Set the flag to true after the first pause

                // Listen for user scroll after pause
                jQuery(window).one('scroll', function() {
                    jQuery('.accident-icon').addClass('fadeout');
                });

            }, pauseDuration);
        }
    });
});


// detect proximity of second truck and accident
jQuery(document).ready(function() {
    var isScrollingPaused = false;
    var hasPausedOnce = false; // Flag to track if the pause has already occurred
    var pauseDuration = 2000; // Duration in milliseconds to pause scrolling

    if (jQuery(window).width() >= 1025) {
        var distanceThreshold2 = 280; // Distance in pixels to trigger the pause
    } else if (jQuery(window).width() <= 1024 && (jQuery(window).width() >= 820)) {
        var distanceThreshold2 = 550;
    } else if (jQuery(window).width() <= 819 && (jQuery(window).width() >= 601)) {
        var distanceThreshold2 = 460; // Distance in pixels to trigger the pause
    } else {
        var distanceThreshold2 = 300; // Distance in pixels to trigger the pause
    }

    var truckIcon = jQuery('#truck-2');
    var carIcon = jQuery('#car-2');

    function calculateDistance(elem1, elem2) {
        var e1Rect = elem1[0].getBoundingClientRect();
        var e2Rect = elem2[0].getBoundingClientRect();
        var dx = (e1Rect.left + (e1Rect.right - e1Rect.left) / 2) - (e2Rect.left + (e2Rect.right - e2Rect.left) / 2);
        var dy = (e1Rect.top + (e1Rect.bottom - e1Rect.top) / 2) - (e2Rect.top + (e2Rect.bottom - e2Rect.top) / 2);
        return Math.sqrt(dx * dx + dy * dy);
    }

    jQuery(window).on('scroll', function() {
        if (isScrollingPaused || hasPausedOnce) return;

        var distance = calculateDistance(truckIcon, carIcon);

        if (distance <= distanceThreshold2) {
            
            isScrollingPaused = true;
            jQuery('html, body').addClass('noscroll'); // Disable scrolling
            jQuery(document).on('touchmove', function(e){ 
                //prevent native touch activity like scrolling
                e.preventDefault(); 
            });
            jQuery('.alert-2').addClass('fadeup');
            jQuery('.half-donut-chart').addClass('fadeup');
            jQuery('.half-donut-chart').find('.half-donut-fill').addClass('animate');

            jQuery(function(p) {
                "use strict";
                var i = 0;
                var j = p("#counter2").offset().top - window.innerHeight;
                0 == i && p(window).scrollTop() > j && (p(".counter-value2").each(function() {
                    var j = p(this),
                        i = j.attr("data-count");
                    p({
                        countNum: j.text()
                    }).animate({
                        countNum: i
                    }, {
                        duration: 4e3,
                        easing: "swing",
                        step: function() {
                            j.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            j.text(this.countNum);
                        }
                    });
                }), i = 1);
            });

            setTimeout(function() {
                jQuery('html, body').removeClass('noscroll'); // Disable scrolling
                isScrollingPaused = false;
                hasPausedOnce = true; // Set the flag to true after the first pause

                // Listen for user scroll after pause
                jQuery(window).one('scroll', function() {
                    jQuery('#car-2').addClass('fadeout');
                });

            }, pauseDuration);
        }
    });
});

// detect proximity of third truck and accident
jQuery(document).ready(function() {
    var isScrollingPaused = false;
    var hasPausedOnce = false; // Flag to track if the pause has already occurred
    var pauseDuration = 2000; // Duration in milliseconds to pause scrolling

    if (jQuery(window).width() >= 1025) {
        var distanceThreshold3 = 160; // Distance in pixels to trigger the pause
    } else if (jQuery(window).width() <= 1024 && (jQuery(window).width() >= 820)) {
        var distanceThreshold3 = 400;
    } else if (jQuery(window).width() <= 819 && (jQuery(window).width() >= 601)) {
        var distanceThreshold3 = 300; // Distance in pixels to trigger the pause
    } else {
        var distanceThreshold3 = 160; // Distance in pixels to trigger the pause
    }

    var truckIcon = jQuery('#truck-3');
    var carIcon = jQuery('#text');

    function calculateDistance(elem1, elem2) {
        var e1Rect = elem1[0].getBoundingClientRect();
        var e2Rect = elem2[0].getBoundingClientRect();
        var dx = (e1Rect.left + (e1Rect.right - e1Rect.left) / 2) - (e2Rect.left + (e2Rect.right - e2Rect.left) / 2);
        var dy = (e1Rect.top + (e1Rect.bottom - e1Rect.top) / 2) - (e2Rect.top + (e2Rect.bottom - e2Rect.top) / 2);
        return Math.sqrt(dx * dx + dy * dy);
    }

    jQuery(window).on('scroll', function() {
        if (isScrollingPaused || hasPausedOnce) return;

        var distance = calculateDistance(truckIcon, carIcon);

        if (distance <= distanceThreshold3) {
            
            isScrollingPaused = true;
            jQuery('html, body').addClass('noscroll'); // Disable scrolling
            jQuery(document).on('touchmove', function(e){ 
                //prevent native touch activity like scrolling
                e.preventDefault(); 
            });
            jQuery('.text-icon').addClass('fadeup');
            jQuery('.bar-one .bar').addClass('fadeup');
            jQuery('.bar-two .bar').addClass('fadeup');

            jQuery(function(b) {
                "use strict";
                var c = 0;
                var d = b("#counter3").offset().top - window.innerHeight;
                0 == c && b(window).scrollTop() > d && (b(".counter-value3").each(function() {
                    var d = b(this),
                        c = d.attr("data-count");
                    b({
                        countNum: d.text()
                    }).animate({
                        countNum: c
                    }, {
                        duration: 4e3,
                        easing: "swing",
                        step: function() {
                            d.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            d.text(this.countNum);
                        }
                    });
                }), c = 1);

                setTimeout(function() {
                    jQuery('html, body').removeClass('noscroll'); // Disable scrolling
                    isScrollingPaused = false;
                    hasPausedOnce = true; // Set the flag to true after the first pause

                    // Listen for user scroll after pause
                    jQuery(window).one('scroll', function() {
                        jQuery('#text').addClass('fadeout');
                    });
    
                }, pauseDuration);
            });
        }
    });
});