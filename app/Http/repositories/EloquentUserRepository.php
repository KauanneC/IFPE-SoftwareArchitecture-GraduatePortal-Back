<?php

namespace App\Http\Repositories;

use App\Domain\Repositories\IUserRepository;

use App\Domain\Entities\User\UserEntity;

use App\Http\Repositories\Mappers\UserMapper;
use App\Models\User;

class EloquentUserRepository implements IUserRepository {

    public function create(UserEntity $user): void {
        $userModel = new User();
        $userModel->_id = $user->getId();
        $userModel->name = $user->getName();
        $userModel->email = $user->getEmail();
        $userModel->password = $user->getPassword();
        $userModel->primaryAcess = $user->getPrimaryAcess();
        $userModel->profile = $user->getProfile()->getValue();
        $userModel->code = $user->getCode();
        $userModel->save();
    }

    public function findByEmail(string $email): UserEntity {
        $userModel = User::where('email', $email)->first();
        $userEntity = UserMapper::toDomain($userModel);
        return $userEntity;
    }

    public function remove(string $id): bool {
        $userModel = User::where('_id', $id)->first();
        if (!$userModel) {
            return false;
        }
        $userModel->delete();
        return true;
    }

    public function findAllByProfile(string $profile, int $limit): array {
        $userModels = User::where('profile', $profile)->paginate($limit);
        return $userModels->toArray();
    }

    public function updatePassword(string $email, string $password): bool {
        $userModel = User::where('email', $email)->first();
        if (!$userModel) {
            return false;
        }
        $userModel->password = $password;
        $userModel->primaryAcess = true;
        $userModel->save();
        return true;
    }
}