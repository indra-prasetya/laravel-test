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
    
});

NProgress.configure({
    showSpinner: false,
    ease: 'ease',
    speed: 1500,
    trickle: false
});



