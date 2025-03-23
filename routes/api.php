<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AnimalController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\SizeController;
use App\Http\Controllers\API\GenderController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\AdopterController;
use App\Http\Controllers\API\AdoptionController;
use App\Http\Controllers\API\SearchController;

Route::middleware("auth:sanctum")->group(function(){

    Route::post("/admin", [UserController::class, "giveAdmin"]);
    Route::post("/logout", [UserController::class, "logout"]);
   
    Route::post( "/newanimal", [ AnimalController::class, "newAnimal" ]);
    Route::put( "/updateanimal", [ AnimalController::class, "updateAnimal" ]);
    Route::delete( "/deleteanimal/{id}", [ AnimalController::class, "destroyAnimal" ]);

    Route::get("/appointments", [AppointmentController::class, "getAppointments"]);
    Route::get("/anyappointments", [AppointmentController::class, "getAnyAppointments"]);
    Route::post("/newappointment", [AppointmentController::class, "newAppointment"]);
    Route::put("/updateappointment/{id}", [AppointmentController::class, "updateAppointment"]);
    Route::delete("/deleteappointment/{id}", [AppointmentController::class, "destroyAppointment"]);
    Route::delete("/deleteanyappointment/{id}", [AppointmentController::class, "destroyAnyAppointment"]);

    
    Route::post("/addfavorite", [FavoriteController::class, "addFavorite"]);
    Route::get("/getfavorites", [FavoriteController::class, "getUserFavorites"]);
    Route::delete("/removefavorite/{id}", [FavoriteController::class, "removeFavorite"]);

    Route::get("/adopter", [AdopterController::class, "getAdopter"]);
    Route::get("/adopters", [AdopterController::class, "getAdopters"]);
    Route::post("/newadopter", [AdopterController::class, "newAdopter"]);
    Route::put("/updateadopter", [AdopterController::class, "updateAdopter"]);

    Route::get("adoptions", [AdoptionController::class, "getAdoptions"]);
    Route::post("newadoption", [AdoptionController::class, "newAdoption"]);
    Route::put("updateadoption", [AdoptionController::class, "updateAdoption"]);
   
    });
    
    Route::post("/register", [UserController::class, "register"]);
    Route::post("/login", [UserController::class, "login"]);
        
    Route::get("/search", [SearchController::class, "searchAnimals"]);
    
    Route::get( "/animals", [ AnimalController::class, "getAnimals" ]);
    Route::get( "/animal", [ AnimalController::class, "getAnimal" ]);
    Route::get( "/adoptable", [ AnimalController::class, "getAdoptableAnimals"]);

    Route::get( "/types", [ TypeController::class, "getTypes"]);

    Route::get( "/genders", [ GenderController::class, "getGenders"]);

    Route::get( "/sizes", [ SizeController::class, "getSizes"]);


    