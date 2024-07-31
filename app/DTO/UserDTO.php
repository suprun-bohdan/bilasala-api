<?php

namespace App\DTO;

class UserDTO
{
    public static $name;
    public static $email;
    public static $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
