<?php

namespace App\Model;

use App\Model\Crud;
use Core\App;

class Users
{
    protected static Crud $crud;

    protected static function init()
    {
        if (!isset(self::$crud)) {
            self::$crud = new Crud(App::DB());
        }
    }
    
    public static function register(array $data)
    {
        self::init();
        return self::$crud->store($data);
    }
}