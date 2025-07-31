<?php

namespace App;

class Router
{
    protected $routes = [];

    public function register($method, string $uri, array|callable $controller)
    {
        return $this->routes[$method][$uri] = $controller;
    }

    public function get(string $uri, array|callable $controller)
    {
        $this->register('GET', $uri, $controller);
        return $this;
    }

    public function post(string $uri, array|callable $controller)
    {
        $this->register('POST', $uri, $controller);
        return $this;
    }

    public function delete(string $uri, array|callable $controller)
    {
        $this->register('DELETE', $uri, $controller);
        return $this;
    }
    public function patch(string $uri, array|callable $controller)
    {
        $this->register('PATCH', $uri, $controller);
        return $this;
    }
    public function put(string $uri, array|callable $controller)
    {
        $this->register('PUT', $uri, $controller);
        return $this;
    }

    public function resolve($uri, $method)
    {
        $action = $this->routes[$method][$uri] ?? null;
        if (is_array($action)) {
            [$class, $method] = $action;
            
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        // if (is_callable($action)) {
        //     return call_user_func($action);
        // }

        $this->abort(404);
    }

    public function abort($code = 404)
    {
        echo $code . ' Page was not found';
    }
}