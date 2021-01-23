<?php

namespace App\Controllers;

use App\Core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Marcos dos Santos Carvalho",
        ];

        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact()
    {
        return 'Handling submitted data';
    }
}
