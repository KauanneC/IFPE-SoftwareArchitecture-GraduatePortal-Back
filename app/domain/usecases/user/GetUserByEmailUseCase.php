<?php

namespace App\Domain\UseCases\User;

use App\Domain\Entities\User\UserEntity;

use App\Domain\Repositories\IUserRepository;
use Exception;

class GetUserByEmailUseCase {
    public function __construct(private IUserRepository $iUserRepository) {}

    public function execute(string $email): UserEntity {
        $user = $this->iUserRepository->findByEmail($email);

        if (!$user) {
            throw new Exception("Usuário não encontrado");
        }

        return $user;

    }
}