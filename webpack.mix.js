// let mix = require('laravel-mix');
//
// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
//
// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

let mix = require('laravel-mix');

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

mix.js('resources/assets/js/main.js', 'public/js')
    .js('resources/assets/js/simplewebrtc.latest.v2.js', 'public/js')
    .js('node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 'public/js')
    .scripts(['public/js/main.js',
        'public/js/simplewebrtc.latest.v2.js',
        'public/js/bootstrap.js'],
        'public/js/all.js');

mix.sass('resources/assets/sass/imports.scss','public/css')
    .sass('resources/assets/sass/style.scss','public/css')
    .sass('node_modules/bootstrap-sass/assets/stylesheets/_bootstrap.scss','public/css')
    .styles(['public/css/imports.css','public/css/style.css','public/css/_bootstrap.css'],
        'public/css/all.css');
