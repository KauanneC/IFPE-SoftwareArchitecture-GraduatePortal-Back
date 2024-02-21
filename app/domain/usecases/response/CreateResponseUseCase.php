<?php

namespace App\Domain\UseCases\Response;

use App\Domain\Entities\Response\ResponseEntity;

use App\Domain\Repositories\IResponseRepository;

class CreateResponseUseCase {
    public function __construct(private IResponseRepository $iResponseRepository){}

    public function execute(array $data): void {
        foreach ($data['response'] as $value) {
            $response = new ResponseEntity(
                $value['formId'],
                $data['userId'],
                $value['value']
            );

            $this->iResponseRepository->create($response);
        }
    }
}