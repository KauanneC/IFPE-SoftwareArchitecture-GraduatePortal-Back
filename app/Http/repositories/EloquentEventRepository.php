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
        $newEvent->_id = $event->getId();
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

    public function remove(string $id): bool {
        $event = $this->eventModel->find($id);
        if($event){
            $event->delete();
            return true;
        }
        return false;
    }

    public function update(EventEntity $event): bool {
        $eventUpdate = $this->eventModel->find($event->getId());
        if($eventUpdate){
            $eventUpdate->name = $event->getName();
            $eventUpdate->date = $event->getDate()->getValue();
            $eventUpdate->hour = $event->getHour()->getValue();
            $eventUpdate->modality = $event->getModality();
            $eventUpdate->place = $event->getPlace();
            $eventUpdate->description = $event->getDescription();
            $eventUpdate->save();
            return true;
        }
        return false;
    }
}