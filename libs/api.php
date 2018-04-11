<?php

function isActiveUser($data = []) {
    
    if(isset($data) && !empty($data)){
        
        $user = model('Users')::activeuser($data)->first();
        return $user;
    
    } else {
      
        return '';
    
    }
}

function getUrlApi() {

	if(app('env') == 'production'){
        $url = 'https://api.bayusyaits.com/api/';
    }else {
        $url = 'http://bayusyaits.laravel.com/api/';
    }

    return $url;
}

function getClientQueryApi($data = []) {

    $body = [];

    if(!empty($data['body']))
        $body = $data['body'];



    if(isset($data) && !empty($data)) {
        $query['grant_type']    = $body['grant_type'];
        $query['operation']     = $data['operation'];
        $query['hostname']      = $data['hostname'];
        $query['username']      = $body['username'];
        $query['password']      = $body['password'];
        $query['client_id']     = $body['client_id'];
        $query['client_secret'] = $body['client_secret'];
        $query['scope']         = $body['scope'];
        
        return $query;

    }else {
        return '';
    }

}

function getAccessClientApi($data = '') {
    $user = [];

    if(isset($data) && !empty($data)) {

        $user['id']             = 2;
        $user['name']           = 'bayusyaits';
        $user['email']          = 'bayusyaits@gmail.com';

        return $user;
    }else {
        return '';
    }

}

function getClientHeadersApi($data = []) {

    if(isset($data) && !empty($data)) {
        $array = [];
        $array['headers'] = 
                        array(
                        'User-Agent'        => 'testing/1.0',
                        'Accept'            => 'application/json',
                        'Content-type'      => 'application/json',
                        'secret_key'        => "Bvh0iuoIyYlJgMho3imzDaTBczTEL6MagTwdtGB5",
                        'client'            => $data['hostname'],
                        'X-Foo'             => ['Bar', 'Baz']
                        );
    
        $array['connect_timeout'] = 6;
        return $array;
    }else {
        return '';
    }

}