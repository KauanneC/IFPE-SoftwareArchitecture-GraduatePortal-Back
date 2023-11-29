<?php

namespace App\Http\Repositories;

use App\Domain\Entities\Response\ResponseEntity;

use App\Domain\Repositories\IResponseRepository;

use App\Models\Response;

class EloquentResponseRepository implements IResponseRepository {
    public function create(ResponseEntity $response): void {
        $responseModel = new Response();
        $responseModel->_id = $response->getId();
        $responseModel->form_id = $response->getFormId();
        $responseModel->user_id = $response->getUserId();
        $responseModel->value = $response->getValue();
        $responseModel->save();
    }
}