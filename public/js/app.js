jQuery(function($) {
  $(document).on('page:fetch',   function() { NProgress.start();  });
  $(document).on('page:receive', function() { NProgress.set(0.5); });
  $(document).on('page:change',  function() { NProgress.done();   });
  $(document).on('page:restore', function() { NProgress.remove(); });
  
  $('[data-toggle="tooltip"]').tooltip();
});

NProgress.configure({
  showSpinner: false,
  ease: 'ease',
  speed: 1500
});



