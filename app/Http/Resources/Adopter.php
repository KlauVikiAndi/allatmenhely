<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Adopter extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            "id" => $this->id,
            "name" => $this->name,
            "phone_number" => $this->phone_number,
            "e_mail" => $this->e_mail,
            "city" => $this->city
        ];
    }
}
