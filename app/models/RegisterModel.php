<?php 

namespace App\Models;

class RegisterModel 
{
    // Properties to validate
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $password;
    public string $password_confirm;
}