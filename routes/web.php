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
define('DATETIME', date('Y-m-d H:i:s'));
define('REQUEST_SCHEME', 'http');
define('DATE', date('Y-m-d'));
define('TIME', time());
define('JT', 1000000);

$api = app('Dingo\Api\Routing\Router');

Route::get('/', 
    [
        'uses'                 =>  'Frontend\AppController@getIndex',
        'as'                   =>  'index'
    ]
);

//clear cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/test', function() {
    $data = [];
    $data['hostname'] = 'bayusyaits.com';
    return getClientDataApi($data);
});

//vue.js
$api->version('v1',
	[
        'prefix'               =>  'api',
		'middleware'           =>  'cors',
		'limit'                =>  100,
		'expires'              =>  60,
		'namespace'            =>  'App\Http\Controllers'
	], 
	
    function ($api) {

	$api->group(['middleware'  =>  'cors'], function($api) {

    //rest controller from client
    //post
    $api->post('/v1/{uri1}/{uri2}', 
        [
            'uses'             =>  'RestController@postApi',
            'as'               =>  'postApi'
        ]
    );

    //get
    $api->get('/content/{uri1}', 
        [
            'uses'             =>  'Master\MrContentManagementController@getContentManagement',
            'as'               =>  'getContentManagement'
        ]
    );
        
    //get
    $api->get('/pages/{uri}', 
        [
            'uses'             =>  'Dyn\DynMenuController@getMenu',
            'as'               =>  'getMenu'
        ]
    );

    $api->get('/categories/{uri}', 
        [
            'uses'             =>   'Master\MrCategoriesController@getCategories',
            'as'               =>   'getCategories']);
    
    $api->get('/media/{uri}', 
        [
            'uses'             =>   'Master\MrMediaController@getMedSos',
            'as'               =>   'getMedSos'
        ]
    );

    $api->get('/', 
        [
            'uses'             =>   'API\AppController@getIndex',
            'as'               =>   'index'
        ]
    );

    $api->get('/auth', 
        [
            'uses'             =>   'API\AppController@getPages', 
            'as'               =>   'getPages'
        ]
    );

    // $api->get('/user',
    //     [
    //         'uses'             =>   'API\PostController@do_signin', 
    //         'as'               =>   'user'
    //     ]
    // );

    //posts
    $api->post('/content/{uri}', 
        [
            'uses'             =>   'Master\MrContentManagementController@postContentManagement', 
            'as'               =>   'postContentManagement'
        ]
    );

    $api->post('/client/token', 
        [
            'uses'             =>   'Master\MrContentManagementController@issueToken', 
            'as'               =>   'issueToken'
        ]
    );

    $api->post('/case-studies/{uri}', 
        [
            'uses'             =>   'Master\MrContentManagementController@postContentProjects',
            'as'               =>   'postContentProjects'
        ]
    );

    $api->post('/pages/{uri}', 
        [
            'uses'             =>  'Dyn\DynMenuController@postMenu',
            'as'               =>  'postMenu'
        ]
    );

    $api->post('/media/{uri}', 
        [
            'uses'             =>  'Master\MrMediaController@postMedia',
            'as'               =>  'postMedia'
        ]
    );

    $api->post('/categories/{uri}', 
        [
            'uses'             =>  'Master\MrCategoriesController@postcategories',
            'as'               =>  'postcategories'
        ]
    );

    $api->post('post/contact',
        [
            'uses'            => 'Post\PostContactController@postMessages',
            'as'              => 'postContact'
        ]
    );

   	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
