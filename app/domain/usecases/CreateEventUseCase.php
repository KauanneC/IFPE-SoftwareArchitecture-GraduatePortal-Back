<?php

namespace App\Domain\Usecases;

use App\Domain\dtos\CreateEventDTO;
use App\Domain\Entities\event\EventEntity;
use App\Domain\Entities\event\Date;
use App\Domain\Entities\event\Hour;
use App\Domain\Repositories\IEventRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class CreateEventUseCase {

    public function __construct(private IEventRepository $eventRepository) {}
    public function execute(CreateEventDTO $data): EventEntity {
        $event = new EventEntity(
            '',
            $data->name,
            new Date($data->date),
            new Hour($data->hour),
            $data->modality,
            $data->place,
            $data->description
        );

        $this->eventRepository->create($event);

        return $event;
    }

    public function getAll(): array {
        $eventsData = $this->eventRepository->getAll();
        $events = [];
    
        foreach ($eventsData as $eventData) {
            $events[] = new EventEntity(
                $eventData['_id'],
                $eventData['name'],
                new Date($eventData['date']),
                new Hour($eventData['hour']),
                $eventData['modality'],
                $eventData['place'],
                $eventData['description']);
        }

    
        if (empty($events)) {
            throw new Exception('Nenhum evento encontrado');
        }
    
        return $events;
    }
}