<?php

namespace App\Domain\Entities\event;

use App\Domain\Entities\event\Date;
use App\Domain\Entities\event\Hour;

class EventEntity {
    private string $id;
    private string $name;
    private Date $date;
    private Hour $hour;
    private string $modality;
    private string $place;
    private string $description;

    public function __construct(
        string $id = '',
        string $name,
        Date $date,
        Hour $hour,
        string $modality,
        string $place,
        string $description
    ){
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->hour = $hour;
        $this->modality = $modality;
        $this->place = $place;
        $this->description = $description;
    }

	public function getId(): string {
		return $this->id;
	}

	public function getName(): string {
		return $this->name;
	}
	
	public function getDate(): Date {
		return $this->date;
	}
	
	public function getHour(): Hour {
		return $this->hour;
	}
	
	public function getModality(): string {
		return $this->modality;
	}
	
	public function getPlace(): string {
		return $this->place;
	}
	
	public function getDescription(): string {
		return $this->description;
	}
}