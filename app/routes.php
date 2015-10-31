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

Route::group(array('namespace' => 'App\Controllers', 'after' => 'promo-popup'), function() {
  Route::get('/{lang?}', array('as' => 'home.default', 'uses' => 'HomeController@getDefault'));
  Route::group(array('prefix' => '{lang}'), function() {
	Route::get('/home', array('as' => 'site.home', 'uses' => 'HomeController@getIndex'));
	Route::get('/positive-affirmation', array('as' => 'site.affirmation', 'uses' => 'HomeController@getAffirmation'));
	Route::get('/about', array('as' => 'site.about', 'uses' => 'HomeController@getAbout'));
	Route::get('/contact', array('as' => 'site.contact', 'uses' => 'HomeController@getContact'));
	Route::post('/contact', array('as' => 'site.contact.post', 'uses' => 'HomeController@postContact'));
	Route::get('/lintas-imaji', array('as' => 'site.imaji', 'uses' => 'HomeController@getImaji'));
	Route::get('/search', array('as' => 'site.search', 'uses' => 'HomeController@getSearch'));
	
	Route::get('/product', array('as' => 'site.product', 'uses' => 'ProductController@getIndex'));
	Route::post('/product/dismiss', array('as' => 'site.product.dismiss', 'uses' => 'ProductController@postDismissPopup'));
	Route::get('/secret-product', array('as' => 'site.product.secret', 'uses' => 'ProductController@getSecret'));
	Route::post('/secret-product', array('as' => 'site.secret.answer', 'uses' => 'ProductController@postSecretAnswer'));
	Route::get('/order-product/{slug}', array('as' => 'site.product.buy', 'uses' => 'ProductController@getBuy'));
	Route::post('/order', array('as' => 'site.product.buy.post', 'uses' => 'ProductController@postBuy'));
	
	Route::post('/promo/submit', array('as' => 'site.promo.submit', 'uses' => 'PromoController@postOrder'));
	Route::post('/promo/dismiss', array('as' => 'site.promo.dismiss', 'uses' => 'PromoController@postDismissPopup'));
	
	Route::group(array('prefix' => 'corporate-entertainer'), function() {
		Route::get('/', array('as' => 'site.entertainer.home', 'uses' => 'EntertainerController@getIndex'));
		Route::get('/customer', array('as' => 'site.entertainer.customer', 'uses' => 'EntertainerController@getCustomer'));
		Route::get('/client', array('as' => 'site.entertainer.client', 'uses' => 'EntertainerController@getClient'));
		Route::get('/work', array('as' => 'site.entertainer.work', 'uses' => 'EntertainerController@getWork'));
		Route::get('/show', array('as' => 'site.entertainer.show', 'uses' => 'EntertainerController@getShow'));
	});
	
	Route::group(array('prefix' => 'corporate-speaker'), function() {
		Route::get('/', array('as' => 'site.speaker.home', 'uses' => 'SpeakerController@getIndex'));
		Route::get('/customer', array('as' => 'site.speaker.customer', 'uses' => 'SpeakerController@getCustomer'));
		Route::get('/client', array('as' => 'site.speaker.client', 'uses' => 'SpeakerController@getClient'));
		Route::get('/work', array('as' => 'site.speaker.work', 'uses' => 'SpeakerController@getWork'));
		Route::get('/training', array('as' => 'site.speaker.training', 'uses' => 'SpeakerController@getTraining'));
	});
	
	Route::group(array('prefix' => 'certified-therapist'), function() {
		Route::get('/', array('as' => 'site.therapist.home', 'uses' => 'TherapistController@getIndex'));
		Route::get('/customer', array('as' => 'site.therapist.customer', 'uses' => 'TherapistController@getCustomer'));
		Route::get('/client', array('as' => 'site.therapist.client', 'uses' => 'TherapistController@getClient'));
		Route::get('/work', array('as' => 'site.therapist.work', 'uses' => 'TherapistController@getWork'));
		Route::get('/training', array('as' => 'site.therapist.training', 'uses' => 'TherapistController@getTraining'));
		Route::get('/group-therapy', array('as' => 'site.therapist.group-therapy', 'uses' => 'TherapistController@getGroupTherapy'));
		Route::get('/personal-therapy', array('as' => 'site.therapist.personal-therapy', 'uses' => 'TherapistController@getPersonalTherapy'));
		Route::get('/association', array('as' => 'site.therapist.association', 'uses' => 'TherapistController@getAssociation'));
	});
	
	Route::get('/{other}', array('as' => 'site.other', 'uses' => 'HomeController@getOther'));
  
  });
});