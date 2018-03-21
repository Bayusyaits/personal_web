<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\MrCategories;
use App\Models\MrContentLanguage;
use App\Models\MrContentManagement;
use App\Models\MrMedia;
use App\Models\DynMenu;
use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;

class AppController extends Controller
{
    //
    public function getIndex(AppTransformer $transformer) {
       return $transformer->transform(5501);
    }

    public function getPages($list = "") {
        $dm =  array('status' => 'success',
                    'status_code' => Res::HTTP_NOT_FOUND,
                    'message' => 'Not found',
                    'data' => 'empty');
        switch($list)  {
            case 'menu' : $dm = DynMenu::active()->get(); break;
            case 'content-menu' : $dm = MrContentManagement::contentmenu()->get(); break;
            case 'home' : $dm = MrContentManagement::contentmenupage(55101)->first(); break;
            case 'about' : $dm = MrContentManagement::contentmenupage(55102)->first(); break;
            case 'case-studies' : $dm = MrContentManagement::contentmenupage(55103)->first(); break;
            case 'contact' : $dm = MrContentManagement::contentmenupage(55104)->first(); break;
        }
        return response()->json($dm,Res::HTTP_OK);
    }
    public function getCaseStudies($list = "") {
        $mcm =  array('status' => 'success',
                        'status_code' => Res::HTTP_NOT_FOUND,
                        'message' => 'Not found',
                        'data' => 'empty');
        switch($list)  {
            case 'projects' : $mcm = MrContentManagement::contentmenucasestudies()->get(); break;
        }
        return response()->json($mcm,Res::HTTP_OK);
    }
    public function getMedSos($list = "") {
        $mm =  array('status' => 'success',
                    'status_code' => Res::HTTP_NOT_FOUND,
                    'message' => 'Not found',
                    'data' => 'empty');
        switch($list)  {
            case 'med-sos' : $mm = MrMedia::medialogosmedsos()->get(); break;
        }
        return response()->json($mm,Res::HTTP_OK);
    }
    public function getCategories($list = "") {
        $mc =  array('status' => 'success',
                    'status_code' => Res::HTTP_NOT_FOUND,
                    'message' => 'Not found',
                    'data' => 'empty');
        switch($list)  {
            case 'fields' : $mc = MrCategories::fields()->get(); break;
            case 'categories' : $mc = MrCategories::categories()->get(); break;
            case 'subjects' : $mc = MrCategories::subjects()->get(); break;
        }
        return response()->json($mc,Res::HTTP_OK);
    }
    public function respondInternalError($message){
        return $this->respond([
            'status' => 'error',
            'status_code' => Res::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $message,
        ]);
    }
    public function respondValidationError($message, $errors){
        return $this->respond([
            'status' => 'error',
            'status_code' => Res::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'data' => $errors
        ]);
    }
    public function respond($data, $headers = []){
        return Response::json($data, $this->getStatusCode(), $headers);
    }
    public function respondWithError($message){
        return $this->respond([
            'status' => 'error',
            'status_code' => Res::HTTP_UNAUTHORIZED,
            'message' => $message,
        ]);
    }
}
