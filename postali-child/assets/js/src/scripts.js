/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
	var windowWidth = $(document).outerWidth();

    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#menu-main-menu').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu').slideToggle(400);
		$('body').toggleClass('disable');
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu').slideUp(400);
	});	

    $('.cta-close').click(function() {
        $('.cta-follower').addClass('closed');
    });

	//Mobile menu accordion toggle for sub pages
	$('#menu-main-menu > li.menu-item-has-children, #menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-icon-chevron-right"></span></span></div>');
	if( windowWidth < 992 ) {
		$('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').css('display', 'none');
	}
	$('#menu-main-menu > .menu-item-has-children').click(function(e) {
		if( windowWidth < 992 ) {
			var target = e.target;
			if(  $(target).closest('ul.sub-menu').length ) {
				$(target).find('> ul.sub-menu').slideToggle(400);
				$(target).find('.accordion-toggle').toggleClass('toggle-background');
				$(target).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
			} else {
				$(this).find('> ul.sub-menu').slideToggle(400);
				$(this).find('> .accordion-toggle').toggleClass('toggle-background');
				$(this).find('> .icon-icon-chevron-right').toggleClass('toggle-rotate');
			}
		}
	});

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

    // add class to header on scroll for practice area pages
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 150) {
            $("header").addClass("scrolled");
        } else {
            $("header").removeClass("scrolled");
        }
    });


	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#menu-main-menu li.menu-item').addClass('disable');
						$('.form-control').focus();
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

	// highlight links function
	$(document).ready(function() {
		function highlight() {
			var scroll = $(window).scrollTop();
			var height = $(window).height();
			
			// exclude highligh effect from homepage
			if( !$('.page-template-front-page').length ) {
				$("p > a, a.highlight > a, li > a, a").each(function(){
					var pos = $(this).offset().top;
					if (scroll+height >= pos && !$(this).hasClass('ignore-highlight') && !$('.page-template-page-sitemap').length ) {
						$(this).addClass("active");
					} 
				});
			}
		}
		highlight();
		$(window).on("scroll", function(){
			highlight();
		});
	});

	$(document).ready(function() {
		if( $('.expand-categories').length ) {
			$('.expand-categories').on('click', function() {
				$('.overflow-filters-container').slideToggle('fast', function() {
					if ($(this).is(':visible'))
					$(this).css('display','flex');
				});
				$(this).toggleClass('active');
			});
		}
	});

	// apply inner link to entire parent element
	$(document).ready(function() {
		$('.link-finder').on('click', function() {
			var link = $(this).find('a:not(.category-link').attr('href');
			window.location.href = link;
		});
	});

	//results & testimonials toggle
	$(document).ready(function() {
		$('.filter-btn').on('click', function() {
			var $filter = $(this).data('view');
			
			$('.filter-btn').each(function(index, item) {
				$(item).toggleClass('active');
			});

			if( $filter == 'testimonial-wrapper' && $('.testimonial-wrapper').css('display') == 'none') {
				$('.testimonial-wrapper').css('display', 'flex');
				$('.result-wrapper').css('display', 'none');
			}
			
			if( $filter == 'result-wrapper' && $('.result-wrapper').css('display') == 'none') {
				$('.result-wrapper').css('display', 'flex');
				$('.testimonial-wrapper').css('display', 'none');
			}
		});
	});

});