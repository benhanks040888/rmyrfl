<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route, Validator, Session, Config, Log;
use App\Models\GeneralInfo;
use App\Models\ContactUs;
use App\Models\Notification;

class HomeController extends BaseSiteController {

	public function getDefault($lang = 'id')
	{
		return Redirect::route('site.home', array('lang'=> $lang));
	}
	
	public function getIndex($lang = 'id')
	{
		return View::make('pages.splash');
	}
	
	public function getAbout($lang = 'id')
	{
		$about = GeneralInfo::where('key','=','romy')->first();
		$manage = GeneralInfo::where('key','=','management')->first();
		
		if($lang == 'en'){
			$romy['title'] = $about->title_en;
			$romy['content'] = $about->value_en;
			$management['title'] = $manage->title_en;
			$management['content'] = $manage->value_en;
		}
		else if($lang == 'id'){
			$romy['title'] = $about->title_id;
			$romy['content'] = $about->value_id;
			$management['title'] = $manage->title_id;
			$management['content'] = $manage->value_id;		
		}
		
		$data['romy'] = $romy;
		$data['management'] = $management;
		
		$data['pageTitle'] = "Tentang";
		$data['pageDescription'] = "Tentang";
		if($lang == 'en'){
			$data['pageTitle'] = "About";
			$data['pageDescription'] = "About";
		}
		return View::make('pages.about',$data);
	}
	
	public function getContact($lang = 'id')
	{
		$contact_copy = GeneralInfo::where('key','=','contact-us')->first();
		$data['pageTitle'] = "Hubungi Kami";
		$data['pageDescription'] = "Hubungi Kami";
		$data['contact_copy'] = $contact_copy->value_id;
		if($lang == 'en'){
			$data['pageTitle'] = "Contact Us";
			$data['pageDescription'] = "Contact Us";
			$data['contact_copy'] = $contact_copy->value_en;
		}
		return View::make('pages.contact', $data);
	}
	
	public function postContact($lang = 'id')
	{
		$validator = Validator::make(
			array(
				'Captcha' => Input::get('g-recaptcha-response'),
				'Name' => Input::get('name'),
				'Email' => Input::get('email'),
				'Phone' => Input::get('phone'),
				'Address' => Input::get('address'),
				'Subject' => Input::get('subject'),
				'Message' => Input::get('message')
			),
			array(
				'Captcha' => 'required|captcha',
				'Name' => 'required',
				'Email' => 'required',
				'Phone' => 'required',
				'Address' => 'required',
				'Subject' => 'required',
				'Message' => 'required'
			)
		);
		if ($validator->fails()){
			return Redirect::route('site.contact',array('lang'=> $lang))->withErrors($validator->errors());
		}
			
		$contact = new ContactUs;
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->phone = Input::get('phone');
		$contact->address = Input::get('address');
		$contact->subject = Input::get('subject');
		$contact->message = Input::get('message');
		$contact->save();
			
		if(!$contact->id){
			$errorMessage = "Proses gagal, coba beberapa saat lagi";
			if($lang == 'en'){
				$errorMessage = "Process failed, please try again later";
			}
			return Redirect::route('site.contact',array('lang'=> $lang))->with('error_message',$errorMessage);
		}
		
		$email = Notification::sendEmailContactUs($contact);
		if(!$email){
			Log::error('Failed sending Contact Us email with reference ID : '.$contact->id);
		}
		
		$successMessage = "Pesan Anda telah terkirim";
		if($lang == 'en'){
			$successMessage = "Your message has been sent";
		}
		return Redirect::route('site.contact',array('lang'=> $lang))->with('success',$successMessage);
	}
	
	public function getAffirmation($lang = 'id')
	{
		$data['title'] = trans('menu.affirmation');
		$content = GeneralInfo::Key('affirmation')->first();
		$data['content'] = $content->value_id;
		if($lang == 'en'){
			$data['content'] = $content->value_en;
		}
		$data['pageTitle'] = "Afirmasi Positif";
		$data['pageDescription'] = "Afirmasi Positif";
		if($lang == 'en'){
			$data['pageTitle'] = "Positive Affirmation";
			$data['pageDescription'] = "Positive Affirmation";
		}
		return View::make('pages.free',$data);
	}
	
	public function getImaji($lang = 'id')
	{
		$data['title'] = 'IMAJI';
		$data['content'] = 'IMAJI';
		$data['pageTitle'] = "Lintas Imaji";
		$data['pageDescription'] = "Lintas Imaji";
		return View::make('pages.imaji',$data);
	}
	
	public function getSearch()
	{
		$data['title'] = 'Search Result';
		$data['content'] = 'LALALA';
		$data['pageTitle'] = "Hasil Pencarian";
		$data['pageDescription'] = "Hasil Pencarian";
		if($lang == 'en'){
			$data['pageTitle'] = "Search Result";
			$data['pageDescription'] = "Search Result";
		}
		return View::make('pages.search',$data);
	}
	
	public function getOther($lang,$slug)
	{
		return View::make('pages.free');
	}

}
