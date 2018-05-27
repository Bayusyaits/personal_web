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

class MrCategoriesController extends Res
{
    //
    public function __construct() {

    }

    use Helpers;
    //

    public function postCategories(Request $request,$uri = '') {
        
        $mc =  array('status'   => 'Error',
                    'code'      => Res::HTTP_NOT_FOUND,
                    'message'   => 'Not found',
                    'data'      => 'Empty');
        
        $input = $request->all();
        $url = $request->url();
        //from javascript
        if(isset($input) && isset($input['password'])){
            $input['password'] = $input['password'];
        }else {
            $input['password'] = null;
        }

        if(isset($input['operation'])){
            $input['operation'] = $input['operation'];
        }else {
            $input['operation'] = '';
        }
        
        if($uri         == 'fields'){
            $decrypted  = cryptoJsAesDecrypt("[Categories-Fields]", $input['password']);
        }else if($uri   == 'subjects'){
            $decrypted  = cryptoJsAesDecrypt("[Categories-Subjects]", $input['password']);
        }else {
            $decrypted  = cryptoJsAesDecrypt("[Categories]", $input['password']);
        }
        
        if(isset($input) && $input['operation'] == 'Get all categories' && Auth::attempt(['email' => request('username'), 'password' => $decrypted , 'hostname' => request('hostname')])) {
            // $input['operation'] = bcrypt($input['operation']);

            $rests              = model('Rests')::isexist($input['operation'])->first();
            
            if(!isset($rests) && empty($rests)) {
            
                $user                   = Rest::create($input);         
                $success['token']       = $user->createToken($input['hostname'])->accessToken;
                $success['operation']   = $user->operation;
            
            }else {
                $user                   = Auth::user(); 
                // Creating a token without scopes...
                // $success['token']       = $user->createToken($input['hostname'])->accessToken;

                // Creating a token with scopes...
                // $token = $user->createToken('My Token', ['place-orders'])->accessToken;
            }

            switch($uri)  {
                case 
                    'fields'       : $mc = model('MrCategories')::fields()->get(); 
                break;
                case 
                    'categories'   : $mc = model('MrCategories')::categories()->get();
                break;
                case 'subjects'    : 
                    $mc = model('MrCategories')::subjects()->get();
                break;
                default: 
                    $mc = model('MrCategories')::categories()->get();
            }
            $mc = response_mr_categories($mc,'join|dm_menu','get');
            $mc = array(
                        'status'    => 'Success',
                        'code'      => Res::HTTP_OK,
                        'message'   => 'Request has been processed successfully on server',
                        'data'      => $mc
                    );
        }else {
            $mc =  array(
                    'status'    => 'Error',
                    'code'      => Res::HTTP_FORBIDDEN,
                    'message'   => 'Forbidden',
                    'data'      => 'Empty');
        }
        return response()->json($mc,Res::HTTP_OK);
    }

    public function getCategories($uri = "") {
        $mc 	=  	array(
        			'status' 		=> 	'Error',
                    'code'			=> 	Res::HTTP_NOT_FOUND,
                    'message' 		=> 	'Not found',
                    'data' 			=> 'Empty');
        return response()->json($mc,Res::HTTP_NOT_FOUND);
    }
}
