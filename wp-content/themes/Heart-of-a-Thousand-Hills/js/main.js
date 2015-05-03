/*globals window, document, define, $, Backbone, console, Modernizr, require, alert*/



require.config({
    paths: {
        'router': '../bower_components/requirejs-router/router',
        'jquery': '../bower_components/jquery/dist/jquery',
        'skrollr': '../bower_components/skrollr/src/skrollr'
    }
});

require(['skrollr', 'jquery'], function (skrollr) {
    'use strict';

    skrollr.init();


});
