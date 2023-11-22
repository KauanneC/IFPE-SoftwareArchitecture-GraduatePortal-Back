<?php

namespace App\Http\Repositories;

use App\Domain\Entities\Form\FormEntity;
use App\Domain\Repositories\IFormRepository;
use App\Models\Form;

class EloquentFormRepository implements IFormRepository {
    public function create(FormEntity $form): void {
        $formModel = new Form();
        $formModel->_id = $form->getId();
        $formModel->form_type = $form->getFormType();
        $formModel->question = $form->getQuestion();
        $formModel->type = $form->getType();
        $formModel->options = $form->getOptions();

        $formModel->save();
    }

    public function getAllFormType(string $formType): array {
        $form = Form::where('form_type', $formType)->get();
        return $form->toArray();
    }

    public function remove(string $id): bool {
        $form = Form::find($id);
        if(!$form){
            return false;
        }
        $form->delete();
        return true;
    }
}