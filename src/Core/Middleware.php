<?php

namespace Core;

use App\Controllers\HomeController;
use App\Controllers\Users\UsersController;

class Middleware
{
    public function Auth()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']['login']==false) {
            return [UsersController::class, 'login'];
        }
        return;
    }

    public function Guest()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) {
            return [HomeController::class, 'index'];
        }
        return;
    }
}