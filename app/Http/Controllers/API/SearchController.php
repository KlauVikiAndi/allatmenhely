<?php

namespace App\Http\Controllers\API;

use App\Models\Animal;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\SizeController;
use App\Http\Controllers\API\GenderController;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchAnimals(Request $request)
    {
        $query = Animal::where("adopted", false); // Csak örökbefogadható állatok kereshetők
    
        
        if ($request->has("type") && $request->type) {
            $typeController = new TypeController();
            $type_id = $typeController->getTypeId($request->type); 
            if ($type_id !== null) {
                $query->where("type_id", $type_id); 
            }
        }
    
        if ($request->has("gender") && $request->gender) {
            $genderController = new GenderController();
            $gender_id = $genderController->getGenderId($request->gender); 
            if ($gender_id !== null) {
                $query->where("gender_id", $gender_id);
            }
        }
    
        if ($request->has("size") && $request->size) {
            $sizeController = new SizeController();
            $size_id = $sizeController->getSizeId($request->size);
            if ($size_id !== null) {
                $query->where("size_id", $size_id); 
            }
        }
    
        if ($request->has("age") && $request->age) {
            $age = $request->age;
            $now = Carbon::now();
    
            if ($age === "kölyök") {
                $query->where("date_of_birth", ">=", $now->subMonths(12)->toDateString());
            } elseif ($age === "felnőtt") {
                $query->where("date_of_birth", "<=", $now->subMonths(12)->toDateString())
                      ->where("date_of_birth", ">=", $now->subMonths(96)->toDateString());
            } elseif ($age === "idős") {
                $query->where("date_of_birth", "<=", $now->subMonths(96)->toDateString());
            }
        }
    
        $animals = $query->get();
    
        if ($animals->isEmpty()) {
            return response()->json(["message" => "Nincs a keresésednek megfelelő állat."], 404);
        }
    
        return response()->json($animals);
    }
    
}
