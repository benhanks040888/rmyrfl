<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route;
use App\Models\GeneralInfo;

class HomeController extends BaseSiteController {

	public function getDefault($lang = 'id')
	{
		return Redirect::route('site.home', array('lang'=> $lang));
	}
	
	public function getIndex()
	{
		return View::make('pages.splash');
	}
	
	public function getAbout($lang = 'id')
	{
		$about = GeneralInfo::where('key','=','romy')->first();
		$manage = GeneralInfo::where('key','=','management')->first();
		
		if($lang == 'en'){
			$romy['title'] = $about->title_en;
			$romy['content'] = $about->value_en;
			$management['title'] = $manage->title_en;
			$management['content'] = $manage->value_en;
		}
		else if($lang == 'id'){
			$romy['title'] = $about->title_id;
			$romy['content'] = $about->value_id;
			$management['title'] = $manage->title_id;
			$management['content'] = $manage->value_id;		
		}
		
		$data['romy'] = $romy;
		$data['management'] = $management;
		return View::make('pages.about',$data);
	}
	
	public function getContact()
	{
		return View::make('pages.contact');
	}
	
	public function getAffirmation($lang = 'id')
	{
		$data['title'] = trans('menu.affirmation');
		$content = GeneralInfo::Key('affirmation')->first();
		$data['content'] = $content->value_id;
		if($lang == 'en'){
			$data['content'] = $content->value_en;
		}
		return View::make('pages.free',$data);
	}
	
	public function getImaji($lang = 'id')
	{
		$data['title'] = 'IMAJI';
		$data['content'] = 'IMAJI';
		return View::make('pages.imaji',$data);
	}
	
	public function getSearch()
	{
		$data['title'] = 'Search Result';
		$data['content'] = 'LALALA';
		return View::make('pages.search',$data);
	}
	
	public function getOther($lang,$slug)
	{
		return View::make('pages.free');
	}

}
