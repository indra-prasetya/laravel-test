jQuery(function ($) {
    $(document).on('page:fetch', function () {
        NProgress.start();
    });
    $(document).on('page:receive', function () {
        NProgress.set(0.8);
    });
    $(document).on('page:change', function () {
        NProgress.done();
        // $('.site-heading, #content').addClass('animated fadeIn');
    });
    $(document).on('page:restore', function () {
        NProgress.remove();
    });

    $('[data-toggle="tooltip"]').tooltip();
    
    if ($(window).width() > 1170) {
        var headerHeight = $('.navbar-custom').height();
        var lastScrollTop = 0;
        $(window).on('scroll', 
            function() {
                var currentTop = $(this).scrollTop();
                //check if user is scrolling up
                if (currentTop < lastScrollTop) {
                    if (currentTop > 0 && $('.navbar-custom').hasClass('is-fixed')) {
                        $('.navbar-custom').addClass('is-visible');
                    } else {
                        $('.navbar-custom').removeClass('is-visible is-fixed');
                    }
                } else {
                    //if scrolling down...
                    $('.navbar-custom').removeClass('is-visible');
                    if (currentTop > headerHeight && !$('.navbar-custom').hasClass('is-fixed')) $('.navbar-custom').addClass('is-fixed');
                }
                lastScrollTop = currentTop;
            });
    }
});

NProgress.configure({
    showSpinner: false,
    ease: 'ease',
    speed: 1500,
    trickle: false
});



