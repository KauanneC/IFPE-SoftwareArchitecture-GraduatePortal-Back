<?php

namespace App\Domain\UseCases\Auth;

use App\Domain\Repositories\IUserRepository;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;

use Exception;

class LoginUseCase {
    public function __construct(private IUserRepository $iUserRepository){}

    public function execute(string $email, string $password): string {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../../');
        $dotenv->load();

        $user = $this->iUserRepository->findByEmail($email);

        if(!$user){
            throw new Exception('Usuário não encontrado');
        }
        
        if(!password_verify($password, $user->getPassword())){
            throw new Exception('Senha incorreta');
        }
        // dd($user);

        $tokenData = [
            'userId' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'code' => $user->getCode(),
            'primaryAcess' => $user->getPrimaryAcess(),
            'profile' => $user->getProfile()->getValue(),
            'exp' => time() + 86400
        ];

        $tokenSecret = (string)getenv('TOKEN_SECRET');

        $token = JWT::encode($tokenData, $tokenSecret, 'HS256');

        return $token;
    }
}