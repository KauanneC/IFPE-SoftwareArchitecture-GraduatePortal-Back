<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Resources\EventResource;
use Exception;
use Illuminate\Http\Request;

use App\Domain\dtos\CreateEventDTO;
use App\Domain\Usecases\CreateEventUseCase;
use Illuminate\Support\Facades\Log;

class EventController extends Controller {
    public function __construct(
        private CreateEventUseCase $createEventUseCase,
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

            Log::info('Evento criado com sucesso');
    
            return new EventResource($event);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['msg' => 'Error ao criar evento'], 400);
        }

       
    }

    public function getAll(){
        try {
            $events = $this->createEventUseCase->getAll();

            Log::info('Eventos retornados com sucesso');

            return EventResource::collection($events);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['msg' => 'Error ao retornar eventos'], 400);
        }
    }
}