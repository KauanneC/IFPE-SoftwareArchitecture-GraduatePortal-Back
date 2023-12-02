<?php

namespace App\Http\Repositories;

use App\Domain\Entities\Response\ResponseEntity;

use App\Domain\Repositories\IResponseRepository;

use App\Models\Response;

class EloquentResponseRepository implements IResponseRepository
{
    public function create(ResponseEntity $response): void
    {
        $responseModel = new Response();
        $responseModel->_id = $response->getId();
        $responseModel->form_id = $response->getFormId();
        $responseModel->user_id = $response->getUserId();
        $responseModel->value = $response->getValue();
        $responseModel->save();
    }
    public function getAllFormType(string $userId, string $formType): array
    {
        $responses = Response::with('form')
            ->where('user_id', $userId)
            ->whereHas('form', function ($query) use ($formType) {
                $query->where('form_type', $formType);
            })
            ->get();

        return $responses->toArray();
    }

    public function getAllByUser(string $userId): array
    {
        $responses = Response::with('form')
            ->where('user_id', $userId)
            ->get();

        return $responses->toArray();
    }
}