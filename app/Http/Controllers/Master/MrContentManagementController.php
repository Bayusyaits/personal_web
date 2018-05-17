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

//passport
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;
use League\OAuth2\Server\AuthorizationServer;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors as HandlesOAuthErrors;

class MrContentManagementController extends Res
{
    //

    use Helpers,HandlesOAuthErrors;

    /**
     * The authorization server.
     *
     * @var \League\OAuth2\Server\AuthorizationServer
     */
    protected $server;

    /**
     * The token repository instance.
     *
     * @var \Laravel\Passport\TokenRepository
     */
    protected $tokens;

    /**
     * The JWT parser instance.
     *
     * @var \Lcobucci\JWT\Parser
     */
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @param  \League\OAuth2\Server\AuthorizationServer  $server
     * @param  \Laravel\Passport\TokenRepository  $tokens
     * @param  \Lcobucci\JWT\Parser  $jwt
     * @return void
     */
    public function __construct(AuthorizationServer $server,
                                TokenRepository $tokens,
                                JwtParser $jwt)
    {
        $this->jwt = $jwt;
        $this->server = $server;
        $this->tokens = $tokens;
    }

    /*
		-Method Post
    */

	public function postContentManagement(Request $request,$uri = '') {
        
        $mcm =  array('status'   => 'Error',
                    'code'      => Res::HTTP_NOT_FOUND,
                    'message'   => 'Not found',
                    'data'      => 'Empty');
        
        $input = $request->all();
        //from javascript
        if(isset($input) && isset($input['password'])){
            $decrypted = cryptoJsAesDecrypt("[Content-Menu]", $input['password']);
        }else {
            $decrypted = 0;
        }

        if(isset($input['operation'])){
            $input['operation'] = $input['operation'];
        }else {
            $input['operation'] = '';
        }
        
        
        if(isset($input) && $input['operation'] == 'Get all content menu' && Auth::attempt(['email' => request('username'), 'password' => $decrypted , 'hostname' => request('hostname')])) {
            // $input['operation'] = bcrypt($input['operation']);

            $rests              = model('Rests')::isexist($input['operation'])->first();
            
            if(!isset($rests) && empty($rests)) {
            
                $user                   = Rest::create($input);         
                $success['token']       =  $user->createToken($input['hostname'])->accessToken;
                $success['operation']   =  $user->operation;
            
            }else {
                $user                   = Auth::user(); 
                // Creating a token without scopes...
                // $success['token']       = $user->createToken($input['hostname'])->accessToken;

                // Creating a token with scopes...
                // $token = $user->createToken('My Token', ['place-orders'])->accessToken;
            }

            switch($uri)  {
                case 'menu' : 
                    $mcm = model('MrContentManagement')::contentmenu()->get(); 
                break;
                case 'home'         : 
                    $mcm = model('MrContentManagement')::contentmenupage(55101)->first(); 
                    $mcm = n2lbr_mtp($mcm);
                break;
                case 'about'        : 
                    $mcm = model('MrContentManagement')::contentmenupage(55102)->first(); 
                    $mcm = n2lbr_mtp($mcm);
                break;
                case 'case-studies' : 
                    $mcm = model('MrContentManagement')::contentmenupage(55103)->first(); 
                    $mcm = n2lbr_mtp($mcm);
                break;
                case 'contact'      : 
                    $mcm = model('MrContentManagement')::contentmenupage(55104)->first(); 
                    $mcm = n2lbr_mtp($mcm);
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

    public function postContentProjects(Request $request,$uri = '') {
        
        $mcm =  array('status'   => 'Error',
                    'code'      => Res::HTTP_NOT_FOUND,
                    'message'   => 'Not found',
                    'data'      => 'Empty');
        
        $input = $request->all();
        //from javascript
        if(isset($input) && isset($input['password'])){
            $decrypted = cryptoJsAesDecrypt("[Content-Menu|Case-Studies]", $input['password']);
        }else {
            $decrypted = 0;
        }
        
        if(isset($input['operation'])){
            $input['operation'] = $input['operation'];
        }else {
            $input['operation'] = '';
        }
        
        if(isset($input) && $input['operation'] == 'Get content projects' && Auth::attempt(['email' => request('username'), 'password' => $decrypted , 'hostname' => request('hostname')])) {
            // $input['operation'] = bcrypt($input['operation']);

            $rests              = model('Rests')::isexist($input['operation'])->first();
            
            if(!isset($rests) && empty($rests)) {
            
                $user                   = Rest::create($input);         
                $success['token']       =  $user->createToken($input['hostname'])->accessToken;
                $success['operation']   =  $user->operation;
            
            }else {
                $user                   = Auth::user(); 
                // Creating a token without scopes...
                // $success['token']       = $user->createToken($input['hostname'])->accessToken;
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
        
        $mcm =  array('status'   => 'Error',
                    'code'      => Res::HTTP_NOT_FOUND,
                    'message'   => 'Not found',
                    'data'      => 'Empty');
        
        return response()->json($mcm,Res::HTTP_OK);
    }

    public function issueToken(ServerRequestInterface $request)
    {
        return $this->withErrorHandling(function () use ($request) {
            $convert =  $this->convertResponse(
                $this->server->respondToAccessTokenRequest($request, new Psr7Response)
            );
            if($convert){
                //ServerRequestInterface -> getParsedBody()
                return 'halo';
            }else {
                return 'hai';
            }
        });
    }
}
