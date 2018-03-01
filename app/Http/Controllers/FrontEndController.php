<?php

namespace App\Http\Controllers;

use App\Models\MrCategory;
use App\Models\MrContentLanguage;
use App\Models\MrContentManagement;
use App\Models\MrMedia;
use Illuminate\Http\Request;
use Session;

class FrontEndController extends Controller
{
    //
    public function index() {
		$mc_fields = MrCategory::fields()->get();

		return $mc_fields[0]['mc_id'];
    }
}
