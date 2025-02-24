<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function animal() {

        return $this->hasMany( Animal::class );
    }
}
