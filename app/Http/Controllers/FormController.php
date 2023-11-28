<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\CreateFormRequest;
use App\Http\ViewModel\FormViewModel;
use App\Domain\Dtos\CreateFormDTO;

use App\Domain\UseCases\Form\RemoveFormUsecase;
use App\Domain\UseCases\Form\GetAllFormTypeUseCase;
use App\Domain\usecases\Form\CreateFormUseCase;


class FormController extends Controller {
    public function __construct(
        private CreateFormUseCase $createFormUseCase,
        private GetAllFormTypeUseCase $getAllFormTypeUseCase,
        private RemoveFormUsecase $removeFormUsecase
    ){}

    public function create(CreateFormRequest $request) {
        try {
            $requestData = $request->only(['formType', 'question', 'type', 'options', 'other']);

            $form = $this->createFormUseCase->execute(new CreateFormDTO(
                $requestData['formType'],
                $requestData['question'],
                $requestData['type'],
                $requestData['other'],
                $requestData['options']
            ));

            Log::info('Campo criado com sucesso');

            $formResult = FormViewModel::toHttpCreate($form);

            return $formResult;

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao criar campo'], 400);
        }
    }

    public function getAllFormType(string $formType) {
        try {
            $form = $this->getAllFormTypeUseCase->execute($formType);

            Log::info($formType);

            $formResult = FormViewModel::toHttpAll($form);

            return $formResult;

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao retornar campos do formulário'], 404);
        }
    }

    public function remove(string $id) {
        try {
            $this->removeFormUsecase->execute($id);

            Log::info('Campo removido com sucesso');

            return response()->json(['msg' => 'Campo removido com sucesso'], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao remover campo'], 404);
        }
    }
}