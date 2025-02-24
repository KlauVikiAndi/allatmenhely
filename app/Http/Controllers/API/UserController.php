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


class UserController extends ResponseController
{
    public function register(RegisterRequest $request){

        $request->validated();

        $user = User::create([
            "name"=>$request ["name"],
            "email"=>$request ["email"],
            "password"=>bcrypt ($request ["password"]),
            "admin"=>$request["admin"]
        ]);

        return $user;
    }

    public function login(LoginRequest $request){

        $request->validated();

        if (Auth::attempt(["name"=>$request["name"], "password"=>$request["password"]])){

        $authUser = Auth::user();
        $token = $authUser->createToken($authUser->name."token")->plainTextToken;
        $data = [
            "name"=> $authUser->name,
            "token"=> $token
        ];

        return $this->sendResponse($data, "Sikeres bejelentkezés!");  
        }
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

    