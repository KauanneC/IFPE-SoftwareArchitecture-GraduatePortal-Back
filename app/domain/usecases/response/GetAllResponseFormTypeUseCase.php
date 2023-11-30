<?php

namespace App\Domain\UseCases\Response;
use App\Domain\Repositories\IResponseRepository;
use Exception;

class GetAllResponseFormTypeUseCase {
    public function __construct(private IResponseRepository $iResponseRepository){}

    public function execute(string $userId, string $formType): array {
        $responses = $this->iResponseRepository->getAllFormType($userId, $formType);

        if(empty($responses)){
            throw new Exception('Nenhuma resposta encontrada');
        }

        return $responses;
    }
}