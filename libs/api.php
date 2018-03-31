<?php

function getUrlApi() {

	if(app('env') == 'production'){
        $url = 'https://api.bayusyaits.com/api/';
    }else {
        $url = 'http://bayusyaits.laravel.com/api/';
    }

    return $url;
}