<?php

namespace App\Controllers;

use App\Core\Application;

class SiteController
{
    public function home()
    {
        $params = [
            'name' => "Marcos dos Santos Carvalho",
        ];

        return Application::$app->renderView('home', $params);
    }

    public function contact()
    {
        return Application::$app->renderView('contact');
    }

    public function handleContact()
    {
        return 'Handling submitted data';
    }
}
