<?php namespace App\Models;

use Mail;

class Notification extends \Eloquent {

	private static $my_mail = "info@romyrafael.net";
	private static $my_name = "Romy Rafael";
	
	public static function sendEmailContactUs($data)
	{
		$content = array();
		$content['name'] = $data->name;
		$content['email'] = $data->email;
		$content['phone'] = $data->phone;
		$content['address'] = $data->address;
		$content['subject'] = $data->subject;
		$content['content'] = $data->message;
		
		$mail = Mail::send('emails.contact-us', $content, function($message) use($data)
		{
			$message->to(self::$my_mail, self::$my_name)->subject('Pesan dari '.$data->name);
		});
		$a = Mail::failures();
		
		if($a)
			return false;
		return true;
	}
	
	public static function sendEmailBuyProduct($data)
	{
		$content = array();
		$content['name'] = $data->name;
		$content['email'] = $data->email;
		$content['phone'] = $data->phone;
		$content['address'] = $data->address;
		$content['content'] = $data->message;
		$content['product_name'] = $data->product_name;
		
		$mail = Mail::send('emails.buy-product', $content, function($message) use($data)
		{
			$message->to(self::$my_mail, self::$my_name)->subject('Pembelian '.$data->product_name.' dari '.$data->name);
		});
		$a = Mail::failures();
		
		if($a)
			return false;
		return true;
	}
	
	public static function sendEmailBuyPromo($data)
	{
		$content = array();
		$content['name'] = $data->name;
		$content['email'] = $data->email;
		$content['title'] = $data->promo_title;
		$content['content'] = $data->promo_description;
		
		$mail = Mail::send('emails.buy-promo', $content, function($message) use($data)
		{
			$message->to(self::$my_mail, self::$my_name)->subject('Promo Order');
		});
		$a = Mail::failures();
		
		if($a)
			return false;
		return true;
	}
}