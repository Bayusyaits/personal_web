<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
set_time_limit(3600);
// ini_set('session.gc_maxlifetime', env('SESSION_TIMEOUT', 1200));
// define('env', env('APP_ENV'));
// define('env_bo', env('BACKOFFICE'));
define('REQUEST_SCHEME', 'http');
define('DATETIME', date('Y-m-d H:i:s'));
define('DATE', date('Y-m-d'));
define('TIME', time());
define('JT', 1000000);

$api = app('Dingo\Api\Routing\Router');

Route::get('/', ['uses'=>'Frontend\AppController@getIndex','as'=>'index']);

//vue.js
$api->version('v1', function ($api) {
    $api->get('/halo', function() {
        return ['data'=>'halo'];
    });
    $api->get('/pages/{list}', ['uses'=>'App\Http\Controllers\API\AppController@getPages', 'as'=>'pages']);
    $api->get('/categories/{list}', ['uses'=>'App\Http\Controllers\API\AppController@getCategories','as'=>'categories']);
    $api->get('/auth', ['uses'=>'App\Http\Controllers\API\AppController@getPages', 'as'=>'pages']);
    $api->get('/user',['uses'=>'App\Http\Controllers\API\PostController@do_signin', 'as'=>'user']);
});