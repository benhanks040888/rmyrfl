<?php namespace App\Models;

use DB,Str;

class PromoOrder extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	protected $table = 'promo_order';
	
	private static $myTable = 'promo_order';
	
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
	
	//--------------------datatable---------------------------
        
	public static function getDatatable($options)
	{
		$select = array();
		foreach($options['columns'] as $column){
			array_push($select,$column['name']);
		}
		if(empty($select))$select = "*";
		
		$promo_id = $options['promo_id'];
		if(!$promo_id)
			return false;
		if($options['isSearch']){
			$i = 0;
			foreach($options['sSearch'] as $key => $value){
				$searchTerm[$i] = $key." LIKE '%".$value."%'";
				$i++;
			}
			
			$search = implode(' OR ',$searchTerm);
			if($options['filter'] == 'yes')
				$search = "(".$search.") AND `active` = 1";
			elseif($options['filter'] == 'no')
				$search = "(".$search.") AND `active` = 0";			
			
			$return['total_data'] = DB::table(self::$myTable)->whereRaw($search)->count();
			$return['data'] = DB::table(self::$myTable)->select($select)
				->where('promo_id','=',$promo_id)
				->whereRaw($search)
				->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
				->skip($options['iDisplayStart'])
				->take($options['iDisplayLength'])
				->get();
		}
		else{
			$filter = '';
			if($options['filter'] == 'yes')
				$filter .= "`active` = 1";
			elseif($options['filter'] == 'no')
				$filter .= "`active` = 0";
			
			if(empty($filter)){
				$return['total_data'] = DB::table(self::$myTable)->count();
				$return['data'] = DB::table(self::$myTable)
					->select($select)
					->where('promo_id','=',$promo_id)
					->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
					->skip($options['iDisplayStart'])
					->take($options['iDisplayLength'])
					->get();
			}
			else{
				$return['total_data'] = DB::table(self::$myTable)->whereRaw($filter)->count();
				$return['data'] = DB::table(self::$myTable)
					->select($select)
					->where('promo_id','=',$promo_id)
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