jQuery(function($) {
  $(document).on('page:fetch',   function() { NProgress.start();  });
  $(document).on('page:receive', function() { NProgress.set(1); });
  $(document).on('page:change',  function() { NProgress.done();   });
  $(document).on('page:restore', function() { NProgress.remove(); });
  
  $('[data-toggle="tooltip"]').tooltip();
  
  $("html").niceScroll();
});

NProgress.configure({
  showSpinner: true,
  ease: 'ease',
  speed: 500
});



