<?php namespace App\Models;

class MainCategory extends \Eloquent {

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

	public static function get() {
		$category = array(
			'entertainer' => 'Corporate Entertainer',
			'speaker' => 'Corporate Speaker',
			'one-on-one' => 'One on One Coaching & Mentoring',
		);
		return $category;
	}
}