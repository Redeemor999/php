<?php

namespace Core;

use App\Router;
use Core\DB;

class App
{
    private static DB $db;
    protected static Container $container;

    public function __construct(protected array $config, protected Router $router, protected string $uri, protected string $method)
    {
        static::$db = new DB($config);
        static::$container = new Container;
    }

    public function route()
    {
        $this->router->resolve($this->uri, $this->method);
    }

    public static function DB()
    {
        return static::$db;
    }

    public static function setContainer($key, $resolver)
    {
        return static::$container->bind($key, $resolver);
    }

    public static function getContainer($key)
    {
        return static::$container->resolve($key);
    }

}