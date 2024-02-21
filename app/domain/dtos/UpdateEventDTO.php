<?php

namespace App\Domain\dtos;

class UpdateEventDTO {
    public string $name;
    public string $date;
    public string $hour;
    public string $modality;
    public string $place;
    public string $description;

    public function __construct(
        string $name,
        string $date,
        string $hour,
        string $modality,
        string $place,
        string $description
    ){
        $this->name = $name;
        $this->date = $date;
        $this->hour = $hour;
        $this->modality = $modality;
        $this->place = $place;
        $this->description = $description;
    }
}