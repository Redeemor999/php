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
}