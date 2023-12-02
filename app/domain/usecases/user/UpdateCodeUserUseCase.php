<?php

namespace App\Domain\UseCases\User;

use Ramsey\Uuid\Uuid;
use App\Domain\Repositories\IUserRepository;
use Exception;

class updateCodeUserUseCase {
    public function __construct(private IUserRepository $iUserRepository){}
    public function execute(string $userId): String {
        $code = Uuid::uuid4()->toString(); 

        $newCode = $this->iUserRepository->updateCode($userId, $code);

        if(!$newCode) {
            throw new Exception('Error ao atualizar código do usuário');
        }

        return $newCode;
    }
}