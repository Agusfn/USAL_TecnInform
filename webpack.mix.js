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

mix.setResourceRoot('/USAL_TecnInform/public/') // important when using subfolder in local environment (XAMPP, etc) for font paths/etc
    .react('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');