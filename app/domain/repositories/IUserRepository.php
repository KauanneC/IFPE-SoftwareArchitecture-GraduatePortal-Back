<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User\UserEntity;

interface IUserRepository {
    public function create(UserEntity $user): void;
    public function findByEmail(string $email): UserEntity;
    public function findAllByProfile(string $profile, int $limit): array;
    public function updatePassword(string $email, string $password): bool;
    public function updateCode(string $userId, string $code): string;
    public function remove(string $id): bool;
}