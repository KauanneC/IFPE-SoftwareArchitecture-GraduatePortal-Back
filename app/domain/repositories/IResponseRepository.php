<?php

namespace App\Domain\Repositories;
use App\Domain\Entities\Response\ResponseEntity;

interface IResponseRepository {
    public function create(ResponseEntity $response): void;
    public function getAllFormType(string $userId, string $formType): array;
}