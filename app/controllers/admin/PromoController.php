<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\Promo;

class PromoController extends BaseController {

	private $upload_path = 'uploads/download/';
	
	public function __construct()
	{
		$this->col = array(
						array(
				'name' => 'id',
				'alias' => 'id',
				'type' => 'TEXT',
								'hidden' => true,
								'unsearchable' => true
			),
						array(
				'name' => 'title_en',
				'alias' => 'Title (EN)',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'title_id',
				'alias' => 'Title (ID)',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'file_name',
				'alias' => 'File',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),            
						
						array(
				'name' => 'active',
				'alias' => 'Active',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => true
			)
		);		
	}
	
	
	public function getList()
	{
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = Promo::get();
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.promo',$data);
	}
	
	public function getFormAdd()
	{
		$data = array();
		$data['action'] = "Add";
		$data['input'] = Input::old();
		return View::make('admin.site.form.promo',$data);
	}
	
	public function getFormEdit($id)
	{
		$data = array();
		$input = Promo::find($id);
		if(is_null($input)){
			return Redirect::route('admin.promo');
		}
		$data['action'] = "Edit";
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		else{
			$data['input']['image'] = $input['image'];
			$data['input']['file_location'] = $input['file_location'];
		}
		$data['formProcess'] = "editProcess";
		return View::make('admin.site.form.promo',$data);
	}
	
	public function postList()
	{
		$search = array();
		$is_search = false;
		if(Input::get('sSearch',TRUE) != ""){
			$is_search = true;
			foreach($this->col as $key){
				if(isset($key['boolean']) and $key['unsearchable'] == false){
					if(strtolower(Input::get('sSearch',TRUE)) == 'yes')$search[$key['name']] = 1;
					else if(strtolower(Input::get('sSearch',TRUE)) == 'no')$search[$key['name']] = 0;
				}
				else if($key['unsearchable'] == false){
					$search[$key['name']] = Input::get('sSearch',TRUE);
				}
				
				if($key['type'] == 'ENTITY_DECODE'){
					$search[$key['name']] = htmlentities(Input::get('sSearch',TRUE)) ;
				}
			}
		}
		
		$options = array(
				'iDisplayLength'=> Input::get('iDisplayLength',TRUE), // number of records displayed
				'iDisplayStart'	=> Input::get('iDisplayStart',TRUE), // record viewing offset
				'sort_column' => Input::get('iSortCol_0',TRUE),
				'sort_direction' => Input::get('sSortDir_0',TRUE),
				'columns' => $this->col,
				'sSearch' => $search, 
				'isSearch' => $is_search, //flag indicate a search
				'filter' => Input::get('filter') //all, yes, or no
		);
		
		$rowset = Promo::getDatatable($options);
		$aaData = array();
		foreach($rowset['data'] as $row){
			array_push($aaData, $row);
		}
		$cleanSet = json_decode(json_encode($aaData));
		$aaData = array();
		foreach($cleanSet as $clean){
			$cleanArr = get_object_vars($clean);
			$arr = array();
			foreach($cleanArr as $data){
				array_push($arr,$data);
			}
			array_push($arr,""); //to enable 1 extra column for Actions
			array_push($aaData,$arr);
		}
		$iTotalRecords = $rowset['total_data'];
		$iTotalDisplayRecords = $rowset['total_data'];
		$result = array("aaData" => $aaData,"iTotalRecords" => $iTotalRecords,"iTotalDisplayRecords" => $iTotalDisplayRecords);
		echo json_encode($result);
	}
	
	public function postDetail()
	{
		$return['success'] = 0;
		if(Input::has('id')){
			$promo = Promo::select('title_en','title_id','content_en','content_id','picture','file_name','created_at as cdate')->find(Input::get('id'));
			if($promo !== null){
				$return['success'] = 1;
				$data['title_en'] = $promo->title_en;
				$data['title_id'] = $promo->title_id;
				$data['content_en'] = $promo->content_en;
				$data['content_id'] = $promo->content_id;
				$data['image'] = $promo->picture;
				$data['file_name'] = $promo->file_name;
				$data['created_at'] = $promo->cdate;
				$return['data'] = $data;
			}
		}
		echo json_encode($return);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'Title (EN)' => Input::get('title_en'),
					'Title (ID)' => Input::get('title_id'),
					'Photo' => Input::file('image'),
					'File' => Input::file('file_location')
				),
				array(
					'Title (EN)' => 'required',
					'Title (ID)' => 'required',
					'Photo' => 'image|max:2048', //maximum image size of 2 MB
					'File' => 'required'
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.promo.add')->withErrors($validator)->withInput();
			}
			
