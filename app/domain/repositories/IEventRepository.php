<?php

namespace App\Domain\Repositories;
use App\Domain\dtos\CreateEventDTO;
use App\Domain\Entities\event\EventEntity;

interface IEventRepository {
    public function create(EventEntity $event): void;
    public function getAll(): array;
}