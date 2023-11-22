<?php

namespace App\Domain\Usecases\event;

use Exception;

use App\Domain\Repositories\IEventRepository;


class RemoveEventUseCase {
    public function __construct(private IEventRepository $eventRepository) {}

    public function execute(string $id){
        $result = $this->eventRepository->remove($id);

        if(!$result){
            throw new Exception('Evento não encontrado');
        }
    }
}