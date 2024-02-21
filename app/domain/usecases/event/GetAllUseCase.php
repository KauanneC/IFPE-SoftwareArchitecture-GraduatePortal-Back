<?php

namespace App\Domain\Usecases\event;

use App\Domain\Repositories\IEventRepository;
use Exception;


class GetAllUseCase {

    public function __construct(private IEventRepository $eventRepository) {}
    public function execute(): array {
        $events = $this->eventRepository->getAll();
       
        if (empty($events)) {
            throw new Exception('Nenhum evento encontrado');
        }
    
        return $events;
    }
}