<?php namespace App\Models;

use DB,Str;

class Product extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	protected $table = 'product';
	
	private static $myTable = 'product';
	
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

	public function setSlugAttribute($value)
	{
		$slug = Str::slug($value);

		if(!empty($this->attributes['id'])){
		  $slugCount = $this->where('id','!=',$this->attributes['id'])->where('slug','=',$slug)->count();
		  if($slugCount > 0)
			$slugCount = count($this->whereRaw("id != '" . $this->attributes['id'] . "' AND slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
		} else {
		  $slugCount = count($this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
		}
		$slugFinal = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;

		$this->attributes['slug'] = $slugFinal;
	}
	
	public static function scopeActive($query)
	{
		return $query->where('active','=',1);
	}
	
	public static function scopeSlug($query,$slug)
	{
		return $query->where('slug','=',$slug);
	}
	
	public static function switchShow($id)
	{
		$query = "UPDATE ".self::$myTable." SET `active` = NOT `active` WHERE id = :id";
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
			if($options['filter'] == 'yes')
				$search = "(".$search.") AND `active` = 1";
			elseif($options['filter'] == 'no')
				$search = "(".$search.") AND `active` = 0";			
			
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
			if($options['filter'] == 'yes')
				$filter .= "`active` = 1";
			elseif($options['filter'] == 'no')
				$filter .= "`active` = 0";
			
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