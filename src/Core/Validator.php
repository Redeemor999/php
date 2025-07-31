<?php

namespace Core;

class Validator
{
    public $errors = [];
    
    public function string(string $val, int $min = 1, int $max = INF)
    {
        $val = strlen(strval(trim($val)));
        if (! ($val >= $min && $val <= $max)) {
            $this->errors['note'] = 'A note can not be empty or longer than 500 characters.';
            return false;
        }
        return true;
    }

    public function email($val)
    {
        if (filter_var($val, FILTER_SANITIZE_EMAIL) == false) {
            $this->errors['email'] = 'Please enter a valid email address.';
            return false;
        }
        
        return true;
    }
    
    public function pswrdLen($val, $min = 6, $max = 255)
    {
        $val = strlen($val);
        if (! ($val >= $min && $val <= $max)) {
            $this->errors['pswrd'] = 'Password needs to be at least 6 characters.';
            return false;
        }
        return true;
    }
    
}