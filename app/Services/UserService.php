<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Repositories\UserRepository;
use App\Services\Contracts\UserServiceInterface;

class UserService implements Contracts\UserServiceInterface
{
    public function __construct(private readonly UserRepository $userRepository)
    {

    }

    public function create(UserDTO $userDTO): void
    {
        $user = $this->userRepository->create($userDTO);
    }
}
