<?php

namespace App\DTO;

/**
 * @property $email
 * @property $name
 * @property $password
 */
class UserDTO
{
    public function __construct(private readonly string $name, private readonly string $email, private readonly string $password)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

