<?php namespace App\Controllers\Admin;

use BaseController;

use DB, View;
use App\Models\Product;

class SiteController extends BaseController {

  public function getIndex()
  {
	$data['product_count'] = Product::Active()->count();
	
    return View::make('admin.site.index',$data);
  }

}