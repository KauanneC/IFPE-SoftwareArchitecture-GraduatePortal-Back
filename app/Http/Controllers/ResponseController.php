<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Response\CreateResponseUseCase;
use App\Domain\UseCases\Response\GetAllResponseFormTypeUseCase;
use App\Domain\UseCases\Response\GetAllResponseUseCase;
use App\Http\Requests\CreateResponseRequest;
use App\Http\ViewModel\ResponseViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResponseController extends Controller {
    public function __construct(
        private CreateResponseUseCase $createResponseUseCase,
        private GetAllResponseFormTypeUseCase $getAllResponseFormTypeUseCase
    ){}
    public function create(CreateResponseRequest $request) {
        try {
            $requestData = $request->all();

            $this->createResponseUseCase->execute($requestData);

            Log::info('Resposta enviada com sucesso');

            return response()->json(['msg' => 'Resposta enviada com sucesso'], 201);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao enviar resposta'], 400);
        }
    }

    public function getAllFormType(string $userId, string $formType) {
        try {
            $responses = $this->getAllResponseFormTypeUseCase->execute($userId, $formType);

            Log::info('Respostas retornadas com sucesso');

            $responseResult = ResponseViewModel::toHttpGet($responses); 

            return response()->json($responseResult, 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao retornar respostas'], 404);
        }
    }
}