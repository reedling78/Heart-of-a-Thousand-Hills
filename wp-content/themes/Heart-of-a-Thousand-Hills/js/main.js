/*globals window, document, define, $, Backbone, console, Modernizr, require, alert*/



require.config({
    paths: {
        'router': '../bower_components/requirejs-router/router',
        'jquery': '../bower_components/jquery/dist/jquery',
        'skrollr': '../bower_components/skrollr/src/skrollr',
        'foundation': '../bower_components/foundation/js/foundation'

    }
});
require(['jquery'], function (skrollr) {
    require(['skrollr', 'foundation'], function (skrollr) {
        'use strict';

        skrollr.init();

        $(document).foundation();


        console.log($(window).height());

        $('.event-image').css('height', $(window).height() + 'px');

    });
});
