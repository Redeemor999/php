<?php

namespace Core;

use Core\DB;

class App
{
    private static DB $db;

    public function __construct(protected array $config)
    {
        static::$db = new DB($config);
    }

    public static function DB()
    {
        return static::$db;
    }
}