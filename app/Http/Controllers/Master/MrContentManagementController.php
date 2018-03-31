<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//models
use App\Models\MrContentManagement;

//use dingo

use Dingo\Api\Routing\Helpers;

//guzzle client api
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;

class MrContentManagementController extends Res
{
    //

    public function __construct() {

    }

    use Helpers;

    /*
		-Method Post
    */

	public function postContentManagement(Request $requests,$uri = '') {
        
        $content = $requests->getContent();
        $req = json_decode($content,true);

        $response = array('status' => 'Error',
                        'code' => Res::HTTP_NOT_FOUND,
                        'message' => 'Not found',
                        'data' => 'Empty');

        if($req['operation'] == "Get menu pages" && $req['keyword'] == 'Nav-Menu') {
            $hostname = $requests->root();
            $url    = getUrlApi().'content/menu';
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


    public function getContentManagement(Request $request, $uri1 = "") {
        $mcm 	=  array(
        				'status' 	=> 'Error',
                        'code' 		=> Res::HTTP_NOT_FOUND,
                        'message' 	=> 'Not ada',
                        'data' 		=> 'Empty'
                    );
        switch($uri1)  {
            case 'menu' : 
            	$mcm = MrContentManagement::contentmenu()->get(); 
            break;
            case 'home' 		: 
            	$mcm = MrContentManagement::contentmenupage(55101)->first(); 
            break;
            case 'about' 		: 
            	$mcm = MrContentManagement::contentmenupage(55102)->first(); 
            break;
            case 'case-studies' : 
            	$mcm = MrContentManagement::contentmenupage(55103)->first(); 
            break;
            case 'contact' 		: 
            	$mcm = MrContentManagement::contentmenupage(55104)->first(); 
            break;
        }
        return response()->json($mcm,Res::HTTP_OK);
    }

    public function getCaseStudies(Request $request, $uri = "") {
        $mcm =  array(
        				'status' 	=> 'Error',
                        'code' 		=> Res::HTTP_NOT_FOUND,
                        'message' 	=> 'Not found',
                        'data' 		=> 'Empty');

        switch($uri)  {
            case 'projects' 	: 
            	$mcm = MrContentManagement::contentmenucasestudies()->get(); 
         	break;
        }
        return response()->json($mcm,Res::HTTP_OK);
    }
}
