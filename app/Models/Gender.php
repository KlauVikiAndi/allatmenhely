<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function animal() {

        return $this->hasMany( Animal::class );
    }
}
