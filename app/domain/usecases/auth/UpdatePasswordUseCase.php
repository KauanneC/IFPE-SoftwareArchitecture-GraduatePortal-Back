<?php

namespace App\Domain\UseCases\Auth;

use App\Domain\Repositories\IUserRepository;
use Exception;

class UpdatePasswordUseCase {
    public function __construct(private IUserRepository $iUserRepository){}

    public function execute(string $email, string $password, string $code): void {
        $user = $this->iUserRepository->findByEmail($email);

        if ($user->getCode() != $code) {
            throw new Exception('Código de acesso inválido');
        }

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = $this->iUserRepository->updatePassword($email, $hashPassword);

        if (!$result) {
            throw new Exception('Error ao alterar senha do usuário');
        }
    }
}