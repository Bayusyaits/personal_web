<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontEndController;
use App\Models\MrCategory;
use App\Models\MrContentLanguage;
use App\Models\MrContentManagement;
use App\Models\MrMedia;

class AppController extends FrontendController
{
    //

    public function getIndex() {
    	$mc_fields = MrCategory::fields()->get();
    	return view('layout/master');
    } 
    public function getContact() {
    	$mc_fields = MrCategory::fields()->get();
    	return json($mc_fields);
    } 
}
