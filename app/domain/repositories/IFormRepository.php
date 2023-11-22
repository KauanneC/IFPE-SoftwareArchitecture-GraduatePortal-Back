<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Form\FormEntity;

interface IFormRepository {
    public function create(FormEntity $form): void;
    // public function getAll(): array;
    // public function getById(string $id): FormEntity;
    // public function delete(string $id): bool;
}