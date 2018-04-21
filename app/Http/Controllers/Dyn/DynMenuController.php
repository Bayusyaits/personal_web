<?php

namespace App\Http\Controllers\Dyn;

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

class DynMenuController extends Res
{
    //
    public function __construct() {

    }
	public $error = 500;
	public $successStatus = 200;
    use Helpers;

    public function getMenuContact() {
    	$dm = model('DynMenu')::menuactive()->get();
    	return URL::current();


    }

    /*
		-Method Post
    */

    public function postMenu(Request $request,$uri = '') {

        $dm =  array('status' 	=> 'Error',
                    'code' 		=> Res::HTTP_NOT_FOUND,
                    'message' 	=> 'Not found',
                    'data' 		=> 'Empty');
		
        $input = $request->all();
        //from javascript
        if(isset($input) && isset($input['password'])){
            $decrypted = cryptoJsAesDecrypt("[Nav-Menu]", $input['password']);
        }else {
            $decrypted = 0;
        }
        if(isset($input) && $input['operation'] == 'Get all nav menu' && Auth::attempt(['email' => request('username'), 'password' => $decrypted , 'hostname' => request('hostname')])) {
        	// $input['operation'] = bcrypt($input['operation']);

	        $rests 				= model('Rests')::isexist($input['operation'])->first();
	        
			if(!isset($rests) && empty($rests)) {
			
				$user                   = Rest::create($input);	        
		        $success['token'] 		=  $user->createToken($input['hostname'])->accessToken;
		        $success['operation'] 	=  $user->operation;
			
			}else {
                $user                   = Auth::user(); 
                // Creating a token without scopes...
                // $success['token']       = $user->createToken($input['hostname'])->accessToken;

                // Creating a token with scopes...
                // $token = $user->createToken('My Token', ['place-orders'])->accessToken;
            }

	        switch($uri)  {
	            case 'nav-menu' : $dm = model('DynMenu')::active()->get(); break;
	        }

    	}else {
            $dm =  array(
                    'status'    => 'Error',
                    'code'      => Res::HTTP_FORBIDDEN,
                    'message'   => 'Forbidden',
                    'data'      => 'Empty');
        }
        return response()->json($dm,Res::HTTP_OK);
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
            case 'nav-menu' : $dm = model('DynMenu')::active()->get(); break;
        }
        return response()->json($dm,Res::HTTP_OK);
    }
}
