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

/*! modernizr 3.0.0-alpha.3 (Custom Build) | MIT *
 * http://v3.modernizr.com/download/#-videoautoplay !*/
!function(A,e){function o(A){var e=R.className,o=Modernizr._config.classPrefix||"";if(Modernizr._config.enableJSClass){var n=new RegExp("(^|\\s)"+o+"no-js(\\s|$)");e=e.replace(n,"$1"+o+"js$2")}Modernizr._config.enableClasses&&(e+=" "+o+A.join(" "+o),R.className=e)}function n(A,e){return typeof A===e}function t(){var A,e,o,t,a,l,R;for(var E in c){if(A=[],e=c[E],e.name&&(A.push(e.name.toLowerCase()),e.options&&e.options.aliases&&e.options.aliases.length))for(o=0;o<e.options.aliases.length;o++)A.push(e.options.aliases[o].toLowerCase());for(t=n(e.fn,"function")?e.fn():e.fn,a=0;a<A.length;a++)l=A[a],R=l.split("."),1===R.length?Modernizr[R[0]]=t:(!Modernizr[R[0]]||Modernizr[R[0]]instanceof Boolean||(Modernizr[R[0]]=new Boolean(Modernizr[R[0]])),Modernizr[R[0]][R[1]]=t),i.push((t?"":"no-")+R.join("-"))}}function a(A,e){if("object"==typeof A)for(var n in A)s(A,n)&&a(n,A[n]);else{A=A.toLowerCase();var t=A.split("."),i=Modernizr[t[0]];if(2==t.length&&(i=i[t[1]]),"undefined"!=typeof i)return Modernizr;e="function"==typeof e?e():e,1==t.length?Modernizr[t[0]]=e:(!Modernizr[t[0]]||Modernizr[t[0]]instanceof Boolean||(Modernizr[t[0]]=new Boolean(Modernizr[t[0]])),Modernizr[t[0]][t[1]]=e),o([(e&&0!=e?"":"no-")+t.join("-")]),Modernizr._trigger(A,e)}return Modernizr}var i=[],c=[],l={_version:"3.0.0-alpha.3",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(A,e){var o=this;setTimeout(function(){e(o[A])},0)},addTest:function(A,e,o){c.push({name:A,fn:e,options:o})},addAsyncTest:function(A){c.push({name:null,fn:A})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr;var R=e.documentElement,E=function(){return"function"!=typeof e.createElement?e.createElement(arguments[0]):e.createElement.apply(e,arguments)};Modernizr.addTest("video",function(){var A=E("video"),e=!1;try{(e=!!A.canPlayType)&&(e=new Boolean(e),e.ogg=A.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),e.h264=A.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),e.webm=A.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),e.vp9=A.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),e.hls=A.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(o){}return e});var s;!function(){var A={}.hasOwnProperty;s=n(A,"undefined")||n(A.call,"undefined")?function(A,e){return e in A&&n(A.constructor.prototype[e],"undefined")}:function(e,o){return A.call(e,o)}}(),l._l={},l.on=function(A,e){this._l[A]||(this._l[A]=[]),this._l[A].push(e),Modernizr.hasOwnProperty(A)&&setTimeout(function(){Modernizr._trigger(A,Modernizr[A])},0)},l._trigger=function(A,e){if(this._l[A]){var o=this._l[A];setTimeout(function(){var A,n;for(A=0;A<o.length;A++)(n=o[A])(e)},0),delete this._l[A]}},Modernizr._q.push(function(){l.addTest=a}),Modernizr.addAsyncTest(function(){var A,e=300,o=E("video"),n=o.style,t=function(e){clearTimeout(A),o.removeEventListener("playing",t),a("videoautoplay",e&&"playing"===e.type||0!==o.currentTime),o.parentNode.removeChild(o)};if(!(Modernizr.video&&"autoplay"in o))return void a("videoautoplay",!1);n.position="absolute",n.height=0,n.width=0;try{if(Modernizr.video.ogg)o.src="data:video/ogg;base64,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";else{if(!Modernizr.video.h264)return void a("videoautoplay",!1);o.src="data:video/mp4;base64,AAAAHGZ0eXBtcDQyAAAAAG1wNDJpc29tYXZjMQAAAz5tb292AAAAbG12aGQAAAAAzaNacc2jWnEAAV+QAAFfkAABAAABAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAAAGGlvZHMAAAAAEICAgAcAT////3//AAACQ3RyYWsAAABcdGtoZAAAAAHNo1pxzaNacQAAAAEAAAAAAAFfkAAAAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAEAAAAAAEAAAABAAAAAAAd9tZGlhAAAAIG1kaGQAAAAAzaNacc2jWnEAAV+QAAFfkFXEAAAAAAAhaGRscgAAAAAAAAAAdmlkZQAAAAAAAAAAAAAAAAAAAAGWbWluZgAAABR2bWhkAAAAAQAAAAAAAAAAAAAAJGRpbmYAAAAcZHJlZgAAAAAAAAABAAAADHVybCAAAAABAAABVnN0YmwAAACpc3RzZAAAAAAAAAABAAAAmWF2YzEAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAEAAQAEgAAABIAAAAAAAAAAEOSlZUL0FWQyBDb2RpbmcAAAAAAAAAAAAAAAAAAAAAAAAY//8AAAAxYXZjQwH0AAr/4QAZZ/QACq609NQYBBkAAAMAAQAAAwAKjxImoAEABWjOAa8gAAAAEmNvbHJuY2xjAAYAAQAGAAAAGHN0dHMAAAAAAAAAAQAAAAUAAEZQAAAAKHN0c3oAAAAAAAAAAAAAAAUAAAIqAAAACAAAAAgAAAAIAAAACAAAAChzdHNjAAAAAAAAAAIAAAABAAAABAAAAAEAAAACAAAAAQAAAAEAAAAYc3RjbwAAAAAAAAACAAADYgAABaQAAAAUc3RzcwAAAAAAAAABAAAAAQAAABFzZHRwAAAAAAREREREAAAAb3VkdGEAAABnbWV0YQAAAAAAAAAhaGRscgAAAAAAAAAAbWRpcgAAAAAAAAAAAAAAAAAAAAA6aWxzdAAAADKpdG9vAAAAKmRhdGEAAAABAAAAAEhhbmRCcmFrZSAwLjkuOCAyMDEyMDcxODAwAAACUm1kYXQAAAHkBgX/4NxF6b3m2Ui3lizYINkj7u94MjY0IC0gY29yZSAxMjAgLSBILjI2NC9NUEVHLTQgQVZDIGNvZGVjIC0gQ29weWxlZnQgMjAwMy0yMDExIC0gaHR0cDovL3d3dy52aWRlb2xhbi5vcmcveDI2NC5odG1sIC0gb3B0aW9uczogY2FiYWM9MCByZWY9MSBkZWJsb2NrPTE6MDowIGFuYWx5c2U9MHgxOjAgbWU9ZXNhIHN1Ym1lPTkgcHN5PTAgbWl4ZWRfcmVmPTAgbWVfcmFuZ2U9NCBjaHJvbWFfbWU9MSB0cmVsbGlzPTAgOHg4ZGN0PTAgY3FtPTAgZGVhZHpvbmU9MjEsMTEgZmFzdF9wc2tpcD0wIGNocm9tYV9xcF9vZmZzZXQ9MCB0aHJlYWRzPTYgc2xpY2VkX3RocmVhZHM9MCBucj0wIGRlY2ltYXRlPTEgaW50ZXJsYWNlZD0wIGJsdXJheV9jb21wYXQ9MCBjb25zdHJhaW5lZF9pbnRyYT0wIGJmcmFtZXM9MCB3ZWlnaHRwPTAga2V5aW50PTUwIGtleWludF9taW49NSBzY2VuZWN1dD00MCBpbnRyYV9yZWZyZXNoPTAgcmM9Y3FwIG1idHJlZT0wIHFwPTAAgAAAAD5liISscR8A+E4ACAACFoAAITAAAgsAAPgYCoKgoC+L4vi+KAvi+L4YfAEAACMzgABF9AAEUGUgABDJiXnf4AAAAARBmiKUAAAABEGaQpQAAAAEQZpilAAAAARBmoKU"}}catch(i){return void a("videoautoplay",!1)}o.setAttribute("autoplay",""),o.style="display:none",R.appendChild(o),setTimeout(function(){o.addEventListener("playing",t),A=setTimeout(t,e)},0)}),t(),o(i),delete l.addTest,delete l.addAsyncTest;for(var r=0;r<Modernizr._q.length;r++)Modernizr._q[r]();A.Modernizr=Modernizr}(window,document);