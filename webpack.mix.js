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

mix.scripts([
    'public/assets/js/popper.min.js',
    'public/assets/js/dataTables/dataTables.bootstrap4.min.js',
    'public/assets/js/dataTables/dataTables.responsive.min.js',
    'public/assets/js/dataTables/jquery.dataTables.min.js',
    'public/bower_components/bootstrap4/dist/js/bootstrap.min.js',
    'public/bower_components/Font-Awesome/js/regular.min.js',
    'public/bower_components/Font-Awesome/js/solid.min.js',
    'public/bower_components/jQuery/dist/jquery.slim.min.js',
    'public/bower_components/jQuery/dist/jquery.min.js',
    'public/bower_components/toastr/toastr.min.js',
], 'public/js/app.js');

mix.styles([
    'public/bower_components/bootstrap4/dist/css/bootstrap.min.css',
    'public/bower_components/Font-Awesome/css/regular.min.css',
    'public/bower_components/Font-Awesome/css/solid.min.css',
    'public/bower_components/toastr/toastr.min.css',
    'public/assets/css/dataTables/dataTables.bootstrap4.min.css',
    'public/assets/css/dataTables/responsive.bootstrap4.min.css',
], 'public/css/app.css');

mix.copyDirectory('resources/assets/', 'public/assets/');
mix.copyDirectory('resources/bower_components/', 'public/bower_components/');
