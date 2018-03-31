<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\MrMedia;

//use dingo

use Dingo\Api\Routing\Helpers;

//guzzle client api
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;

class MrMediaController extends Res
{
    //
    public function __construct() {

    }

    use Helpers;


    public function getMedSos(Request $requests, $uri = "") {
        $mm =  array('status' => 'Error',
                    'status_code' => Res::HTTP_NOT_FOUND,
                    'message' => 'Not found',
                    'data' => 'Empty');
        switch($uri)  {
            case 'med-sos' : $mm = MrMedia::medialogosmedsos()->get(); break;
        }
        return response()->json($mm,Res::HTTP_OK);
    }
}
