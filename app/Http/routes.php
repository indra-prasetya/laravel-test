<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostController@index');
Route::get('/life', 'PostController@life');
Route::get('/code', 'PostController@code');
Route::get('/about', 'PostController@about');
Route::get('/home', 'PostController@index');

Route::get('/post/{slug}', 'PostController@show');
Route::resource("posts","PostController");

Route::get('/sitemap.xml', function(){
	$sitemap = App::make("sitemap" );

	$sitemap->add(URL::to('/'), '2013-11-16T12:30:00+02:00', '1.0', 'daily');
	$sitemap->add(URL::to('about'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
	$sitemap->add(URL::to('life'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
	$sitemap->add(URL::to('code'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');

	$posts = App\Post::all();

	foreach($posts as $post) 
	{
		$sitemap->add(URL::to("post/{$post->slug}"), $post->created_at, '0.9', 'weekly');
	}

	return $sitemap->render('xml');
	});

	Route::controllers([
		'auth' => 'Auth\AuthController',
		//'password' => 'Auth\PasswordController',
	]);
