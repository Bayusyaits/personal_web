<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynMenu extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'dyn_menu';
    protected $primaryKey = 'dm_id';
    protected $foreignKey = 'dm_tg_id';
    protected $fillable = [
        'dm_name',
        'dm_url',
        'dm_is_parent',
        'dm_parent_id',
        'dm_show',
    ];
    
    public $timestamps = false;
    const CREATED_AT = 'dm_create_at';
    const UPDATED_AT = 'dm_update_at';
    public function __construct(){
	    parent::__construct();
    }

    public function scopeActive($query)
        {
            return $query->selectRaw('dm_id,dm_name,dm_url')
                         ->where('dm_show', 555);
        }
}
