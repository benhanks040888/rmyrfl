<?php

class BaseSiteController extends Controller {

	
	/**
	 * Set CSRF filter on every POST request
	 *
	 * @return void
	 */
  public function __construct()
  {
    $this->beforeFilter('csrf', array('on' => 'post'));
    
	$allowedLang = array('id','en');
	$lang = Request::segment(1);
	if(!in_array($lang,$allowedLang)){
		$queryToAdd = array('lang' => 'id');
		if($lang == 'EN')
			$queryToAdd = array('lang' => 'en');
		
		$currentQuery = Input::query();
		$query = array_merge($queryToAdd, $currentQuery);
		Redirect::route(Route::currentRouteName(), $query)->send();
	}
    	
  }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
