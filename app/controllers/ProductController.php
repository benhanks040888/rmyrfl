<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route, Validator, Session;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Notification;
use App\Models\MagicQuestion;

class ProductController extends BaseSiteController {

	private $item_per_page = 2;
	
	public function getIndex($lang = 'id')
	{
		$sort = Input::get('sort');
		$data['sortType'] = strtolower($sort);
		if($data['sortType'] == 'high'){
			$order = "DESC";
		}
		else{
			$data['sortType'] = 'low';
			$order = "ASC";
		}
		$data['products'] = Product::Active()->where('type','=','book')->orWhere('type','=','cd')->orderBy('price',$order)->paginate($this->item_per_page);		
		$data['pageTitle'] = "Produk";
		$data['pageDescription'] = "Produk";
		if($lang == 'en'){
			$data['pageTitle'] = "Product";
			$data['pageDescription'] = "Product";
		}
		return View::make('pages.product',$data);
	}
	
	public function getSecret($lang = 'id')
	{
		if(Session::has('RR-secret'))
			return $this->viewSecretProduct($lang);
		return $this->viewSecretQuestion($lang);
	}
	
	private function viewSecretQuestion($lang = 'id')
	{
		$question = MagicQuestion::first();
		
		$data['question'] = $question->question_id;
		if($lang == 'en'){
			$data['question'] = $question->question_en;
		}
		
		$data['picture'] = $question->picture;
		$data['pageTitle'] = "Secret Item";
		$data['pageDescription'] = "Secret Item";
		return View::make('pages.secret',$data);
	}
	
	private function viewSecretProduct($lang = 'id')
	{
		$sort = Input::get('sort');
		$data['sortType'] = strtolower($sort);
		if($data['sortType'] == 'high'){
			$order = "DESC";
		}
		else{
			$data['sortType'] = 'low';
			$order = "ASC";
		}
		$data['products'] = Product::Active()->where('type','=','secret')->paginate($this->item_per_page);
		$data['pageTitle'] = "Secret Item";
		$data['pageDescription'] = "Secret Item";		
		return View::make('pages.product',$data);
	}
	
	public function postSecretAnswer($lang = 'id')
	{
		$answer = Input::get('answer');
		
		if($answer){
			$question = MagicQuestion::first();
			
			$match = $question->answer_id;
			if($lang == 'en'){
				$match = $question->answer_en;
			}
			
			if(strtolower(trim($answer)) == strtolower(trim($match))){
				//correct answer
				Session::put('RR-secret',0);
			}
		}
		//wrong answer or invalid request
		return Redirect::route('site.product.secret',array('lang'=> $lang));	
	}
	
	public function getBuy($lang = 'id', $slug)
	{
		$data['product'] = Product::Active()->where('slug','=',$slug)->first();
		if(empty($slug) || !$data['product']){
			return Redirect::route('site.product',array('lang'=> $lang));
		}
		$data['pageTitle'] = "Beli";
		$data['pageDescription'] = "Beli";
		if($lang == 'en'){
			$data['pageTitle'] = "Buy";
			$data['pageDescription'] = "Buy";
		}
		return View::make('pages.buy',$data);
	}
	
	public function postBuy($lang = 'id')
	{
		$product = Product::find(Input::get('product_id'));
		if(!$product){
			return Redirect::route('site.product',array('lang'=> $lang));
		}
		$validator = Validator::make(
			array(
				'Captcha' => Input::get('g-recaptcha-response'),
				'Name' => Input::get('name'),
				'Email' => Input::get('email'),
				'Phone' => Input::get('phone'),
				'Address' => Input::get('address')
			),
			array(
				'Captcha' => 'required|captcha',
				'Name' => 'required',
				'Email' => 'required',
				'Phone' => 'required',
				'Address' => 'required'
			)
		);
		if ($validator->fails()){
			return Redirect::route('site.product.buy',array('lang'=> $lang, 'slug'=>$product->slug))->withErrors($validator->errors());
		}
			
		$contact = new ProductOrder;
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->phone = Input::get('phone');
		$contact->address = Input::get('address');
		$contact->message = Input::get('message');
		$contact->product_id = $product->id;
		$contact->product_name = $product->name_id;
		if($lang == 'en'){
			$contact->product_name = $product->name_en;
		}
		$contact->price = $product->price;
		$contact->save();
			
		$email = Notification::sendEmailBuyProduct($contact);
		if(!$email){
			Log::error('Failed sending Product Purchase email with reference ID : '.$contact->id);
		}
		
		if(!$contact->id){
			$errorMessage = "Proses gagal, coba beberapa saat lagi";
			if($lang == 'en'){
				$errorMessage = "Process failed, please try again later";
			}
			return Redirect::route('site.product.buy',array('lang'=> $lang, 'slug'=>$product->slug))->with('error_message',$errorMessage);
		}
		
		$successMessage = "Pesanan Anda telah kami terima, kami akan segera menghubungi anda untuk proses konfirmasi";
		if($lang == 'en'){
			$successMessage = "We have received your order, we will contact you soon for confirmation";
		}
		return Redirect::route('site.product',array('lang'=> $lang))->with('success',$successMessage);
	}
}
