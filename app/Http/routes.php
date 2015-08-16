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

Route::filter('cache.fetch', 'App\Filters\CacheFilter@fetch');
Route::filter('cache.put', 'App\Filters\CacheFilter@put');

Route::get('/', 'PostController@index')->before('cache.fetch')->after('cache.put');
Route::get('/life', 'PostController@life')->before('cache.fetch')->after('cache.put');
Route::get('/code', 'PostController@code')->before('cache.fetch')->after('cache.put');
Route::get('/about', 'PostController@about')->before('cache.fetch')->after('cache.put');
Route::get('/home', 'PostController@index')->before('cache.fetch')->after('cache.put');

Route::get('/info', 'PostController@info');

Route::get('/post/{slug}', 'PostController@show')->before('cache.fetch')->after('cache.put');
Route::resource("posts","PostController");

Route::get('/sitemap.xml',"SitemapController@index")->before('cache.fetch')->after('cache.put');

Route::controllers([
	'manage' => 'Auth\AuthController',
	//'password' => 'Auth\PasswordController',
]);
