<?php

namespace App\Http\Repositories\Mappers;
use App\Domain\Entities\User\Profile;
use App\Domain\Entities\User\UserEntity;
use App\Models\User;

class UserMapper {
    public static function toDomain(User $user): UserEntity{
        return new UserEntity(
            $user->name,
            $user->email,
            $user->password,
            new Profile($user->profile),
            $user->code,
            $user->_id
        );
    }

}