			$promo = new Promo;
			$promo->title_en = Input::get('title_en');
			$promo->title_id = Input::get('title_id');
			$promo->content_id = Input::get('content_id');
			$promo->content_en = Input::get('content_en');
			$promo->file_name = Input::get('file_name');
			if(!file_exists($this->upload_path)) {
				mkdir($this->upload_path, 0775, true);
			}
			if(!is_null(Input::file('image'))){
				$file = Input::file('image');
				if($file->isValid()){
					if(!empty($promo->picture)){
						File::delete($promo->picture);
					}
					$extension = $file->getClientOriginalExtension();
					$img = Image::make($file->getRealPath());
					$img->resize(480, 480, function($constraint){
						$constraint->aspectRatio();
					});
					$img->interlace();
					$name = 'promo_'.uniqid();
					$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
					$img->save($fileName);
					$promo->picture = $fileName;
				}
			}
			if(!is_null(Input::file('file_location'))){
				$file = Input::file('file_location');
				if($file->isValid()){
					if(!empty($promo->file_location)){
						File::delete($promo->file_location);
					}
					$extension = $file->getClientOriginalExtension();
					//$name = 'promo_'.uniqid();
					$name = $file->getClientOriginalName();
					$fileName = Str::slug($name).'.'.$extension;
					$file->move($this->upload_path, $fileName);
					$promo->file_location = $this->upload_path.$fileName;
				}
			}
			$promo->save();
			
			if(!$promo->id){
				throw new \Exception('Promo insert error');
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
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
					return Redirect::route('admin.promo.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
					
				$promo = Promo::find(Input::get('id'));
				if(empty($promo->file_location)){
					$validator = Validator::make(
						array(
							'File' => Input::file('file_location')
						),
						array(
							'File' => 'required'
						)
					);
					if ($validator->fails()){
						return Redirect::route('admin.promo.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
					}
				}
				$promo->title_en = Input::get('title_en');
				$promo->title_id = Input::get('title_id');
				$promo->content_id = Input::get('content_id');
				$promo->content_en = Input::get('content_en');
				$promo->file_name = Input::get('file_name');
				if(!file_exists($this->upload_path)) {
					mkdir($this->upload_path, 0775, true);
				}
				if(!is_null(Input::file('image'))){
					$file = Input::file('image');
					if($file->isValid()){
						if(!empty($promo->picture)){
							File::delete($promo->picture);
						}
						$extension = $file->getClientOriginalExtension();
						$img = Image::make($file->getRealPath());
						$img->resize(480, 480, function($constraint){
							$constraint->aspectRatio();
						});
						$img->interlace();
						$name = 'promo_'.uniqid();
						$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
						$img->save($fileName);
						$promo->picture = $fileName;
					}
				}
				if(!is_null(Input::file('file_location'))){
					$file = Input::file('file_location');
					if($file->isValid()){
						if(!empty($promo->file_location)){
							File::delete($promo->file_location);
						}
						$extension = $file->getClientOriginalExtension();
						//$name = 'promo_'.uniqid();
						$name = $file->getClientOriginalName();
						$fileName = Str::slug($name).'.'.$extension;
						$file->move($this->upload_path, $fileName);
						$promo->file_location = $this->upload_path.$fileName;
					}
				}
				$promo->save();
				
				if($promo->active)
					$this->clearCache();
				
				if(!$promo->id){
					throw new \Exception('Promo insert error');
				}
			}
		}
		return Redirect::route('admin.promo');
	}
	
	public function postRemovePicture()
	{
		$record = Promo::find(Input::get('id'));
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
	
	public function postRemoveFile()
	{
		$record = Promo::find(Input::get('id'));
		if($record){
			if(!empty($record->file_location)){
				File::delete($record->file_location);
			}
			$record->file_location = "";
			$record->active = 0;
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
			$promo = Promo::find(Input::get('id'));
			if($promo->file_location){
				$this->clearCache();
				echo Promo::switchShow(Input::get('id'));
			}
			else
				echo '-1';
		}
		else{
			echo "0";
		}
	}
	
	private function clearCache(){
		$cache = 'promo-popup-data';
		if (Cache::has($cache))
		{
			Cache::forget($cache);
		}
	}
}