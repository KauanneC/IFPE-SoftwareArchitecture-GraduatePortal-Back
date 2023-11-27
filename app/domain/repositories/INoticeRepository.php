<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Notice\NoticeEntity;

interface INoticeRepository {
    public function create(NoticeEntity $notice): void;
    public function getAll(): array;
    public function remove(string $id): bool;
}