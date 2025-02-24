<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Animal extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "name" => $this->name,
            "type" => $this->type->type,
            "size" => $this->size->size,
            "date_of_birth"=>$this->date_of_birth,
            "date_of_admission"=>$this->date_of_admission,
            "description"=>$this->description,
            "gender" => $this->gender->gender,
            "adopted"=>$this->adopted,
            "image"=>$this->image,

        ];
    }
}
