<?php namespace App\Models;

use Mail;

class Notification extends \Eloquent {

	private static $my_mail = "tad_emmanuel@yahoo.com";
	private static $my_name = "Website Admin";
	
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
			$message->to(self::$my_mail, self::$my_name)->subject('Contact Us Form Notification : '.$data->subject);
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
			$message->to(self::$my_mail, self::$my_name)->subject('Product purchase');
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