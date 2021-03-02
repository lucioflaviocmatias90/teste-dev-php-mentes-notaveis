<?php

namespace App\Controllers;

class UserController
{
    public function index()
    {
        $response = [ 'message' => 'Listagem de usuários' ];

        return json_encode($response);
    }

    public function store()
    {
        $response = [ 'message' => 'Novo usuário' ];
        
        return json_encode($response);
    }

    public function show()
    {
        $response = [ 'message' => 'Info do usuário' ];
        
        return json_encode($response);
    }
}