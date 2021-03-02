<?php

use Core\Router;

require '../vendor/autoload.php';

$routes = require '../route.php';

header("Access-Control-Allow-Origin: *");

(new Router($routes))->run();
