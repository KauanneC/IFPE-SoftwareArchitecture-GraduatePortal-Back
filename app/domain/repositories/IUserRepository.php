<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User\UserEntity;

interface IUserRepository {
    public function create(UserEntity $user): void;
    public function findByEmail(string $email): UserEntity;
    public function findAllByProfile(string $profile, int $limit): array;
    public function remove(string $id): bool;
}