<?php

namespace App\Models;

use App\Core\UserModel;

class User extends UserModel
{
    // user status
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    // Properties to validate
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $password_confirm = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function getDisplayName(): string 
    {
        return $this->first_name;
    }
    
    public function getFullName(): string 
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function save()
    {
        $this->status = self::STATUS_DELETED;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function rules(): array
    {
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [
                self::RULE_REQUIRED, self::RULE_EMAIL, [
                    self::RULE_UNIQUE, 'class' => self::class
                ]
            ],
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

    public function attributes(): array
    {
        return ['first_name', 'last_name', 'email', 'password', 'status'];
    }

    public function labels(): array
    {
        return [
            'label' => [
                'first_name' => 'Seu nome',
                'last_name' => 'Sobrenome',
                'email' => 'Digite o e-mail',
                'password' => 'Senha',
                'password_confirm' => 'Confirme a senha',
            ],
            'error' => [
                'first_name' => 'nome',
                'last_name' => 'sobrenome',
                'email' => 'e-mail',
                'password' => 'senha',
                'password_confirm' => 'confirme a senha',
            ]
        ];
    }
}
