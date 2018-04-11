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

class MrMediaController extends Res
{
    //
    public function __construct() {

    }

    use Helpers;


    public function postMedia(Request $requests,$uri = '') {
        
        $content = $requests->getContent();
        $req = json_decode($content,true);

        $response = array(
        				'status' 	=> 'Error',
                        'code' 		=> Res::HTTP_NOT_FOUND,
                        'message' 	=> 'Not found',
                        'data' 		=> 'Empty');

        if($req['operation'] 		== "Get media medsos" && $req['keyword'] == 'Media-Social') {
            $data['hostname'] 		= $requests->root();
            $url    				= getUrlApi().'media/med-sos';
            $client 				= new Client();
            $request 				= $client->get($url,getClientDataApi($data));

            if($request->getStatusCode() == 200)
                $response = json_decode($request->getBody(),true);
        }
        
        return $response;
    }

    public function getMedSos(Request $requests, $uri = "") {
        $mm =  array('status' => 'Error',
                    'status_code' => Res::HTTP_NOT_FOUND,
                    'message' => 'Not found',
                    'data' => 'Empty');
        switch($uri)  {
            case 'med-sos' : $mm = model('MrMedia')::medialogosmedsos()->get(); break;
        }
        return response()->json($mm,Res::HTTP_OK);
    }
}
