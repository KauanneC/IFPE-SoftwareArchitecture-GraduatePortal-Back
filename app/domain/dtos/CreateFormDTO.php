<?php

namespace App\Domain\Dtos;

class CreateFormDTO {
    public string $formType;
    public string $question;
    public string $type;
    public array|null $options;

    public function __construct(
         string $formType,
         string $question,
         string $type,
         array|null $options = null,
    ){
        $this->formType = $formType;
        $this->question = $question;
        $this->type = $type;
        $this->options = $options;
    }
}