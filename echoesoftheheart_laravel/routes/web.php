<?php

use Illuminate\Support\Facades\Route;

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

if (!empty($proxy_url)) {
   URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
    URL::forceScheme($proxy_schema);
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
