<?php

namespace App\Domain\Dtos;

class CreateResponseDTO {
    public string $formId;
    public string $userId;
    public string $value;

    public function __construct(
        string $formId,
        string $userId,
        string $value
    ){
        $this->formId = $formId;
        $this->userId = $userId;
        $this->value = $value;
    }
}