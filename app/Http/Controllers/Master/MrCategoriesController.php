<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use dingo

use Dingo\Api\Routing\Helpers;

//guzzle client api
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;

class MrCategoriesController extends Res
{
    //
    public function __construct() {

    }

    use Helpers;
    //

    public function getCategories($uri = "") {
        $mc 	=  	array(
        			'status' 		=> 	'Error',
                    'code'			=> 	Res::HTTP_NOT_FOUND,
                    'message' 		=> 	'Not found',
                    'data' 			=> 'Empty');
        switch($uri)  {
            case 'fields' 		: $mc = model('MrCategories')::fields()->get(); break;
            case 'categories' 	: $mc = model('MrCategories')::categories()->get(); break;
            case 'subjects' 	: $mc = model('MrCategories')::subjects()->get(); break;
        }
        return response()->json($mc,Res::HTTP_OK);
    }
}
