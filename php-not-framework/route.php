<?php

return [
    [
        'uri' => '/api/users',
        'method' => 'GET',
        'action' => 'App\Controllers\UserController@index'
    ],
    [
        'uri' => '/api/users',
        'method' => 'POST',
        'action' => 'App\Controllers\UserController@store'
    ],
    [
        'uri' => '/api/users/{id}',
        'method' => 'GET',
        'action' => 'App\Controllers\UserController@show'
    ],   
];