<?php

namespace App\Http\Repositories;

use App\Domain\Repositories\IEventRepository;
use App\Domain\Entities\event\EventEntity;
use App\Models\Event;

class EloquentEventRepository implements IEventRepository {
    public function __construct(
        private Event $eventModel
    ){}

    public function create(EventEntity $event): void {
        $newEvent = new Event();
        $newEvent->name = $event->getName();
        $newEvent->date = $event->getDate()->getValue();
        $newEvent->hour = $event->getHour()->getValue();
        $newEvent->modality = $event->getModality();
        $newEvent->place = $event->getPlace();
        $newEvent->description = $event->getDescription();

        $newEvent->save();

    }

    public function getAll(): array {
        $events = $this->eventModel->all();
        return $events->toArray();
    }
}