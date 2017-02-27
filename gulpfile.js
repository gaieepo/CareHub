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

elixir(mix => {
    mix.sass('app.scss')
       .styles('jquery.wizard.css')
       .styles('lightbox.min.css')
       .styles('dataTables.bootstrap.min.css')
       .webpack('app.js')
       .webpack('jquery.wizard.js')
       .webpack('lightbox.min.js')
       .scripts('dataTables.bootstrap.min.js')
       .scripts('jquery.dataTables.min.js');
});
