<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Form\FormEntity;

interface IFormRepository {
    public function create(FormEntity $form): void;
    public function getAllFormType(string $formType): array;
    // public function getById(string $id): FormEntity;
    public function remove(string $id): bool;
}