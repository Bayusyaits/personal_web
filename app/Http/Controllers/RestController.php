<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use dingo

use Dingo\Api\Routing\Helpers;

//guzzle client api
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;

use App\Rest;

use Illuminate\Support\Facades\Auth;
 
use Validator;

class RestController extends Res
{
    //

    public function postApi(Request $request,$uri1 = '',$uri2 = '') {
        
        $content = $request->getContent();
        $req = json_decode($content,true);

        $response = array('status' => 'Error',
                        'code' => Res::HTTP_NOT_FOUND,
                        'message' => 'Not found',
                        'data' => 'Empty');


        if(isset($req) && isset($req['form_params']) && isset($req['body'])) {

        	$string = str_replace('api/v1/', '', $request->path());
            $body                   = $req['body'];
            $req['operation']       = $body['operation'];
            $req['hostname']        = $request->root();
            $query                  = getClientQueryApi($req);
            $url                    = getUrlApi().$string;
            $client                 = new Client(getClientHeadersApi($req));
            $request                = $client->post($url, ['query' => $query]);

            if($request->getStatusCode() == 200)
                $response           = json_decode($request->getBody()->getContents(),true);

        }
        
        return $response;
    }
}
