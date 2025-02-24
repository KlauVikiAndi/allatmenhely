<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    
    public $timestamps = false;

    public function type() {

        return $this->belongsTo( Type::class );
    }

    public function size() {

        return $this->belongsTo( Size::class );
    }

    public function gender() {

        return $this->belongsTo( Gender::class );
    }

}
