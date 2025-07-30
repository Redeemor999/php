<?php

namespace App\Model;

use App\Model\Crud;
use \Core\App;

class Notes
{
    protected Crud $crud;
    public function __construct()
    {
        $this->crud = new Crud(App::DB());
    }

    public static function showAll($userId = 1)
    {
        return (new Crud(App::DB()))->showAll('notes', $userId);
    }

    public static function show($id, $userId = 1)
    {
        return (new Crud(App::DB()))->show('notes', ['note' => ['id', $id]], $userId);
    }
}