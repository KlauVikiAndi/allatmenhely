<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Animal;
use App\Models\Adopter;
use App\Http\Requests\AdoptionRequest;
use App\Http\Resources\Adoption as AdoptionResource;
use Illuminate\Support\Facades\Gate;


class AdoptionController extends ResponseController
{
    public function newAdoption(AdoptionRequest $request)
    {
        $user = auth("sanctum")->user();    

        Gate::before(function ($user) {
            if ($user->admin == 2) 
            {
                return true;
            }
        });

        if (!Gate::allows("admin")) 
        {
            return $this->sendError("Azonosítási hiba!", "Nincs jogosultsága!", 401);
        }

        $animal = Animal::where("name", $request->animal_name)
        ->where("adopted", false) // Csak az örökbefogadható állatokat keressük
        ->first();

        $adopter = Adopter::where("name", $request->adopter_name)->first();

        if (!$animal) 
        {
            return $this->sendError("Az állat nem található vagy már örökbefogadták!", 404);
        }

        if (!$adopter) 
        {
            return $this->sendError("Az örökbefogadó nem található!", 404);
        }


        $request->validated();

        $adoption = new Adoption();
        $adoption->animal_id = $animal->id;
        $adoption->adopter_id = $adopter->id;
        $adoption->date_of_adoption = $request->date_of_adoption;
        
        $adoption->save();

        $animal->adopted = true;
        $animal->save();  

        return $this->sendResponse(new AdoptionResource($adoption->load("animal", "adopter")), "Az örökbefogadás sikeresen rögzítve!");
    }

    public function updateAdoption(Request $request)
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

        $adoption = Adoption::find($request->input("id"));

        if (!$adoption) {
            return $this->sendError("Az örökbefogadás nem található!", 404);
        }
    
        if ($request->has("animal_name")) {
            // Ha volt már örökbefogadott állat, állítsuk annak az "adopted" értékét "false"-ra
            $previousAnimal = Animal::find($adoption->animal_id);
            if ($previousAnimal) {
                $previousAnimal->adopted = false;
                $previousAnimal->save();
            }
    
            // Új állat keresése
            $animal = Animal::where("name", $request->animal_name)->where("adopted", false)->first();
            if (!$animal) {
                return $this->sendError("Az állat nem található vagy már örökbefogadták!", 404);
            }
            // Beállítjuk az új állatot az örökbefogadásban
            $adoption->animal_id = $animal->id;
            $animal->adopted = true; // Az új állatot örökbefogadottnak állítjuk
            $animal->save();
        }
    
        // Ha az örökbefogadót módosítjuk
        if ($request->has("adopter_name")) {
            $adopter = Adopter::where("name", $request->adopter_name)->first();
            if (!$adopter) {
                return $this->sendError("Az örökbefogadó nem található!", 404);
            }
            $adoption->adopter_id = $adopter->id;
        }
    
        // Ha csak az időpontot módosítjuk
        if ($request->has("date_of_adoption")) {
            $adoption->date_of_adoption = $request->date_of_adoption;
        }
    
        $adoption->save();
    
        return $this->sendResponse(new AdoptionResource($adoption->load("animal", "adopter")), "Az örökbefogadás sikeresen rögzítve!");
    }

    public function getAdoptions()
    {
        $adoptions = Adoption::with("adopter", "animal")->get();
        
        return $this->sendResponse(AdoptionResource::collection($adoptions), "Listázva");
    }

}

