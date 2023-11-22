<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\CreateFormRequest;
use App\Http\ViewModel\FormViewModel;
use App\Domain\Entities\Form\FormEntity;
use App\Domain\Dtos\CreateFormDTO;
use App\Domain\usecases\Form\CreateFormUseCase;


class FormController extends Controller {
    public function __construct(
        private CreateFormUseCase $createFormUseCase
    ){}

    public function create(CreateFormRequest $request) {
        try {
            $requestData = $request->only(['formType', 'question', 'type', 'options']);

            $form = $this->createFormUseCase->execute(new CreateFormDTO(
                $requestData['formType'],
                $requestData['question'],
                $requestData['type'],
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
}