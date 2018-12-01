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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css',
    'resources/assets/vendors/css/vendor.bundle.base.css',
    'resources/assets/vendors/css/vendor.bundle.addons.css' 
], 'public/css/plugins.css');

 mix.styles([
 	"resources/assets/css/style.css",
 	"resources/assets/css/custom.css"
 	], 'public/css/all.css');

 mix.scripts([
 	"resources/assets/vendors/js/vendor.bundle.base.js",
 	"resources/assets/vendors/js/vendor.bundle.addons.js"
 	], "public/js/plugins.js");

 mix.scripts([
 	"resources/assets/js/off-canvas.js",
 	"resources/assets/js/misc.js",
 	], "public/js/all.js");
