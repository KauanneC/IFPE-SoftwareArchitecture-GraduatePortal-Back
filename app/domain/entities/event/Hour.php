<?php

namespace App\Domain\Entities\event;

class Hour {
    private string $hour;

    public function hourIsValid(string $hour): bool {
        if($hour >= '22:00' && $hour <= '07:59'){
            return false;
        }

        return true;
    }

    public function __construct(string $hour){
        $result = $this->hourIsValid($hour);

        if(!$result) {
            throw new \InvalidArgumentException('Invalid hour');
        }

        $this->hour = $hour;
    }
	public function getValue(): string {
		return $this->hour;
	}
}