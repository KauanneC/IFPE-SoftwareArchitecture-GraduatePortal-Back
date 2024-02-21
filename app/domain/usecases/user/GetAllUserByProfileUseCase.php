<?php

namespace App\Domain\UseCases\User;

use App\Domain\Repositories\IUserRepository;
use Exception;

class GetAllUserByProfileUseCase {
    public function __construct(private IUserRepository $iUserRepository) {}

    public function execute(string $profile, int $page): array {
        $limit = 15;

        $jump = ($page - 1) * $limit;

        $users = $this->iUserRepository->findAllByProfile($profile, $jump);

        if(!$users)
            throw new Exception("Usuários não encontrados");

        return $users;
    }
}