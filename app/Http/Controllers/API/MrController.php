<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MrCategory;
use App\Models\MrContentLanguage;
use App\Models\MrContentManagement;
use App\Models\MrMedia;
use Illuminate\Http\Request;
use Session;

class MrController extends Controller
{
    //
    public function getAllFields() {
    	$mc_fields = MrCategory::fields()->get();
    	return response()->json([
            'message' => 'success',
            'data' => $mc_fields
        ], 200);
    }
    //
    public function getAllSubjects() {
    	$mc_subjects = MrCategory::subjects()->get();
    	return response()->json([
            'message' => 'success',
            'data' => $mc_subjects
        ], 200);
    }
}
