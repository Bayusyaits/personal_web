<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrMedia extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'mr_media';
    protected $primaryKey = 'mm_id';
    protected $foreignKey = 'mm_dm_id';
    protected $fillable = [
        'mm_name',
        'mm_url',
        'mm_is_parent',
        'mm_parent_id',
        'mm_show',
    ];
    
    public $timestamps = false;
    const CREATED_AT = 'mm_create_at';
    const UPDATED_AT = 'mm_update_at';
    
    public function __construct(){
        parent::__construct();
    }
    protected $fieldRules = [
        "mm_id"=>["",""],
        "mm_dm_id"=>["",""],
        "mm_name"=>["required",""],
        "mm_url"=>["required",""],
        "mm_is_parent"=>["",""],
        "mm_parent_id"=>["",""],
        "mm_show"=>["required",""],
    ];

	/*
	 Funtion
	 */
	 
	  public function scopeMediaActive($query)
	    {
	        return $query->where('mm_show', 555);
	    }
	 public function scopeMediaWork($query) {
	    return $query->join('dyn_menu','mm_dm_id','=','dm_id')
	    			 ->where([
					'mm_dm_id'	=> 55103,
					'mm_show'	=> 555
					]);
    }
}
