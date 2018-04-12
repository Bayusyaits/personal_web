<?php

namespace App\Http\Controllers\Master;


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
        
        $mcm =  array('status'   => 'Error',
                    'code'      => Res::HTTP_NOT_FOUND,
                    'message'   => 'Not found',
                    'data'      => 'Empty');
        
        $input = $requests->all();
        //from javascript
        $decrypted = cryptoJsAesDecrypt("[Content-Menu]", $input['password']);
        
        if($input['operation'] == 'Get all content menu' && Auth::attempt(['email' => request('username'), 'password' => $decrypted , 'hostname' => request('hostname')])) {
            // $input['operation'] = bcrypt($input['operation']);

            $rests              = model('Rests')::isexist($input['operation'])->first();
            
            if(!isset($rests) && empty($rests)) {
            
                $user                   = Rest::create($input);         
                $success['token']       =  $user->createToken($input['hostname'])->accessToken;
                $success['operation']   =  $user->operation;
            
            }else {
                $user                   = Auth::user(); 
                // Creating a token without scopes...
                $success['token']       = $user->createToken($input['hostname'])->accessToken;

                // Creating a token with scopes...
                // $token = $user->createToken('My Token', ['place-orders'])->accessToken;
            }

            switch($uri)  {
                case 'menu' : 
                    $mcm = model('MrContentManagement')::contentmenu()->get(); 
                break;
                case 'home'         : 
                    $mcm = model('MrContentManagement')::contentmenupage(55101)->first(); 
                break;
                case 'about'        : 
                    $mcm = model('MrContentManagement')::contentmenupage(55102)->first(); 
                break;
                case 'case-studies' : 
                    $mcm = model('MrContentManagement')::contentmenupage(55103)->first(); 
                break;
                case 'contact'      : 
                    $mcm = model('MrContentManagement')::contentmenupage(55104)->first(); 
                break;
                default: 
                    $mcm = model('MrContentManagement')::contentmenu()->get(); 
            }

        }else {
            $mcm =  array(
                    'status'    => 'Error',
                    'code'      => Res::HTTP_FORBIDDEN,
                    'message'   => 'Forbidden',
                    'data'      => 'Empty');
        }
        return response()->json($mcm,Res::HTTP_OK);
    }

    public function postContentProjects(Request $requests,$uri = '') {
        
        $mcm =  array('status'   => 'Error',
                    'code'      => Res::HTTP_NOT_FOUND,
                    'message'   => 'Not found',
                    'data'      => 'Empty');
        
        $input = $requests->all();
        //from javascript
        $decrypted = cryptoJsAesDecrypt("[Content-Menu|Case-Studies]", $input['password']);
        
        if($input['operation'] == 'Get content projects' && Auth::attempt(['email' => request('username'), 'password' => $decrypted , 'hostname' => request('hostname')])) {
            // $input['operation'] = bcrypt($input['operation']);

            $rests              = model('Rests')::isexist($input['operation'])->first();
            
            if(!isset($rests) && empty($rests)) {
            
                $user                   = Rest::create($input);         
                $success['token']       =  $user->createToken($input['hostname'])->accessToken;
                $success['operation']   =  $user->operation;
            
            }else {
                $user                   = Auth::user(); 
                // Creating a token without scopes...
                $success['token']       = $user->createToken($input['hostname'])->accessToken;
            }

            switch($uri)  {
                case 'projects'     : 
                    $mcm = model('MrContentManagement')::contentmenucasestudies()->get(); 
                  break;
            }

        }else {
            $mcm =  array(
                    'status'    => 'Error',
                    'code'      => Res::HTTP_FORBIDDEN,
                    'message'   => 'Forbidden',
                    'data'      => 'Empty');
        }
        return response()->json($mcm,Res::HTTP_OK);
    }

    /*
		-Method Get
    */


    public function getContentManagement(Request $request, $uri1 = "") {
        $mcm 	=  array(
        				'status' 	=> 'Error',
                        'code' 		=> Res::HTTP_NOT_FOUND,
                        'message' 	=> 'Not found',
                        'data' 		=> 'Empty'
                    );
        return response()->json($mcm,Res::HTTP_OK);
    }
    
}
