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
  Route::get('/{lang?}', array('as' => 'home', 'uses' => 'HomeController@getDefault'));
  Route::group(array('prefix' => '{lang}'), function() {
	Route::get('/home', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
  
  });
});