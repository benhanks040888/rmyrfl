<?php

include('admin_routes.php');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('namespace' => 'App\Controllers'), function() {
  Route::get('/{lang?}', array('as' => 'home.default', 'uses' => 'HomeController@getDefault'));
  Route::group(array('prefix' => '{lang}'), function() {
	Route::get('/home', array('as' => 'site.home', 'uses' => 'HomeController@getIndex'));
	Route::get('/about', array('as' => 'site.about', 'uses' => 'HomeController@getAbout'));
	Route::get('/contact', array('as' => 'site.contact', 'uses' => 'HomeController@getContact'));
	
	Route::get('/product', array('as' => 'site.product', 'uses' => 'ProductController@getIndex'));
	
	Route::group(array('prefix' => 'corporate-entertainer'), function() {
		Route::get('/', array('as' => 'site.entertainer.home', 'uses' => 'EntertainerController@getIndex'));
		Route::get('/client', array('as' => 'site.entertainer.client', 'uses' => 'EntertainerController@getClient'));
	});
  });
});