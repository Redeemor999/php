<?php

namespace App\Controllers;

use \App\View;

class AboutController
{
    public function index()
    {
        return View::make('about', [
            'heading' => 'About Us'
        ])->render();
    }
}