<?php

namespace App\Domain\Dtos;


class CreateUserDTO {
    public string $name;
    public string $email;
    public string $password;
    public string $profile;
    public function __construct(
        string $name,
        string $email,
        string $password,
        string $profile,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->profile = $profile;
    }
}