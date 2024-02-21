<?php

namespace App\Domain\UseCases\Response;
use App\Domain\Repositories\IResponseRepository;
use Exception;

class GetAllResponseByUserUseCase {
    public function __construct(private IResponseRepository $iResponseRepository){}

    public function execute(string $userId): array{
        $response = $this->iResponseRepository->getAllByUser($userId);

        if(empty($response)){
            throw new Exception('Nenhuma resposta encontrada');
        }

        return $response;
    }
}