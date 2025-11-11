jQuery( function ( $ ) {
	"use strict";

    $(window).scroll(function(){
        function elementScrolled(elem)
        {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            var elemTop = $(elem).offset().top;
            return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
        }
        
        if(elementScrolled('#footer-block')) {
            var els = $('.in-page'),
                i = 0,
                f = function () {
                    $(els[i++]).addClass('fade-out');
                    if(i < els.length) setTimeout(f, 400);
                };
            f();
        } else {
            $(".in-page").removeClass("fade-out");
        }
    });

    $(document).ready(function() {
        var OnPageNavPosition = $('.in-page-mobile').position().top;
        $(window).scroll(function() {
        if($(window).scrollTop() > (OnPageNavPosition - 75)) {
            $('.in-page-mobile').addClass('stick');
            $('.offset').addClass('active');
        } else {
            $('.in-page-mobile').removeClass('stick');
            $('.offset').removeClass('active');
        }
        });
    }); 

    $(function() {
		$(".expand").on( "click", function() {
			$(this).next().slideToggle(200);
			$('.icon-expand').toggleClass('clicked');
		});
	});

    $('.links > a').click(function() {
		$('.detail').slideToggle(200);
        $('.links > a').removeClass('active');
        $(this).toggleClass('active');
	});

    if (screen.width < 1025) {
        $('.icon-expand').addClass('clicked');
        
        $('.links > a').click(function() {
            $('.icon-expand').removeClass('clicked');
        });
    }


});