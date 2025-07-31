<?php

namespace Core;

use App\View;

class Redirect
{   
    public static function to(string $uri, array $params = [], $responseCode = 302)
    {
        $uri = trim($uri);

        http_response_code($responseCode);
        if (empty($params)) {
            return header("location: $uri");
        }

        return View::make($uri, $params)->render();
    }
}