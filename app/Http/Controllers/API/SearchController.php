<?php


namespace App\Http\Controllers\API;

use App\Models\Animal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Animal::where("adopted", false); // Csak örökbefogadható állatok
    
        // Fajta szűrés a kapcsolt type tábla "type" mezője alapján
        if ($request->has("type") && $request->input("type") !== "") {
            $type = $request->input("type");
            $query->whereHas("type", function ($q) use ($type) {
                $q->where("type", "like", "%$type%");  // A type mező alapján szűrünk
            });
        }
    
        // Nem szűrés a kapcsolt gender tábla "gender" mezője alapján
        if ($request->has("gender") && $request->input("gender") !== "") {
            $gender = $request->input("gender");
            $query->whereHas("gender", function ($q) use ($gender) {
                $q->where("gender", "like", "%$gender%");
            });
        }
    
        // Méret szűrés a kapcsolt size tábla "size" mezője alapján
        if ($request->has("size") && $request->input("size") !== "") {
            $size = $request->input("size");
            $query->whereHas("size", function ($q) use ($size) {
                $q->where("size", "like", "%$size%");
            });
        }
    
        // Kor szűrés (puppy, adult, senior) a date_of_birth alapján
        if ($request->has("age") && $request->input("age") !== "") {
            $age = $request->input("age");
            $now = Carbon::now();
            $query->where(function ($q) use ($age, $now) {
                if ($age === "puppy") {
                    $q->where("date_of_birth", ">=", $now->subMonths(12)->toDateString());
                } elseif ($age === "adult") {
                    $q->where("date_of_birth", "<=", $now->subMonths(12)->toDateString())
                      ->where("date_of_birth", ">=", $now->subMonths(96)->toDateString());
                } elseif ($age === "senior") {
                    $q->where("date_of_birth", "<=", $now->subMonths(96)->toDateString());
                }
            });
        }
    
        // Eredmény lekérése
        $animals = $query->get();
    
        // Ha nincs találat, üzenet visszaadása
        if ($animals->isEmpty()) {
            return response()->json(["message" => "Nincs a keresésednek megfelelő állat."], 404);
        }
    
        // Ha van találat, visszaadjuk az eredményt
        return response()->json($animals);
    }
}    