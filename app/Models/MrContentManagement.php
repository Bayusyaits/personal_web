<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrContentManagement extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'mr_content_management';
    protected $primaryKey = 'mcm_id';
    protected $foreignKey = [
		'mcm_dm_id',
        'mcm_tg_id',
        'mcm_mc_id',
        'mcm_mm_id',
    ];
    protected $fillable = [
        'mcm_keyword',
        'mcm_title_id',
        'mcm_title_en',
        'mcm_content_id',
        'mcm_content_en',
        'mcm_is_parent',
        'mcm_parent_id',
        'mcm_salt',
        'mcm_show',
    ];
    
    public $timestamps = false;
    const CREATED_AT = 'mcm_create_at';
    const UPDATED_AT = 'mcm_update_at';
    
    public function __construct(){
        parent::__construct();
    }
    protected $fieldRules = [
        "mcm_id"=>["",""],
        "mcm_dm_id"=>["",""],
        "mcm_tg_id"=>["",""],
        "mcm_mc_id"=>["",""],
        "mcm_mm_id"=>["",""],
        "mcm_keyword"=>["required",""],
        "mcm_title_id"=>["required",""],
        "mcm_title_en"=>["",""],
        "mcm_content_id"=>["required",""],
        "mcm_content_en"=>["",""],
        "mcm_is_parent"=>["",""],
        "mcm_parent_id"=>["",""],
        "mcm_salt"=>["",""],
        "mcm_show"=>["required",""],
    ];

	/*
	 Funtion
	 */
	 
	  public function scopeContentActive($query)
	    {
	        return $query->where('mcm_show', 555);
	    }
	 public function scopeContentWork($query) {
	    return $query->join('dyn_menu','mcm_dm_id','=','dm_id')
	    			 ->where([
					'mcm_dm_id'	=> 55103,
					'mcm_show'	=> 555
					]);
    }
}
