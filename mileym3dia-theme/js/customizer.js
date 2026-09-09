/**
 * MILEYM3DIA Theme Customizer Preview JS
 */

(function($) {
    'use strict';

    // Site title
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });

    // Site description
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Hero eyebrow
    wp.customize('mileym3dia_hero_eyebrow', function(value) {
        value.bind(function(to) {
            $('.hero-eyebrow').text(to);
        });
    });

    // Hero headline 1
    wp.customize('mileym3dia_hero_headline_1', function(value) {
        value.bind(function(to) {
            $('.hero-headline-1').text(to);
        });
    });

    // Hero headline 2
    wp.customize('mileym3dia_hero_headline_2', function(value) {
        value.bind(function(to) {
            $('.hero-headline-2').text(to);
        });
    });

    // Hero description
    wp.customize('mileym3dia_hero_description', function(value) {
        value.bind(function(to) {
            $('.hero-description').text(to);
        });
    });

})(jQuery);
