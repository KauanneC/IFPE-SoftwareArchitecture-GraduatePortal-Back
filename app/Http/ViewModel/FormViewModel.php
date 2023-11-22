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

    public static function toHttpAll(array $formEntity): array {
        $form = [];
        foreach ($formEntity as $formData) {
            $form[] = [
                'id' => $formData['_id'],
                'formType' => $formData['form_type'],
                'question' => $formData['question'],
                'type' => $formData['type'],
                'options' => $formData['options']
            ];
        }
        return $form;
    }
}