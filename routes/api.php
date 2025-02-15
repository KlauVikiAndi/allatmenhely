<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AnimalController;
use App\Http\Controllers\API\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);
Route::post("/logout", [UserController::class, "logout"])->middleware("auth:sanctum");
  


Route::get( "/animals", [ AnimalController::class, "getAnimals" ]);

