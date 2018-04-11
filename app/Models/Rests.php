<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rests extends Model
{
    //
    protected static $elq = __CLASS__;
    protected $table = 'rests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'operation',
    ];
    public $timestamps = true;
    public function __construct(){
	    parent::__construct();
    }

    public function scopeIsExist($query, $operation)
        {
            return $query->selectRaw('operation')
                         ->where([
                             'operation' => $operation
                             ])
                         ->orderBy('id', 'desc');
        }
}
