<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    protected $fillable = ['name', 'phone_number', 'e_mail', 'city'];

    
    public function adoption() {

        return $this->hasMany( Adoption::class );
    }
}
