<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\Client;
use App\Models\MainCategory;

class ClientController extends BaseController {
	
	private $upload_path = 'uploads/logo/';
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
				'name' => 'name',
				'alias' => 'Name',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),            
						
						array(
				'name' => 'logo',
				'alias' => 'Logo',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => true
			)
		);		
	}
	
	
	public function getList($url_cat)
	{
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			return Redirect::route('admin.client',array('url_category'=>'entertainer'));
		
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = Client::get();
		$data['category'] = $url_cat;
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.client',$data);
	}
	
	public function getFormAdd($url_cat)
	{
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			return Redirect::route('admin.client',array('url_category'=>'entertainer'));
		
		$data = array();
		$data['action'] = "Add";
		$data['input'] = Input::old();
		$data['category'] = $url_cat;
		return View::make('admin.site.form.client',$data);
	}
	
	public function getFormEdit($url_cat,$id)
	{
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			return Redirect::route('admin.client',array('url_category'=>'entertainer'));
		
		$data = array();
		$input = Client::find($id);
		if(is_null($input)){
			return Redirect::route('admin.client');
		}
		$data['action'] = "Edit";
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		else{
			$data['input']['image'] = $input['image'];
		}
		$data['category'] = $url_cat;
		$data['formProcess'] = "editProcess";
		return View::make('admin.site.form.client',$data);
	}
	
	public function postList($url_cat)
	{
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			return Redirect::route('admin.client',array('url_category'=>'entertainer'));
		
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
		
		$rowset = Client::getDatatable($options);
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
			$client = Client::select('name','logo','created_at as cdate')->find(Input::get('id'));
			if($client !== null){
				$return['success'] = 1;
				$data['name'] = $client->name;
				$data['logo'] = $client->logo;
				$data['created_at'] = $client->cdate;
				$return['data'] = $data;
			}
		}
		echo json_encode($return);
	}
	
	public function postSubmit($url_cat){
		$check = $this->checkUrlCategory($url_cat);
		if(!$check)
			return Redirect::route('admin.client',array('url_category'=>'entertainer'));
		
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'name' => Input::get('name'),
					'logo' => Input::file('image')
				),
				array(
					'name' => 'required|unique:client,name',
					'logo' => 'image'
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.client.add',array('url_category'=>$url_cat))->withErrors($validator)->withInput();
			}
				
			$client = new Client;
			$client->name = Input::get('name');
			$client->category = Input::get('category');
			if(!file_exists($this->upload_path)) {
				mkdir($this->upload_path, 0775, true);
			}
			if(!is_null(Input::file('image'))){
				$file = Input::file('image');
				if($file->isValid()){
					$extension = $file->getClientOriginalExtension();
					$img = Image::make($file->getRealPath());
					$img->resize(null, 75, function($constraint){
						$constraint->aspectRatio();
					});
					$img->interlace();
					$name = $client->name.'_'.uniqid();
					$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
					$img->save($fileName);
					$client->logo = $fileName;
				}
			}
			$client->save();
			
			if(!$client->id){
				throw new \Exception('Client insert error');
			}
			$this->clearCache();
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'name' => Input::get('name'),
						'logo' => Input::file('image')
					),
					array(
						'name' => 'required|unique:client,name,'.Input::get('id'),
						'logo' => 'image'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.client.edit',array('url_category'=>$url_cat,'id' => Input::get('id')))->withErrors($validator)->withInput();
				}
				
				$client = Client::find(Input::get('id'));
				$client->name = Input::get('name');
				if(!file_exists($this->upload_path)) {
					mkdir($this->upload_path, 0775, true);
				}
				if(!is_null(Input::file('image'))){
					$file = Input::file('image');
					if($file->isValid()){
						if(!empty($client->logo)){
							File::delete($client->logo);
						}
						$extension = $file->getClientOriginalExtension();
						$img = Image::make($file->getRealPath());
						$img->resize(null, 75, function($constraint){
							$constraint->aspectRatio();
						});
						$img->interlace();
						$name = $client->name.'_'.uniqid();
						$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
						$img->save($fileName);
						$client->logo = $fileName;
					}
				}
				$client->save();
				$this->clearCache();
			}
		}
		return Redirect::route('admin.client',array('url_category'=>$url_cat));
	}
	
	public function postSwitchFeatured()
	{
		if(Input::has('id')){
			echo Client::switchFeatured(Input::get('id'));
			$this->clearCache();
		}
		else{
			echo "0";
		}
	}
	
	public function postDelete()
	{
		if(Input::has('id')){
			DB::transaction(function()
			{
				$client = Client::find(Input::get('id'));
				if(!empty($client->logo)){
					File::delete($client->logo);
				}
				Client::destroy(Input::get('id'));
				echo "1";
			});
			$this->clearCache();
		}
		else{
			echo "0";
		}
	}
	
	private function clearCache(){
		$cache = 'cafe_event';
		if (Cache::has($cache))
		{
			Cache::forget($cache);
		}
	}
	
	private function checkUrlCategory($cat)
	{
		$allowed = MainCategory::get();
		return array_key_exists($cat,$allowed);
	}
	
	public function getDefault()
	{
		return Redirect::route('admin.client',array('url_category'=>'entertainer'));
	}
}