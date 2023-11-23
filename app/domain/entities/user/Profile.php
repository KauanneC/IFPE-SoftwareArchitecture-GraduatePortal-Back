<?php

namespace App\Domain\Entities\User;

use Exception;

class Profile {
    private string $profile;

    private function profileIsValid(string $profile): bool {
        $validProfiles = ['coordinator', 'egress', 'teacher'];

        if(!in_array($profile, $validProfiles)) {
            return false;
        }

        return true;
    }

    public function __construct(string $profile) {
        $result = $this->profileIsValid($profile);

        if(!$result) {
            throw new Exception('Invalid profile');
        }

        $this->profile = $profile;
    }

    public function getValue(): string {
        return $this->profile;
    }


}