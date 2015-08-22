<?php

/*
 * 
 * Admin Route
 */
Route::group(array('prefix' => 'admin', 'namespace' => 'App\Controllers\Admin'), function() {
  Route::get('/', array('as' => 'admin.login', 'uses' => 'AuthController@getIndex'));
  Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));

  Route::post('/', array('as' => 'admin.login.submit', 'uses' => 'AuthController@postLogin'));

  // These routes is only accessible when admin is already logged in
  Route::group(array('before' => 'admin'), function() {
    Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'SiteController@getIndex'));

    Route::get('change-password', array('as' => 'admin.change-password', 'uses' => 'AuthController@getChangePassword'));
    Route::post('change-password', array('as' => 'admin.change-password.submit', 'uses' => 'AuthController@postChangePassword'));
  });
});