<?php

namespace App\Domain\Usecases\event;

use Exception;

use App\Domain\dtos\UpdateEventDTO;
use App\Domain\Repositories\IEventRepository;

use App\Domain\Entities\event\EventEntity;
use App\Domain\Entities\event\Date;
use App\Domain\Entities\event\Hour;

class UpdateEventUseCase {
    public function __construct(private IEventRepository $eventRepository) {}

    public function execute(string $id, UpdateEventDTO $data){
        $event = new EventEntity(
            $data->name,
            new Date($data->date),
            new Hour($data->hour),
            $data->modality,
            $data->place,
            $data->description,
            $id
        );

        $result = $this->eventRepository->update($event);

        if(!$result){
            throw new Exception('Evento não encontrado');
        }
    }
}