<?php namespace App\Controllers\Admin;

use BaseController;

use DB, View;

class SiteController extends BaseController {

  public function getIndex()
  {
    return View::make('admin.site.index');
  }

}