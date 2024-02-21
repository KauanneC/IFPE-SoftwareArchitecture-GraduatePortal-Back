<?php

namespace App\Domain\UseCases\User;

use App\Domain\Repositories\IUserRepository;
use Exception;

class RemoveUserUseCase {
    public function __construct(private IUserRepository $iUserRepository) {}

    public function execute(string $id): void {
        $result = $this->iUserRepository->remove($id);

        if (!$result) {
            throw new Exception("Usuário não encontrado");
        }
    }
}