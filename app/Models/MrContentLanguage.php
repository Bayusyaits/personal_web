<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrContentLanguage extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'mr_content_language';
    protected $primaryKey = 'mcl_id';
    protected $dates = ['mcl_deleted_at'];
    protected $foreignKey = 'mcl_dm_id';
    protected $fillable = [
        'mcl_keyword',
        'mcl_name',
        'mcl_content_id',
        'mcl_content_en',
        'mcl_salt',
        'mcl_show',
    ];
    
    public $timestamps = false;
    const CREATED_AT = 'mcl_create_at';
    const UPDATED_AT = 'mcl_update_at';
    
    public function __construct(){
        parent::__construct();
    }
    protected $fieldRules = [
        "mcl_id"=>["",""],
        "mcl_dm_id"=>["",""],
        "mcl_keyword"=>["required",""],
        "mcl_name"=>["required",""],
        "mcl_content_id"=>["required",""],
        "mcl_content_en"=>["",""],
        "mcl_salt"=>["",""],
        "mcl_show"=>["required",""],
    ];

	/*
	 Funtion
	 */
	 
	  public function scopeContentActive($query)
	    {
	        return $query->where(['mcl_show', 555,'mcl_deleted_at'=>0]);
	    }
	 public function scopeContentWork($query) {
	    return $query->join('dyn_menu','mcl_dm_id','=','dm_id')
	    			 ->where([
					'mcl_dm_id'	=> 55103,
					'mcl_show'	=> 555,
                    'mcl_deleted_at'=>0
					]);
    }
}
