const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

	/**
	* Compile CSS with LESS, SASS or STYLUS
	*/

    mix.less('admin/app.less','public/assets/admin/css');
    // mix.stylus('admin/app.styl','public/assets/admin/css');
    // mix.sass('admin/app.sass','public/assets/admin/css');


    /**
	* Compile Javascript with Webpack, rollup or scripts
	*/

    mix.webpack('app.js', 'public/assets/admin/js'); // for vue
    // mix.rollup('app.js', 'public/assets/admin/js');
    // mix.scripts('app.js', 'public/assets/admin/js');
    // mix.scriptsIn('public/js/some/directory'); // for directory

});
