<?php

namespace App\Controllers;

use \App\View;

class AboutController
{
    public function index()
    {
        $_SESSION['login'] = false;
        return View::make('about', [
            'heading' => 'About Us'
        ])->render();
    }
}