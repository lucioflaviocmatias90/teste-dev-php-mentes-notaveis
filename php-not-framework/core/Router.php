<?php

namespace Core;

class Router
{
    private array $routes = [];
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    

    public function get(string $path, Callable $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Route Not Found";
            exit;
        }

        echo call_user_func($callback);
    }
}