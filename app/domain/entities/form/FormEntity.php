<?php

namespace App\Domain\Entities\Form;

use Ramsey\Uuid\Uuid;

class FormEntity {
    private string $id;
    private string $formType;
    private string $question;
    private string $type;
    private array|null $options;

    public function __construct(
        string $formType,
        string $question,
        string $type,
        array|null $options = null,
        string $id = ''
    ){
        $this->id = $id == '' ? Uuid::uuid4()->toString() : $id;
        $this->formType = $formType;
        $this->question = $question;
        $this->type = $type;
        $this->options = $options;
    }

    public function getId(): string {
        return $this->id;
    }
    public function getFormType(): string {
        return $this->formType;
    }
    public function setFormType(): string {
        return $this->formType;
    }
    public function getQuestion(): string {
        return $this->question;
    }
    public function setQuestion(): string {
        return $this->question;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setType(): string {
        return $this->type;
    }
    public function getOptions(): array|null {
        return $this->options;
    }
    public function setOptions(): array|null {
        return $this->options;
    }

}