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
use App\Http\Controllers\API\UserController;


class UserController extends ResponseController
{
    public function register(Request $request)
{
    // Validate the data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed', // The "confirmed" rule expects password_confirmation
    ]);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Make sure to hash the password
    ]);

    // Return the token as a response
    return response()->json(['token' => $user->createToken('App Name')->plainTextToken]);
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

    