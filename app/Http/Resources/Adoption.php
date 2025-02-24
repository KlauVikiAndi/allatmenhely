<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Adoption extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "animal_name" => $this->animal ? $this->animal->name : null,
            "adopter_name" => $this->adopter ? $this->adopter->name : null,
            "date_of_adoption" => $this->date_of_adoption,

        ];
    }
}
