jQuery(function() {
  jQuery(document).on('page:fetch',   function() { NProgress.start();  });
  jQuery(document).on('page:receive', function() { NProgress.set(1); });
  jQuery(document).on('page:change',  function() { NProgress.done();   });
  jQuery(document).on('page:restore', function() { NProgress.remove(); });
});

NProgress.configure({
  showSpinner: false,
  ease: 'ease',
  speed: 500
});