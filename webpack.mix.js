const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .scripts([
        'resources/assets/libs/jquery/dist/jquery.min.js',
        'resources/assets/libs/tether/dist/js/tether.min.js',
        'resources/assets/libs/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/libs/MDBootstrap/js/mdb.min.js',
        'resources/assets/libs/lodash/dist/lodash.min.js'
        ],
    'public/js/vendor.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles(['resources/assets/libs/tether/dist/css/tether.min.css'], 'public/css/tether.min.css');

