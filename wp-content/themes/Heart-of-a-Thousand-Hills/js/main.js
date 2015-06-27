/*globals window, document, define, $, Backbone, console, Modernizr, require, alert*/



require.config({
    paths: {
        'router': '../bower_components/requirejs-router/router',
        'jquery': '../bower_components/jquery/dist/jquery',
        'skrollr': '../bower_components/skrollr/src/skrollr',
        'foundation': '../bower_components/foundation/js/foundation',
        'gridder': '../gridder/js/jquery.gridder'

    }
});
require(['jquery'], function (skrollr) {
    require(['skrollr', 'foundation', 'gridder'], function (skrollr) {
        'use strict';

        var scrollTop = $(window).scrollTop();

        $(document).foundation();


        $(document).on('close.fndtn.reveal', '[data-reveal]', function () {
          $('body').removeClass('modal');
            $('body').scrollTop(scrollTop);
            clearInterval(formtimer);
        });

        $(document).on('opened.fndtn.reveal', '[data-reveal]', function () {
            if($(window).scrollTop() !== 0){
                scrollTop = $(window).scrollTop();
            }
          $('body').addClass('modal');
        });

        var formtimer;

        $('[data-reveal-id]').on('click', function () {
            formtimer = setInterval(function(){
                if($('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')){
                    setTimeout(function(){
                        $('#ContentForm').foundation('reveal', 'close');
                    }, 2000);
                }
            }, 1000);

            // $(window).on('keydown', function(e){
            //     console.log(e.keyCode);
            // });

            $.ajax({
                type: 'post',
                url: window.location.href + '/wp-admin/admin-ajax.php',
                data: {
                    action: 'RequestPost',
                    postId: $(this).data("postId"),
                },
                success: function(data, textStatus, XMLHttpRequest){
                    if(data.success){
                        var post = data.post;
                        $('div[data-post-date]').html(post.postDate);
                        $('h2[data-post-title]').html(post.title);
                        $('div[data-post-content').html(post.content);
                        if(post.postImageURL != null){
                            $('img[data-blog-image]').attr('src', post.postImageURL);
                            $('img[data-blog-image]').attr('alt', 'header image');
                            $('img[data-blog-image]').show();
                        }
                        else{
                            $('img[data-blog-image]').hide();
                        }
                    }
                    else{
                        $('body').removeClass('modal'); 
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                }
            });
        });

        $('.close-reveal-modal').on('click', function(){
            
        });

        $('.wpcf7-form input[type="text"]').each(function(){
            $('<label>' + $(this).attr('placeholder') + '</label>').insertBefore(this);
            $(this).on('keyup', function () {
                if ($(this).val().length !== 0) {
                    $(this).prev().fadeIn();
                } else {
                    $(this).prev().fadeOut();
                }
            });

        });
        

        $('.event-image').each(function () {
            var self = this;
            var offset = $(self).offset().top;
            
            $(window).on('resize', function(){
                if($(window).width() > 1023){
                    $(self).css('height', $(window).height() + 'px').css('width', $(self).width() + 'px');
                    $(self).parents('.row').css('height', $(window).height() + 'px').css('overflow', 'hidden');
                } else {
                    $(self).css('width', 'auto').css('height', 'auto');
                }
                if($(window).height() < 800) {
                    $('.event-description').css('padding-top', '80px');
                } else {
                    $('.event-description').css('padding-top', '145px');
                }
            });
            if($(window).width() > 1024){
                $(self).css('height', $(window).height() + 'px').css('width', $(self).width() + 'px');
                $(self).parents('.row').css('height', $(window).height() + 'px').css('overflow', 'hidden');
            } else {
                $(self).css('width', 'auto').css('height', 'auto');
            }

            if($(window).height() < 800) {
                    $('.event-description').css('padding-top', '80px');
                } else {
                    $('.event-description').css('padding-top', '145px');
                }
            

            $(window).on('scroll', function () {
                if($(window).width() > 1024){
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
            if (hash){
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

            if ($(this).attr('href').replace('#', '') !== 'Donate') {
                $(this).addClass('selected');
            }
            

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

        $('.blog-list').on('click', 'a.blog-page' ,function(event){ 
            event.preventDefault();

            $.ajax({
                type: 'post',
                url: window.location.href + '/wp-admin/admin-ajax.php',
                data: {
                    action: 'RequestPosts',
                    page: $(this).data("currentPage"),
                    postsKey: $(this).data('postKey'),
                    requestedYear: $(this).data('requestedYear')
                },
                success: function(data, textStatus, XMLHttpRequest){
                    $('.blog-list').html(data.html);
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                }
            });
        });


        $('.gridder').gridderExpander({
            scroll: true,
            scrollOffset: 200,
            scrollTo: "panel",                  // panel or listitem
            animationSpeed: 400,
            animationEasing: "easeInOutExpo",
            showNav: false,                      // Show Navigation
            nextText: "Next",                   // Next button text
            prevText: "Previous",               // Previous button text
            closeText: "Close",                 // Close button text
            onStart: function(){
                //Gridder Inititialized
            },
            onContent: function(){
                //Gridder Content Loaded
            },
            onClosed: function(){
                //Gridder Closed
            }
        });






    });
});