<?php

namespace App\Domain\Entities\Response;

use Ramsey\Uuid\Uuid;

class ResponseEntity {
    private string $id;
    private string $formId;
    private string $userId;
    private string|array $value;
    public function __construct(
        string $formId,
        string $userId,
        string|array $value,
        string $id = ''
    ){
        $this->id = $id == '' ? Uuid::uuid4()->toString() : $id;
        $this->formId = $formId;
        $this->userId = $userId;
        $this->value = $value;
    }

    public function getId(): string {
        return $this->id;
    }
    public function getFormId(): string {
        return $this->formId;
    }
    public function setFormId(): string {
        return $this->formId;
    }
    public function getUserId(): string {
        return $this->userId;
    }
    public function setUserId(): string {
        return $this->userId;
    }
    public function getValue(): string|array{
        return $this->value;
    }
    public function setValue(): string|array {
        return $this->value;
    }
}