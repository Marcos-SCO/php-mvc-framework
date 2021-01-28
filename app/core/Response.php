<?php

namespace App\Core;

class Response
{
    public static function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $path)
    {
        $path = ltrim($path,'/');
        header('Location: ' . $_ENV['BASE'] . '/' . $path);
    }
}
