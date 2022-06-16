<?php

namespace ibrahim\Http;



class Route 
{
    public static array $routes = [];


    public function __construct (public Request $request, public Response $response)
    {

    }

    public static function get(string $route, callable|array|string $action) 
    {
        self::$routes['get'][$route] = $action;
    }

    public static function post(string $route, callable|array|string $action) 
    {
        self::$routes['post'][$route] = $action;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        if(! $action) {
            return;
        }

        if(is_callable($action)) {
            call_user_func_array($action, []);
        }

        if(is_array($action)) {
            call_user_func_array([new $action[0], $action[1]], []);
        }
    }
}