$(document).ready(function(){

    $('#menu').hover(
        function() { // mouseenter
            // hide & compress initial text
            $('#menu span').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#menu span').hide);

            // show & decompress link options
            $('#menu a').stop().show().animate({
                width: '100px',
                opacity: 1
            });

        },
        function() { //mouseleave
            // hide & compress options
            $('#menu a').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#menu a').hide);

            // show & decompress link options
            $('#menu span').stop().show().animate({
                width: '200px',
                opacity: 1
            });

        });


    $('#course').hover(
        function() { // mouseenter
            // hide & compress initial text
            $('#course span').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#course span').hide);

            // show & decompress link options
            $('#course a').stop().show().animate({
                width: '100px',
                opacity: 1
            });

        },
        function() { //mouseleave
            // hide & compress options
            $('#course a').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#course a').hide);

            // show & decompress link options
            $('#course span').stop().show().animate({
                width: '200px',
                opacity: 1
            });

        });


    $('#te').hover(
        function() { // mouseenter
            // hide & compress initial text
            $('#te span').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#te span').hide);

            // show & decompress link options
            $('#te a').stop().show().animate({
                width: '100px',
                opacity: 1
            });

        },
        function() { //mouseleave
            // hide & compress options
            $('#te a').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#te a').hide);

            // show & decompress link options
            $('#te span').stop().show().animate({
                width: '200px',
                opacity: 1
            });

        });

    $('#st').hover(
        function() { // mouseenter
            // hide & compress initial text
            $('#st span').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#st span').hide);

            // show & decompress link options
            $('#st a').stop().show().animate({
                width: '100px',
                opacity: 1
            });

        },
        function() { //mouseleave
            // hide & compress options
            $('#st a').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#st a').hide);

            // show & decompress link options
            $('#st span').stop().show().animate({
                width: '200px',
                opacity: 1
            });

        });

    $('#un').hover(
        function() { // mouseenter
            // hide & compress initial text
            $('#un span').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#un span').hide);

            // show & decompress link options
            $('#un a').stop().show().animate({
                width: '100px',
                opacity: 1
            });

        },
        function() { //mouseleave
            // hide & compress options
            $('#un a').stop().animate({
                width: '0px',
                opacity: 0
            }, $('#un a').hide);

            // show & decompress link options
            $('#un span').stop().show().animate({
                width: '200px',
                opacity: 1
            });

        });



});