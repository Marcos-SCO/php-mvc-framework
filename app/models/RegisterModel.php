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
}
