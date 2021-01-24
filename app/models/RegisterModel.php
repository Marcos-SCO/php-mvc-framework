<?php

namespace App\Models;

use App\Core\Model;

class RegisterModel extends Model
{
    // Properties to validate
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $password;
    public string $password_confirm;

    public function register()
    {
        return 'Creating a new user';
    }

    public function rules(): array
    {
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [
                self::RULE_REQUIRED, [
                    self::RULE_MIN, 'min' => 6
                ], [
                    self::RULE_MAX, 'max' => 24
                ]
            ],
            'password_confirm' => [self::RULE_REQUIRED, [
                self::RULE_MATCH, 'match' => 'password'
            ]],
        ];
    }
}
