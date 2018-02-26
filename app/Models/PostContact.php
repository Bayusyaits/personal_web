<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostContact extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'post_contact';
    protected $primaryKey = 'pc_id';
    protected $foreignKey = 'pc_dm_id';
    protected $fillable = [
       	'pc_mc_id',
        'pc_firstname',
        'pc_lastname',
        'pc_email',
        'pc_phonenumber',
        'pc_message',
        'pc_reply',
    ];
    
    public $timestamps = false;
    const CREATED_AT = 'pc_create_at';
    const UPDATED_AT = 'pc_update_at';
    
    public function __construct(){
        parent::__construct();
    }
    protected $fieldRules = [
        "pc_id"=>["",""],
        "pc_dm_id"=>["",""],
        "pc_mc_id"=>["",""],
        "pc_firstname"=>["required",""],
        "pc_lastname"=>["required",""],
        "pc_email"=>["required",""],
        "pc_phonenumber"=>["",""],
        "pc_message"=>["required|min:6",""],
        "pc_reply"=>["",""]
    ];
}