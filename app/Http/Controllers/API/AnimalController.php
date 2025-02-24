<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Resources\Animal as AnimalResource;
use App\Http\Requests\AnimalAddRequest; 
use Illuminate\Support\Facades\Gate;


class AnimalController extends ResponseController
{
    public function getAnimals()
    {
        $animals = Animal::with("type", "size", "gender")->get();
        
        return $this->sendResponse(AnimalResource::collection($animals), "Listázva");
    }

    public function getAnimal (Request $request)
    {
        $animal = Animal::where ("id", $request["id"])->first();

        return $animal;
    }

    public function getAdoptableAnimals ()        
    {    
        $animals = Animal::where("adopted", false)->get();
        
        return $animals;
    }

    public function newAnimal(AnimalAddRequest $request)
    {
        $user = auth("sanctum")->user();        
        Gate::before(function ($user) {
            if ($user->admin == 2) {

                return true;
            }
        });

        if (!Gate::allows("admin")) {

            return $this->sendError("Azonosítási hiba!", "Nincs jogosultsága!", 401);

        }

        $request->validated();

  

        $animal = new Animal();
        $animal->name = $request["name"];
        $animal->type_id = (new TypeController)->getTypeId($request["type"]);
        $animal->size_id = (new SizeController)->getSizeId($request["size"]);
        $animal->date_of_birth = $request["date_of_birth"];
        $animal->date_of_admission = $request["date_of_admission"];
        $animal->description = $request["description"];
        $animal->gender_id = (new GenderController)->getGenderId($request["gender"]);
        $animal->adopted = $request["adopted"];
        $animal->image = $request["image"];

        $animal->save();


        return $this->sendResponse(new AnimalResource($animal), "Állat sikeresen hozzáadva.");
    }


    public function updateAnimal( Request $request ) {

        $user = auth("sanctum")->user();        
        Gate::before(function ($user) {
            if ($user->admin == 2) {

                return true;
            }
        });

        if (!Gate::allows("admin")) {

            return $this->sendError("Azonosítási hiba!", "Nincs jogosultsága!", 401);

        }

        $animal = $this->getAnimal( $request );

        if (!$animal) {
            return $this->sendError("Állat nem található!", 404);
        }
    

    $animal->name = $request["name"];
    $animal->type_id = (new TypeController)->getTypeId($request["type"]);
    $animal->size_id = (new SizeController)->getSizeId($request["size"]);
    $animal->date_of_birth = $request["date_of_birth"];
    $animal->date_of_admission = $request["date_of_admission"];
    $animal->description = $request["description"];
    $animal->gender_id = (new GenderController)->getGenderId($request["gender"]);
    $animal->adopted = $request["adopted"];
    $animal->image = $request["image"];

        $animal->save();

        return $this->sendResponse(new AnimalResource($animal), "Állat adatai frissítve!");
    }

    public function getAnimalId(  $animalName ) {

        $animal = Animal::where( "name", $animalName )->first();

        $id = $animal->id;

        return $id;
    }


    public function destroyAnimal( $id ) 
    {
        $user = auth("sanctum")->user();        
        Gate::before(function ($user) {
            if ($user->admin == 2) {

                return true;
            }
        });

        if (!Gate::allows("admin")) {

            return $this->sendError("Azonosítási hiba!", "Nincs jogosultsága!", 401);

        }

        $animal = Animal::find( $id );

        $animal->delete();

        return $animal;
    }

    public function isAdmin(){

        if (Gate::allows("admin")){
            
            return "admin";
        }

        return "nem admin";

    }
}

