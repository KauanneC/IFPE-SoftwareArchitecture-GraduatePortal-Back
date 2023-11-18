<?php

namespace App\Domain\Usecases;

use App\Domain\dtos\CreateEventDTO;
use App\Domain\Entities\event\EventEntity;
use App\Domain\Entities\event\Date;
use App\Domain\Entities\event\Hour;
use App\Domain\Repositories\IEventRepository;
use Exception;


class GetAllUseCase {

    public function __construct(private IEventRepository $eventRepository) {}
    public function execute(): array {
        $events = $this->eventRepository->getAll();
        // $events = [];

        // foreach ($eventsData as $eventData) {
        //     $event = array(
        //         'id' => $eventData['_id'],
        //         'name' => $eventData['name'],
        //         'date' => $eventData['date'],
        //         'hour' => $eventData['hour'],
        //         'modality' => $eventData['modality'],
        //         'place' => $eventData['place'],
        //         'description' => $eventData['description']
        //     );
        //     array_push($events, $event);       
        // }
    
    
        if (empty($events)) {
            throw new Exception('Nenhum evento encontrado');
        }
    
        return $events;
    }
}