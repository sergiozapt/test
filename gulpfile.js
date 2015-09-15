var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

	//mix.phpUnit();
	
    mix.sass('app.scss').coffee();
    
    mix.styles([
    	'vendor/normalize.css',
    	'app.css'
    ], null, 'public/css');

    mix.version('css/all.css');

    mix.copy('public/css/app.css.map', 'public/build/css/app.css.map');

   
});
