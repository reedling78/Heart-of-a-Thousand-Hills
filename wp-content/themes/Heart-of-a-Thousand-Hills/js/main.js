/*globals window, document, define, $, Backbone, console, Modernizr, require, alert*/



require.config({
    paths: {
        'router': '../bower_components/requirejs-router/router'
    }
});

require(['router', 'modules/eastereggs'], function (router, EasterEggs) {
    'use strict';

    router
        .registerRoutes({
            // matches an exact path
            home: {
                path: '/',
                moduleId: 'views/default'
            },

            // matches using a wildcard
            customer: {
                path: '/customer/*',
                moduleId: 'customer/customerView'
            },

            // matches using a path variable
            order: {
                path: '/orders/:id',
                moduleId: 'order/orderView'
            },

            // matches a pattern like '/word/number'
            regex: {
                path: /^\/\w+\/\d+$/i,
                moduleId: 'regex/regexView'
            },

            // matches everything else
            notFound: {
                path: '*',
                moduleId: 'views/notfound'
            }
        })
        .on('routeload', function (Module, routeArguments) {
            EasterEggs.listen();
        })
        .init(); // Set up event handlers and trigger the initial page load
});
