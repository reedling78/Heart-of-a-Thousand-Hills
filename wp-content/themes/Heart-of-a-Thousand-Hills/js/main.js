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


        

        $('.event-image').each(function () {
            var self = this;
            var offset = $(self).offset().top;
            
            $(window).on('resize', function(){
                if($(window).width() > 1023){
                    $(self).css('height', $(window).height() + 'px').css('width', $(self).width() + 'px');
                    $(self).parents('.row').css('height', $(window).height() + 'px');
                } else {
                    $(self).css('width', 'auto').css('height', 'auto');
                }
            });
            if($(window).width() > 1023){
                $(self).css('height', $(window).height() + 'px').css('width', $(self).width() + 'px');
                $(self).parents('.row').css('height', $(window).height() + 'px');
            } else {
                $(self).css('width', 'auto').css('height', 'auto');
            }
            

            $(window).on('scroll', function () {
                if($(window).width() > 1023){
                    if (offset < $(window).scrollTop()) {
                        $(self).css('position', 'fixed').css('top', '0');
                    } 

                    if (offset > $(window).scrollTop()) {
                        $(self).css('position', 'relative').css('top', '0');
                    }
                }
                
            });

        });

        function scrollToAnchor(hash) {
            if(hash){
                $(document.body).animate({
                'scrollTop':   $('#' + hash ).offset().top - 87
                }, 2000);
            } else {
                $(document.body).animate({ 'scrollTop':   0 }, 2000);
            }
        };

        $('.site-menu a, .clicker').on('click', function(e) {
            $('.off-canvas-wrap').foundation('offcanvas', 'hide', 'move-right');

            $('.site-menu a, .clicker').removeClass('selected');
            $(this).addClass('selected');

            window.history.pushState("object or string", $(this).attr('href').replace('#', ''), $(this).attr('href'));
            
            if(window.location.hash != ''){
                scrollToAnchor($(this).attr('href').replace('#', ''));
            } else {
                scrollToAnchor();
            }
            
            e.preventDefault();

        });

        $('body').css('height', 'auto');


        // Yellow hill hack
        $(window).on('resize', function(){
            $('.yellow-hill').css('width', $('body').width());
            $('.yellow-hill').parent().css('top', '-' + ($('.yellow-hill').height() - 1) + 'px');
        });
        $('.yellow-hill').css('width', $('body').width());
        $('.yellow-hill').parent().css('top', '-' + ($('.yellow-hill').height() - 1) + 'px');



        // Off Canvas
        $('.left-off-canvas-toggle').on('click', function(){
            $(document.body).animate({ 'scrollTop':   0 }, 1000);
            setTimeout(function(){
                $('.off-canvas-wrap.move-right .inner-wrap').on('click', function(e){
                    if(!$(e.target).hasClass('left-off-canvas-menu') &&
                        $(e.target).parents('.left-off-canvas-menu').length === 0){
                        $('.off-canvas-wrap').foundation('offcanvas', 'hide', 'move-right');
                        $(this).unbind('click');
                    }  
                });
            }, 500);            
        });


        
    });
});
