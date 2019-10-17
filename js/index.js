/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

var lastScrollTop = 0;

function scrollEvent() {
    "use strict";
    var $body = $(document.body),
        o = $(window).scrollTop(),
        t = $(window).innerHeight(),
        w = $(window).height(),
        d = $(document).height();

    $("#page").find(".scroll, video").each(function () {
        var n = $(this),
            nid = $(this).attr('id'),
            e = n.height(),
            i = n.offset();
        if (i.top >= o - (e / 2) && i.top <= o + t - (e / 2)) {
            n.removeClass("onScroll");
            n.trigger('play');
        } else {
            n.addClass("onScroll");
            n.trigger('pause');
        }
    });



    $(".Anchor").each(function () {
        var n = $(this),
            e = n.height(),
            i = n.offset();

        if (i.top < o) {
            n.addClass("AnchorTop");
        } else if (i.top + e > o + t) {
            n.addClass("AnchorBot");
        } else {
            n.removeClass("AnchorBot AnchorTop");
        }
    });
}



function toggleMenu() {
    $('body').toggleClass("menu");
    console.log("toggle menu");
}
function toggleContact() {
    $('body').toggleClass("contact");
    console.log("toggle contact");
}

function playOnHover() {
    $(".hover").hover(
        function () {
            $(this).find("video").trigger('play');
        },
        function () {
            $(this).find("video").trigger('pause');
        }
    );
}


function ToAnchor() {

    $('a[href^="#"]').on('click', function (event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });

    //    $('a[href^="http"]').on('click', function (event) {
    //        var thislink = $(this).attr('href');
    //        event.preventDefault();
    //        $(".transition").removeClass('loaded');

    //        alert("coucou");
    //        window.location.href = "http://stackoverflow.com";
    //        function explode() {
    //        window.location.href = thislink;
    //        }
    //        setTimeout(explode, 1000);
    //    });
};



$(document).ready(function () {
    console.log("document ready");
});




$(window).load(function () {
    scrollEvent();
    playOnHover();
    console.log("document loaded");

});

$(window).resize(function () {});



$(window).scroll(function (event) {
    scrollEvent();

    var st = $(this).scrollTop();
    if (st >= lastScrollTop) {
        $('body').removeClass('scrollUp').addClass('scrollDown');
    } else {
        $('body').removeClass('scrollDown').addClass('scrollUp');
    }
    lastScrollTop = st;
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight || window.scrollY <= window.innerHeight / 5) {
        $('body').removeClass('scrollDown').removeClass('scrollUp');
    }
});

} )( jQuery );
