<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\PromoOrder;
use App\Models\Promo;
use App\Models\PromoType;

class PromoOrderController extends BaseController {

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
				'name' => 'email',
				'alias' => 'Email',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'promo_title',
				'alias' => 'Promo Title',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),            
						
						array(
				'name' => 'created_at',
				'alias' => 'Date',
				'type' => 'DATETIME',
								'hidden' => false,
								'unsearchable' => true
			),            
						
						array(
				'name' => 'active',
				'alias' => 'Handled',
				'type' => 'Boolean',
								'hidden' => false,
								'unsearchable' => true
			)
		);		
	}
	
	
	public function getList()
	{
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = PromoOrder::get();
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.promo-order',$data);
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
		
		$rowset = PromoOrder::getDatatable($options);
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
			$promo = PromoOrder::select('name','email','phone','address','promo_name','message','price','created_at as cdate')->find(Input::get('id'));
			if($promo !== null){
				$return['success'] = 1;
				$data['name'] = $promo->name;
				$data['email'] = $promo->email;
				$data['phone'] = $promo->phone;
				$data['address'] = $promo->address;
				$data['promo_name'] = $promo->promo_name;
				$data['price'] = $promo->price;
				$data['message'] = $promo->message;
				$data['created_at'] = $promo->cdate;
				$return['data'] = $data;
			}
		}
		echo json_encode($return);
	}
	
	public function postSwitchActive()
	{
		if(Input::has('id')){
			echo PromoOrder::switchShow(Input::get('id'));
		}
		else{
			echo "0";
		}
	}
}