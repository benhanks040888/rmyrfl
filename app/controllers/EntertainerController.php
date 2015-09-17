<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route;

class EntertainerController extends BaseSiteController {

	public function getIndex()
	{
		return View::make('pages.entertainer.home');
	}
	
	public function getClient()
	{
		return View::make('pages.entertainer.client');
	}

}
