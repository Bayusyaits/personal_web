<?php

namespace App\Http\Controllers\Dyn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DynMenu;

//use dingo

use Dingo\Api\Routing\Helpers;

//guzzle client api
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;

class DynMenuController extends Res
{
    //
    public function __construct() {

    }

    use Helpers;

    public function getMenuContact() {
    	$dm = DynMenu::menuactive()->get();
    	return $dm;
    }

    /*
		-Method Post
    */

	public function postMenu(Request $requests,$uri = '') {
        
        $content = $requests->getContent();
        $req = json_decode($content,true);

        $response = array('status' => 'Error',
                        'code' => Res::HTTP_NOT_FOUND,
                        'message' => 'Not found',
                        'data' => 'Empty');

        if($req['operation'] == "Get menu pages" && $req['keyword'] == 'Nav-Menu') {
            $hostname = $requests->root();
            $url    = getUrlApi().'pages/nav-menu';
            $client = new Client();
            $request = $client->get($url, [
                'headers' => [
                    'User-Agent'    => 'testing/1.0',
                    'Accept'        => 'application/json',
                    'secret_key'    => 'QwQjR4V8VKXqvWR3l7v056VU9l2d2JKkcXvM9GQKYhn8J5gsGKNdEYj6cHaoP5HOne51TwSRk4CT0ksZjCUCEEKi6V1a34bQqXEI',
                    'client'        => $hostname,
                    'X-Foo'         => ['Bar', 'Baz']
                ]
            ], ['auth'              =>  ['user', 'pass']]);

            if($request->getStatusCode() == 200)
                $response = json_decode($request->getBody(),true);
        }
        foreach($response as $k => $v) {
            $posts = $v;
        }
        return $response;
    }

    /*
		-Method Get
    */ 

    public function getMenu(Request $request, $uri = "") {
        $dm =  array('status' => 'Error',
                        'code' => Res::HTTP_NOT_FOUND,
                        'message' => 'Not found',
                        'data' => 'Empty');
        switch($uri)  {
            case 'nav-menu' : $dm = DynMenu::active()->get(); break;
        }
        return response()->json($dm,Res::HTTP_OK);
    }
}
