(function() {

    'use strict';

    // preloader
    $(window).on('load', function() {
        $('.loader').fadeOut('slow');
    });

    // smooth scroll
    $("a").on("click", function(event) {

        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $("html, body").animate({

                scrollTop: $(hash).offset().top - 50

            }, 850);

        }

    });


    // swiper slider
    $(document).ready(function() {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next-slide",
                prevEl: ".prev-slide"
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                780: {
                    slidesPerView: 1,
                }
            }
        });
    });

    // navbar toggler icon
    $(document).on("click", ".navbar-toggler", function(e) {
        $(this).parent().siblings().find('i').removeClass('la-remove')
        $(this).find('i').toggleClass('la-remove')
    });

    // navbar on scroll
    $(window).on("scroll", function() {

        var onScroll = $(this).scrollTop();

        if (onScroll > 50) {
            $(".navbar").addClass("navbar-fixed");
        } else {
            $(".navbar").removeClass("navbar-fixed");
        }

    });

})();