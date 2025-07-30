<?php

namespace App\Controllers;

use \App\View;

class ContactController
{
    public function index()
    {
        return View::make('contact', [
            'heading' => 'Contact Us'
    ])->render();
    }
}