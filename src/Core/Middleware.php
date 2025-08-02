<?php

namespace Core;

use App\Controllers\HomeController;
use App\Controllers\Users\UsersController;

class Middleware
{
    public function Auth()
    {
        if ($_SESSION['login']==false) {
            return [UsersController::class, 'login'];
        }
        return;
    }

    public function Guest()
    {
        if ($_SESSION['login']==true) {
            return [HomeController::class, 'index'];
        }
        return;
    }
}