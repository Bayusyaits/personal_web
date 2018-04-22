<?php

namespace App\Http\Controllers\Post;

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

class PostContactController extends Res
{
    //
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
	public function postMessages(ServerRequestInterface $request)
    {
        return $this->withErrorHandling(function () use ($request) {
            $convert =  $this->convertResponse(
                $this->server->respondToAccessTokenRequest($request, new Psr7Response)
            );
            $body = $request->getParsedBody();
            $body = $body['body'];
            $response = array(
						'status'  => 'Success',
						'code'    => Res::HTTP_OK,
						'message' => 'Success',
						'data'    => 'Not Empty');
            if($convert && isset($body) && $body['operation'] == 'Add new message'){
                //ServerRequestInterface -> getParsedBody()
                $rests 				= model('Rests')::isexist($body['operation'])->first();
	        
					if(!isset($rests) && empty($rests)) {
					
						$user                   = Rest::create($body);	        
				        $success['operation'] 	= $user->operation;
					
					}else {
		                $user                   = Auth::user(); 
		            }
		            
                $pc = model('PostContact')::insertmessage($body);
                return $response;

            }else {
                return 'hai';
            }
        });
    }
}
