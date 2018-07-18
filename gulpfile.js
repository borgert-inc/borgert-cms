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
    mix.sass('auth/styles.scss','public/assets/auth/css');
    mix.scripts('auth/scripts.js', 'public/assets/auth/js');

    // Admin
    mix.sass('admin/styles.scss','public/assets/admin/css');
    mix.scripts('admin/scripts.js', 'public/assets/admin/js');

    // Blog
    mix.sass('blog/styles.scss','public/assets/blog/css');
    mix.scripts('blog/scripts.js', 'public/assets/blog/js');

    // Site
    mix.sass('site/styles.scss','public/assets/site/css');
    mix.scripts('site/scripts.js', 'public/assets/site/js');

});
