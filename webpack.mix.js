const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/mobile/app.js', 'public/mobile/js')
    .js('resources/js/desktop/app.js', 'public/desktop/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/mobile.scss', 'public/mobile/css')
    .sass('resources/sass/desktop.scss', 'public/mobile/css');
