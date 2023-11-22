<?php

namespace App\Http\ViewModel;
use App\Domain\Entities\Form\FormEntity;

class FormViewModel {
    public static function toHttpCreate(FormEntity $formEntity): array {
        return [
            'id' => $formEntity->getId(),
            'formType' => $formEntity->getFormType(),
            'question' => $formEntity->getQuestion(),
            'type' => $formEntity->getType(),
            'options' => $formEntity->getOptions()
        ];
    }
}