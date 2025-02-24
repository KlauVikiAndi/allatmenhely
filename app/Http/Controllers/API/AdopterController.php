<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adopter;
use App\Http\Resources\Adopter as AdopterResource;
use App\Http\Requests\AdopterRequest; 
use Illuminate\Support\Facades\Gate;

class AdopterController extends ResponseController
{
    
    public function getAdopters()
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
        $adopters = Adopter::all();

        return $this->sendResponse( AdopterResource::collection( $adopters ), "Örökbefogadók betöltve");
    }   


    public function getAdopter(Request $request)
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
        return Adopter::where("id", $request->id)->first();         
    }
    
    
    public function newAdopter(AdopterRequest $request)
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
 

        $adopter = new Adopter();
        $adopter->name = $request["name"];
        $adopter->phone_number =$request["phone_number"];
        $adopter->e_mail = $request["e_mail"];
        $adopter->city = $request["city"];

        $adopter->save();


        return $this->sendResponse(new AdopterResource($adopter), "Örökbefogadó sikeresen hozzáadva.");
    }

    public function updateAdopter(Request $request)
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

    
        $adopter = $this->getAdopter($request);

        if (!$adopter) {
            return $this->sendError("Ilyen örökbefogadó nem található!", 404);
        }

    
        $adopter->name = $request->name;
        $adopter->phone_number = $request->phone_number;
        $adopter->e_mail = $request->e_mail;
        $adopter->city = $request->city;

    
        $adopter->save();

        return $this->sendResponse(new AdopterResource($adopter), "Örökbefogadó adatai frissítve!");
    }
}
