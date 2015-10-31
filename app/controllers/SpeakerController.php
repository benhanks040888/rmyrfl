<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route, URL, Request;
use App\Models\GeneralInfo;
use App\Models\Client;
use App\Models\Testimony;
use App\Models\Imaji;

class SpeakerController extends BaseSiteController {

	public function getIndex($lang = 'id')
	{
		$work = GeneralInfo::Key('work-speaker-summary')->first();
		$data['work'] = $work->value_id;
		if($lang == 'en'){
			$data['work'] = $work->value_en;
		}
		
		$customer = GeneralInfo::Key('work-entertainer-summary')->first();
		$data['customer'] = $customer->value_id;
		if($lang == 'en'){
			$data['customer'] = $customer->value_en;
		}
		
		$data['clients'] = Client::Speaker()->orderByRaw("RAND()")->take(4)->get();
		
		$testimony = Testimony::select('content_id as content','name','position','photo');
		if($lang == 'en'){
			$testimony = Testimony::select('content_en as content','name','position','photo');
		}
		$data['testimony'] = $testimony->Speaker()->Featured()->orderByRaw("RAND()")->take(4)->get();
		$data['imaji'] = Imaji::orderByRaw("RAND()")->take(4)->get();
		
		$link['client'] = URL::route('site.speaker.client',array('lang'=> Request::segment(1)));
		$link['customer'] = URL::route('site.speaker.customer',array('lang'=> Request::segment(1)));
		$link['work'] = URL::route('site.speaker.work',array('lang'=> Request::segment(1)));
		$data['link'] = $link;
		$data['pageTitle'] = "Corporate Speaker - Beranda";
		$data['pageDescription'] = "Corporate Speaker - Beranda";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Speaker - Home";
			$data['pageDescription'] = "Corporate Speaker - Home";
		}
		$promo['promoPopup'] = getPromoPopupData($lang);
		$data['promoPopup'] = $promo;
		$data['pageType'] = 'corporate-speaker';
		return View::make('pages.home',$data);
	}
	
	public function getClient($lang = 'id')
	{
		$data['clients'] = Client::Speaker()->get();
		$testimony = Testimony::select('content_id as content','name','position','photo');
		if($lang == 'en'){
			$testimony = Testimony::select('content_en as content','name','position','photo');
		}
		$data['testimony'] = $testimony->Speaker()->get();
		$data['pageTitle'] = "Corporate Speaker - Klien";
		$data['pageDescription'] = "Corporate Speaker - Klien";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Speaker - Client";
			$data['pageDescription'] = "Corporate Speaker - Client";
		}
		return View::make('pages.client',$data);
	}
	
	public function getCustomer($lang = 'id')
	{
		$data['title'] = trans('menu.customer');
		$content = GeneralInfo::Key('customer-speaker')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "Corporate Speaker - Pelanggan";
		$data['pageDescription'] = "Corporate Speaker - Pelanggan";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Speaker - Customer";
			$data['pageDescription'] = "Corporate Speaker - Customer";
		}
		
		return View::make('pages.free',$data);
	}

	public function getWork($lang = 'id')
	{
		$data['title'] = trans('menu.work');
		$content = GeneralInfo::Key('work-speaker')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "Corporate Speaker - Cara Kerja Kami";
		$data['pageDescription'] = "Corporate Speaker - Cara Kerja Kami";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Speaker - How We Work";
			$data['pageDescription'] = "Corporate Speaker - How We Work";
		}
		
		return View::make('pages.free',$data);
	}
	
	public function getTraining($lang = 'id')
	{
		$data['title'] = trans('menu.training');
		$content = GeneralInfo::Key('speaker-training')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "Corporate Speaker - Program Training";
		$data['pageDescription'] = "Corporate Speaker - Program Training";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Speaker - Training Program";
			$data['pageDescription'] = "Corporate Speaker - Training Program";
		}
		return View::make('pages.free',$data);
	}
}
