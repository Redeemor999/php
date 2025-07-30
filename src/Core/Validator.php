<?php

namespace Core;

class Validator
{
    public static function string(string $val, int $min = 1, int $max = INF)
    {
        $val = strlen(strval(trim($val)));

        return ($val >= $min && $val <= $max);
    }
}