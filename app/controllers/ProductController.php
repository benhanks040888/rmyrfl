<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route;

class ProductController extends BaseSiteController {

	public function getIndex($lang = 'id')
	{
		return View::make('pages.product');
	}
	
	public function getSecret()
	{
		return View::make('pages.secret');
	}

}
