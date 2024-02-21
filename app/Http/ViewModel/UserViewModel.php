<?php

namespace App\Http\ViewModel;
use App\Domain\Entities\User\UserEntity;

class UserViewModel {
    public static function toHttpCreate(UserEntity $userEntity): array {
        return [
            'id' => $userEntity->getId(),
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'profile' => $userEntity->getProfile()->getValue(),
            'primaryAcess' => $userEntity->getPrimaryAcess(),
            'code' => $userEntity->getCode()
        ];
    }

    public static function toHttpGet(UserEntity $userEntity): array {
        return [
            'id' => $userEntity->getId(),
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'profile' => $userEntity->getProfile()->getValue(),
            'primaryAcess' => $userEntity->getPrimaryAcess(),
            'code' => $userEntity->getCode()
        ];
    }

    public static function toHttpGetAll(array $userEntity): array {
        $users = [];
        $pageInfo = [];
        foreach ($userEntity['data'] as $user) {
            $users[] = [
                'id' => $user['_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'profile' => $user['profile'],
                'primaryAcess' => $user['primaryAcess'],
                'code' => $user['code']
            ];
        }
        $pageInfo = [
            'total_users' => $userEntity['total'],
            'total_pages' => $userEntity['last_page'],
        ];

        $users = [
            'users' => $users,
            'page_info' => $pageInfo
        ];

        return $users;
    }
}