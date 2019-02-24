const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .scripts([
   	'node_modules/swiper/dist/js/swiper.min.js',
   	'resources/js/plugins/helperbadge.js',
   	'public/js/app.js',
   	], 'public/js/app.js')
   .sass('resources/sass/app.scss', 'public/css')
   .copyDirectory('resources/images/', 'public/images')
   .version();
