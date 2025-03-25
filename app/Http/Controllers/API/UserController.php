<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class UserController extends ResponseController
{
    public function register(RegisterRequest $request) {
        $request->validated();
    
        $user = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => bcrypt($request["password"]),
            "admin" => 0
        ]);
    
        return response()->json([
            "message" => "Sikeres regisztráció!", 
            "user" => $user
        ], 201); 
    }
    
    public function login(LoginRequest $request){
        $request->validated();

        if (Auth::attempt(["name"=>$request["name"], "password"=>$request["password"]])){

        $authUser = Auth::user();
        $token = $authUser->createToken($authUser->name."token")->plainTextToken;
        $data = [
            "name"=> $authUser->name,
            "token"=> $token,
            "isAdmin" => $authUser->admin,  // Az admin jogosultság lekérése
        ];

        return $this->sendResponse($data, "Sikeres bejelentkezés!");  
        }
    
        return $this->sendError("Hibás bejelentkezési adatok!", 401);
    }
    public function giveAdmin(Request $request)
    {
        if (!Gate::allows("super")) {
            return $this->sendError("Azonosítási hiba! Nincs megfelelő jogosultsága!", 401);
        }

        $user = User::where("name", $request->input("name"))->first();
        if (!$user) {
            return $this->sendError("A felhasználó nem található!", 404);
        }

        $user->admin = 1;
        $user->save();

        return $this->sendResponse($user->name, "Admin jogosultság beállítva!");
    }
    
    public function logout(Request $request) {
         
        $user = auth( "sanctum" )->user();
        $user->currentAccessToken()->delete();

        return $this->sendResponse( $user->name, "Sikeres kijelentkezés" );
    }
    

    public function getUserId( Request $request ) {

        return auth()->id();
        
    }

}

    
