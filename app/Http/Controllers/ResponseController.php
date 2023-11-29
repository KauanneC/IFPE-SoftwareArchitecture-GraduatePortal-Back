<?php

namespace App\Http\Controllers;

use App\Domain\Dtos\CreateResponseDTO;
use App\Domain\UseCases\Response\CreateResponseUseCase;
use App\Http\Requests\CreateResponseRequest;
use Illuminate\Support\Facades\Log;

class ResponseController extends Controller {
    public function __construct(
        private CreateResponseUseCase $createResponseUseCase
    ){}
    public function create(CreateResponseRequest $request) {
        try {
            $requestData = $request->all();
            $this->createResponseUseCase->execute($requestData);

            Log::info('Resposta enviada com sucesso');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao enviar resposta'], 400);
        }
    }
}