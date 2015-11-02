<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\MagicQuestion;

class MagicQuestionController extends BaseController {

	private $upload_path = 'uploads/magic-question/';
	
	public function getList()
	{
		$get = MagicQuestion::first();
		$data['result'] = $get;
		return View::make('admin.site.magicQuestion',$data);
	}
	
	public function getFormEdit()
	{
		$data = array();
		$input = MagicQuestion::first();
		$data['input'] = Input::old();
		if($input){
			if(!$data['input']){
				$data['input'] = $input;
			}
		}
		return View::make('admin.site.form.magicQuestion',$data);
	}
	
	public function postSubmit(){
		$validator = Validator::make(
			array(
				'Question (EN)' => Input::get('question_en'),
				'Question (ID)' => Input::get('question_id'),
				'Photo' => Input::file('image')
			),
			array(
				'Question (EN)' => 'required',
				'Question (ID)' => 'required',
				'Photo' => 'image|max:2048' //maximum image size of 2 MB
			)
		);
		if ($validator->fails()){
			return Redirect::route('admin.magic-question.edit')->withErrors($validator)->withInput();
		}
			
		$magicQuestion = MagicQuestion::firstOrNew(array());
		$magicQuestion->question_en = Input::get('question_en');
		$magicQuestion->question_id = Input::get('question_id');
		$magicQuestion->answer_id = Input::get('answer_id');
		$magicQuestion->answer_en = Input::get('answer_en');
		if(!file_exists($this->upload_path)) {
			mkdir($this->upload_path, 0775, true);
		}
		if(!is_null(Input::file('image'))){
			$file = Input::file('image');
			if(!is_null(Input::file('image'))){
				$file = Input::file('image');
				if($file->isValid()){
					if(!empty($magicQuestion->picture)){
						File::delete($magicQuestion->picture);
					}
					$extension = $file->getClientOriginalExtension();
					$img = Image::make($file->getRealPath());
					$img->resize(240, 240, function($constraint){
						$constraint->aspectRatio();
					});
					$img->interlace();
					$name = 'magic-question_'.uniqid();
					$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
					$img->save($fileName);
					$magicQuestion->picture = $fileName;
				}
			}
		}
		$magicQuestion->save();
		
		if(!$magicQuestion->id){
			throw new \Exception('Magic Question insert error');
		}
		return Redirect::route('admin.magic-question');
	}
	
	public function postRemovePicture()
	{
		$record = MagicQuestion::first();
		if($record){
			if(!empty($record->picture)){
				File::delete($record->picture);
			}
			$record->picture = "";
			$record->save();
			echo "1";
		}
		else{
			echo "0";
		}
	}
}