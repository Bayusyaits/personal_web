<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrTextPosts extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'mr_text_posts';
    protected $primaryKey = 'mtp_id';
    protected $foreignKey = [
		'mtp_dm_id','mtp_mm_id'
    ];
    protected $fillable = [
        'mtp_is_parent',
        'mtp_parent_id',
        'mtp_uri',
        'mtp_show',
    ];
    public $timestamps = false;
    const CREATED_AT = 'mtp_create_at';
    const UPDATED_AT = 'mtp_update_at';

    protected $fieldRules = [
        "mtp_id"            =>["",""],
        "mtp_dm_id"         =>["",""],
        "mtp_mm_id"         =>["",""],
        "mtp_initial"       =>["",""],
        "mtp_keyword"       =>["",""],
        "mtp_title_id"      =>["",""],
        "mtp_title_en"      =>["",""],
        "mtp_caption_id"    =>["",""],
        "mtp_caption_en"    =>["",""],
        "mtp_content_id"    =>["",""],
        "mtp_content_en"    =>["",""],
        "mtp_uri"           =>["",""],
        "mtp_url"           =>["",""],
        "mtp_is_parent"     =>["",""],
        "mtp_parent_id"     =>["",""],
        "mtp_show"          =>["required",""],
    ];

    /*
	 Funtion
	 */
	 
	  public function scopePostsActive($query)
      {
          return $query->where('mtp_show', 555);
      }
}
