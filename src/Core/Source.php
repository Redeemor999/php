<?php

namespace Core;

class Source
{
    public static function GET(string $key, $default = null, int $filter = FILTER_SANITIZE_SPECIAL_CHARS)
    {
        return filter_var($_GET[$key], $filter) ?? $default;
    }

    public static function POST(string $key, $default = null, int $filter = FILTER_SANITIZE_SPECIAL_CHARS)
    {
        return filter_var($_POST[$key], $filter) ?? $default;
    }

    public static function has($key)
    {
        if (isset($_GET[$key])) return 'GET';
        if (isset($_POST[$key])) return 'POST';
        return false;
    }

    public static function ALL(bool $get = false, bool $post = false, int $filter = FILTER_SANITIZE_SPECIAL_CHARS)
    {
        if ($get && $post) {
            return filter_var(array_merge($_GET, $_POST), $filter);
        } elseif ($get){
            return filter_var($_GET, $filter);
        } elseif ($post) {
            return filter_var($_POST, $filter);
        }
    }
}