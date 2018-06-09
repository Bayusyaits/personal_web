<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrContentManagement extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'mr_content_management';
    protected $primaryKey = 'mcm_id';
    protected $dates = ['mcm_deleted_at'];
    protected $foreignKey = [
		'mcm_dm_id',
        'mcm_tg_id',
        'mcm_mc_id',
        'mcm_mm_id',
        'mcm_mtp_id',
    ];
    protected $fillable = [
        'mcm_is_parent',
        'mcm_parent_id',
        'mcm_salt',
        'mcm_show',
        'mcm_deleted_at',
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
	        return $query->where(['mcm_show'=> 555,'mcm_deleted_at'=>0]);
	    }
    public function scopeContentMenu($query) {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,dm_uri,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src,mm_create_at,mm_update_at')
                     ->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
                     ->leftjoin('mr_text_posts','mtp_id','=','mcm_mtp_id')
                     ->leftjoin('mr_media','mm_id','=','mtp_mm_id')
                     ->orderBy('mcm_id','asc')
	    			 ->where([
                    'mtp_keyword'   	=> '[Content-Menu]',
                    'mtp_uri'        	=> 0,
                    'mtp_is_parent' 	=> 1,
                    'mcm_is_parent' 	=> 1,
                    'mtp_parent_id'	    => 0,
                    'mcm_parent_id'	    => 0,
                    'mcm_deleted_at'    => 0,
                    'dm_url'            => null,
                    'dm_deleted_at'     => 0,
                    'mcm_show'	        => 555,
                    'mtp_show'	        => 555,
                    'mtp_deleted_at'     => 0,
                    ])
                    ->offset(1)
                    ->limit(4)
                    ;
    }
    public function scopeContentMenuPage($query,$id) {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,dm_uri,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src,mm_create_at,mm_update_at')
                     ->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
                     ->leftjoin('mr_text_posts','mtp_id','=','mcm_mtp_id')
                     ->leftjoin('mr_media','mm_id','=','mtp_mm_id')
                     ->where([
                        'dm_id'   	        => $id,
                        'dm_deleted_at'     => 0,
                        'mtp_uri'        	=> 0,
                        'mtp_show'	        => 555,
                        'mtp_deleted_at'     => 0,
                        'mcm_deleted_at'    => 0,
                        ])
                    ;
    }

    public function scopeSingleContentProject($query,$parent_id,$keyword,$url) {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,dm_uri,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src,mc_id,mm_create_at,mm_update_at,mc_name,mc_initial,mc_parent_id')
                     ->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
                     ->leftjoin('mr_text_posts','mtp_id','=','mcm_mtp_id')
                     ->leftjoin('mr_categories','mcm_mc_id','=','mc_id')
                     ->leftjoin('mr_media','mm_id','=','mtp_mm_id')
                     ->where([
                        'mtp_url'           => $url,
                        'mtp_keyword'       => $keyword,
                        'mtp_uri'           => 2,
                        'mtp_is_parent'     => 1,
                        'mcm_is_parent'     => 1,
                        'mc_deleted_at'      => 0,
                        'mtp_parent_id'     => $parent_id,
                        'mcm_show'          => 555,
                        'mcm_deleted_at'    => 0,
                        'mtp_show'          => 555,
                        ])
                    ;
    }
    public function scopeContentMenuProject($query,$parent_id = "",$keyword = "") {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,dm_uri,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src,mc_id,mm_create_at,mm_update_at,mc_name,mc_initial,mc_parent_id')
                     ->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
                     ->leftjoin('mr_categories','mcm_mc_id','=','mc_id')
                     ->leftjoin('mr_text_posts','mtp_id','=','mcm_mtp_id')
                     ->leftjoin('mr_media','mm_id','=','mtp_mm_id')
                     ->orderBy('mcm_id','desc')
	    			 ->where([
                    'mtp_keyword'   	=> '[Content-Menu|Portfolio]',
                    'dm_deleted_at'     => 0,
                    'mtp_uri'        	=> 2,
                    'mtp_is_parent' 	=> 1,
                    'mcm_is_parent' 	=> 1,
                    'mc_deleted_at'      => 0,
                    'mtp_parent_id' 	=> 5525003,
                    'mcm_show'	        => 555,
                    'mcm_deleted_at'    => 0,
                    'mtp_show'	        => 555,
                    'mtp_deleted_at'     => 0,
                    ]);
    }
}
