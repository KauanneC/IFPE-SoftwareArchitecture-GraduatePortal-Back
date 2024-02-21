<?php

namespace App\Domain\UseCases\Form;
use App\Domain\Repositories\IFormRepository;
use Exception;

class GetAllFormTypeUseCase {
    public function __construct(private IFormRepository $formRepository) {}

    public function execute(string $formType): array {
        $form = $this->formRepository->getAllFormType($formType);

        if (empty($form)) {
            throw new Exception('Nenhum campo do formulário encontrado');
        }

        return $form;
    }
}