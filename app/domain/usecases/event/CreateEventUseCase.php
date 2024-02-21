<?php

namespace App\Domain\Usecases\event;

use App\Domain\dtos\CreateEventDTO;
use App\Domain\Entities\event\EventEntity;
use App\Domain\Entities\event\Date;
use App\Domain\Entities\event\Hour;
use App\Domain\Repositories\IEventRepository;

class CreateEventUseCase {

    public function __construct(private IEventRepository $eventRepository) {}
    public function execute(CreateEventDTO $data): EventEntity {
        $event = new EventEntity(
            $data->name,
            new Date($data->date),
            new Hour($data->hour),
            $data->modality,
            $data->place,
            $data->description,    
        );

        $this->eventRepository->create($event);

        return $event;
    }

    
}