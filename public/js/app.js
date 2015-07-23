jQuery(function ($) {
    $(document).on('page:fetch', function () {
        NProgress.start();
        $('.site-heading').addClass('animated fadeOutUp');
        $('#content').addClass('animated fadeOut');
    });
    $(document).on('page:receive', function () {
        NProgress.set(0.5);
    });
    $(document).on('page:change', function () {
        NProgress.done();
        $('.site-heading').addClass('animated fadeInDown');
        $('#content').addClass('animated fadeIn');
    });
    $(document).on('page:restore', function () {
        NProgress.remove();
    });

    $('[data-toggle="tooltip"]').tooltip();
});

NProgress.configure({
    showSpinner: false,
    ease: 'ease',
    speed: 1500
});



