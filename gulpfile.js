const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir.config.sourcemaps = false;

elixir(function(mix) {

    // Auth
    mix.sass(['auth/styles.scss'],'public/assets/auth/css/all.css');
    mix.scripts(['auth/scripts.js'], 'public/assets/auth/js/all.js');

    // Admin
    mix.sass(['admin/styles.scss'],'public/assets/admin/css/all.css');
    mix.scripts(['admin/scripts.js'], 'public/assets/admin/js/all.js');

    // Blog
    mix.sass(['blog/styles.scss'],'public/assets/blog/css/all.css');
    mix.scripts(['blog/scripts.js'], 'public/assets/blog/js/all.js');

    // Site
    mix.sass(['site/styles.scss'],'public/assets/site/css/all.css');
    mix.scripts(['site/scripts.js'], 'public/assets/site/js/all.js');

    // Errors
    mix.sass(['errors/styles.scss'],'public/assets/errors/css/all.css');
    mix.scripts(['errors/scripts.js'], 'public/assets/errors/js/all.js');

});
