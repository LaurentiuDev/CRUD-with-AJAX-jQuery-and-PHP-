/* START Menu maker */
(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = $(this), settings = $.extend({
            format: "dropdown",
            sticky: false
        }, options);
        return this.each(function () {
            $(this).find(".button").on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle')
                multiTg();
            else
                cssmenu.addClass('dropdown');
            if (settings.sticky === true)
                cssmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 1000;
                if ($(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $("#cssmenu").menumaker({
            format: "multitoggle"
        });
    });
})(jQuery);
/* END Menu maker */

/* START Progress bar crousel */
$(document).ready(function () {
    var percent = 0,
        interval = 10;//it takes about 6s, interval=20 takes about 4s
        $bar = $('.transition-timer-carousel-progress-bar'),
        $crsl = $('#myCarousel');
    $('.carousel-indicators li, .carousel-control').click(function () {
        $bar.css({width: 0.1 + '%'});
    });
    /*line above just for showing when controls are clicked the bar goes to 0.5% to make more friendly, 
     if you want when clicked set bar empty, change on width:0.5 to width:0*/
    $crsl.carousel({//initialize
        interval: false,
        pause: true
    }).on('slide.bs.carousel', function () {
        percent = 0;
    });//This event fires immediately when the bootstrap slide instance method is invoked.
    function progressBarCarousel() {
        $bar.css({width: percent + '%'});
        percent = percent + 0.1;
        if (percent >= 100) {
            percent = 0;
            $crsl.carousel('next');
        }
    }

    var barInterval = setInterval(progressBarCarousel, interval);//set interval to progressBarCarousel function
    if (!(/Mobi/.test(navigator.userAgent))) {//tests if it isn't mobile
        $crsl.hover(function () {
                clearInterval(barInterval);
            },
            function () {
                barInterval = setInterval(progressBarCarousel, interval);
            }
        );
    }

    // Homepage slider
    $('.slick-slider').slick({
        dots: false,
        speed: 300,
        arrows: false,
        slidesToShow: 2.5,
        slidesToScroll: 1,
        focusOnSelect: true,
        initialSlide: 1,
        // centerMode: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $("#myCarousel").swipe({

        swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

            if (direction == 'left') $(this).carousel('next');
            if (direction == 'right') $(this).carousel('prev');

        },
        allowPageScroll:"vertical"

    });
});
/* END Progress bar crousel */

(function($) {
    $(function() {
        var li = $('#menu li a').first();
        li.each(function(){
            wid = $(this).width();
            $(this).css('width', wid + 'px');
        });
    });
})(jQuery);

/* Credeai ca gasesti ceva interesant aici? :)) 
 * Scrie si tu un comment mai jos cu cine crezi ca va castiga Cupa Mondiala.
 *   */
/* :)) Nu privesc meciurile , dar daca tot sunt aici scriu un comentariu. :))  */