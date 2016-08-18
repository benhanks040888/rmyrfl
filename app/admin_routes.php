<?php

/*
 * 
 * Admin Route
 */
Route::group(array('prefix' => 'admin-cms', 'namespace' => 'App\Controllers\Admin'), function() {
  Route::get('/', array('as' => 'admin.login', 'uses' => 'AuthController@getIndex'));
  Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));

  Route::post('/', array('as' => 'admin.login.submit', 'uses' => 'AuthController@postLogin'));

  // These routes is only accessible when admin is already logged in
  Route::group(array('before' => 'admin'), function() {
    Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'SiteController@getIndex'));

    Route::get('change-password', array('as' => 'admin.change-password', 'uses' => 'AuthController@getChangePassword'));
    Route::post('change-password', array('as' => 'admin.change-password.submit', 'uses' => 'AuthController@postChangePassword'));
    
	Route::get('product', array('as' => 'admin.product', 'uses' => 'ProductController@getList'));
    Route::get('product/list', array('as' => 'admin.product.list', 'uses' => 'ProductController@postList'));
	Route::get('product/add', array('as' => 'admin.product.add', 'uses' => 'ProductController@getFormAdd'));
    Route::get('product/edit/{id}', array('as' => 'admin.product.edit', 'uses' => 'ProductController@getFormEdit'));
	Route::post('product/detail', array('as' => 'admin.product.detail', 'uses' => 'ProductController@postDetail'));
	Route::post('product/submit', array('as' => 'admin.product.submit', 'uses' => 'ProductController@postSubmit'));
	Route::post('product/delete', array('as' => 'admin.product.delete', 'uses' => 'ProductController@postDelete'));
	Route::post('product/switch-active', array('as' => 'admin.product.switch-active', 'uses' => 'ProductController@postSwitchActive'));
	
	Route::get('product-order', array('as' => 'admin.product-order', 'uses' => 'ProductOrderController@getList'));
    Route::get('product-order/list', array('as' => 'admin.product-order.list', 'uses' => 'ProductOrderController@postList'));
	Route::post('product-order/detail', array('as' => 'admin.product-order.detail', 'uses' => 'ProductOrderController@postDetail'));
	Route::post('product-order/switch-active', array('as' => 'admin.product-order.switch-active', 'uses' => 'ProductOrderController@postSwitchActive'));
	
	Route::get('contact-us', array('as' => 'admin.contact-us', 'uses' => 'ContactUsController@getList'));
    Route::get('contact-us/list', array('as' => 'admin.contact-us.list', 'uses' => 'ContactUsController@postList'));
	Route::post('contact-us/detail', array('as' => 'admin.contact-us.detail', 'uses' => 'ContactUsController@postDetail'));
	Route::post('contact-us/switch-active', array('as' => 'admin.contact-us.switch-active', 'uses' => 'ContactUsController@postSwitchActive'));
	
	Route::get('imaji', array('as' => 'admin.imaji', 'uses' => 'ImajiController@getList'));
    Route::get('imaji/list', array('as' => 'admin.imaji.list', 'uses' => 'ImajiController@postList'));
	Route::get('imaji/add', array('as' => 'admin.imaji.add', 'uses' => 'ImajiController@getFormAdd'));
    Route::get('imaji/edit/{id}', array('as' => 'admin.imaji.edit', 'uses' => 'ImajiController@getFormEdit'));
	Route::post('imaji/detail', array('as' => 'admin.imaji.detail', 'uses' => 'ImajiController@postDetail'));
	Route::post('imaji/submit', array('as' => 'admin.imaji.submit', 'uses' => 'ImajiController@postSubmit'));
	Route::post('imaji/delete', array('as' => 'admin.imaji.delete', 'uses' => 'ImajiController@postDelete'));
	
	Route::get('general', array('as' => 'admin.general.default', 'uses' => 'GeneralController@getDefault'));
	Route::get('general/{url_category}', array('as' => 'admin.general', 'uses' => 'GeneralController@getList'));
    Route::get('general/{url_category}/edit/{id}', array('as' => 'admin.general.edit', 'uses' => 'GeneralController@getFormEdit'));
	Route::post('general/{url_category}/submit', array('as' => 'admin.general.submit', 'uses' => 'GeneralController@postSubmit'));
	
	Route::get('client', array('as' => 'admin.client.default', 'uses' => 'ClientController@getDefault'));
	Route::get('client/{url_category}', array('as' => 'admin.client', 'uses' => 'ClientController@getList'));
	Route::get('client/{url_category}/list', array('as' => 'admin.client.list', 'uses' => 'ClientController@postList'));
	Route::get('client/{url_category}/add', array('as' => 'admin.client.add', 'uses' => 'ClientController@getFormAdd'));
	Route::get('client/{url_category}/edit/{id}', array('as' => 'admin.client.edit', 'uses' => 'ClientController@getFormEdit'));
	Route::post('client/detail', array('as' => 'admin.client.detail', 'uses' => 'ClientController@postDetail'));
	Route::post('client/{url_category}/submit', array('as' => 'admin.client.submit', 'uses' => 'ClientController@postSubmit'));
	Route::post('client/delete', array('as' => 'admin.client.delete', 'uses' => 'ClientController@postDelete'));
	Route::post('client/switch-featured', array('as' => 'admin.client.switch-featured', 'uses' => 'ClientController@postSwitchFeatured'));
	
	Route::get('testimony', array('as' => 'admin.testimony.default', 'uses' => 'TestimonyController@getDefault'));
	Route::get('testimony/{url_category}', array('as' => 'admin.testimony', 'uses' => 'TestimonyController@getList'));
	Route::get('testimony/{url_category}/list', array('as' => 'admin.testimony.list', 'uses' => 'TestimonyController@postList'));
	Route::get('testimony/{url_category}/add', array('as' => 'admin.testimony.add', 'uses' => 'TestimonyController@getFormAdd'));
	Route::get('testimony/{url_category}/edit/{id}', array('as' => 'admin.testimony.edit', 'uses' => 'TestimonyController@getFormEdit'));
	Route::post('testimony/detail', array('as' => 'admin.testimony.detail', 'uses' => 'TestimonyController@postDetail'));
	Route::post('testimony/{url_category}/submit', array('as' => 'admin.testimony.submit', 'uses' => 'TestimonyController@postSubmit'));
	Route::post('testimony/delete', array('as' => 'admin.testimony.delete', 'uses' => 'TestimonyController@postDelete'));
	Route::post('testimony/switch-featured', array('as' => 'admin.testimony.switch-featured', 'uses' => 'TestimonyController@postSwitchFeatured'));
	Route::post('change-password', array('as' => 'admin.change-password.submit', 'uses' => 'AuthController@postChangePassword'));
  
	Route::get('magic-question', array('as' => 'admin.magic-question', 'uses' => 'MagicQuestionController@getList'));
	Route::get('magic-question/edit', array('as' => 'admin.magic-question.edit', 'uses' => 'MagicQuestionController@getFormEdit'));
	Route::post('magic-question/submit', array('as' => 'admin.magic-question.submit', 'uses' => 'MagicQuestionController@postSubmit'));
	Route::post('magic-question/remove-picture', array('as' => 'admin.magic-question.remove-picture', 'uses' => 'MagicQuestionController@postRemovePicture'));
	
	Route::get('promo', array('as' => 'admin.promo', 'uses' => 'PromoController@getList'));
	Route::get('promo/list', array('as' => 'admin.promo.list', 'uses' => 'PromoController@postList'));
	Route::get('promo/add', array('as' => 'admin.promo.add', 'uses' => 'PromoController@getFormAdd'));
    Route::get('promo/edit/{id}', array('as' => 'admin.promo.edit', 'uses' => 'PromoController@getFormEdit'));
	Route::post('promo/detail', array('as' => 'admin.promo.detail', 'uses' => 'PromoController@postDetail'));
	Route::post('promo/submit', array('as' => 'admin.promo.submit', 'uses' => 'PromoController@postSubmit'));
	Route::post('promo/delete', array('as' => 'admin.promo.delete', 'uses' => 'PromoController@postDelete'));
	Route::post('promo/remove-picture', array('as' => 'admin.promo.remove-picture', 'uses' => 'PromoController@postRemovePicture'));
	Route::post('promo/remove-file', array('as' => 'admin.promo.remove-file', 'uses' => 'PromoController@postRemoveFile'));
    Route::post('promo/switch-active', array('as' => 'admin.promo.switch-active', 'uses' => 'PromoController@postSwitchActive'));
  
	Route::get('promo-order/{id}', array('as' => 'admin.promo-order', 'uses' => 'PromoOrderController@getList'));
    Route::get('promo-order/{id}/list', array('as' => 'admin.promo-order.list', 'uses' => 'PromoOrderController@postList'));
	Route::post('promo-order/{id}/detail', array('as' => 'admin.promo-order.detail', 'uses' => 'PromoOrderController@postDetail'));
  });
});