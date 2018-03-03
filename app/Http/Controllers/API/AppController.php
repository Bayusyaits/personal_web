<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\MrCategory;
use App\Models\MrContentLanguage;
use App\Models\MrContentManagement;
use App\Models\MrMedia;
use App\Models\DynMenu;

class AppController extends Controller
{
    //

    public function getPages() {
    	$dm = DynMenu::active()->get();
    	return $dm;
    } 
}
