jQuery(document).ready( function($) {

    /* init functions*/

    revealPosts();

    /*variable declarations*/

    var last_scroll = 0;


    $(document).on('click','.start_ajax_more:not(.loading)', function(){
        var that = $(this);
        var page = $(this).data('page');
        var newPage = page+1;

            //console.log(page);
        var ajaxurl = that.data('url');
        var prev = that.data('prev');

        if( typeof prev === 'undefined' ) {
            prev = 0;
        }

        that.addClass('loading').find('.styleMeText').slideUp(320);
        that.find('.fa-refresh').addClass('spin');


        $.ajax({

            url : ajaxurl,
            type : 'post',

            data : {
                page : page,
                prev : prev,
                action : 'hyip_load_more'
            },

            error : function( response ){
                console.log(response);

            },

            success : function( response ) {

                if ( response == 0 ) {
                    $('.customClassContainer').append('<div class="text-center"> <h3>Записей нет</h3><p>Курим бамбук</p></div>');

                    that.slideUp(320);
                }

                else {

                    setTimeout( function(){

                        if( prev == 1 ) {
                            $('.customClassContainer').prepend(response);
                            newPage = page -1;

                        } else {
                            $('.customClassContainer').append(response);
                        }

                        if( newPage == 1) {
                            that.slideUp();

                        } else {

                            that.data('page', newPage);
                            that.removeClass('loading').find('.styleMeText').slideDown(320);
                            that.find('.fa-refresh').removeClass('spin');

                        }

                        revealPosts();



                    }, 2000);
                }

            }

        });
    });

    /* scroll function*/

    $(window).scroll( function(){

        var scroll = $(window).scrollTop();
        //console.log(scroll);

        if ( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ) {
            last_scroll = scroll;

            $('.page-limit').each(function( index ) {
               if ( isVisible( $(this) ) ) {
                    //console.log('visible');

                   history.replaceState( null, null, $(this).attr('data-page')  );
                   return(false);
               }
            });
        }



    });

    /*helper functions*/

    function revealPosts() {

        var posts = $('article:not(.reveal)');
        var i = 0;

        setInterval(function(){

            if( i >= posts.length ) return false;

            var el = posts[i];
            $(el).addClass('reveal');
            i++


        }, 200);

    }

    function isVisible( element ) {

        var scroll_pos = $(window).scrollTop();
        var window_height = $(window).height();
        var el_top = $(element).offset().top;
        var el_height = $(element).height();
        var el_bottom = el_top + el_height;
        return ( ( el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5*window_height ) ) );

    }

});