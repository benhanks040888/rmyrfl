<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route;
use App\Models\Product;

class ProductController extends BaseSiteController {

	public function getIndex($lang = 'id')
	{
		$data['products'] = Product::Active()->where('type','=','book')->orWhere('type','=','cd')->get();		
		return View::make('pages.product',$data);
	}
	
	public function getSecret()
	{
		return View::make('pages.secret');
	}
	
	public function getBuy($lang = 'id', $slug)
	{
		$data['product'] = Product::Active()->where('slug','=',$slug)->first();
		return View::make('pages.buy',$data);
	}

}
