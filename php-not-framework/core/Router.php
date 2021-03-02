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
    

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            Application::$app->response->setStatusCode(404);
            echo "Route Not Found";
            exit;
        }

        if (is_string($callback)) {
            $exploded = explode('@', $callback);

            $controllerName = new $exploded[0];
            $controllerMethod = $exploded[1];

            echo $controllerName->$controllerMethod();
            exit;
        }

        echo call_user_func($callback);
    }
}