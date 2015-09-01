<?php namespace App\Controllers\Admin;

use BaseController;
use DB, View, Datatables, Input, Redirect, Str, Validator, Cache;
use App\Models\GeneralInfo;

class GeneralController extends BaseController {

	public function getList()
	{
		$section = GeneralInfo::get();
		$data['section'] = $section;
		return View::make('admin.site.general',$data);
	}
	
	public function getFormEdit($id)
	{
		$sectionName = GeneralInfo::where('key','=',$id)->first();
		
		if(!$sectionName)
			return Redirect::route('admin.general');
			
		$data = array();
		$input = $sectionName;
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$data['formProcess'] = "editProcess";
		
		return View::make('admin.site.form.general',$data);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			//disabled by default
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$general = GeneralInfo::find(Input::get('id'));
				$general->value_en = Input::get('content_en');
				$general->value_id = Input::get('content_id');
				$general->save();
			}
		}
		return Redirect::route('admin.general');
	}
}