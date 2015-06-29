var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    
    mix.styles([
        'app.css',
        'clean-blog.css',
        'nprogress.css'
    ], 'public/css/application.css', 'public/css');
    
    mix.scripts([        
        'jquery.turbolinks.js',
        'turbolinks.js',
        'nprogress.js',
        'clean-blog.js',
        'app.js',
    ], 'public/js/application.js', 'public/js');
    
    mix.version(["public/js/application.js", "public/css/application.css"]);
});
