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

        

        $(document).foundation();

        $('.event-description').css('height', ($(window).height() - 100) + 'px');



        $('.event-image').each(function () {
            var self = this;
            var offset = ($(self).offset().top - 100);
            $(this).css('width', $(this).width() + 'px').css('height', ($(window).height() - 100) + 'px');
            // $(this).attr('data-' + ($(this).offset().top - 100), 'background-position: 0px 0px;');
            // $(this).attr('data-' + (($(this).offset().top - 100) + $(window).height()), 'background-position: 0px ' + ($(window).height() - 100) + 'px;');
        
            $(window).on('scroll', function () {
                if (offset < $(window).scrollTop()) {
                    $(self).css('position', 'fixed').css('top', '100px');
                } 

                if (offset > $(window).scrollTop()) {
                    $(self).css('position', 'relative').css('top', '0');
                }
            });

        });
        skrollr.init();

        function scrollToAnchor(hash) {
            $(document.body).animate({
            'scrollTop':   $('#' + hash ).offset().top - 87
            }, 2000);
        };



        $('body').css('height', 'auto');

    });
});
