<?php

namespace App\Domain\usecases\Form;

use App\Domain\Entities\Form\FormEntity;
use App\Domain\Repositories\IFormRepository;
use App\Domain\Dtos\CreateFormDTO;

class CreateFormUseCase {
    public function __construct(private IFormRepository $formRepository) {}
    public function execute(CreateFormDTO $data): FormEntity{
        $form = new FormEntity(
            $data->formType,
            $data->question,
            $data->type,
            $data->options
        );

        $this->formRepository->create($form);

        return $form;
    }
}