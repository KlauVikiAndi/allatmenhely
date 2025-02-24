<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Animal;
use App\Models\User;


class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $user = auth()->user();
        $animalId = (new AnimalController)->getAnimalId($request["name"]);

        // Ellenőrizzük, hogy a kedvencek között van-e már a kérdéses állat
        $exists = Favorite::where("user_id", $user->id)->where("animal_id", $animalId)->exists();

        if ($exists) {
            return response()->json(["message" => "Ez az állat már a kedvenceid között szerepel!"], 400);
        }

            Favorite::create([
            "user_id" => $user->id,
            "animal_id" => $animalId,
        ]);

        return response()->json(["message" => "A kiválasztott állat sikeresen hozzáadva a kedvencekhez!"]);
    }


    public function getUserFavorites()
    {
        $user = auth()->user();
        $favorites = Favorite::where("user_id", $user->id)->with("animal")->get();

        return response()->json($favorites);
    }

    public function removeFavorite($id)
    {
        $user = auth()->user();
        $favorite = Favorite::where("user_id", $user->id)->where("animal_id", $id)->first();

        
        //Ha olyan állatot akarna törölni a kedvencek közül, amelyiket még nem is jelölte
        if (!$favorite) {
            return response()->json(["message" => "Ez az állat nincs a kedvenceid között!"], 404);
        }

        $favorite->delete();

        return response()->json(["message" => "Állat eltávolítva a kedvencek közül."]);
    }

}
