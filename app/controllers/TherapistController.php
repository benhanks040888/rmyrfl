<?php namespace App\Controllers;

use App\Models\Client;
use App\Models\GeneralInfo;
use App\Models\Imaji;
use App\Models\Testimony;
use BaseSiteController;
use Request;
use Route;
use URL;
use View;

class TherapistController extends BaseSiteController {

	public function getIndex($lang = 'id') {
		$work = GeneralInfo::Key('work-therapist-summary')->first();
		$data['work'] = $work->value_id;
		if ($lang == 'en') {
			$data['work'] = $work->value_en;
		}

		$customer = GeneralInfo::Key('customer-therapist-summary')->first();
		$data['customer'] = $customer->value_id;
		if ($lang == 'en') {
			$data['customer'] = $customer->value_en;
		}

		$data['clients'] = Client::Therapist()->orderByRaw("RAND()")->take(5)->get();

		$testimony = Testimony::select('content_id as content', 'name', 'position', 'photo');
		if ($lang == 'en') {
			$testimony = Testimony::select('content_en as content', 'name', 'position', 'photo');
		}
		$data['testimony'] = $testimony->Therapist()->Featured()->orderByRaw("RAND()")->take(4)->get();
		$data['imaji'] = Imaji::orderByRaw("RAND()")->take(4)->get();

		$link['client'] = URL::route('site.therapist.client', array('lang' => Request::segment(1)));
		$link['customer'] = URL::route('site.therapist.customer', array('lang' => Request::segment(1)));
		$link['work'] = URL::route('site.therapist.service', array('lang' => Request::segment(1)));
		$data['link'] = $link;
		$data['pageTitle'] = "One on One Coaching & Mentoring - Beranda";
		$data['pageDescription'] = "One on One Coaching & Mentoring - Beranda";
		if ($lang == 'en') {
			$data['pageTitle'] = "One on One Coaching & Mentoring - Home";
			$data['pageDescription'] = "One on One Coaching & Mentoring - Home";
		}
		$promo['promoPopup'] = getPromoPopupData($lang);
		$data['promoPopup'] = $promo;
		$data['pageType'] = 'certified-therapist';
		return View::make('pages.home', $data);
	}

	public function getClient($lang = 'id') {
		$data['clients'] = Client::Therapist()->get();
		$testimony = Testimony::select('content_id as content', 'name', 'position', 'photo');
		if ($lang == 'en') {
			$testimony = Testimony::select('content_en as content', 'name', 'position', 'photo');
		}
		$data['testimony'] = $testimony->Therapist()->get();

		$data['pageTitle'] = "One on One Coaching & Mentoring - Klien";
		$data['pageDescription'] = "One on One Coaching & Mentoring - Klien";
		if ($lang == 'en') {
			$data['pageTitle'] = "One on One Coaching & Mentoring - Client";
			$data['pageDescription'] = "One on One Coaching & Mentoring - Client";
		}
		return View::make('pages.client', $data);
	}

	public function getCustomer($lang = 'id') {
		$data['title'] = trans('menu.customer');
		$content = GeneralInfo::Key('customer-therapist')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - Pelanggan";
		$data['pageDescription'] = "One on One Coaching & Mentoring - Pelanggan";
		if ($lang == 'en') {
			$data['pageTitle'] = "One on One Coaching & Mentoring - Customer";
			$data['pageDescription'] = "One on One Coaching & Mentoring - Customer";
		}
		return View::make('pages.free', $data);
	}

	public function getService($lang = 'id') {
		$data['title'] = trans('menu.service');
		$content = GeneralInfo::Key('therapist-services')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];
		return View::make('pages.free', $data);
	}

	public function getTraining($lang = 'id') {
		$data['title'] = trans('menu.one-how-we-work');
		$content = GeneralInfo::Key('therapist-how-we-work')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];
		return View::make('pages.free', $data);
	}

	public function getGroupTherapy($lang = 'id') {
		$data['title'] = trans('menu.therapy-group');
		$content = GeneralInfo::Key('therapy-case-study')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];

		return View::make('pages.free', $data);
	}

	public function getPersonalTherapy($lang = 'id') {
		$data['title'] = trans('menu.therapy-personal');
		$content = GeneralInfo::Key('therapy-personal')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - Sesi Terapi Perorangan";
		$data['pageDescription'] = "One on One Coaching & Mentoring - Sesi Terapi Perorangan";
		if ($lang == 'en') {
			$data['pageTitle'] = "One on One Coaching & Mentoring - Personal Therapy Session";
			$data['pageDescription'] = "One on One Coaching & Mentoring - Personal Therapy Session";
		}
		return View::make('pages.free', $data);
	}

	public function getAssociation($lang = 'id') {
		$data['title'] = trans('menu.therapist-association');
		$content = GeneralInfo::Key('therapist-association')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - Asosiasi Terapis Kami";
		$data['pageDescription'] = "One on One Coaching & Mentoring - Asosiasi Terapis Kami";
		if ($lang == 'en') {
			$data['pageTitle'] = "One on One Coaching & Mentoring - Our Therapist Association";
			$data['pageDescription'] = "One on One Coaching & Mentoring - Our Therapist Association";
		}
		return View::make('pages.free', $data);
	}

	public function getSesiGroup($lang = 'id') {
		$data['title'] = trans('menu.menu-group');
		$content = GeneralInfo::Key('therapist-group')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];
		return View::make('pages.free', $data);
	}

	public function getProduct($lang = 'id') {
		$data['title'] = trans('menu.menu-product');
		$content = GeneralInfo::Key('therapist-product')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];
		return View::make('pages.free', $data);
	}

	public function getFreeGift($lang = 'id') {
		$data['title'] = trans('menu.menu-gift');
		$content = GeneralInfo::Key('therapist-gift')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];
		return View::make('pages.free', $data);
	}

	public function getAssociate($lang = 'id') {
		$data['title'] = trans('menu.menu-association');
		$content = GeneralInfo::Key('therapist-association-coach')->first();
		if ($content) {
			$data['content'] = $content->value_id;
			if ($lang == 'en') {
				$data['content'] = $content->value_en;
			}
		}
		$data['pageTitle'] = "One on One Coaching & Mentoring - " . $data['title'];
		$data['pageDescription'] = "One on One Coaching & Mentoring - " . $data['title'];
		return View::make('pages.free', $data);
	}
}
