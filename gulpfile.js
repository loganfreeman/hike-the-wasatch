const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss');
    mix.webpack('app.js');
    //mix.version(['css/app.css', 'js/app.js']);
    //
    mix
    .copy('node_modules/font-awesome/fonts/', 'public/fonts/font-awesome')
    .copy('node_modules/ionicons/dist/fonts/', 'public/fonts/ionicons');
});
