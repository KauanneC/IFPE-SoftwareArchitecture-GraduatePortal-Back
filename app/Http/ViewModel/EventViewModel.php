<?php

namespace App\Http\ViewModel;
use App\Domain\Entities\event\EventEntity;

class EventViewModel {
    public static function toHttpGetAll(array $eventEntity): array {
       $events = [];

        foreach ($eventEntity as $eventData) {
            $event = array(
                'id' => $eventData['_id'],
                'name' => $eventData['name'],
                'date' => $eventData['date'],
                'hour' => $eventData['hour'],
                'modality' => $eventData['modality'],
                'place' => $eventData['place'],
                'description' => $eventData['description']
            );
            array_push($events, $event);       
        }

        return $events;

    }
    public static function toHttpCreate(EventEntity $eventEntity): array {
        return [
            'id' => $eventEntity->getId(),
            'name' => $eventEntity->getName(),
            'date' => $eventEntity->getDate()->getValue(),
            'hour' => $eventEntity->getHour()->getValue(),
            'modality' => $eventEntity->getModality(),
            'place' => $eventEntity->getPlace(),
            'description' => $eventEntity->getDescription()
        ];
    }
}