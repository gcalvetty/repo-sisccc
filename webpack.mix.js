const { mix } = require('laravel-mix');

mix.scripts([
   'resources/assets/js/vue.js',
   'resources/assets/js/axios.js',   
   'resources/assets/js/app.js',  
   'resources/assets/js/jquery3.0.js'
], 'public/js/app.js');


