<?php

namespace App\Http\Controllers;

use App\Domain\dtos\UpdateEventDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Log;
use Exception;

use App\Http\ViewModel\EventViewModel;

use App\Domain\Usecases\event\CreateEventUseCase;
use App\Domain\Usecases\event\GetAllUseCase;
use App\Domain\Usecases\event\RemoveEventUseCase;
use App\Domain\Usecases\event\UpdateEventUseCase;


use App\Domain\dtos\CreateEventDTO;
class EventController extends Controller {
    public function __construct(
        private CreateEventUseCase $createEventUseCase,
        private GetAllUseCase $getAllUseCase,
        private RemoveEventUseCase $removeEventUseCase,
        private UpdateEventUseCase $updateEventUseCase
    ){}

    public function create(CreateEventRequest $request){
        try {
            $requestData = $request->only('name', 'date', 'hour', 'modality', 'place', 'description');
            
            $event = $this->createEventUseCase->execute(new CreateEventDTO(
                $requestData['name'],
                $requestData['date'],
                $requestData['hour'],
                $requestData['modality'],
                $requestData['place'],
                $requestData['description']
            ));

            $eventResult = EventViewModel::toHttpCreate($event);

            Log::info('Evento criado com sucesso');
    
            return $eventResult;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['msg' => 'Error ao criar evento'], 400);
        }

       
    }
    public function getAll(){
        try {
            $events = $this->getAllUseCase->execute();

            $eventsResult = EventViewModel::toHttpGetAll($events);

            Log::info('Eventos retornados com sucesso');

            return $eventsResult;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['msg' => 'Error ao retornar eventos'], 404);
        }
    }

    public function remove(string $id){
        try {
            $this->removeEventUseCase->execute($id);

            Log::info('Evento removido com sucesso');

            return response()->json(['msg' => 'Evento removido com sucesso'], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['msg' => 'Error ao remover evento'], 400);
        }
    }

    public function update(string $id, UpdateEventRequest $request){
        try {
            $requestData = $request->only('name', 'date', 'hour', 'modality', 'place', 'description');
            
            $this->updateEventUseCase->execute($id, new UpdateEventDTO(
                $requestData['name'],
                $requestData['date'],
                $requestData['hour'],
                $requestData['modality'],
                $requestData['place'],
                $requestData['description']
            ));

            Log::info('Evento atualizado com sucesso');

            return response()->json(['msg' => 'Evento atualizado com sucesso'], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['msg' => 'Error ao atualizar evento'], 400);
        }
    }
}