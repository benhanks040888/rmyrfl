<?php namespace App\Models;

class ProductType extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	//protected $table = 'article';
	
	//private static $myTable = 'article';
	
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
	
	public static function get()
	{
		$pType = array(
			'book' => 'Book',
			'cd' => 'CD',
			'secret' => 'Secret Item'
		);
		return $pType;
	}
}