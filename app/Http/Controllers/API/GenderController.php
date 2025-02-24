<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;
use App\Http\Resources\Gender as GenderResource;

class GenderController extends ResponseController {

    public function getGenders() {

        $gender = Gender::all();

        return $this->sendResponse( GenderResource::collection( $gender ), "Nemek betöltve");
    }   

    public function newGender( GenderRequest $request ) {
      
        //    $request->validated();
            $gender = new Gender();

            $gender->gender = $request[ "gender" ];
            $gender->save();

            return $this->sendResponse( new GenderResource( $gender ), "Nem kiírva");     
    }

    public function modifyGender( GenderRequest $request ) {

        // $request->validated();

        $gender = Gender::find(request [$id] );
        if( !is_null( $gender )) {

            $gender->gender = $request[ "gender" ];

            $gender->update();

            return $this->sendResponse( new GenderResource( $gender ), "Nem módosítva");

        }else {

            return $this->sendError( "Adathiba", [ "Nincs ilyen nem!" ], 406 );
        }

    }

    public function destroyGender( Request $request ) {

        $gender = Gender::find( $request[ "id" ]);

        if( !is_null( $gender )) {

            $gender->delete();

            return $this->sendResponse( new GenderResource( $gender ), "Nem törölve" );

        }else {

            return $this->sendError( "Adathiba", [ "Ez a nem nem létezik!" ], 406 );
        }


    }

    public function getGenderId( $genderName ) {

        $gender = Gender::where( "gender", $genderName )->first();

        $id = $gender->id;

        return $id;
    }
}