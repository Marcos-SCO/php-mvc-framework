<?php

namespace App\Models;

use App\Core\Application;
use App\Core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'label' => [
                'email' => 'Seu e-mail',
                'password' => 'Digite sua senha',
            ]
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'Usuário com este e-mail não existe');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('email', 'E-mail ou senha incorretos');
            $this->addError('password', 'Senha ou e-mail incorretos');
            return false;
        }

        // var_dump($user);
        return Application::$app->login($user);
    }
}
