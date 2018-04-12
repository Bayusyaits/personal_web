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
        'mcm_mtp_id',
    ];
    protected $fillable = [
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
	    return $query->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
	    			 ->where([
					'mcm_dm_id'	        => 55103,
					'mcm_show'      	=> 555
                    ])
                    ->orderBy('mcm_id');
    }
    public function scopeContentMenu($query) {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src')
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
                    'mcm_show'	        => 555,
                    'mtp_show'	        => 555
                    ])
                    ->offset(1)
                    ->limit(4)
                    ;
    }
    public function scopeContentMenuPage($query,$id) {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src')
                     ->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
                     ->leftjoin('mr_text_posts','mtp_id','=','mcm_mtp_id')
                     ->leftjoin('mr_media','mm_id','=','mtp_mm_id')
                     ->where([
                        'dm_id'   	        => $id,
                        'mtp_uri'        	=> 0,
                        'mtp_show'	        => 555
                        ])
                    ;
    }
    public function scopeContentMenuCaseStudies($query) {
        return $query->selectRaw('mcm_id,mcm_dm_id,mcm_mc_id,mcm_mm_id,mcm_mtp_id,mcm_parent_id,mcm_create_at,dm_name,dm_initial,dm_keyword,mtp_id,mtp_initial,mtp_keyword,mtp_title_id,mtp_title_en,mtp_caption_id,mtp_caption_en,mtp_content_id,mtp_content_en,mtp_parent_id,mtp_mm_id,mtp_url,mm_id,mm_alt,mm_initial,mm_name,mm_parent_id,mm_src,mc_id,mc_name,mc_initial,mc_parent_id')
                     ->leftjoin('dyn_menu','mcm_dm_id','=','dm_id')
                     ->leftjoin('mr_categories','mcm_mc_id','=','mc_id')
                     ->leftjoin('mr_text_posts','mtp_id','=','mcm_mtp_id')
                     ->leftjoin('mr_media','mm_id','=','mtp_mm_id')
                     ->orderBy('mcm_id','desc')
	    			 ->where([
                    'mtp_keyword'   	=> '[Content-Menu|Case-Studies]',
                    'mtp_uri'        	=> 2,
                    'mtp_is_parent' 	=> 1,
                    'mcm_is_parent' 	=> 1,
                    'mtp_parent_id' 	=> 5525003,
                    'mcm_show'	        => 555,
                    'mtp_show'	        => 555
                    ]);
    }
}
