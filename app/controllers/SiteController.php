<?php

namespace App\Controllers;

use App\Core\Application;

class SiteController
{
    public function contact()
    {
        return Application::$app->renderView('contact');
    }

    public function handleContact()
    {
        return 'Handling submitted data';
    }
}
