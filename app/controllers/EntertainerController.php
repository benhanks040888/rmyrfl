<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route, URL, Request;
use App\Models\GeneralInfo;
use App\Models\Client;
use App\Models\Testimony;
use App\Models\Imaji;

class EntertainerController extends BaseSiteController {

	public function getIndex($lang = 'id')
	{
		$work = GeneralInfo::Key('work-entertainer-summary')->first();
		$data['work'] = $work->value_id;
		if($lang == 'en'){
			$data['work'] = $work->value_en;
		}
		$data['clients'] = Client::Entertainer()->orderByRaw("RAND()")->take(4)->get();
		
		$testimony = Testimony::select('content_id as content','name','position','photo');
		if($lang == 'en'){
			$testimony = Testimony::select('content_en as content','name','position','photo');
		}
		$data['testimony'] = $testimony->Entertainer()->Featured()->orderByRaw("RAND()")->take(4)->get();
		$data['imaji'] = Imaji::orderByRaw("RAND()")->take(4)->get();
		
		$link['client'] = URL::route('site.entertainer.client',array('lang'=> Request::segment(1)));
		$link['customer'] = URL::route('site.entertainer.customer',array('lang'=> Request::segment(1)));
		$link['work'] = URL::route('site.entertainer.work',array('lang'=> Request::segment(1)));
		$data['link'] = $link;
		
		$data['pageTitle'] = "Corporate Entertainer - Beranda";
		$data['pageDescription'] = "Corporate Entertainer - Beranda";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Entertainer - Home";
			$data['pageDescription'] = "Corporate Entertainer - Home";
		}
		return View::make('pages.home',$data);
	}
	
	public function getClient($lang = 'id')
	{
		$data['clients'] = Client::Entertainer()->get();
		$testimony = Testimony::select('content_id as content','name','position','photo');
		if($lang == 'en'){
			$testimony = Testimony::select('content_en as content','name','position','photo');
		}
		$data['testimony'] = $testimony->Entertainer()->get();
		
		$data['pageTitle'] = "Corporate Entertainer - Klien";
		$data['pageDescription'] = "Corporate Entertainer - Klien";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Entertainer - Client";
			$data['pageDescription'] = "Corporate Entertainer - Client";
		}
		return View::make('pages.client',$data);
	}
	
	public function getCustomer($lang = 'id')
	{
		$data['title'] = trans('menu.customer');
		$content = GeneralInfo::Key('customer-entertainer')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		
		$data['pageTitle'] = "Corporate Entertainer - Pelanggan";
		$data['pageDescription'] = "Corporate Entertainer - Pelanggan";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Entertainer - Customer";
			$data['pageDescription'] = "Corporate Entertainer - Customer";
		}
		return View::make('pages.free',$data);
	}

	public function getWork($lang = 'id')
	{
		$data['title'] = trans('menu.work');
		$content = GeneralInfo::Key('work-entertainer')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		
		$data['pageTitle'] = "Corporate Entertainer - Cara Kerja Kami";
		$data['pageDescription'] = "Corporate Entertainer - Cara Kerja Kami";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Entertainer - How We Work";
			$data['pageDescription'] = "Corporate Entertainer - How We Work";
		}
		return View::make('pages.free',$data);
	}
	
	public function getShow($lang = 'id')
	{
		$data['title'] = trans('menu.show');
		$content = GeneralInfo::Key('show')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "Corporate Entertainer - Jenis Show";
		$data['pageDescription'] = "Corporate Entertainer - Jenis Show";
		if($lang == 'en'){
			$data['pageTitle'] = "Corporate Entertainer - Shows";
			$data['pageDescription'] = "Corporate Entertainer - Shows";
		}
		return View::make('pages.free',$data);
	}
}
