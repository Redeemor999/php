<?php

namespace App\Controllers\Users;

use App\Model\Users;
use Core\Redirect;
use Core\Source;
use Core\Validator;

class UsersController
{
    protected Validator $validator;

    public function __construct() 
    {
        $this->validator = new Validator;
    }

    public function register()
    {
        Redirect::to('/users/register', ['heading' => 'Sign Up:']);
    }

    public function store()
    {
        $email = Source::POST('email');
        $pswrd = Source::POST('password');

        if (! $this->validator->email($email)) {
            $errors = $this->validator->errors;
        }

        if (! $this->validator->string($pswrd, 6, 255)) {
            $errors = $this->validator->errors;
        }

        if (!empty($errors)) {
            Redirect::to('/register', [
                'errors' => $errors,
                'heading' => 'Sign Up'
            ]);
        }
        
        $data['users'] = ['email' => $email, 'pswrd' => $pswrd];

        Users::register($data);

        return Redirect::to('/login', [], 202);
    }
}