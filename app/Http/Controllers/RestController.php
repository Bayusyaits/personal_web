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

    public function postApi(Request $requests,$uri1 = '',$uri2 = '') {
        
        $content = $requests->getContent();
        $req = json_decode($content,true);

        $response = array('status' => 'Error',
                        'code' => Res::HTTP_NOT_FOUND,
                        'message' => 'Not found',
                        'data' => 'Empty');

        if(!empty($req['username']))
            $data['username']       = $req['username'];

        if(!empty($req['password']))
            $data['password']       = $req['password'];

        if(isset($req) && !empty($req['operation']) && !empty($req['keyword']) && !empty($req['body'])) {

        	$string = str_replace('api/v1/', '', $requests->path());
            $req['operation']       = $req['operation'];
            $req['hostname']        = $requests->root();
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
