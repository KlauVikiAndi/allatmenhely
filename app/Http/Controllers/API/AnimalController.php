<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
#use app\models\Animal;

class AnimalController extends Controller
{
    public function getAnimals(){
        $animals=Animal::all();
        return $animals;
    }
    
}
