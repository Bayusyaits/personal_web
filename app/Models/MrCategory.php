<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrCategory extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'mr_category';
    protected $primaryKey = 'mc_id';
    protected $foreignKey = 'mc_dm_id';
    protected $fillable = [
        'mc_type',
        'mc_name',
        'mc_is_parent',
        'mc_parent_id',
        'mc_show',
    ];
    
    public $timestamps = false;
    const CREATED_AT = 'mc_create_at';
    const UPDATED_AT = 'mc_update_at';
    
    public function __construct(){
        parent::__construct();
    }
    protected $fieldRules = [
        "mc_id"=>["",""],
        "mc_dm_id"=>["",""],
        "mc_type"=>["required",""],
        "mc_name"=>["required",""],
        "mc_is_parent"=>["",""],
        "mc_parent_id"=>["",""],
        "mc_show"=>["",""],
    ];

	/*
	 Funtion
	 */
	 
	  public function scopeCategoryActive($query)
	    {
	        return $query->where('mc_show', 555);
	    }
	 public function scopeFields($query) {
	    return $query->join('dyn_menu','mc_dm_id','=','dm_id')
	    			 ->where([
					'mc_dm_id'	=> 55103,
					'mc_show'	=> 555
					]);
    }
    public function scopeSubjects($query) {
        return $query->join('dyn_menu','mc_dm_id','=','dm_id')
                     ->where([
                    'mc_dm_id'  => 55104,
                    'mc_show'   => 555
                    ]);
    }

}
