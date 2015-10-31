<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Datatables, Input, Redirect, Image, File, Validator, Cache;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends BaseController {

	private $upload_path = 'uploads/product/';
	
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
				'name' => 'name_en',
				'alias' => 'Name (EN)',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'name_id',
				'alias' => 'Name (ID)',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'type',
				'alias' => 'Type',
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
	
		$get = Product::get();
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.product',$data);
	}
	
	public function getFormAdd()
	{
		$categories = ProductType::get();
		$data = array();
		$data['action'] = "Add";
		$data['category'] = $categories;
		$data['input'] = Input::old();
		$data['input']['type'] = '';
		return View::make('admin.site.form.product',$data);
	}
	
	public function getFormEdit($id)
	{
		$data = array();
		$input = Product::find($id);
		if(is_null($input)){
			return Redirect::route('admin.product');
		}
		$categories = ProductType::get();
		$data['action'] = "Edit";
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		else{
			$data['input']['image'] = $input['image'];
		}
		$data['category'] = $categories;
		$data['formProcess'] = "editProcess";
		return View::make('admin.site.form.product',$data);
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
		
		$rowset = Product::getDatatable($options);
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
			$product = Product::select('name_en','name_id','price','masked_price','promo_label_en','promo_label_id','image','type','created_at as cdate')->find(Input::get('id'));
			if($product !== null){
				$return['success'] = 1;
				$data['name_en'] = $product->name_en;
				$data['name_id'] = $product->name_id;
				$data['price'] = $product->price;
				$data['image'] = $product->image;
				$data['type'] = $product->type;
				$data['promo_label_en'] = $product->promo_label_en;
				$data['promo_label_id'] = $product->promo_label_id;
				$data['masked_price'] = $product->masked_price;
				$data['created_at'] = $product->cdate;
				$return['data'] = $data;
			}
		}
		echo json_encode($return);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'Name (EN)' => Input::get('name_en'),
					'Name (ID)' => Input::get('name_id'),
					'Price' => Input::get('price'),
					'Image' => Input::file('image')
				),
				array(
					'Name (EN)' => 'required',
					'Name (ID)' => 'required',
					'Price' => 'numeric',
					'Image' => 'image|max:2048' //maximum image size of 2 MB
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.product.add')->withErrors($validator)->withInput();
			}
			
			if(Input::has('is_promo')){
				$validator = Validator::make(
					array(
						'Promo Label(EN)' => Input::get('promo_label_en'),
						'Promo Label(ID)' => Input::get('promo_label_id')
					),
					array(
						'Promo Label(EN)' => 'required',
						'Promo Label(ID)' => 'required'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.product.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
			}
				
			$product = new Product;
			$product->name_en = Input::get('name_en');
			$product->name_id = Input::get('name_id');
			$product->price = Input::get('price');
			$product->masked_price = Input::get('masked_price');
			$product->type = Input::get('type');
			$product->slug = Input::get('name_id');
			if(Input::has('is_promo')){
				Product::resetPromo();
				$product->is_promo = 1;
				$this->clearCache();
			}
			$product->promo_label_en = Input::get('promo_label_en');
			$product->promo_label_id = Input::get('promo_label_id');
			
			$product->active = 0;
			if(!file_exists($this->upload_path)) {
				mkdir($this->upload_path, 0777, true);
			}
			if(!is_null(Input::file('image'))){
				$file = Input::file('image');
				if($file->isValid()){
					$extension = $file->getClientOriginalExtension();
					$img = Image::make($file->getRealPath());
					$img->resize(265, 240, function($constraint){
						$constraint->aspectRatio();
					});
					$img->interlace();
					$name = $product->name_en.'_'.uniqid();
					$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
					$img->save($fileName);
					$product->image = $fileName;
					
					$img->resize(265, 240, function($constraint){
						$constraint->aspectRatio();
					});
					$img->interlace();
					$fileName = $this->upload_path.Str::slug($name).'_thumb.'.$extension;
					$img->save($fileName);
					$product->thumbnail = $fileName;
				}
			}
			$product->save();
			
			if(!$product->id){
				throw new \Exception('Product insert error');
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'Name (EN)' => Input::get('name_en'),
						'Name (ID)' => Input::get('name_id'),
						'Price' => Input::get('price'),
						'Image' => Input::file('image')
					),
					array(
						'Name (EN)' => 'required',
						'Name (ID)' => 'required',
						'Price' => 'numeric',
						'Image' => 'image|max:2048'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.product.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
				
				if(Input::has('is_promo')){
					$validator = Validator::make(
						array(
							'Promo Label(EN)' => Input::get('promo_label_en'),
							'Promo Label(ID)' => Input::get('promo_label_id')
						),
						array(
							'Promo Label(EN)' => 'required',
							'Promo Label(ID)' => 'required'
						)
					);
					if ($validator->fails()){
						return Redirect::route('admin.product.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
					}
				}
				
				$product = Product::find(Input::get('id'));
				$product->name_en = Input::get('name_en');
				$product->name_id = Input::get('name_id');
				$product->price = Input::get('price');
				$product->masked_price = Input::get('masked_price');
				$product->type = Input::get('type');
				$product->slug = Input::get('name_id');
				if(Input::has('is_promo')){
					Product::resetPromo();
					$product->is_promo = 1;
					$this->clearCache();
				}
				$product->promo_label_en = Input::get('promo_label_en');
				$product->promo_label_id = Input::get('promo_label_id');
				if(!file_exists($this->upload_path)) {
					mkdir($this->upload_path, 0777, true);
				}
				if(!is_null(Input::file('image'))){
					$file = Input::file('image');
					if($file->isValid()){
						if(!empty($product->image)){
							File::delete($product->image);
						}
						if(!empty($product->thumbnail)){
							File::delete($product->thumbnail);
						}
						$extension = $file->getClientOriginalExtension();
						$img = Image::make($file->getRealPath());
						$img->resize(265, 240, function($constraint){
							$constraint->aspectRatio();
						});
						$img->interlace();
						$name = $product->name_en.'_'.uniqid();
						$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
						$img->save($fileName);
						$product->image = $fileName;
						
						$img->resize(265, 240, function($constraint){
							$constraint->aspectRatio();
						});
						$img->interlace();
						$fileName = $this->upload_path.Str::slug($name).'_thumb.'.$extension;
						$img->save($fileName);
						$product->thumbnail = $fileName;
					}
				}
				$product->save();
			}
		}
		return Redirect::route('admin.product');
	}
	
	public function postSwitchActive()
	{
		if(Input::has('id')){
			$this->clearCache();
			echo Product::switchShow(Input::get('id'));
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
				$product = Product::find(Input::get('id'));
				if(!empty($product->image)){
					File::delete($product->image);
				}
				if(!empty($product->thumbnail)){
					File::delete($product->thumbnail);
				}
				Product::destroy(Input::get('id'));
				echo "1";
			});
		}
		else{
			echo "0";
		}
	}
	
	private function clearCache(){
		$cache = 'product-popup-data';
		if (Cache::has($cache))
		{
			Cache::forget($cache);
		}
	}
}