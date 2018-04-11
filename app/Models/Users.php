<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    //
    protected static $elq = __CLASS__;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $foreignKey = '';
    protected $fillable = [
        'name',
        'email',
        'password',
        'hostname',
        // 'dm_parent_id',
        // 'dm_show',
        // 'dm_keyword'
    ];

    // public $timestamps = false;
    // const CREATED_AT = 'dm_create_at';
    // const UPDATED_AT = 'dm_update_at';
    public function __construct(){
	    parent::__construct();
    }

    public function scopeActiveUser($query, $data) {
    	return $query->selectRaw('users.name, users.email, users.hostname, oauth_clients.secret, oauth_clients.user_id')
    				 ->leftJoin('oauth_clients','users.id', '=', 'user_id')
    				 ->where([	
    				 	'email'		=>	$data['email'],
    				 	'hostname'	=>	$data['hostname']
    				 	]);
    }

}
