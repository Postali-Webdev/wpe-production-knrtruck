/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
	$('#award-slider').slick({
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 1300,
		slidesToShow: 8,
		slidesToScroll: 1,
		arrows:true,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		accessibility: false,
		responsive: [ 
			{
				breakpoint: 993,
				settings: {
					slidesToShow: 4
				}
			},
			{
				breakpoint: 769,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 425,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

	$('.truck-grid').slick({
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 1300,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		infinite: false,
		responsive: [ 
			{
				breakpoint: 1400,
				settings: {
					slidesToShow: 3,
					dots: true
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					dots: true
				}
			},
			{
				breakpoint: 820,
				settings: {
					slidesToShow: 1,
					dots: true
				}
			}
		]
	});

	$('.injury-case-container').slick({
		autoplay: false,
		slidesToShow: 3,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		infinite: false,
		responsive: [ 
			{
				breakpoint: 1500,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 820,
				settings: {
					slidesToShow: 1,
				}
			}
		]
	});
	
});