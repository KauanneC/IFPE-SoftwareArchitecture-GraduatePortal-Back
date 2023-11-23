<?php

namespace App\Domain\UseCases\User;

use App\Domain\Dtos\CreateUserDTO;

use App\Domain\Entities\User\Profile;
use App\Domain\Entities\User\UserEntity;

use App\Domain\Repositories\IUserRepository;

class CreateUserUseCase {
    public function __construct(private IUserRepository $iUserRepository) {}

    public function execute(CreateUserDTO $data): UserEntity {
        $hashPassword = password_hash($data->password, PASSWORD_DEFAULT);

        $user = new UserEntity(
            $data->name,
            $data->email,
            $hashPassword,
            new Profile($data->profile),
        );

        $this->iUserRepository->create($user);

        return $user;
    }
}