<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use dingo

use Dingo\Api\Routing\Helpers;

//guzzle client api
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Transformers\AppTransformer;
use Response;
use \Illuminate\Http\Response as Res;


class ResController extends Res
{
    //
    public function __construct() {

    }

    use Helpers;
}
