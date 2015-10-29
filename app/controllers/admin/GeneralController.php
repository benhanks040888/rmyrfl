<?php namespace App\Controllers\Admin;

use BaseController;
use DB, View, Datatables, Input, Redirect, Str, Validator, Cache;
use App\Models\GeneralInfo;
use App\Models\MainCategory;

class GeneralController extends BaseController {

	public function getList($url_cat)
	{
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			$url_cat = 'general';
			
		$section = GeneralInfo::where('section','LIKE',$check)->get();
		$data['section'] = $section->groupBy('section');
		$data['category'] = $url_cat;
		return View::make('admin.site.general',$data);
	}
	
	public function getFormEdit($url_cat,$id)
	{
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			$url_cat = 'general';
		
		$sectionName = GeneralInfo::where('key','=',$id)->first();
		
		if(!$sectionName)
			return Redirect::route('admin.general',array('url_category'=>$url_cat));
			
		$data = array();
		$input = $sectionName;
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$data['formProcess'] = "editProcess";
		$data['category'] = $url_cat;
		
		return View::make('admin.site.form.general',$data);
	}
	
	public function postSubmit($url_cat){
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			$url_cat = 'general';
		
		if(Input::get('_action') == 'addProcess'){
			//disabled by default
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$general = GeneralInfo::find(Input::get('id'));
				if(!empty(Input::get('title_en')))
					$general->title_en = Input::get('title_en');
				if(!empty(Input::get('title_id')))
					$general->title_id = Input::get('title_id');
				$general->value_en = Input::get('content_en');
				$general->value_id = Input::get('content_id');
				$general->save();
			}
		}
		return Redirect::route('admin.general',array('url_category'=>$url_cat));
	}
	
	private function checkUrlCategory($cat)
	{
		$allowed = MainCategory::get();
		if(array_key_exists($cat,$allowed))
			return $allowed[$cat];
		return 'General';
	}
	
	public function getDefault()
	{
		return Redirect::route('admin.general',array('url_category'=>'general'));
	}
}