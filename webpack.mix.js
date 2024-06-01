const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss("resources/css/app.css", "public/css"),
   require("tailwindcss"),
 

    mix.webpackConfig({
        plugins: [
           new BrowserSyncPlugin({
              files: [
                 'app/**/*.php',
                 'resources/views/**/*.php',
                 'public/**/*.*',
              ],
              proxy: 'http://localhost:8000', // Altere a porta se necessário
           }),
        ],
     });