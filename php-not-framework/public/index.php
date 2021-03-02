<?php

use Core\Application;

require '../vendor/autoload.php';

$app = new Application();

$app->router->get('/api/addresses', function() {
    echo "Rota de endereços";
});

$app->router->get('/api/cities', function() {
    echo "Rota de cidades";
});

$app->router->get('/api/states', function() {
    echo "Rota de estados";
});

$app->router->get('/api/users', 'App\Controllers\UserController@index');

$app->run();
