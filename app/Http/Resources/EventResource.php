<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            '_id' => $this->getId(),
            'name' => $this->getName(),
            'date' => $this->getDate()->getValue(),
            'hour' => $this->getHour()->getValue(),
            'modality' => $this->getModality(),
            'place' => $this->getPlace(),
            'description' => $this->getDescription(),
        ];
    }
}
