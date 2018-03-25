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

//clear cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

//vue.js
$api->version('v1',
	[
		'middleware'=>'cors',
		'limit'=>100,
		'expires'=>60,
		'namespace'=>'App\Http\Controllers\API'
	], 
	function ($api) {
	$api->group(['middleware'=>'cors'], function($api) {

    $api->get('/pages/{list}', ['uses'=>'AppController@getPages', 'as'=>'pages']);
    $api->get('/categories/{list}', ['uses'=>'AppController@getCategories','as'=>'categories']);
    $api->get('/media/{list}', ['uses'=>'AppController@getMedSos','as'=>'media']);
    $api->get('/case-studies/{list}', ['uses'=>'AppController@getCaseStudies','as'=>'case-studies']);
    $api->get('/', ['uses'=>'AppController@getIndex','as'=>'index']);
    $api->get('/auth', ['uses'=>'AppController@getPages', 'as'=>'pages']);
    $api->get('/user',['uses'=>'PostController@do_signin', 'as'=>'user']);

    $api->post('/pages', ['uses'=>'AppController@postPages', 'as'=>'pages']);

   	});
});