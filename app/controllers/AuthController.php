<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }
    
    public function register(Request $request)
    {
        if ($request->isPost()) {
            $registerModel = new RegisterModel();
            return 'Handle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}
