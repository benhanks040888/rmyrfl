<?php namespace App\Models;

use DB;

class Promo extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	protected $table = 'promo';
	private static $myTable = 'promo';
	
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $guarded = array(
  
  );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(
		
	);
	
	public static function scopeActive($query)
	{
		return $query->where('active','=',1);
	}
	
	public static function switchShow($id)
	{
		$query = "UPDATE ".self::$myTable." SET `active` = NOT `active` WHERE id = :id";
		DB::statement($query, array('id' => $id));
		return 1;
	}
}