<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\Imaji;

class ImajiController extends BaseController {

	private $upload_path = 'uploads/imaji/';
	
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
				'name' => 'title',
				'alias' => 'Title',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			)
		);		
	}
	
	
	public function getList()
	{
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = Imaji::get();
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.imaji',$data);
	}
	
	public function getFormAdd()
	{
		$data = array();
		$data['action'] = "Add";
		$data['input'] = Input::old();
		return View::make('admin.site.form.imaji',$data);
	}
	
	public function getFormEdit($id)
	{
		$data = array();
		$input = Imaji::find($id);
		if(is_null($input)){
			return Redirect::route('admin.imaji');
		}
		$data['action'] = "Edit";
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$data['formProcess'] = "editProcess";
		return View::make('admin.site.form.imaji',$data);
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
		
		$rowset = Imaji::getDatatable($options);
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
			$imaji = Imaji::select('title','description','created_at as cdate')->find(Input::get('id'));
			if($imaji !== null){
				$return['success'] = 1;
				$data['title'] = $imaji->title;
				$data['description'] = $imaji->description;
				$data['created_at'] = $imaji->cdate;
				$return['data'] = $data;
			}
		}
		echo json_encode($return);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'Title' => Input::get('title'),
					'Youtube Video ID' => Input::get('youtube_id')
				),
				array(
					'Title' => 'required',
					'Youtube Video ID' => 'required'
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.imaji.add')->withErrors($validator)->withInput();
			}
				
			$imaji = new Imaji;
			$imaji->title = Input::get('title');
			$imaji->youtube_id = Input::get('youtube_id');
			$imaji->description = Input::get('description');
			$imaji->save();
			
			if(!$imaji->id){
				throw new \Exception('Imaji insert error');
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'Title' => Input::get('title'),
						'Youtube Video ID' => Input::get('youtube_id')
					),
					array(
						'Title' => 'required',
						'Youtube Video ID' => 'required'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.imaji.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
				
				$imaji = Imaji::find(Input::get('id'));
				$imaji->title = Input::get('title');
				$imaji->youtube_id = Input::get('youtube_id');
				$imaji->description = Input::get('description');
				$imaji->save();
			}
		}
		return Redirect::route('admin.imaji');
	}
	
	public function postSwitchActive()
	{
		if(Input::has('id')){
			echo Imaji::switchShow(Input::get('id'));
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
				$imaji = Imaji::find(Input::get('id'));
				if(!empty($imaji->image)){
					File::delete($imaji->image);
				}
				if(!empty($imaji->thumbnail)){
					File::delete($imaji->thumbnail);
				}
				Imaji::destroy(Input::get('id'));
				echo "1";
			});
		}
		else{
			echo "0";
		}
	}
}