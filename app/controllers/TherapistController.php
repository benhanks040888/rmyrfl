<?php namespace App\Controllers;

use BaseSiteController;
use View, Input, Redirect, Route, URL, Request;
use App\Models\GeneralInfo;
use App\Models\Client;
use App\Models\Testimony;
use App\Models\Imaji;

class TherapistController extends BaseSiteController {

	public function getIndex($lang = 'id')
	{
		$work = GeneralInfo::Key('work-therapist-summary')->first();
		$data['work'] = $work->value_id;
		if($lang == 'en'){
			$data['work'] = $work->value_en;
		}
		$data['clients'] = Client::Therapist()->orderByRaw("RAND()")->take(4)->get();
		
		$testimony = Testimony::select('content_id as content','name','position','photo');
		if($lang == 'en'){
			$testimony = Testimony::select('content_en as content','name','position','photo');
		}
		$data['testimony'] = $testimony->Therapist()->Featured()->orderByRaw("RAND()")->take(4)->get();
		$data['imaji'] = Imaji::orderByRaw("RAND()")->take(4)->get();
		
		$link['client'] = URL::route('site.therapist.client',array('lang'=> Request::segment(1)));
		$link['customer'] = URL::route('site.therapist.customer',array('lang'=> Request::segment(1)));
		$link['work'] = URL::route('site.therapist.work',array('lang'=> Request::segment(1)));
		$data['link'] = $link;
		return View::make('pages.home',$data);
	}
	
	public function getClient($lang = 'id')
	{
		$data['clients'] = Client::Therapist()->get();
		$testimony = Testimony::select('content_id as content','name','position','photo');
		if($lang == 'en'){
			$testimony = Testimony::select('content_en as content','name','position','photo');
		}
		$data['testimony'] = $testimony->Therapist()->get();
		
		return View::make('pages.client',$data);
	}
	
	public function getCustomer($lang = 'id')
	{
		$data['title'] = trans('menu.customer');
		$content = GeneralInfo::Key('customer-therapist')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		return View::make('pages.free',$data);
	}

	public function getWork($lang = 'id')
	{
		$data['title'] = trans('menu.work');
		$content = GeneralInfo::Key('work-therapist')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		return View::make('pages.free',$data);
	}
	
	public function getTraining($lang = 'id')
	{
		$data['title'] = trans('menu.training');
		$content = GeneralInfo::Key('therapist-training')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		return View::make('pages.free',$data);
	}
	
	public function getGroupTherapy($lang = 'id')
	{
		$data['title'] = trans('menu.therapy-group');
		$content = GeneralInfo::Key('therapy-group')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		return View::make('pages.free',$data);
	}
	
	public function getPersonalTherapy($lang = 'id')
	{
		$data['title'] = trans('menu.therapy-personal');
		$content = GeneralInfo::Key('therapy-personal')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		return View::make('pages.free',$data);
	}
	
	public function getAssociation($lang = 'id')
	{
		$data['title'] = trans('menu.therapist-association');
		$content = GeneralInfo::Key('therapist-association')->first();
		if($content){
			$data['content'] = $content->value_id;
			if($lang == 'en'){
				$data['content'] = $content->value_en;
			}
		}
		return View::make('pages.free',$data);
	}
}
