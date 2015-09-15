<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route;

class HomeController extends BaseSiteController {

	public function getDefault($lang = 'id')
	{
		return Redirect::route('home', array('lang'=> $lang));
	}
	
	public function getIndex()
	{
		return View::make('pages.splash');
	}

}
