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
 /*
mix.js([
		'resources/assets/js/app.js',
		'resources/assets/js/shop/jquery.min.js',
		'resources/assets/js/shop/simpleCart.min.js',
		'resources/assets/js/shop/bootstrap-3.1.1.min.js',
		'resources/assets/js/shop/easyResponsiveTabs.js',
		'resources/assets/js/shop/imagezoom.js',
		'resources/assets/js/shop/jquery.countdown.js',
		'resources/assets/js/shop/jquery.flexisel.js',
		'resources/assets/js/shop/jquery.flexslider.js',
		'resources/assets/js/shop/jquery.magnific-popup.js',
		'resources/assets/js/shop/jquery.wmuSlider.js',
		'resources/assets/js/shop/modernizr-custom.js',
		'resources/assets/js/shop/script.js',
		'resources/assets/js/shop/sweetalert2.min.js',
		'resources/assets/js/shop/social-media-functions.js',
		//'public/js/numeral.min.js',
	   ], 'public/js/app.js')
	.styles([
	   'resources/assets/css/bootstrap.min.css',
	   'resources/assets/css/style.css',
	   'resources/assets/css/flashover.css',
	   'resources/assets/css/jquery.countdown.css',
	   'resources/assets/css/flexslider.css',
	   'resources/assets/css/popuo-box.css',
	   'resources/assets/css/sweetalert2.min.css',
	   'resources/assets/css/social-media-style.css',
	   //'resources/assets/css/print.min.css',
	   //'resources/assets/css/materialIcons.css',
	], 'public/css/app.css')
   .browserSync({
    	proxy: 'localhost:8000'
	});
*/

mix.js([
		'resources/assets/js/app.js',
		'resources/assets/js/shop/jquery.min.js',
		'resources/assets/js/shop/sweetalert2.min.js',
		'resources/assets/js/shop/vuetify.min.js',
	   ], 'public/js/app-serve.js')
	.styles([
	   'resources/assets/css/vuetify.min.css',
	   'resources/assets/css/sweetalert2.min.css',
	], 'public/css/app-serve.css')
   .browserSync({
    	proxy: 'localhost:8000'
	});
	