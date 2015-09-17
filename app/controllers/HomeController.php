<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route;

class HomeController extends BaseSiteController {

	public function getDefault($lang = 'id')
	{
		return Redirect::route('site.home', array('lang'=> $lang));
	}
	
	public function getIndex()
	{
		return View::make('pages.splash');
	}
	
	public function getAbout()
	{
		return View::make('pages.about');
	}
	
	public function getContact()
	{
		return View::make('pages.contact');
	}

}
