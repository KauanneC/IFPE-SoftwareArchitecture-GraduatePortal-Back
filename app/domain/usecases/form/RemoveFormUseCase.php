<?php

namespace App\Domain\UseCases\Form;
use App\Domain\Repositories\IFormRepository;
use Exception;

class RemoveFormUsecase {
    public function __construct(private IFormRepository $formRepository) {}

    public function execute(string $id): void {
        $result = $this->formRepository->remove($id);

        if(!$result){
            throw new Exception('Campo não encontrado');
        }
    }
}