<?php

namespace App\Domain\Entities\event;
use DateTime;

class Date {
    private string $date;

    public function dateIsValid(string $date): bool {
        $currentDate = new DateTime();
        $currentDateFormatted = $currentDate->format('Y-m-d');

        if($date < $currentDateFormatted) {
            return false;
        }

        return true;
    }

    public function __construct(string $date){
        $result = $this->dateIsValid($date);

        if(!$result) {
            throw new \InvalidArgumentException('Invalid date');
        }

        $this->date = $date;
    }

	public function getValue(): string {
		return $this->date;
	}
}