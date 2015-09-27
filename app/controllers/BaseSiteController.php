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
	App::setLocale($lang);
	if(!in_array($lang,$allowedLang)){
		if(strtolower($lang) == 'en'){
			$lang = 'en';
			App::setLocale('en');
		}
		else{
			$lang = 'id';
			App::setLocale('id');
		}
		$segments = Request::segments();
		$segments[0] = $lang;
		Redirect::to(implode('/',$segments))->send();
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
