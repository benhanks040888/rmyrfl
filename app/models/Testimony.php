<?php namespace App\Models;

use DB,Str;

class Testimony extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	protected $table = 'testimony';
	
	private static $myTable = 'testimony';
	
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

	public static function scopeEntertainer($query)
	{
		return $query->where('category','=','entertainer');
	}
	
	public static function scopeSpeaker($query)
	{
		return $query->where('category','=','speaker');
	}
	
	public static function scopeTherapist($query)
	{
		return $query->where('category','=','therapist');
	}
	
	public static function scopeFeatured($query)
	{
		return $query->where('featured','=',1);
	}
	
	public static function scopeLatest($query)
	{
		return $query->orderBy('created_at','desc');
	}
	
	public static function switchFeatured($id)
	{
		$query = "UPDATE ".self::$myTable." SET `featured` = NOT `featured` WHERE id = :id";
		DB::statement($query, array('id' => $id));
		return 1;
	}
	
	//--------------------datatable---------------------------
        
	public static function getDatatable($options)
	{
		$select = array();
		foreach($options['columns'] as $column){
			array_push($select,$column['name']);
		}
		if(empty($select))$select = "*";
		
		if($options['isSearch']){
			$i = 0;
			foreach($options['sSearch'] as $key => $value){
				$searchTerm[$i] = $key." LIKE '%".$value."%'";
				$i++;
			}
			
			$search = implode(' OR ',$searchTerm);
			if($options['filter'])
				$search = "(".$search.") AND `category` = '".$options['filter']."'";
			
			$return['total_data'] = DB::table(self::$myTable)->whereRaw($search)->count();
			$return['data'] = DB::table(self::$myTable)->select($select)
				->whereRaw($search)
				->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
				->skip($options['iDisplayStart'])
				->take($options['iDisplayLength'])
				->get();
		}
		else{
			$filter = '';
			if($options['filter'])
				$filter .= "`category` = '".$options['filter']."'";
			
			if(empty($filter)){
				$return['total_data'] = DB::table(self::$myTable)->count();
				$return['data'] = DB::table(self::$myTable)
					->select($select)
					->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
					->skip($options['iDisplayStart'])
					->take($options['iDisplayLength'])
					->get();
			}
			else{
				$return['total_data'] = DB::table(self::$myTable)->whereRaw($filter)->count();
				$return['data'] = DB::table(self::$myTable)
					->select($select)
					->whereRaw($filter)
					->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
					->skip($options['iDisplayStart'])
					->take($options['iDisplayLength'])
					->get();
			}
		}
		return $return;
	}
}