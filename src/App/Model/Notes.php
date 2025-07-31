<?php

namespace App\Model;

use App\Model\Crud;
use \Core\App;
use Core\Source;

class Notes
{
    protected static Crud $crud;

    protected static function init()
    {
        if (!isset(self::$crud)) {
            self::$crud = new Crud(App::DB());
        }
    }

    public static function showAll($userId = 1)
    {
        self::init();
        return self::$crud->showAll('notes', $userId);
    }

    public static function show($id, $userId = 1)
    {
        self::init();
        return self::$crud->show('notes', ['note' => ['id', $id]], $userId);
    }

    public static function create($data)
    {
        self::init();
        return self::$crud->store($data);
    }

    public static function delete($id)
    {
        self::init();
        $data['notes'] = ['id' => $id];

        return self::$crud->destroy($data);
    }

    public static function patch($id)
    {
        self::init();
        $data['note'] = ['id' => $id];
        return self::$crud->update('notes', $data);
    }
}