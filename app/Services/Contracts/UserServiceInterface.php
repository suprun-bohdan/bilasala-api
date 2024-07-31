<?php

namespace App\Services\Contracts;

use App\DTO\UserDTO;

interface UserServiceInterface
{
    public function create(UserDTO $userDTO);
}
