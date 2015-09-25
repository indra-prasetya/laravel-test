var gulp = require('gulp');
var ext = require('gulp-ext-replace');
var elixir = require('laravel-elixir');
var uglify = require('gulp-uglify');
var del = require('del');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.extend('uglify', function() {

	gulp.task('uglify', function() {

		gulp.src(['resources/js/app.js', 'resources/js/clean-blog.js', 'resources/js/nprogress.js']).pipe(uglify({
			mangle : true,
			compress : {
				sequences : true,
				dead_code : true,
				conditionals : true,
				booleans : true,
				unused : true,
				if_return : true,
				join_vars : true,
				drop_console : true
			}
		})).pipe(ext('.min.js')).pipe(gulp.dest('resources/js/min'));

	});

	return this.queueTask('uglify');

});

elixir.extend('clean', function() {

	gulp.task('clean', function() {
		return del(['resources/js/min']);
	});
	return this.queueTask('clean');

});

elixir(function(mix) {
	mix.less('app.less');
	mix.uglify();
	mix.styles(
	[
		//'bootstrap.min.css',
		'app.css', 
		'clean-blog.css', 
		'nprogress.css'
	], 
	'public/css/application.min.css', 'resources/css');

	mix.scripts(
	[
		'jquery.min.js', 
		'bootstrap.min.js', 
		'jquery.turbolinks.js', 
		'turbolinks.js', 
		'min/nprogress.min.js',
		//'min/clean-blog.min.js',
		'min/app.min.js'
	], 
	'public/js/application.min.js', 'resources/js');

	mix.clean();
	
	mix.version(["public/js/application.min.js", "public/css/application.min.css"]);
});
