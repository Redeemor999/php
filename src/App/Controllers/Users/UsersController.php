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
        $name = Source::POST('name');
        $email = Source::POST('email');
        $pswrd = Source::POST('password');

        if (! $this->validator->email($email)) {
            $errors = $this->validator->errors;
        }

        if (! $this->validator->string($pswrd, 6, 255)) {
            $errors = $this->validator->errors;
        }

        if (! $this->validator->string($name, 1, 255)) {
            $errors = $this->validator->errors;
        }

        if (!empty($errors)) {
            Redirect::to('/register', [
                'errors' => $errors,
                'heading' => 'Sign Up'
            ]);
        }
        
        $data['users'] = ['name' => $name, 'email' => $email, 'pswrd' => password_hash($pswrd, PASSWORD_BCRYPT)];

        Users::register($data);

        return Redirect::to('/users/login', [], 202);
    }

    public function login()
    {
        return Redirect::to('/users/login', ['heading' => 'Sign In to Your Account:']);
    }

    public function signin()
    {
        $email = Source::POST('email');
        $pswrd = Source::POST('password');


        if (! $this->validator->email($email)) {
            $errors = $this->validator->errors;
        }

        if (!empty($errors)) {
            Redirect::to('/users/login', [
                'errors' => $errors,
                'heading' => 'Sign In'
            ]);
        }

        $user = Users::find($email);
        if (! password_verify($pswrd, $user['pswrd'])) {
            $errors['credentials'] = 'Credentials are wrong!';
            Redirect::to('/users/login', [
                'errors' => $errors,
                'heading' => 'Sign In'
            ]);
        }

        foreach (array_keys($user) as $key) {
            $_SESSION[$key] = $user[$key];
        }

        $_SESSION['login'] = true;
        
        Redirect::to('/index', [
            'heading' => 'Welcome Home, ' . $_SESSION['name']
        ]);
    }
}