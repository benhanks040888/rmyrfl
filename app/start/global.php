<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
 */

ClassLoader::addDirectories(array(

	app_path() . '/commands',
	app_path() . '/controllers',
	app_path() . '/models',
	app_path() . '/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
 */

$logFile = 'log-' . php_sapi_name() . '.txt';

Log::useDailyFiles(storage_path() . '/logs/' . $logFile);

// Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
 */

App::error(function (Exception $exception, $code) {
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
 */

App::down(function () {
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
 */

require app_path() . '/filters.php';

/*
|--------------------------------------------------------------------------
| Require The Helpers File
|--------------------------------------------------------------------------
|
 */

require app_path() . '/Romy/helpers.php';

/*
|--------------------------------------------------------------------------
| Require The Presenters (View Composers) File
|--------------------------------------------------------------------------
|
 */

require app_path() . '/Romy/presenters.php';

/*
|--------------------------------------------------------------------------
| Require The Event Listeners File
|--------------------------------------------------------------------------
|
 */

require app_path() . '/Romy/listeners.php';

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
 */
View::composer(array('_partials.header.corporate-entertainer', "_partials.header.mobile", "_partials.footer"), function ($view) {
	$models = App\Models\ShortMenu::where("section", "corporate-entertainer")
		->where("active", 1) // 1 is active
		->orderBy('order', 'asc')
		->lists("slug");

	$view->with('modelsCe', $models);

});

View::composer(array('_partials.header.corporate-speaker', "_partials.header.mobile", "_partials.footer"), function ($view) {
	$models = App\Models\ShortMenu::where("section", "corporate-speaker")
		->where("active", 1) // 1 is active
		->orderBy('order', 'asc')
		->lists("slug");

	$view->with('modelsCs', $models);
});

View::composer(array('_partials.header.certified-therapist', "_partials.header.mobile", "_partials.footer"), function ($view) {
	$models = App\Models\ShortMenu::where("section", "one-on-one")
		->where("active", 1) // 1 is active
		->orderBy("order", 'asc')
		->lists("slug");
	$view->with('modelsCt', $models);
});
