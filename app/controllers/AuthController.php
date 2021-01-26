<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $User = new User();
        if ($request->isPost()) {
            $User->loadData($request->getBody());

            if ($User->validate() && $User->register()) {
                return 'Success';
            }

            // var_dump($User->errors);

            return $this->render('register', [
                'model' => $User
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $User
        ]);
    }
}
