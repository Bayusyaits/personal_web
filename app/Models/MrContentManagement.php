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
        'mcm_initial',
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
        "mcm_initial"=>["required",""],
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
	 public function scopeContentCaseStudies($query) {
	    return $query->join('dyn_menu','mcm_dm_id','=','dm_id')
	    			 ->where([
					'mcm_dm_id'	        => 55103,
					'mcm_show'      	=> 555
					]);
    }
    public function scopeContentMenu($query) {
        return $query->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
	    			 ->where([
                    'mcm_keyword'   	=> '[Content-Menu]',
                    'mcm_is_parent' 	=> 1,
                    'mcm_parent_id'	    => 0,
					'mcm_show'	        => 555
					]);
    }
    public function scopeContentMenuCaseStudies($query) {
        return $query->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
	    			 ->where([
                    'mcm_keyword'   	=> '[Content-Menu]Case-Studies',
                    'mcm_is_parent' 	=> 1,
                    'mcm_parent_id'	    => 5511203,
					'mcm_show'	        => 555
					]);
    }
}
