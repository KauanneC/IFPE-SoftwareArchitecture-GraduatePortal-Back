<?php

namespace App\Domain\Entities\User;

use Ramsey\Uuid\Uuid;

use App\Domain\Entities\User\Profile;

class UserEntity {
    private string $id;
    private string $name;
    private string $email;
    private string $password;
    private Profile $profile; 
    private bool $primaryAcess;
    private string $code;

    public function __construct(
        string $name,
        string $email,
        string $password,
        Profile $profile,
        string $primaryAcess = '',
        string $code = '',
        string $id = '',
    ) {
        $this->id = $id == '' ? Uuid::uuid4()->toString() : $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->profile = $profile;
        $this->primaryAcess = $primaryAcess == '' ? false: $primaryAcess;
        $this->code = $code == '' ? Uuid::uuid4()->toString() : $code;
    }

    public function getId(): string {
        return $this->id;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword(string $password): void {
        $this->password = $password;
    }
    public function getProfile(): Profile {
        return $this->profile;
    }
    public function setProfile(Profile $profile): void {
        $this->profile = $profile;
    }
    public function getPrimaryAcess(): bool {
        return $this->primaryAcess;
    }
    public function setPrimaryAcess(bool $primaryAcess): void {
        $this->primaryAcess = $primaryAcess;
    }
    public function getCode(): string {
        return $this->code;
    }
    public function setCode(string $code): void {
        $this->code = $code;
    }
}