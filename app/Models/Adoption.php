<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    public function adopter()
    {
        return $this->belongsTo(Adopter::class, "adopter_id");
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, "animal_id");
    }

}
