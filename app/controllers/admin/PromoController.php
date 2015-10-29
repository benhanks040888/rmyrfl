<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\Promo;

class PromoController extends BaseController {

	private $upload_path = 'uploads/promo/';
	
	public function getList()
	{
		$get = Promo::first();
		$data['result'] = $get;
		return View::make('admin.site.promo',$data);
	}
	
	public function getFormEdit()
	{
		$data = array();
		$input = Promo::first();
		$data['input'] = Input::old();
		if($input){
			if(!$data['input']){
				$data['input'] = $input;
			}
		}
		return View::make('admin.site.form.promo',$data);
	}
	
	public function postSubmit(){
		$validator = Validator::make(
			array(
				'Title (EN)' => Input::get('title_en'),
				'Title (ID)' => Input::get('title_id'),
				'Photo' => Input::file('image')
			),
			array(
				'Title (EN)' => 'required',
				'Title (ID)' => 'required',
				'Photo' => 'image|max:2048' //maximum image size of 2 MB
			)
		);
		if ($validator->fails()){
			return Redirect::route('admin.promo.edit')->withErrors($validator)->withInput();
		}
			
		$promo = Promo::firstOrNew(array());
		$promo->title_en = Input::get('title_en');
		$promo->title_id = Input::get('title_id');
		$promo->content_id = Input::get('content_id');
		$promo->content_en = Input::get('content_en');
		if(!file_exists($this->upload_path)) {
			mkdir($this->upload_path, 0777, true);
		}
		if(!is_null(Input::file('image'))){
			$file = Input::file('image');
			if(!is_null(Input::file('image'))){
				$file = Input::file('image');
				if($file->isValid()){
					if(!empty($promo->picture)){
						File::delete($promo->picture);
					}
					$extension = $file->getClientOriginalExtension();
					$img = Image::make($file->getRealPath());
					$img->resize(null, 520, function($constraint){
						$constraint->aspectRatio();
					});
					$img->interlace();
					$name = 'promo_'.uniqid();
					$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
					$img->save($fileName);
					$promo->picture = $fileName;
				}
			}
		}
		$promo->save();
		$this->clearCache();
		
		if(!$promo->id){
			throw new \Exception('Promo insert error');
		}
		return Redirect::route('admin.promo');
	}
	
	public function postRemovePicture()
	{
		$record = Promo::first();
		if($record){
			if(!empty($record->picture)){
				File::delete($record->picture);
			}
			$record->picture = "";
			$record->save();
			$this->clearCache();
			echo "1";
		}
		else{
			echo "0";
		}
	}
	
	public function postSwitchActive()
	{
		if(Input::has('id')){
			echo Promo::switchShow(Input::get('id'));
		}
		else{
			echo "0";
		}
	}
	
	private function clearCache(){
		$cache = 'promo_popup_data';
		if (Cache::has($cache))
		{
			Cache::forget($cache);
		}
	}
}