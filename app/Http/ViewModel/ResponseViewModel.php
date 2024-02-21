<?php

namespace App\Http\ViewModel;

class ResponseViewModel {
    public static function toHttpGet(array $responseEntity): array {
        $response = [];
        foreach ($responseEntity as $responseData) {
            // dd($responseData);
            $form = [
                'id' => $responseData['form']['_id'],
                'formType' => $responseData['form']['form_type'],
                'type' => $responseData['form']['type'],
                'question' => $responseData['form']['question'],
                'options' => $responseData['form']['options'],
                'other' => $responseData['form']['other'],
            ];
            $response[] = [
                'value' => $responseData['value'],
                'form' => $form
            ];

        }
        return $response;
    }
}