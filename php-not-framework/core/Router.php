<?php

namespace Core;

class Router
{
    private $routes;

    public function __construct(array $routes)
    {        
        $this->setRoutes($routes);
    }

    public function setRoutes(array $routes) 
    {
        $this->routes = $routes;
    }

    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function run()
    {
        $method = $this->getMethod();
        $uri = $this->getUrl();

        $routeExists = array_filter($this->routes, function($route) use ($method, $uri) {
            return $route['method'] === $method && $route['uri'] === $uri;
        });

        if ($routeExists) {
            $action = array_values($routeExists)[0]['action'];
            $exploded = explode('@', $action);

            $controllerName = new $exploded[0];
            $controllerMethod = $exploded[1];

            echo $controllerName->$controllerMethod();
        } else {
            echo "rota não encontra";
        }
    }
}