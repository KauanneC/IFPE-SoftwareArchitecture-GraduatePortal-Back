<?php

namespace App\Domain\Repositories;
use App\Domain\Entities\event\EventEntity;

interface IEventRepository {
    public function create(EventEntity $event): void;
    public function getAll(): array;
    public function remove(string $id): bool;
    public function update(EventEntity $event): bool;
}