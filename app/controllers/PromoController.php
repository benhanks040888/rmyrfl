<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route, Validator, Session, URL;
use App\Models\Promo;
use App\Models\PromoOrder;
use App\Models\Notification;

class PromoController extends BaseSiteController {

	public function postOrder($lang = 'id')
	{
		$url_source = Input::get('url_source');
		if($url_source)
			$url_source = URL::to('/');
		
		$promo = Promo::Active()->first();
		if(!$promo){
			return Redirect::to($url_source);
		}
		$validator = Validator::make(
			array(
				'Captcha' => Input::get('g-recaptcha-response'),
				'Name' => Input::get('name'),
				'Email' => Input::get('email')
			),
			array(
				'Captcha' => 'required|captcha',
				'Name' => 'required',
				'Email' => 'required'
			)
		);
		
		
		if ($validator->fails()){
			return Redirect::to($url_source);
		}
			
		$contact = new PromoOrder;
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->promo_id = Input::get('promo_id');
		$contact->save();
			
		$email = Notification::sendEmailGetPromo($contact);
		if(!$email){
			Log::error('Failed sending Promo Order email with reference ID : '.$contact->id);
		}
		
		if(!$contact->id){
			Log::error('Failed updating database promo order from : '.$contact->name.' - '.$contact->email );
		}
		
		restrictPromoPopup();
		return Redirect::back();
	}

	public function postDismissPopup($lang = 'id')
	{
		restrictPromoPopup();
	}
}
