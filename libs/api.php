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

    if(isset($data) && !empty($data['form_params'])){
        $form_params = $data['form_params'];
    }else {
        $form_params = '';
    }

    if(isset($data) && !empty($data['body'])){
        $body = $data['body'];
    }else {
        $body = '';
    }

    if(isset($data) && !empty($data)) {
        $query['grant_type']    = $form_params['grant_type'];
        $query['body']          = $body;
        $query['operation']     = $body['operation'];
        $query['role']          = isset($body['role']) && !empty($body['role']) ? $body['role'] : '';
        $query['hostname']      = $data['hostname'];
        $query['body']['ip']    = $data['ip'];
        $query['username']      = $form_params['username'];
        $query['password']      = $form_params['password'];
        $query['client_id']     = $form_params['client_id'];
        $query['client_secret'] = $form_params['client_secret'];
        $query['scope']         = $form_params['scope'];

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